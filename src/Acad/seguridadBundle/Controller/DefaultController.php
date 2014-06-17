<?php

namespace Acad\seguridadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('seguridadBundle:Default:index.html.twig', array('name' => $name));
    }
}
