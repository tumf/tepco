<?php
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
});

$steps->Then('/^"([^"]*)"が(\d+)回"([^"]*)"タグ内に見つかる$/', function($world,$word,$count,$tag) {
    assertEquals($world->page->filter("{$tag}:contains('{$word}')")->count(),$count);
});

$steps->Then('/^json形式が返ってくる$/', function($world) {
    $result = json_decode($world->agent->getResponse()->getContent());
    assert($result);
});

$steps->Then('/^xml形式が返ってくる$/', function($world) {
    $doc = new DOMDocument();
    $result = $doc->loadXML($world->agent->getResponse()->getContent());
    assert($result);
});
