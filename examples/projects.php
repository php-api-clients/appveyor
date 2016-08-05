<?php

use ApiClients\AppVeyor\Client;
use ApiClients\AppVeyor\Resource\ProjectInterface;

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$client = new Client(require 'resolve_key.php');

foreach ($client->projects() as $project) {
    /** @var $project ProjectInterface */
    echo 'Project: ', $project->name(), PHP_EOL;
    echo "\t", 'ID: ', $project->projectId(), PHP_EOL;
    echo "\t", 'SCM: ', $project->repositoryScm(), PHP_EOL;
    echo "\t", 'SCM Type: ', $project->repositoryType(), PHP_EOL;
    echo "\t", 'Repository: ', $project->repositoryName(), PHP_EOL;
}
