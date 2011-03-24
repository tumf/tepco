<?php

namespace Tumf\TepcoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TumfTepcoBundle:Default:index.html.twig');
    }
}
