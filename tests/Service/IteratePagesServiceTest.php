<?php declare(strict_types=1);

namespace ApiClients\Client\AppVeyor\Service;

use ApiClients\Foundation\Transport\ClientInterface;
use ApiClients\Foundation\Transport\Service\RequestService;
use ApiClients\Middleware\Json\JsonStream;
use ApiClients\Tools\TestUtilities\TestCase;
use Prophecy\Argument;
use RingCentral\Psr7\Request;
use RingCentral\Psr7\Response;
use Rx\Testing\TestScheduler;
use function React\Promise\resolve;

final class IteratePagesServiceTest extends TestCase
{
    public function testHandle()
    {
        $path = '/foo.bar?size=1';

        $client = $this->prophesize(ClientInterface::class);

        /**
         * First request.
         */
        $firstRequest = new Request('GET', '/foo.bar?size=1');
        $firstBody = [
            'builds' => [
                [
                    'buildId' => 1,
                ],
            ],
        ];
        $firstStream = new JsonStream($firstBody);
        $firstResponse = new Response(200, [], $firstStream);
        $client->request($firstRequest, Argument::type('array'))->shouldBeCalled()->willReturn(resolve($firstResponse));

        /**
         * Second request.
         */
        $secondRequest = new Request('GET', '/foo.bar?size=1&startBuildId=1');
        $secondBody = [
            'builds' => [
                [
                    'buildId' => 2,
                ],
            ],
        ];
        $secondStream = new JsonStream($secondBody);
        $secondResponse = new Response(200, [], $secondStream);
        $client->request($secondRequest, Argument::type('array'))->shouldBeCalled()->willReturn(resolve($secondResponse));

        /**
         * Third request.
         */
        $thirdRequest = new Request('GET', '/foo.bar?size=1&startBuildId=2');
        $thirdBody = [
            'builds' => [],
        ];
        $thirdStream = new JsonStream($thirdBody);
        $thirdResponse = new Response(200, [], $thirdStream);
        $client->request($thirdRequest, Argument::type('array'))->shouldBeCalled()->willReturn(resolve($thirdResponse));

        $requestService = new RequestService($client->reveal());
        $testScheduler = new TestScheduler();
        $iteratePagesService = new IteratePagesService($requestService, $testScheduler);

        $items = [];
        $completed = false;

        $iteratePagesService->iterate(
            $path,
            'builds',
            'buildId',
            'startBuildId'
        )->subscribe(
            function ($item) use (&$items) {
                $items[] = $item;
            },
            function ($t) {
                throw $t;
            },
            function () use (&$completed) {
                $completed = true;
            }
        );

        $testScheduler->start();

        self::assertTrue($completed);
        self::assertSame([$firstBody, $secondBody, $thirdBody], $items);
    }
}
