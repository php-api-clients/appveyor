<?php declare(strict_types=1);

namespace ApiClients\Client\AppVeyor;

use ApiClients\Client\AppVeyor\Resource\Sync\Project;

interface ClientInterface
{
    public function projects(): array;

    public function project(string $repository): Project;
}
