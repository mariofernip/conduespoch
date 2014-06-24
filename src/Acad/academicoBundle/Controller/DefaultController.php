<?php

namespace Acad\academicoBundle\Controller;

use Acad\academicoBundle\Entity\CumpleRequisito;
use Acad\academicoBundle\Entity\Estudiante;
use Acad\academicoBundle\Entity\Inscripcion;
use Acad\academicoBundle\Form\EstudianteType;
use Acad\academicoBundle\Form\RequisitosType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {

    public function indexAction($name) {
        return $this->render('academicoBundle:Default:index.html.twig', array('name' => $name));
    }

    public function portadaAction() {

        return $this->render('academicoBundle:Default:portada.html.twig');
    }

    //METODO INSERTAR ESTUDIANTE
    //permite ingresar un nuevo estudiante al sistema y lo inscribe en el periodo actual
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

            //inserto el nuevo estudiante       
            $estudiante->setEstado(1);
            $em->persist($estudiante);
            $em->flush();


            $inscripcion = new Inscripcion();

            $inscripcion->setEstudiante($estudiante);
            $inscripcion->setEstado(1);
            $inscripcion->setPeriodo($periodo);
            
            //le iscribo en el periodo actual al estudiante
            $em->persist($inscripcion);
            $em->flush();

            //lleno la tabla cumplerequisito
            foreach ($req as $req1) {
                $cumplerequisito = new CumpleRequisito();
                $cumplerequisito->setEstado(0);
                $cumplerequisito->setInscripcion($inscripcion);
                $cumplerequisito->setRequisito($req1);

                $em->persist($cumplerequisito);
                $em->flush();
            }

//            $this->get('session')->getFlashBag()->add('Info',
//                    'Felicitaciones! El estudiante ha sido ingresado satisfatoriamente'
//             );

            //llamo al la vista requisito estudiante
            return $this->redirect($this->generateUrl('estudiante_requisito', array('cedula' => $estudiante->getCedula())));
        }

        return $this->render('academicoBundle:Default:registroestudiante.html.twig', array(
                    'periodo' => $periodo,
                    'formulario' => $formulario->createView())
        );
    }

    public function requisitoEstudianteAction($cedula) {

        $em = $this->getDoctrine()->getEntityManager();

        $peticion = $this->getRequest();
        $estudiante = $em->getRepository('academicoBundle:Estudiante')->findOneBy(array(
            'cedula' => $cedula
                ));


        $requisito = $em->getRepository('administrativoBundle:Requisito')->findBy(array('estado' => 1));


        return $this->render('academicoBundle:Default:requisitoestudiante.html.twig', array(
                    'estudiante' => $estudiante,
                    'requisito' => $requisito
                ));
    }

    public function buscarEstAction() {

        $peticion = $this->getRequest();
        $em = $this->getDoctrine()->getManager();


        $estudiante = new Estudiante();
        $periodo = $em->getRepository('administrativoBundle:Periodo')->findOneBy(array(
            'estado' => 1
                ));


        $formulario = $this->createFormBuilder($estudiante)
                ->add('cedula')
                ->getForm()
        ;

        $formulario->handleRequest($peticion);
        if ($formulario->isSubmitted()) {

            $cedula = $formulario->getData()->getCedula();

            //$est = $em->getRepository('academicoBundle:Estudiante')->findEstudiantexInscripcion($cedula, $periodo->getId());
            //consulto si un estudiante ya esta registrado en el sistema
            $est = $em->getRepository('academicoBundle:Estudiante')->findOneBy(array(
                'cedula' => $cedula
                    ));

            if ($est) {
                //consulto si ese estudiante ya esta inscrito en el periodo actual
                $est2 = $em->getRepository('academicoBundle:Estudiante')->findEstudiantexInscripcion($cedula, $periodo->getId());
                
                if ($est2) {
                    return $this->redirect($this->generateUrl('_portada'));
                } else {
                    return $this->redirect($this->generateUrl('estudiante_registro_p', array('cedula' => $cedula)));
                }
            } else {
                return $this->redirect($this->generateUrl('estudiante_registro'));
            }
        }
        return $this->render('academicoBundle:Default:buscarEst.html.twig', array(
                    'formulario' => $formulario->createView()
                ));
    }

    public function registroEstudiantepAction($cedula) {

        $em = $this->getDoctrine()->getEntityManager();
        $peticion = $this->getRequest();

        //consulto el periodo actual
        $periodo = $em->getRepository('administrativoBundle:Periodo')->findOneBy(array(
            'estado' => 1
                ));
        //obtendo los datos del estudiante para procecer luego a la inscripcion
        $estudiante = $em->getRepository('academicoBundle:Estudiante')->findOneBy(array(
            'cedula' => $cedula
                ));

        //creo el formulario en la vista
        $default = array('mensaje' => 'hola');
        $formulario = $this->createFormBuilder($default)
                ->add('Inscribir', 'submit')
                ->getForm()
        ;

        $formulario->handleRequest($peticion);

        //consuslto los requisitos
        $req = $em->getRepository('administrativoBundle:Requisito')->findBy(array('estado' => 1));

        if ($formulario->isValid()) {



            $inscripcion = new Inscripcion();

            $inscripcion->setEstudiante($estudiante);
            $inscripcion->setEstado(1);
            $inscripcion->setPeriodo($periodo);

            $em->persist($inscripcion);
            $em->flush();

            //recorro lista de requisitos para insertar en la tabla cumplerequisito
            foreach ($req as $req1) {
                $cumplerequisito = new CumpleRequisito();
                $cumplerequisito->setEstado(0);
                $cumplerequisito->setInscripcion($inscripcion);
                $cumplerequisito->setRequisito($req1);

                $em->persist($cumplerequisito);
                $em->flush();
            }

            return $this->redirect($this->generateUrl('estudiante_requisito', array(
                                'cedula' => $cedula,
                            )));
        }

        //creo la vista
        return $this->render('academicoBundle:Default:nuevainscripcion.html.twig', array(
                    'estudiante' => $estudiante,
                    'periodo' => $periodo,
                    'formulario' => $formulario->createView()
                ));
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
