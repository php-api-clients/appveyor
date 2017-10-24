<?php declare(strict_types=1);

namespace ApiClients\Client\AppVeyor\Service;

use ApiClients\Foundation\Transport\Service\RequestService;
use Psr\Http\Message\ResponseInterface;
use RingCentral\Psr7\Request;
use Rx\AsyncSchedulerInterface;
use Rx\Observable;
use Rx\Scheduler;
use Rx\Subject\Subject;
use function igorw\get_in;

final class IteratePagesService
{
    /**
     * @var RequestService
     */
    private $requestService;

    /**
     * @var AsyncSchedulerInterface
     */
    private $scheduler;

    /**
     * @param RequestService               $requestService
     * @param AsyncSchedulerInterface|null $scheduler
     */
    public function __construct(RequestService $requestService, AsyncSchedulerInterface $scheduler = null)
    {
        $this->requestService = $requestService;
        $this->scheduler = $scheduler ?: Scheduler::getAsync();
    }

    public function iterate(
        string $path,
        string $collectionIndex,
        string $identifierIndex,
        string $identifierQueryKey,
        array $options = []
    ): Observable {
        $paths = new Subject();

        return Observable::of($path, $this->scheduler)
            ->merge($paths)
            ->flatMap(function ($path) use ($options) {
                return Observable::fromPromise($this->requestService->request(
                    new Request('GET', $path),
                    $options
                ));
            })
            ->do(function (ResponseInterface $response) use (
                $path,
                $paths,
                $collectionIndex,
                $identifierIndex,
                $identifierQueryKey
            ) {
                $json = $response->getBody()->getJson();
                $items = $json;
                if ($collectionIndex !== '') {
                    $items = get_in($json, explode('.', $collectionIndex));
                }

                if (count($items) === 0) {
                    $paths->onCompleted();

                    return;
                }

                $item = array_pop($items);
                $identifier = get_in($item, explode('.', $identifierIndex), false);

                if ($identifier === false) {
                    $paths->onCompleted();

                    return;
                }

                $this->scheduler->schedule(function () use ($path, $paths, $identifier, $identifierQueryKey) {
                    $paths->onNext($path . '&' . $identifierQueryKey . '=' . rawurlencode((string)$identifier));
                });
            })
            ->map(function (ResponseInterface $response) {
                return $response->getBody()->getJson();
            })
        ;
    }
}
