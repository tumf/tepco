<?php
namespace Sensio\HelloBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DataControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/');
        $this->assertTrue($crawler->filter('html:contains("β")')->count() > 0);
    }
    public function testCurrentJson()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/current.json');
        $json = json_decode($client->getResponse()->getContent());
        $this->assertNotNull($json);
    }
}