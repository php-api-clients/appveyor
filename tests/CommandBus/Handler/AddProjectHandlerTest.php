<?php declare(strict_types=1);

namespace ApiClients\Tests\AppVeyor\CommandBus\Handler;

use ApiClients\Client\AppVeyor\CommandBus\Command\AddProjectCommand;
use ApiClients\Client\AppVeyor\CommandBus\Handler\AddProjectHandler;
use ApiClients\Client\AppVeyor\Resource\ProjectInterface;
use ApiClients\Foundation\Hydrator\Hydrator;
use ApiClients\Foundation\Resource\ResourceInterface;
use ApiClients\Foundation\Transport\Service\RequestService;
use ApiClients\Middleware\Json\JsonStream;
use ApiClients\Tools\TestUtilities\TestCase;
use RingCentral\Psr7\Request;
use RingCentral\Psr7\Response;
use function React\Promise\resolve;

final class AddProjectHandlerTest extends TestCase
{
    public function testCommand()
    {
        $command = new AddProjectCommand('gitHub', 'php-api-clients/appveyor');

        $resource = $this->prophesize(ResourceInterface::class)->reveal();

        $service = $this->prophesize(RequestService::class);
        $service->request(
            new Request(
                'POST',
                'projects',
                [],
                new JsonStream([
                    'repositoryProvider' => 'gitHub',
                    'repositoryName' => 'php-api-clients/appveyor',
                ])
            )
        )->shouldBeCalled()->willReturn(resolve(new Response(200, [], new JsonStream(['php-api-clients']))));

        $hydrator = $this->prophesize(Hydrator::class);
        $hydrator->hydrate(
            ProjectInterface::HYDRATE_CLASS,
            ['php-api-clients']
        )->shouldBeCalled()->willReturn($resource);

        $handler = new AddProjectHandler($service->reveal(), $hydrator->reveal());
        $result = $this->await($handler->handle($command));

        self::assertSame($resource, $result);
    }
}
