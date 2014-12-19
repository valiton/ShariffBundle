<?php

namespace Valiton\Bundle\ShariffBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ValitonShariffBundle:Default:index.html.twig', array('name' => $name));
    }
}
