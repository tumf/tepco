<?php

/**
 * Define your steps here with:
 *
 *     $steps->Given('/REGEX/', function($world) {
 *         // do something or throw exception
 *     });
 */

class TestBrowser extends \Symfony\Bundle\FrameworkBundle\Test\WebTestCase
{
  protected function createKernel(array $options = array())
  {
    return new AppKernel('test',true);
  }
  public static function getAgent(){
    $browser = new TestBrowser;
    return $browser->createClient();
  }
}


$steps->Given('/^ブラウザを利用する$/',function($world){
    $world->agent = TestBrowser::getAgent();
});

$steps->When('/^"([^"]*)"にアクセスする$/', function($world, $url) {
    $world->page = $world->agent->request('GET',$url);
    ///$page->filter('');
    //$browser = new TestBrowser;
    //$client = $browser->createClient();
    //$agent = $client->request('GET',$url);
    //throw new \Behat\Behat\Exception\Pending();
});

$steps->Then('/^"([^"]*)"が(\d+)回"([^"]*)"タグ内に見つかる$/', function($world,$word,$count,$tag) {
    assertEquals($world->page->filter("{$tag}:contains('{$word}')")->count(),$count);
});


