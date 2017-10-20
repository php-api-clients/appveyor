<?php declare(strict_types=1);

namespace ApiClients\Client\AppVeyor\CommandBus\Handler;

use ApiClients\Client\AppVeyor\CommandBus\Command\ProjectsCommand;
use ApiClients\Client\AppVeyor\Resource\ProjectInterface;
use ApiClients\Tools\Services\Client\FetchAndIterateService;
use React\Promise\PromiseInterface;
use function React\Promise\resolve;

final class ProjectsHandler
{
    /**
     * @var FetchAndIterateService
     */
    private $service;

    /**
     * @param FetchAndIterateService $service
     */
    public function __construct(FetchAndIterateService $service)
    {
        $this->service = $service;
    }

    /**
     * @param  ProjectsCommand  $command
     * @return PromiseInterface
     */
    public function handle(ProjectsCommand $command): PromiseInterface
    {
        return resolve(
            $this->service->iterate(
                'projects',
                '',
                ProjectInterface::HYDRATE_CLASS
            )
        );
    }
}
