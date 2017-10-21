<?php declare(strict_types=1);

namespace ApiClients\Client\AppVeyor\Resource\Async;

use ApiClients\Client\AppVeyor\CommandBus\Command\Project\Build\Job\LogCommand;
use ApiClients\Client\AppVeyor\Resource\Job as BaseJob;
use React\Promise\PromiseInterface;

class Job extends BaseJob
{
    public function refresh(): Job
    {
        throw new \Exception('TODO: create refresh method!');
    }

    public function log(): PromiseInterface
    {
        return $this->handleCommand(new LogCommand($this->jobId));
    }
}
