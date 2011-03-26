<?php
//require_once 'PHPUnit/Autoload.php';
//require_once 'PHPUnit/Framework/Assert/Functions.php';

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

