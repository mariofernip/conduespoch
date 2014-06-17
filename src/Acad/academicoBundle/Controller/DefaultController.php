<?php

namespace Acad\academicoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('academicoBundle:Default:index.html.twig', array('name' => $name));
    }
}
