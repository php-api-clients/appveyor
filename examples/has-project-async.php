<?php declare(strict_types=1);

use ApiClients\Client\AppVeyor\AsyncClient;
use React\EventLoop\Factory;

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$loop = Factory::create();

$client = AsyncClient::create($loop, require 'resolve_key.php');

$client->hasProject($argv[1], $argv[2])->done(function (bool $hasProject) use ($argv) {
    echo 'Project "', $argv[2], '" from "', $argv[1], '" ';
    if (!$hasProject) {
        echo 'not ';
    }
    echo 'available', PHP_EOL;
});

$loop->run();
