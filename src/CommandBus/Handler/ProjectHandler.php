<?php declare(strict_types=1);

namespace ApiClients\Client\AppVeyor\CommandBus\Handler;

use ApiClients\Client\AppVeyor\CommandBus\Command\ProjectCommand;
use ApiClients\Client\AppVeyor\Resource\ProjectInterface;
use ApiClients\Tools\Services\Client\FetchAndHydrateService;
use ApiClients\Tools\Services\Client\FetchAndIterateService;
use React\Promise\PromiseInterface;

final class ProjectHandler
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
     * @param  ProjectCommand   $command
     * @return PromiseInterface
     */
    public function handle(ProjectCommand $command): PromiseInterface
    {
        return $this->service->fetch(
            'projects/' . $command->getRepository(),
            'project',
            ProjectInterface::HYDRATE_CLASS
        );
    }
}
