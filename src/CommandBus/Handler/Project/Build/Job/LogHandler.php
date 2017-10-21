<?php declare(strict_types=1);

namespace ApiClients\Client\AppVeyor\CommandBus\Handler\Project\Build\Job;

use ApiClients\Client\AppVeyor\CommandBus\Command\Project\Build\Job\LogCommand;
use ApiClients\Foundation\Transport\Service\RequestService;
use Psr\Http\Message\ResponseInterface;
use React\Promise\PromiseInterface;
use RingCentral\Psr7\Request;

final class LogHandler
{
    /**
     * @var RequestService
     */
    private $service;

    /**
     * @param RequestService $service
     */
    public function __construct(RequestService $service)
    {
        $this->service = $service;
    }

    /**
     * @param  LogCommand       $command
     * @return PromiseInterface
     */
    public function handle(LogCommand $command): PromiseInterface
    {
        return $this->service->request(
            new Request(
                'GET',
                'buildjobs/' . $command->getId() . '/log'
            )
        )->then(function (ResponseInterface $response) {
            return $response->getBody()->getContents();
        });
    }
}
