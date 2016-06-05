<?php
declare(strict_types=1);

namespace WyriHaximus\AppVeyor;

use React\EventLoop\LoopInterface;
use React\Promise\PromiseInterface;
use WyriHaximus\ApiClient\Transport\Client as Transport;
use WyriHaximus\ApiClient\Transport\Factory;
use function React\Promise\resolve;

class AsyncClient
{
    protected $transport;

    public function __construct(LoopInterface $loop, string $token, array $options = [], Transport $transport = null)
    {
        if (!($transport instanceof Transport)) {
            $settings = [
                    'resource_namespace' => 'Async',
            ] + ApiSettings::transportOptionsWithToken($token) + $options;
            $transport = Factory::create($loop, $settings);
        }
        $this->transport = $transport;
    }

    public function project(string $repository): PromiseInterface
    {
        return $this->transport->request('projects/' . $repository)->then(function ($json) {
            return resolve($this->transport->getHydrator()->hydrate('Project', $json['project']));
        });
    }
}
