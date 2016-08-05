<?php
declare(strict_types=1);

namespace ApiClients\AppVeyor;

use React\EventLoop\Factory as LoopFactory;
use Rx\React\Promise;
use ApiClients\AppVeyor\Resource\Sync\Project;
use ApiClients\Foundation\Transport\Client as Transport;
use ApiClients\Foundation\Transport\Factory;
use function Clue\React\Block\await;
use function React\Promise\resolve;

class Client
{
    protected $transport;
    protected $client;

    public function __construct(string $token, array $options = [], Transport $transport = null)
    {
        $loop = LoopFactory::create();
        if (!($transport instanceof Transport)) {
            $settings = [
                'resource_namespace' => 'Sync',
            ] + ApiSettings::transportOptionsWithToken($token) + $options;
            $transport = Factory::create($loop, $settings);
        }
        $this->transport = $transport;
        $this->client = new AsyncClient($loop, $token, $options, $this->transport);
    }

    public function projects(): array
    {
        return await(
            Promise::fromObservable(
                $this->client->projects()->toArray()
            ),
            $this->transport->getLoop()
        );
    }

    public function project(string $repository): Project
    {
        return await(
            $this->client->project($repository),
            $this->transport->getLoop()
        );
    }
}
