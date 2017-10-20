<?php declare(strict_types=1);
use ApiClients\Client\AppVeyor\Client;
use function ApiClients\Foundation\resource_pretty_print;

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$client = Client::create(require 'resolve_key.php');

echo time(), PHP_EOL;
resource_pretty_print($client->project($argv[1] ?? 'WyriHaximus/php-appveyor-client'));
echo time(), PHP_EOL;
resource_pretty_print($client->project($argv[1] ?? 'WyriHaximus/php-appveyor-client'));
echo time(), PHP_EOL;
