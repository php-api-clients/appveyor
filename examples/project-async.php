<?php

use function ApiClients\Foundation\resource_pretty_print;
use React\EventLoop\Factory;
use ApiClients\Client\AppVeyor\AsyncClient;
use ApiClients\Client\AppVeyor\Resource\Project;

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$loop = Factory::create();

$client = AsyncClient::create($loop, require 'resolve_key.php');

echo time(), PHP_EOL;
$client->project($argv[1] ?? 'WyriHaximus/php-appveyor-client')->then(function (Project $project) use ($client, $argv) {
    resource_pretty_print($project);
    echo time(), PHP_EOL;
    $client->project($argv[1] ?? 'WyriHaximus/php-appveyor-client')->then(function (Project $project) {
        resource_pretty_print($project);
        echo time(), PHP_EOL;
    });
});

$loop->run();
