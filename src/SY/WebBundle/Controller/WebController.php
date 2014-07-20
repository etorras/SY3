<?php

namespace SY\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WebController extends Controller
{
    public function indexAction()
    {
        return $this->render('SYWebBundle:Web:index.html.twig');
    }
}
