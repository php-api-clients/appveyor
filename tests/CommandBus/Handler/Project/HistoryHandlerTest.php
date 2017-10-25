<?php declare(strict_types=1);

namespace ApiClients\Tests\AppVeyor\CommandBus\Handler\Project;

use ApiClients\Client\AppVeyor\CommandBus\Command\Project\HistoryCommand;
use ApiClients\Client\AppVeyor\CommandBus\Handler\Project\HistoryHandler;
use ApiClients\Client\AppVeyor\Resource\BuildInterface;
use ApiClients\Client\AppVeyor\Service\IteratePagesService;
use ApiClients\Foundation\Hydrator\Hydrator;
use ApiClients\Foundation\Resource\ResourceInterface;
use ApiClients\Tools\TestUtilities\TestCase;
use Rx\Observable;
use Rx\React\Promise;
use function ApiClients\Tools\Rx\unwrapObservableFromPromise;

final class HistoryHandlerTest extends TestCase
{
    public function testCommand()
    {
        $command = new HistoryCommand('WyriHaximus', 'appveyor');

        $resource = $this->prophesize(ResourceInterface::class)->reveal();

        $service = $this->prophesize(IteratePagesService::class);
        $service->iterate(
            'projects/WyriHaximus/appveyor/history?recordsNumber=25',
            'builds',
            'buildId',
            'startBuildId'
        )->shouldBeCalled()->willReturn(Observable::fromArray([
            [
                'builds' => [['php-api-clients']],
            ],
        ]));

        $hydrator = $this->prophesize(Hydrator::class);
        $hydrator->hydrate(BuildInterface::HYDRATE_CLASS, ['php-api-clients'])->shouldBeCalled()->willReturn($resource);

        $handler = new HistoryHandler($service->reveal(), $hydrator->reveal());
        $result = $this->await(
            Promise::fromObservable(
                unwrapObservableFromPromise(
                    $handler->handle($command)
                )
            )
        );

        self::assertSame($resource, $result);
    }
}
