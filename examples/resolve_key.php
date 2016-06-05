<?php


$keyFile = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'key.php';

if (!file_exists($keyFile)) {
    echo 'No key file find, copy key.sample.php to key.php and add API from https://ci.appveyor.com/api-token to run examples.', PHP_EOL;
    exit(1);
}

return require $keyFile;
