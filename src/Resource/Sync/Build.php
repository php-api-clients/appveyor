<?php declare(strict_types=1);

namespace ApiClients\Client\AppVeyor\Resource\Sync;

use ApiClients\Client\AppVeyor\Resource\Build as BaseBuild;
use ApiClients\Client\AppVeyor\Resource\BuildInterface;
use ApiClients\Foundation\Hydrator\CommandBus\Command\BuildAsyncFromSyncCommand;

class Build extends BaseBuild
{
    public function refresh(): Build
    {
        return $this->wait($this->handleCommand(
            new BuildAsyncFromSyncCommand(self::HYDRATE_CLASS, $this)
        )->then(function (BuildInterface $build) {
            return $build->refresh();
        }));
    }
}
