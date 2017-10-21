<?php declare(strict_types=1);

namespace ApiClients\Client\AppVeyor\Resource\Async;

use ApiClients\Client\AppVeyor\Resource\Build as BaseBuild;

class Build extends BaseBuild
{
    public function refresh(): Build
    {
        throw new \Exception('TODO: create refresh method!');
    }
}
