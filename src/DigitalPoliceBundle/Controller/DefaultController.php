<?php

namespace DigitalPoliceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('DigitalPoliceBundle:Default:index.html.twig');
    }
}
