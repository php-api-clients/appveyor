<?php declare(strict_types=1);

namespace ApiClients\Client\AppVeyor\CommandBus\Handler\Project;

use ApiClients\Client\AppVeyor\CommandBus\Command\Project\LatestBuildCommand;
use ApiClients\Client\AppVeyor\Resource\BuildInterface;
use ApiClients\Tools\Services\Client\FetchAndHydrateService;
use ApiClients\Tools\Services\Client\FetchAndIterateService;
use React\Promise\PromiseInterface;

final class LatestBuildHandler
{
    /**
     * @var FetchAndHydrateService
     */
    private $service;

    /**
     * @param FetchAndIterateService $service
     */
    public function __construct(FetchAndHydrateService $service)
    {
        $this->service = $service;
    }

    /**
     * @param  LatestBuildCommand $command
     * @return PromiseInterface
     */
    public function handle(LatestBuildCommand $command): PromiseInterface
    {
        return $this->service->fetch(
            'projects/' . $command->getAccountName() . '/' . $command->getProjectSlug(),
            'build',
            BuildInterface::HYDRATE_CLASS
        );
    }
}
