<?php

use React\EventLoop\Factory;
use Rx\Observer\CallbackObserver;
use Rx\Scheduler\EventLoopScheduler;
use WyriHaximus\AppVeyor\AsyncClient;
use WyriHaximus\AppVeyor\Resource\ProjectInterface;

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$loop = Factory::create();

$client = new AsyncClient($loop, require 'resolve_key.php');

$client->projects()->subscribe(new CallbackObserver(function (ProjectInterface $project) {
    echo 'Project: ', $project->name(), PHP_EOL;
    echo "\t", 'ID: ', $project->projectId(), PHP_EOL;
    echo "\t", 'SCM: ', $project->repositoryScm(), PHP_EOL;
    echo "\t", 'SCM Type: ', $project->repositoryType(), PHP_EOL;
    echo "\t", 'Repository: ', $project->repositoryName(), PHP_EOL;
}), new EventLoopScheduler($loop));

$loop->run();
