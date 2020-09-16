<?php
namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class ShoutControllerTest extends WebTestCase
{
    public function testGetShoutsReturns200()
    {
        $client = static::createClient();

        $client->request('GET', '/shout/steve jobs?limit=2');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
    
    public function testGetShoutsWithoutLimitReturns400()
    {
        $client = static::createClient();

        $client->catchExceptions(false);
        $this->expectException(BadRequestHttpException::class);

        $client->request('GET', '/shout/steve jobs');

        $this->assertEquals(400, $client->getResponse()->getStatusCode());
    }

    public function testGetShoutsWithNegativeLimitReturns400()
    {
        $client = static::createClient();

        $client->catchExceptions(false);
        $this->expectException(BadRequestHttpException::class);

        $client->request('GET', '/shout/steve jobs?limit=-5');

        $this->assertEquals(400, $client->getResponse()->getStatusCode());
    }

    public function testGetShoutsWithLimitStringReturns400()
    {
        $client = static::createClient();

        $client->catchExceptions(false);
        $this->expectException(BadRequestHttpException::class);

        $client->request('GET', '/shout/steve jobs?limit=someString');

        $this->assertEquals(400, $client->getResponse()->getStatusCode());
    }
}