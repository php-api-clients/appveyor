<?php
declare(strict_types=1);

namespace WyriHaximus\Tests\AppVeyor;

use WyriHaximus\AppVeyor\ApiSettings;

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
