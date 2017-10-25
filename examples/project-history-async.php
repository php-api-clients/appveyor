<?php declare(strict_types=1);

use ApiClients\Client\AppVeyor\AsyncClient;
use ApiClients\Client\AppVeyor\Resource\Async\Project;
use React\EventLoop\Factory;
use function ApiClients\Foundation\resource_pretty_print;
use function ApiClients\Tools\Rx\unwrapObservableFromPromise;

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$loop = Factory::create();

$client = AsyncClient::create($loop, require 'resolve_key.php');

unwrapObservableFromPromise($client->project($argv[1] ?? 'WyriHaximus/appveyor')->then(function (Project $project) {
    resource_pretty_print($project);

    return $project->history();
}))->subscribe(function ($project) {
    resource_pretty_print($project, 1, true);
}, function ($e) {
    echo (string)$e;
});

$loop->run();
