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


        $peticion = $this->getRequest();
        $em = $this->getDoctrine()->getManager();

        $estudiante = new Estudiante();

        $formulario = $this->createForm(new EstudianteType(), $estudiante);

        $formulario->handleRequest($peticion);

        $periodo = $em->getRepository('administrativoBundle:Periodo')->findOneBy(array(
            'estado' => 1
                ));
        
       $req = $em->getRepository('administrativoBundle:Requisito')->findBy(array('estado' => 1));
        
        if ($formulario->isValid()) {

            $formulario->get('nombre');
            $calle = $estudiante->setEstado(1);

            $estudiante->setCalle($calle);
            $em->persist($estudiante);
            $em->flush();


            $inscripcion = new Inscripcion();

            $inscripcion->setEstudiante($estudiante);
            $inscripcion->setEstado(1);
            $inscripcion->setPeriodo($periodo);

            $em->persist($inscripcion);
            $em->flush();
            
            
            
            
            foreach ($req as $req1) {                                        
            $cumplerequisito= new CumpleRequisito();
                $cumplerequisito->setEstado(0);
                $cumplerequisito->setInscripcion($inscripcion);
                $cumplerequisito->setRequisito($req1);
                
                $em->persist($cumplerequisito);
                $em->flush();
            }

//            $this->get('session')->getFlashBag()->add('Info',
//                    'Felicitaciones! El estudiante ha sido ingresado satisfatoriamente'
//             );


            return $this->redirect($this->generateUrl('estudiante_requisito', array('estudiante' => $estudiante)));
        }

        return $this->render('academicoBundle:Default:registroestudiante.html.twig', array(
                    'periodo' => $periodo,
                    'formulario' => $formulario->createView())
        );
    }

    public function requisitoEstudianteAction() {

        //CODIGO ANTERIOR
//        $em= $this->getDoctrine()->getEntityManager();
//        $estudiante= $em->getRepository('academicoBundle:Estudiante')->findOneBy(array(
//           'id'=>1
//            ));
//      
        $em = $this->getDoctrine()->getEntityManager();
        
        $peticion = $this->getRequest();
        
        $estud=$em->getRepository('administrativoBundle:Requisito')->findBy(array(
            'estado'=>1
        ));
        $formulario = $this->createFormBuilder($estud)
                ->add('estado','checkbox',array('required'=>false))
                ->add('descripcion')
                ->getForm()
        
         ;
        
        
        $consulta = $em->createQuery('SELECT u FROM academicoBundle:Estudiante u ORDER BY u.id DESC');
        $consulta->setMaxResults(1);
        $estudiante = $consulta->getResult();


        $emm = $this->getDoctrine()->getManager();
        $requisito = $emm->getRepository('administrativoBundle:Requisito')->findBy(array('estado' =>1));
        return $this->render('academicoBundle:Default:requisitoestudiante.html.twig', array(
                    'estudiante' => $estudiante,
                    'requisito' => $requisito,
                    'estud'=>$estud,
                    'formulario'=>$formulario->createView()
            
                ));


        return $this->render('academicoBundle:Default:requisitoestudiante.html.twig', array(
                    'estudiante' => $estudiante
                ));
    }

    public function buscarEstAction() {

        $peticion = $this->getRequest();
        $em = $this->getDoctrine()->getManager();


        $estudiante = new Estudiante();



        $formulario = $this->createFormBuilder($estudiante)
                ->add('cedula')
                ->getForm()
        ;

        $formulario->handleRequest($peticion);
        if ($formulario->isSubmitted()) {

            $cedula = $formulario->getData()->getCedula();

            $est = $em->getRepository('academicoBundle:Estudiante')->findOneBy(array(
                'cedula' => $cedula
                    ));

            if ($est) {
                return $this->redirect($this->generateUrl('estudiante_registro_p', array('cedula' => $cedula)));
            } else {
                return $this->redirect($this->generateUrl('estudiante_registro'));
            }
        }
        return $this->render('academicoBundle:Default:buscarEst.html.twig', array(
                    'formulario' => $formulario->createView()
                ));
    }

    public function registroEstudiantepAction($cedula) {
        
        $em =  $this->getDoctrine()->getEntityManager();
        
        $estudiante= $em->getRepository('academicoBundle:Estudiante')->findOneBy(array(
            'cedula'=>$cedula
        ));
                
        
        $periodo = $em->getRepository('administrativoBundle:Periodo')->findOneBy(array(
            'estado' => 1
                ));

        $inscripcion = new Inscripcion();

        $inscripcion->setEstudiante($estudiante);
        $inscripcion->setEstado(1);
        $inscripcion->setPeriodo($periodo);

        $em->persist($inscripcion);
        $em->flush();

        return $this->redirect($this->generateUrl('estudiante_requisito', array('estudiante' => $estudiante)));
    }

    public function buscarEAction() {
        
        
        $peticion = $this->getRequest();
        $em = $this->getDoctrine()->getManager();


        $estudiante = new Estudiante();



        $formulario = $this->createFormBuilder($estudiante)
                ->add('cedula')
                ->getForm()
        ;

        $formulario->handleRequest($peticion);
        if ($formulario->isSubmitted()) {

            $cedula = $formulario->getData()->getCedula();

            $est = $em->getRepository('academicoBundle:Estudiante')->findEstudiantexInscripcion($cedula);

            if ($est) {
                return $this->redirect($this->generateUrl('_portada'));
            } else {
                return $this->redirect($this->generateUrl('estudiante_registro'));
            }
        }
        return $this->render('academicoBundle:Default:buscarE.html.twig', array(
                    'formulario' => $formulario->createView()
                ));
        
    } 
    
    
}
