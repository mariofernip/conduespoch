<?php

namespace Acad\seguridadBundle\Controller;

use Acad\seguridadBundle\Entity\Usuario;
use Acad\seguridadBundle\Form\UsuarioType;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\SecurityContext;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('seguridadBundle:Default:index.html.twig', array('name' => $name));
    }
    
    public function loginAction() {

        $peticion = $this->getRequest();

        $sesion = $peticion->getSession();

        //obtiene el valor del último error producido relacionado con la seguridad
        $error = $peticion->attributes->get(
                SecurityContext::AUTHENTICATION_ERROR, $sesion->get(SecurityContext::AUTHENTICATION_ERROR)
        );


        return $this->render('seguridadBundle:Default:login.html.twig', array(
                    'last_username' => $sesion->get(SecurityContext::LAST_USERNAME), //contiene el valor del último nombre de usuario utilizado para intentar hacer login.
                    'error' => $error
                ));
    }

    public function defaultAction() {
        $usuario = $this->get('security.context')->getToken()->getUser();
        $nombre = $usuario->getNombre();

        if (false === $this->get('security.context')->isGranted('ROLE_ADMIN')) {
            throw new AccessDeniedException();
        }
    }

    public function cajaLoginAction() {

        return $this->render('seguridadBundle:Default:cajaLogin.html.twig');
    }

    public function registroAction() {

        $peticion = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();

        $usuario = new Usuario();
        $usuario->setEstado(true);
        $formulario = $this->createForm(new UsuarioType(), $usuario);
        $formulario->handleRequest($peticion);

        if ($formulario->isValid()) {
            $encoder = $this->get('security.encoder_factory')
                    ->getEncoder($usuario);
            $usuario->setSalt(md5(time()));
            $passwordCodificado = $encoder->encodePassword(
                    $usuario->getPassword(), $usuario->getSalt()
            );
            $usuario->setPassword($passwordCodificado);

            $usuario->setFechaAlta(new \DateTime('now'));
            $em->persist($usuario);
            $em->flush();

            $this->get('session')->getFlashBag()->add('info', '¡Enhorabuena! Usuario registrado'
            );

            return $this->redirect($this->generateUrl('_portada'));
        }

        return $this->render('seguridadBundle:Default:registro.html.twig', array(
                    'formulario' => $formulario->createView()
                ));
    }

    public function portadaAction($role) {
        
        $em= $this->getDoctrine()->getEntityManager();
        
        $usuario = $this->get('security.context')->getToken()->getUser();
        $periodo= $em->getRepository('administrativoBundle:Periodo')->findOneBy(array(
            'estado'=>1
        ));
        if($role=='DOCENTE'){
            $cedula=$usuario->getCedula();
            $materiasdocente= $em->getRepository('academicoBundle:Dictadomateria')->getMateriasDocente($cedula,$periodo->getId());
            return $this->render('academicoBundle:Default:portada_'.$role.'.html.twig',array(
                'materiasdoc'=>$materiasdocente,
                'periodo'=>$periodo
            ));
        }
        
        if($role=='SECRETARIA'){
            
            return $this->render('academicoBundle:Default:portada_'.$role.'.html.twig',array(
                'periodo'=>$periodo
            ));
        }
        
    }
    
    
}
