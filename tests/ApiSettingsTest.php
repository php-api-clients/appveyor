<?php
declare(strict_types=1);

namespace ApiClients\Tests\AppVeyor;

use ApiClients\AppVeyor\ApiSettings;

class ApiSettingsTest extends TestCase
{
    public function testTransportOptionsWithToken()
    {
        $token = uniqid();
        $options = ApiSettings::transportOptionsWithToken($token);
        $this->assertTrue(isset($options['headers']['Authorization']));
        $this->assertSame('Bearer ' . $token, $options['headers']['Authorization']);
    }
}
