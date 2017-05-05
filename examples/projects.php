<?php

use ApiClients\Client\AppVeyor\Client;
use ApiClients\Client\AppVeyor\Resource\ProjectInterface;
use function ApiClients\Foundation\resource_pretty_print;

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$client = Client::create(require 'resolve_key.php');

foreach ($client->projects() as $project) {
    resource_pretty_print($project);
}
