<?php
declare(strict_types=1);

namespace WyriHaximus\AppVeyor;

use React\EventLoop\Factory as LoopFactory;
use WyriHaximus\AppVeyor\Resource\Sync\Project;
use WyriHaximus\ApiClient\Transport\Client as Transport;
use WyriHaximus\ApiClient\Transport\Factory;
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
            ] + ApiSettings::TRANSPORT_OPTIONS + $options;
            $settings['headers']['Authorization'] = 'Bearer ' . $token;
            $transport = Factory::create($loop, $settings);
        }
        $this->transport = $transport;
        $this->client = new AsyncClient($loop, $token, $options, $this->transport);
    }

    public function project(string $repository): Project
    {
        return await(
            $this->client->project($repository),
            $this->transport->getLoop()
        );
    }
}
