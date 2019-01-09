<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * @covers Email
 */
class UrlTest extends TestCase
{
    public function testIndex(): void
    {
        $index = new \app\ctrl\indexCtrl();

        $url = \ppphp\conf::get("url","config");

        $http = new \GuzzleHttp\Client();

        $resp = $http->get($url . "/");

        $this->assertTrue($resp->getStatusCode() == 200);

        $resp = $http->post($url . "/");

        $this->assertTrue($resp->getStatusCode() == 200);

        $resp = $http->get($url . "/index/db/db");

        $this->assertTrue($resp->getStatusCode() == 200);

    }

}