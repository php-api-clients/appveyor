<?php

use React\Cache\ArrayCache;
use React\EventLoop\Factory;
use ApiClients\AppVeyor\AsyncClient;
use ApiClients\AppVeyor\Resource\Project;

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$loop = Factory::create();

$client = new AsyncClient($loop, require 'resolve_key.php', [
    'cache' => new ArrayCache(),
]);

echo time(), PHP_EOL;
$client->project($argv[1] ?? 'WyriHaximus/php-appveyor-client')->then(function (Project $project) use ($client, $argv) {
    echo 'Project: ', $project->name(), PHP_EOL;
    echo "\t", 'ID: ', $project->projectId(), PHP_EOL;
    echo "\t", 'SCM: ', $project->repositoryScm(), PHP_EOL;
    echo "\t", 'SCM Type: ', $project->repositoryType(), PHP_EOL;
    echo "\t", 'Repository: ', $project->repositoryName(), PHP_EOL;
    echo time(), PHP_EOL;
    $client->project($argv[1] ?? 'WyriHaximus/php-appveyor-client')->then(function (Project $project) {
        echo 'Project: ', $project->name(), PHP_EOL;
        echo "\t", 'ID: ', $project->projectId(), PHP_EOL;
        echo "\t", 'SCM: ', $project->repositoryScm(), PHP_EOL;
        echo "\t", 'SCM Type: ', $project->repositoryType(), PHP_EOL;
        echo "\t", 'Repository: ', $project->repositoryName(), PHP_EOL;
        echo time(), PHP_EOL;
    });
});

$loop->run();
