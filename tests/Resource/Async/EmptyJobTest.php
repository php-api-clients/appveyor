<?php declare(strict_types=1);

namespace ApiClients\Tests\Client\AppVeyor\Resource\Async;

use ApiClients\Client\AppVeyor\Resource\Async\EmptyJob;
use ApiClients\Tools\ResourceTestUtilities\AbstractEmptyResourceTest;

final class EmptyJobTest extends AbstractEmptyResourceTest
{
    public function getSyncAsync(): string
    {
        return 'Async';
    }

    public function getClass(): string
    {
        return EmptyJob::class;
    }
}
