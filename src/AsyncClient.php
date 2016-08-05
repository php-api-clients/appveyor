<?php
declare(strict_types=1);

namespace ApiClients\AppVeyor;

use React\EventLoop\LoopInterface;
use React\Promise\PromiseInterface;
use Rx\Observable;
use Rx\ObservableInterface;
use Rx\React\Promise;
use ApiClients\Foundation\Transport\Client as Transport;
use ApiClients\Foundation\Transport\Factory;
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

    public function projects(): ObservableInterface
    {
        return Promise::toObservable(
            $this->transport->request('projects')
        )->flatMap(function ($response) {
            return Observable::fromArray($response);
        })->map(function ($project) {
            return $this->transport->getHydrator()->hydrate('Project', $project);
        });
    }

    public function project(string $repository): PromiseInterface
    {
        return $this->transport->request('projects/' . $repository)->then(function ($json) {
            return resolve($this->transport->getHydrator()->hydrate('Project', $json['project']));
        });
    }
}
