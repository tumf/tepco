<?php
namespace Tumf\TepcoBundle\Tests\Controller;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
/**
 * Test of DataController
 *
 * @package tepco
 * @subpackage test
 * @author Yoshihiro Takahara <y.takahara@gmail.com>
 */
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