<?php declare(strict_types=1);
use ApiClients\Client\AppVeyor\AsyncClient;
use ApiClients\Client\AppVeyor\Resource\ProjectInterface;
use React\EventLoop\Factory;
use function ApiClients\Foundation\resource_pretty_print;

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$loop = Factory::create();

$client = AsyncClient::create($loop, require 'resolve_key.php');

$client->projects()->subscribe(function (ProjectInterface $project) {
    resource_pretty_print($project);
}, function ($e) {
    echo (string)$e;
});

$loop->run();
