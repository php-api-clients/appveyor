<?php declare(strict_types=1);
use ApiClients\Client\AppVeyor\AsyncClient;
use ApiClients\Client\AppVeyor\Resource\Project;
use React\EventLoop\Factory;
use function ApiClients\Foundation\resource_pretty_print;

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$loop = Factory::create();

$client = AsyncClient::create($loop, require 'resolve_key.php');

echo time(), PHP_EOL;
$client->project($argv[1] ?? 'WyriHaximus/appveyor')->then(function (Project $project) use ($client, $argv) {
    resource_pretty_print($project);
    echo time(), PHP_EOL;
    return $client->project($argv[1] ?? 'WyriHaximus/appveyor');
})->done(function (Project $project) {
    resource_pretty_print($project);
    echo time(), PHP_EOL;
});

$loop->run();
