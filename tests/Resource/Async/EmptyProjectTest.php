<?php declare(strict_types=1);

namespace ApiClients\Tests\Client\AppVeyor\Resource\Async;

use ApiClients\Tools\ResourceTestUtilities\AbstractEmptyResourceTest;
use ApiClients\Client\AppVeyor\Resource\Async\EmptyProject;

final class EmptyProjectTest extends AbstractEmptyResourceTest
{
    public function getSyncAsync() : string
    {
        return 'Async';
    }
    public function getClass() : string
    {
        return EmptyProject::class;
    }
}
