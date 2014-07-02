<?php

namespace Acad\academicoBundle\Controller;

use Acad\academicoBundle\Entity\CumpleRequisito;
use Acad\academicoBundle\Entity\Dictadomateria;
use Acad\academicoBundle\Entity\Estudiante;
use Acad\academicoBundle\Entity\Inscripcion;
use Acad\academicoBundle\Entity\MateriaAsignada;
use Acad\academicoBundle\Entity\Matricula;
use Acad\academicoBundle\Form\CumpleRequisitoType;
use Acad\academicoBundle\Form\DictadomateriaType;
use Acad\academicoBundle\Form\EstudianteType;
use Acad\academicoBundle\Form\MatriculaType;
use Acad\administrativoBundle\Entity\Descripcion;
use Acad\administrativoBundle\Entity\Docente;
use Acad\administrativoBundle\Entity\Periodo;
use Acad\administrativoBundle\Entity\Requisito;
use Acad\administrativoBundle\Form\DocenteType;
use Acad\administrativoBundle\Form\RequisitoType;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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
        $peticion2 = $this->getRequest();
        $em = $this->getDoctrine()->getManager();

        $estudiante = new Estudiante();
        $est2 = new Estudiante();

        $form = $this->createFormBuilder($est2)
                ->add('cedula')
                ->getForm()
        ;

        $formulario = $this->createForm(new EstudianteType(), $estudiante);

        $formulario->handleRequest($peticion);
        $form->handleRequest($peticion2);

        $periodo = $em->getRepository('administrativoBundle:Periodo')->findOneBy(array(
            'estado' => 1
                ));

        if (!$periodo) {
            $this->get('session')->getFlashBag()->add('Info', 'Periodo académico no activo');
            return $this->redirect($this->generateUrl('_portada'));
        }

        $req = $em->getRepository('administrativoBundle:Requisito')->findBy(array('estado' => 1));





        if ($formulario->isSubmitted()) {

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

            $codi = $inscripcion->getId();
            //lleno la tabla cumplerequisito
            foreach ($req as $req1) {
                $cumplerequisito = new CumpleRequisito();
                $cumplerequisito->setEstado(1);
                $cumplerequisito->setInscripcion($inscripcion);
                $cumplerequisito->setRequisito($req1);

                $em->persist($cumplerequisito);
                $em->flush();
            }

            $this->get('session')->getFlashBag()->add('Info', 'Éxito! Estudiante inscrito'
            );
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

        //obtengo el estudiante
        $estudiante = $em->getRepository('academicoBundle:Estudiante')->findOneBy(array(
            'cedula' => $cedula
                ));
        //consulto el periodo actual activo
        $periodo = $em->getRepository('administrativoBundle:Periodo')->findOneBy(array(
            'estado' => 1
                ));
        //valido si existe el periodo activo
        if (!$periodo) {
            $this->get('session')->getFlashBag()->add('Info', 'Periodo académico no activo'
            );
            return $this->redirect($this->generateUrl('_portada'));
        }
        //$cumplerequisito = $em->getRepository('AcadacademicoBundle:CumpleRequisito')->findRequisitosEstudiante($estudiante->getCedula(),$periodo->getid());
        $cumplerequisito= $em->getRepository('academicoBundle:CumpleRequisito')->find(3);
        //$cumpler = new CumpleRequisito();
        $formulario= $this->createForm(new CumpleRequisitoType,$cumplerequisito);
        $formulario->handleRequest($peticion);


        return $this->render('academicoBundle:Default:requisitoestudiante.html.twig', array(
                    'estudiante' => $estudiante,
                    'requisitos' => $cumplerequisito ,
                    'formulario'=>$formulario->createView()
                ));
    }

    
    public function buscarEstAction() {

        $peticion = $this->getRequest();
        $em = $this->getDoctrine()->getManager();


        $estudiante = new Estudiante();
        $periodo = $em->getRepository('administrativoBundle:Periodo')->findOneBy(array(
            'estado' => 1
                ));


        if (!$periodo) {
            $this->get('session')->getFlashBag()->add('Info', 'Periodo académico no activo'
            );
            return $this->redirect($this->generateUrl('_portada'));
        }
        
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
                    $this->get('session')->getFlashBag()->add('Info', 'Estudiante ya esta inscrito' );
                    return $this->redirect($this->generateUrl('estudiante_busqueda'));
                    
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

        if (!$periodo) {
            $this->get('session')->getFlashBag()->add('Info', 'Periodo académico no activo'
            );
            return $this->redirect($this->generateUrl('_portada'));
        }

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
                $cumplerequisito->setEstado(1);
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
                    'requisito' => $req,
                    'periodo' => $periodo,
                    'formulario' => $formulario->createView()
                ));
    }

    
    //Matricula estudiante

    public function matriculaEstudianteAction() {

        $peticion = $this->getRequest();
        $em = $this->getDoctrine()->getManager();

        $matricula = new Matricula();

        $formulario = $this->createForm(new MatriculaType(), $matricula);

        $formulario->handleRequest($peticion);

        $periodo = $em->getRepository('administrativoBundle:Periodo')->findOneBy(array(
            'estado' => 1
                ));
        $nivel = $em->getRepository('administrativoBundle:Nivel')->findOneBy(array(
            'id' => 1
                ));

        if (!$periodo) {
            $this->get('session')->getFlashBag()->add('Info', 'Periodo académico no activo'
            );
            return $this->redirect($this->generateUrl('_portada'));
        }

        $mat = $em->getRepository('administrativoBundle:Materia')->findBy(array('estado' => 1));
        if (!$mat) {
            $this->get('session')->getFlashBag()->add('Info', 'Error! No hay materias activas');
            return $this->redirect($this->generateUrl('_portada'));
        }
        if ($formulario->isValid()) {


            $matricula->setEstado(1);
            $matricula->setFechamatricula(new \DateTime('now'));
            $em->persist($matricula);
            $em->flush();

            foreach ($mat as $mat1) {
                $materiaasignada = new MateriaAsignada();
                $materiaasignada->setMateria($mat1);
                $materiaasignada->setMatricula($matricula);

                $em->persist($materiaasignada);
                $em->flush();
            }

            $this->get('session')->getFlashBag()->add('Info', 'Éxito! Estudiante matriculado' );


            return $this->redirect($this->generateUrl('estudiante_matricula', array('matricula' => $matricula)));
        }

        return $this->render('academicoBundle:Default:matriculaestudiante.html.twig', array(
                    'periodo' => $periodo,
                    'nivel' => $nivel,
                    'formulario' => $formulario->createView())
        );
    }


    public function dictadomateriaAction() {

        $peticion = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();

        $periodo = $em->getRepository('administrativoBundle:Periodo')->findOneBy(array(
            'estado' => 1
                ));

        $niv= $em->getRepository('administrativoBundle:Nivel')->findOneBy(array(
            'id'=>3
        ));
        $dictadomateria = new Dictadomateria();
        
        $formulario = $this->createForm(new DictadomateriaType(), $dictadomateria);
        $formulario->handleRequest($peticion);
        
        if (!$periodo) {
            $this->get('session')->getFlashBag()->add('Info', 'Periodo académico no activo'
            );
            return $this->redirect($this->generateUrl('_portada'));
        }

        if ($formulario->isValid()) {
            $doc = new Docente($formulario->getData()->getDocente());
            $c = $doc->getCedula();



            if ($formulario->getData()->getDocente() == null) {

                $this->get('session')->getFlashBag()->add('Info', 'Por favor seleccione un docente');

                return $this->redirect($this->generateUrl('docente_dictadomateria'));
            }
            if ($formulario->getData()->getNivel() == null) {

                $this->get('session')->getFlashBag()->add('Info', 'Por favor seleccione un nivel');

                return $this->redirect($this->generateUrl('docente_dictadomateria'));
            }
            if ($formulario->getData()->getMateria() == null) {

                $this->get('session')->getFlashBag()->add('Info', 'Por favor seleccione una materia');

                return $this->redirect($this->generateUrl('docente_dictadomateria'));
            }

            $em->persist($dictadomateria);
            $em->flush();
            $this->get('session')->getFlashBag()->add('Info', 'Éxito! Materia asignada al docente'
            );

            return $this->redirect($this->generateUrl('docente_dictadomateria'));
        }
        $dicmat = $em->getRepository('academicoBundle:Estudiante')->getDictadoMateria($periodo->getId());

        return $this->render('academicoBundle:default:docentematerias.html.twig', array(
                    'periodo' => $periodo,
                    'dictadomat' => $dicmat,
                    'formulario' => $formulario->createView()
                ));
    }

}
