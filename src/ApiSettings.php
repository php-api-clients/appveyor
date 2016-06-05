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

    public static function transportOptionsWithToken(string $token): array
    {
        $options = self::TRANSPORT_OPTIONS;
        $options['headers']['Authorization'] = 'Bearer ' . $token;
        return $options;
    }
}
