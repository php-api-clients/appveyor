<?php declare(strict_types=1);

namespace ApiClients\Tests\Client\AppVeyor\Resource\Async;

use ApiClients\Client\AppVeyor\ApiSettings;
use ApiClients\Client\AppVeyor\Resource\Project;
use ApiClients\Tools\ResourceTestUtilities\AbstractResourceTest;

class ProjectTest extends AbstractResourceTest
{
    public function getSyncAsync(): string
    {
        return 'Async';
    }

    public function getClass(): string
    {
        return Project::class;
    }

    public function getNamespace(): string
    {
        return ApiSettings::NAMESPACE;
    }
}
