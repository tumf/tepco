<?php

namespace Tumf\TepcoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DataController extends Controller
{
  public function indexAction($_format)
  {
    $capacity = null;
    $html = file_get_contents("http://www.tepco.co.jp/en/forecast/html/index-e.html");
    if(preg_match("/Today's Maximum Capacity&nbsp;:&nbsp;([\d,]+)&nbsp;/",$html,$m)){
      $capacity = (int) implode(explode(",",$m[1]));
    }
    
    $data = file_get_contents("http://www.tepco.co.jp/forecast/html/images/juyo-j.csv");
    $data = mb_convert_encoding($data,"UTF-8","SJIS");

    $lines = explode("\r\n",$data);
    $banner = array_shift($lines);
    $headers = explode(",",array_shift($lines));
    $data = array();
    
    foreach($lines as $line){
      $d = explode(",",$line);
      if (count($d) > 1) {
        $r = array();
        $r["today"]= (int)$d[2];
        $r["yesterday"]= (int)$d[3];
        $data[strtotime($d[0]." ".$d[1])] = $r;
      }
    }
    //$serializer = new \XML_Serializer;
    //echo $serializer->serialize($data);
    return $this->render("TumfTepcoBundle:Data:index.${_format}.twig",
                         array(
                               'data' => array(
                                               'capacity'=>$capacity,
                                               // 'headers'=>$headers,
                                               'banner'=>$banner,
                                               'trend'=>$data,
                                               )));
  }
}
