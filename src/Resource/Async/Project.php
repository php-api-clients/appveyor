<?php declare(strict_types=1);

namespace ApiClients\Client\AppVeyor\Resource\Async;

use ApiClients\Client\AppVeyor\CommandBus\Command\Project\LatestBuildCommand;
use ApiClients\Client\AppVeyor\Resource\Project as BaseProject;
use React\Promise\PromiseInterface;

class Project extends BaseProject
{
    public function refresh(): Project
    {
        throw new \Exception('TODO: create refresh method!');
    }

    public function lastestBuild(): PromiseInterface
    {
        return $this->handleCommand(new LatestBuildCommand($this->accountName, $this->slug));
    }
}
