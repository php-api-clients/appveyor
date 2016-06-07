<?php

use React\Cache\ArrayCache;
use WyriHaximus\AppVeyor\Client;

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$client = new Client(require 'resolve_key.php', [
    'cache' => new ArrayCache(),
]);

echo time(), PHP_EOL;
$project = $client->project($argv[1] ?? 'WyriHaximus/php-appveyor-client');
echo 'Project: ', $project->name(), PHP_EOL;
echo "\t", 'ID: ', $project->projectId(), PHP_EOL;
echo "\t", 'SCM: ', $project->repositoryScm(), PHP_EOL;
echo "\t", 'SCM Type: ', $project->repositoryType(), PHP_EOL;
echo "\t", 'Repository: ', $project->repositoryName(), PHP_EOL;
echo time(), PHP_EOL;
$project = $client->project($argv[1] ?? 'WyriHaximus/php-appveyor-client');
echo 'Project: ', $project->name(), PHP_EOL;
echo "\t", 'ID: ', $project->projectId(), PHP_EOL;
echo "\t", 'SCM: ', $project->repositoryScm(), PHP_EOL;
echo "\t", 'SCM Type: ', $project->repositoryType(), PHP_EOL;
echo "\t", 'Repository: ', $project->repositoryName(), PHP_EOL;
echo time(), PHP_EOL;
