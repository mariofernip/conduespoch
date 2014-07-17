<?php

namespace Acad\administrativoBundle\Controller;

use Acad\administrativoBundle\Entity\Docente;
use Acad\administrativoBundle\Entity\EvaluacionxMes;
use Acad\administrativoBundle\Entity\MesEvaluacion;
use Acad\administrativoBundle\Entity\Periodo;
use Acad\administrativoBundle\Form\DocenteType;
use Acad\administrativoBundle\Form\EvaluacionxMesType;
use Acad\administrativoBundle\Form\PeriodoType;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('administrativoBundle:Default:index.html.twig', array('name' => $name));
    }
    
    public function registrodocenteAction() {
        
        $em=  $this->getDoctrine()->getEntityManager(); 
        
        $periodo=$em->getRepository('administrativoBundle:Periodo')->findOneBy(array(
            'estado'=>1
        ));
        
        if (!$periodo) {
            $this->get('session')->getFlashBag()->add('Info', 'Periodo académico no activo'
            );
            return $this->redirect($this->generateUrl('_portada'));
        }
        
        $peticion = $this->getRequest();
        
        $docente= new Docente();
        $formulario= $this->createForm(new DocenteType(), $docente);
        $formulario->handleRequest($peticion);
        
        if ($formulario->isValid()) {$docente->setEstado(1);
            $docente->setFechaingreso(new \DateTime('now'));
            
            $em->persist($docente);
            $em->flush();
            
            $this->get('session')->getFlashBag()->add('Info', 'Docente registrado correctamente '
            );
            
            return $this->redirect($this->generateUrl('docente_registro'));
        }
        
        return $this->render('administrativoBundle:Default:registrodocente.html.twig',array(
            'periodo'=>$periodo,
            'formulario'=>$formulario->createView()
        ));
        
    }
    
    
    public function registroperiodoAction() {
        
        $peticion =  $this->getRequest();
        
        $em=  $this->getDoctrine()->getEntityManager();
        
        $periodo= new Periodo();
        
        $formulario = $this->createForm(new PeriodoType(),$periodo);        
        $formulario->handleRequest($peticion);
        
        
        
        if($formulario->isValid()){
            $periodo->setEstado(1);
            $em->persist($periodo);
            $em->flush();
            $meses=$em->getRepository('administrativoBundle:Mes')->getTodosMeses();
            foreach ($meses as $mes) {
                $mesevaluacion= new MesEvaluacion();
                $mesevaluacion->setEstado(false);
                $mesevaluacion->setFfinmes(new \DateTime('now'));
                $mesevaluacion->setFiniciomes(new \DateTime('now'));
                $mesevaluacion->setMes($mes);
                $mesevaluacion->setPeriodo($periodo);
                
                $em->persist($mesevaluacion);
                $em->flush();
                
            }
         
            $this->get('session')->getFlashBag()->add('Info', 'Periodo agregado correctamente'
            );
            
            return $this->redirect($this->generateUrl('mes_evaluacion',array('pid'=>$periodo->getId())));
            
        }
        
        
        return $this->render('administrativoBundle:default:registroperiodo.html.twig',array(
            'periodo'=>$periodo,
            'formulario'=>$formulario->createView()
        ));
                
    }
    
    //metodo para poner los rangos de fechas de la tabla MesEvaluacion
    
    
    public function mesevaluacionAction($pid) {

        $em = $this->getDoctrine()->getEntityManager();

        $peticion = $this->getRequest();

        
        //creo un objeto mesevaluacion para poder crear el formulario
        $evaluacionxmes= new EvaluacionxMes();

        //consulto los objetos mesevaluacion con su estado activo, de un determinado periodo 
        $mesevaluacion = $em->getRepository('administrativoBundle:Mes')->getMesEvaluacionxPeriodo($pid);

        //recorro lista de objetos: cumplerequisito
        foreach ($mesevaluacion as $req) {
            
            
            $cr = new MesEvaluacion(); //creo un objeto nuevo: mesevaluacion
            //obtengo los datos de cada objeto cumplerequisito
            $cr->setId($req->getId());
            $cr->setEstado($req->getEstado());
            $cr->setFiniciomes($req->getFiniciomes());
            $cr->setFfinmes($req->getFfinmes());
            $cr->setMes($req->getMes());
            //lleno el objto tarea con varios objetos cumplerequisito
            $evaluacionxmes->getEvaMes()->add($cr);
        }

        $form = $this->createForm(new EvaluacionxMesType(), $evaluacionxmes);

        $form->handleRequest($peticion);
        if ($form->isValid()) {

            foreach ($evaluacionxmes->getEvaMes() as $req) {// recorro lista de objetos: cumplerequisito
                $cod = $req->getId(); // ontengo el id de cada objeto
                $est = $req->getEstado(); // obtengo el estado de cada objto
                $cr = $em->getRepository('administrativoBundle:MesEvaluacion')->find($cod); //consulto el objeto cumplerequisito
                $cr->setEstado($est); //actualizo el estado del objeto previamente encontrado

                $em->flush(); // envio a guardar/actualizar el estado de cada objeto
            }
            
                $this->get('session')->getFlashBag()->add('Info', 'Fechas actualizadas');
            


            return $this->redirect($this->generateUrl('_portada'));
        }

        $periodo= $em->getRepository('administrativoBundle:Periodo')->getPeriodoActual();
        return $this->render('administrativoBundle:Default:evaluacionxmes.html.twig', array(
                    'codigo'=>$pid,
                    'requisitos' => $mesevaluacion,
                     'periodo'=>$periodo,
                    'form' => $form->createView()
                ));
    }
    
    
    
}
