<?php
declare(strict_types=1);

namespace ApiClients\Tests\Client\AppVeyor;

use ApiClients\Client\AppVeyor\ApiSettings;
use ApiClients\Foundation\Options as FoundationOptions;
use ApiClients\Foundation\Transport\Options as TransportOptions;
use ApiClients\Middleware\BearerAuthorization\BearerAuthorizationHeaderMiddleware;
use ApiClients\Middleware\BearerAuthorization\Options as BearerAuthorizationOptions;

class ApiSettingsTest extends TestCase
{
    public function testTransportOptionsWithToken()
    {
        $token = uniqid();
        $options = ApiSettings::getOptions($token, [], 'Async');
        $this->assertTrue(isset($options[FoundationOptions::TRANSPORT_OPTIONS][TransportOptions::DEFAULT_REQUEST_OPTIONS][BearerAuthorizationHeaderMiddleware::class]));
        $this->assertSame([BearerAuthorizationOptions::TOKEN => $token], $options[FoundationOptions::TRANSPORT_OPTIONS][TransportOptions::DEFAULT_REQUEST_OPTIONS][BearerAuthorizationHeaderMiddleware::class]);
    }
}
