<?php declare(strict_types=1);

namespace ApiClients\Client\AppVeyor;

use ApiClients\Client\AppVeyor\CommandBus\Command\AddProjectCommand;
use ApiClients\Client\AppVeyor\CommandBus\Command\ProjectCommand;
use ApiClients\Client\AppVeyor\CommandBus\Command\ProjectsCommand;
use ApiClients\Client\AppVeyor\Resource\ProjectInterface;
use ApiClients\Foundation\ClientInterface;
use ApiClients\Foundation\Factory;
use React\EventLoop\LoopInterface;
use React\Promise\Promise;
use React\Promise\PromiseInterface;
use Rx\ObservableInterface;
use Rx\Scheduler;
use function ApiClients\Tools\Rx\unwrapObservableFromPromise;

class AsyncClient
{
    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @param ClientInterface $client
     */
    private function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @param  LoopInterface $loop
     * @param  string        $token
     * @param  array         $options
     * @return AsyncClient
     */
    public static function create(
        LoopInterface $loop,
        string $token,
        array $options = []
    ): self {
        $options = ApiSettings::getOptions($token, $options, 'Async');
        $client = Factory::create($loop, $options);

        try {
            Scheduler::setAsyncFactory(function () use ($loop) {
                return new Scheduler\EventLoopScheduler($loop);
            });
        } catch (\Throwable $t) {
        }

        return new self($client);
    }

    /**
     * @internal
     * @param  ClientInterface $client
     * @return AsyncClient
     */
    public static function createFromClient(ClientInterface $client): self
    {
        return new self($client);
    }

    public function projects(): ObservableInterface
    {
        return unwrapObservableFromPromise($this->client->handle(new ProjectsCommand()));
    }

    public function project(string $repository): PromiseInterface
    {
        return $this->client->handle(new ProjectCommand($repository));
    }

    public function hasProject(string $provider, string $repository): PromiseInterface
    {
        return new Promise(function ($resolve, $reject) use ($provider, $repository) {
            $hasProject = false;
            $this->projects()->filter(function (ProjectInterface $project) use ($provider, $repository) {
                return $project->repositoryType() === $provider && $project->repositoryName() === $repository;
            })->take(1)->subscribe(function () use (&$hasProject) {
                $hasProject = true;
            }, function ($error) use ($reject) {
                $reject($error);
            }, function () use (&$hasProject, $resolve) {
                $resolve($hasProject);
            });
        });
    }

    public function addProject(string $provider, string $repository): PromiseInterface
    {
        return $this->client->handle(new AddProjectCommand($provider, $repository));
    }
}
