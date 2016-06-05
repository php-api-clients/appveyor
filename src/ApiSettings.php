<?php
declare(strict_types=1);

namespace WyriHaximus\AppVeyor;

class ApiSettings
{
    const TRANSPORT_OPTIONS = [
        'host' => 'ci.appveyor.com',
        'path' => '/api/',
        'namespace' => 'WyriHaximus\\AppVeyor\\Resource',
        'headers' => [
            'Accept' => 'application/json',
        ],
    ];
}
