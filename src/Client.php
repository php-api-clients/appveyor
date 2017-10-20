<?php declare(strict_types=1);

namespace ApiClients\Client\AppVeyor;

use ApiClients\Client\AppVeyor\Resource\Sync\Project;
use ApiClients\Foundation\Factory as FoundationClientFactory;
use React\EventLoop\Factory as LoopFactory;
use React\EventLoop\LoopInterface;
use Rx\React\Promise;
use Rx\Scheduler;
use function Clue\React\Block\await;

class Client
{
    /**
     * @var LoopInterface
     */
    private $loop;

    /**
     * @var AsyncClient
     */
    private $client;

    /**
     * @param LoopInterface $loop
     * @param AsyncClient   $client
     */
    private function __construct(LoopInterface $loop, AsyncClient $client)
    {
        $this->loop = $loop;
        $this->client = $client;
    }

    /**
     * @param  string $token
     * @param  array  $options
     * @return Client
     */
    public static function create(
        string $token,
        array $options = []
    ): self {
        $loop = LoopFactory::create();
        $options = ApiSettings::getOptions($token, $options, 'Sync');
        $client = FoundationClientFactory::create($loop, $options);

        try {
            Scheduler::setAsyncFactory(function () use ($loop) {
                return new Scheduler\EventLoopScheduler($loop);
            });
        } catch (\Throwable $t) {
        }

        $asyncClient = AsyncClient::createFromClient($client);

        return new self($loop, $asyncClient);
    }

    public function projects(): array
    {
        return await(
            Promise::fromObservable(
                $this->client->projects()->toArray()
            ),
            $this->loop
        );
    }

    public function project(string $repository): Project
    {
        return await(
            $this->client->project($repository),
            $this->loop
        );
    }
}
