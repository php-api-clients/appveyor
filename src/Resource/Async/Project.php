<?php declare(strict_types=1);

namespace ApiClients\Client\AppVeyor\Resource\Async;

use ApiClients\Client\AppVeyor\Resource\Project as BaseProject;

class Project extends BaseProject
{
    public function refresh(): Project
    {
        throw new \Exception('TODO: create refresh method!');
    }
}
