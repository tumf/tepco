<?php
namespace Tumf\TepcoBundle\Tests\Controller;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Input\ArgvInput;
/**
 * Test of DataController
 *
 * @package tepco
 * @subpackage test
 * @author Yoshihiro Takahara <y.takahara@gmail.com>
 */
class DataControllerTest extends WebTestCase
{
    public function testBehat()
    {
      $ns = explode("\\",__NAMESPACE__);
      array_pop($ns);array_pop($ns);
      
      $input = new ArgvInput(array("./app/console","behat:test:bundle",implode("\\",$ns),"-f","progress"));
      $application = new Application($this->createKernel());
      $application->setAutoExit(false);
      $this->assertEquals(0,$application->run($input));
    }
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