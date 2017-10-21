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
})->done(function (Build $build) {
    resource_pretty_print($build, 1, true);
});

$loop->run();
