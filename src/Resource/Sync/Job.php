<?php declare(strict_types=1);

namespace ApiClients\Client\AppVeyor\Resource\Sync;

use ApiClients\Client\AppVeyor\Resource\Job as BaseJob;
use ApiClients\Client\AppVeyor\Resource\JobInterface;
use ApiClients\Foundation\Hydrator\CommandBus\Command\BuildAsyncFromSyncCommand;

class Job extends BaseJob
{
    public function refresh(): Job
    {
        return $this->wait($this->handleCommand(
            new BuildAsyncFromSyncCommand(self::HYDRATE_CLASS, $this)
        )->then(function (JobInterface $job) {
            return $job->refresh();
        }));
    }
}
