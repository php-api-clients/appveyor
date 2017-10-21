<?php declare(strict_types=1);

use ApiClients\Client\AppVeyor\AsyncClient;
use ApiClients\Client\AppVeyor\Resource\Async\Build;
use ApiClients\Client\AppVeyor\Resource\Async\Project;
use React\EventLoop\Factory;
use function ApiClients\Foundation\resource_pretty_print;

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$loop = Factory::create();

$client = AsyncClient::create($loop, require 'resolve_key.php');

$client->project($argv[1] ?? 'WyriHaximus/appveyor')->then(function (Project $project) {
    resource_pretty_print($project);

    return $project->lastestBuild();
})->then(function (Build $build) {
    return $build->jobs()[0]->log();
})->done(function (string $log) {
    echo $log;
});

$loop->run();
