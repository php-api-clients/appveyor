<?php declare(strict_types=1);

namespace ApiClients\Client\AppVeyor\CommandBus\Handler;

use ApiClients\Client\AppVeyor\CommandBus\Command\AddProjectCommand;
use ApiClients\Client\AppVeyor\Resource\ProjectInterface;
use ApiClients\Foundation\Hydrator\Hydrator;
use ApiClients\Foundation\Transport\Service\RequestService;
use ApiClients\Middleware\Json\JsonStream;
use Psr\Http\Message\ResponseInterface;
use React\Promise\PromiseInterface;
use RingCentral\Psr7\Request;

final class AddProjectHandler
{
    /**
     * @var RequestService
     */
    private $requestService;

    /**
     * @var Hydrator
     */
    private $hydrator;

    /**
     * @param RequestService $requestService
     * @param Hydrator       $hydrator
     */
    public function __construct(RequestService $requestService, Hydrator $hydrator)
    {
        $this->requestService = $requestService;
        $this->hydrator = $hydrator;
    }

    /**
     * @param  AddProjectCommand $command
     * @return PromiseInterface
     */
    public function handle(AddProjectCommand $command): PromiseInterface
    {
        return $this->requestService->request(
            new Request(
                'POST',
                'projects',
                [],
                new JsonStream([
                    'repositoryProvider' => $command->getProvider(),
                    'repositoryName' => $command->getRepository(),
                ])
            )
        )->then(function (ResponseInterface $response) {
            return $this->hydrator->hydrate(
                ProjectInterface::HYDRATE_CLASS,
                $response->getBody()->getParsedContents()
            );
        });
    }
}
