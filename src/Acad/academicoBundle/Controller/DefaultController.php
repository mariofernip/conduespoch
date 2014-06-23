<?php

namespace Acad\academicoBundle\Controller;

use Acad\academicoBundle\Entity\Estudiante;
use Acad\academicoBundle\Entity\Inscripcion;
use Acad\academicoBundle\Form\EstudianteType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acad\academicoBundle\Form\RequisitosType;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('academicoBundle:Default:index.html.twig', array('name' => $name));
    }
    
    
    public function portadaAction() {
        
        return $this->render('academicoBundle:Default:portada.html.twig');
    }

    public function registroEstudianteAction() {
        
        
        $peticion =  $this->getRequest();
        $em = $this->getDoctrine()->getManager();
        
        $estudiante= new Estudiante();

        $formulario= $this->createForm(new EstudianteType(),$estudiante);
        
        $formulario->handleRequest($peticion);
        
        $periodo= $em->getRepository('administrativoBundle:Periodo')->findOneBy(array(
            'estado'=>1
         ));
        
        if ($formulario->isValid()) {
            
            $formulario->get('nombre');
            $calle=$estudiante->setEstado(1);
            
            $estudiante->setCalle($calle);
            $em->persist($estudiante);
            $em->flush();
            
            
            $inscripcion= new Inscripcion();
            
            $inscripcion->setEstudiante($estudiante);
            $inscripcion->setEstado(1);
            $inscripcion->setPeriodo($periodo);
            
            $em->persist($inscripcion);
            $em->flush();
            
            $this->get('session')->getFlashBag()->add('Info',
                    'Felicitaciones! El estudiante ha sido ingresado satisfactoriamente'
             );
                                        
            return $this->redirect($this->generateUrl('estudiante_requisito'));
        }
        
        return $this->render('academicoBundle:Default:registroestudiante.html.twig',array(
            'periodo'=>$periodo,
            'formulario'=>$formulario->createView())
        );
        
    }
    
    public function requisitoEstudianteAction() {

        //CODIGO ANTERIOR
 
//        $em= $this->getDoctrine()->getEntityManager();
//        $estudiante= $em->getRepository('academicoBundle:Estudiante')->findOneBy(array(
//           'id'=>1
//            ));
//        
        $em= $this->getDoctrine()->getEntityManager();
        $consulta = $em->createQuery('SELECT u FROM academicoBundle:Estudiante u ORDER BY u.id DESC');
        $consulta->setMaxResults(1);
        $estudiante= $consulta->getResult();
        
        
        $emm= $this->getDoctrine()->getManager();
        $requisito= $emm->getRepository('administrativoBundle:Requisito')->findBy(array('estado'=>1));
        $form = $this->createForm(new RequisitosType(), $requisito);
        
        return $this->render('academicoBundle:Default:requisitoestudiante.html.twig',array(
            'estudiante'=>$estudiante,
            'requisito'=>$requisito,
            'form' => $form->createView(),
        ));
        
        
        return $this->render('academicoBundle:Default:requisitoestudiante.html.twig',array(
            'estudiante'=>$estudiante
        ));
        
    }
    
    
}
