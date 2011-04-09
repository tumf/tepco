<?php

namespace Tumf\TepcoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DataController extends Controller
{
  public function indexAction($_format)
  {
    $cache = $this->container->get('zend.cache_manager')->getCache('external');
    $data = $cache->load('data');
    if (in_array($this->container->get('kernel')->getEnvironment(), array('dev', 'test'))) {
      $data = null;
    }
    if (!$data) {
      $capacity = null;
      $data = file_get_contents("http://www.tepco.co.jp/forecast/html/images/juyo-j.csv");
      $data = mb_convert_encoding($data,"UTF-8","SJIS");

      $lines = explode("\r\n",$data);
      $banner = array_shift($lines);
      array_shift($lines);
      $caps = explode(",",array_shift($lines));
      $capacity = (int) $caps[0];

      $headers = array();
      do {
        $headers = explode(",",array_shift($lines));
      }while($headers[0] != "DATE");
      
      $trend = array();
    
      foreach($lines as $line){
            $d = explode(",",$line);
        if (count($d) > 1) {
          $r = array();
          $r["today"]= (int)$d[2];
          $r["yesterday"]= (int)$d[3];
          $trend[date('c',strtotime($d[0]." ".$d[1]))] = $r;
        }
      }
      $data = array(
                    'capacity'=>$capacity,
                    // 'headers'=>$headers,
                    'banner'=>$banner,
                    'trend'=>$trend,
                    );
      $data["timestamp"] = date('c');
      $data["version"] = 1;
      $cache->save($data, 'data');
    }
    return $this->render("TumfTepcoBundle:Data:index.${_format}.twig",array('data' => $data));
  }
}
