<?php declare(strict_types=1);

namespace ApiClients\Client\AppVeyor\Resource\Sync;

use ApiClients\Foundation\Hydrator\CommandBus\Command\BuildAsyncFromSyncCommand;
use ApiClients\Client\AppVeyor\Resource\Project as BaseProject;
use ApiClients\Client\AppVeyor\Resource\ProjectInterface;

class Project extends BaseProject
{
    public function refresh() : Project
    {
        return $this->wait($this->handleCommand(
            new BuildAsyncFromSyncCommand(self::HYDRATE_CLASS, $this)
        )->then(function (ProjectInterface $project) {
            return $project->refresh();
        }));
    }
}
