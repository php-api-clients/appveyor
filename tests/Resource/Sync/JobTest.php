<?php declare(strict_types=1);

namespace ApiClients\Tests\Client\AppVeyor\Resource\Sync;

use ApiClients\Client\AppVeyor\ApiSettings;
use ApiClients\Client\AppVeyor\Resource\Job;
use ApiClients\Tools\ResourceTestUtilities\AbstractResourceTest;

class JobTest extends AbstractResourceTest
{
    public function getSyncAsync(): string
    {
        return 'Sync';
    }

    public function getClass(): string
    {
        return Job::class;
    }

    public function getNamespace(): string
    {
        return ApiSettings::NAMESPACE;
    }
}
