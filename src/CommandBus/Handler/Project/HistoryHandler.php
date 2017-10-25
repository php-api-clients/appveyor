<?php declare(strict_types=1);

namespace ApiClients\Client\AppVeyor\CommandBus\Handler\Project;

use ApiClients\Client\AppVeyor\CommandBus\Command\Project\HistoryCommand;
use ApiClients\Client\AppVeyor\Resource\BuildInterface;
use ApiClients\Client\AppVeyor\Service\IteratePagesService;
use ApiClients\Foundation\Hydrator\Hydrator;
use React\Promise\PromiseInterface;
use function ApiClients\Tools\Rx\observableFromArray;
use function React\Promise\resolve;

final class HistoryHandler
{
    /**
     * @var IteratePagesService
     */
    private $service;

    /**
     * @var Hydrator
     */
    private $hydrator;

    /**
     * @param IteratePagesService $service
     * @param Hydrator            $hydrator
     */
    public function __construct(IteratePagesService $service, Hydrator $hydrator)
    {
        $this->service = $service;
        $this->hydrator = $hydrator;
    }

    /**
     * @param  HistoryCommand   $command
     * @return PromiseInterface
     */
    public function handle(HistoryCommand $command): PromiseInterface
    {
        return resolve(
            $this->service->iterate(
                'projects/' .
                    $command->getAccountName() .
                    '/' .
                    $command->getProjectSlug() .
                    '/history?recordsNumber=25',
                'builds',
                'buildId',
                'startBuildId'
            )->flatMap(function ($builds) {
                return observableFromArray($builds['builds']);
            })->map(function ($build) {
                return $this->hydrator->hydrate(BuildInterface::HYDRATE_CLASS, $build);
            })
        );
    }
}
