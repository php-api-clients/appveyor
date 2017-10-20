<?php declare(strict_types=1);

namespace ApiClients\Tests\Client\AppVeyor\Resource\Sync;

use ApiClients\Client\AppVeyor\Resource\Sync\EmptyProject;
use ApiClients\Tools\ResourceTestUtilities\AbstractEmptyResourceTest;

final class EmptyProjectTest extends AbstractEmptyResourceTest
{
    public function getSyncAsync(): string
    {
        return 'Sync';
    }

    public function getClass(): string
    {
        return EmptyProject::class;
    }
}
