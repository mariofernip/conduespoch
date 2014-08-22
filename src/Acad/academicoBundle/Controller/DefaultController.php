<?php

namespace Acad\academicoBundle\Controller;

use Acad\academicoBundle\Entity\Asistencia;
use Acad\academicoBundle\Entity\AsistenciaEstudiante;
use Acad\academicoBundle\Entity\CumpleRequisito;
use Acad\academicoBundle\Entity\Dictadomateria;
use Acad\academicoBundle\Entity\Estudiante;
use Acad\academicoBundle\Entity\Evaluacion;
use Acad\academicoBundle\Entity\EvaluacionEstudiante;
use Acad\academicoBundle\Entity\Inscripcion;
use Acad\academicoBundle\Entity\MateriaAsignada;
use Acad\academicoBundle\Entity\Matricula;
use Acad\academicoBundle\Entity\RequisitoEstudiante;
use Acad\academicoBundle\Entity\SuspensoEstudiante;
use Acad\academicoBundle\Form\DictadomateriaType;
use Acad\academicoBundle\Form\EstudianteAsistenciaType;
use Acad\academicoBundle\Form\EstudianteType;
use Acad\academicoBundle\Form\EvaluacionEstudianteType;
use Acad\academicoBundle\Form\EvaluacionType;
use Acad\academicoBundle\Form\MatriculaAntiguosType;
use Acad\academicoBundle\Form\MatriculaType;
use Acad\academicoBundle\Form\RequisitoEstudianteType;
use Acad\academicoBundle\Form\SuspensoEstudianteType;
use Acad\administrativoBundle\Entity\Docente;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {

    public function indexAction($name) {
        return $this->render('academicoBundle:Default:index.html.twig', array('name' => $name));
    }

    public function portadaAction() {

        $periodo= '';
        
        return $this->render('academicoBundle:Default:portada.html.twig',array(
            'periodo'=>$periodo
        ));
    }

    //METODO INSERTAR ESTUDIANTE
    //permite ingresar un nuevo estudiante al sistema y lo inscribe en el periodo actual
    public function registroEstudianteAction() {

        
        $peticion = $this->getRequest();
        $em = $this->getDoctrine()->getManager();

        $estudiante = new Estudiante();

        //$estudiante->setCedula($cedu);

        $formulario = $this->createForm(new EstudianteType(), $estudiante);

        $formulario->handleRequest($peticion);

        $periodo = $em->getRepository('administrativoBundle:Periodo')->findOneBy(array(
            'estado' => 1
                ));

        if (!$periodo) {
            $this->get('session')->getFlashBag()->add('Info', 'Periodo académico no activo');
            return $this->redirect($this->generateUrl('_portada'));
        }

        $req = $em->getRepository('administrativoBundle:Requisito')->findBy(array('estado' => 1));





        if ($formulario->isValid()) {

            //inserto el nuevo estudiante       
            //$estudiante->upload();
            $estudiante->setEstado(1);
            $em->persist($estudiante);
            $em->flush();


            $inscripcion = new Inscripcion();

            $inscripcion->setEstudiante($estudiante);
            $inscripcion->setEstado(0);
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
        //creo un objeto requisitoestudiante: el cual contiene la lista de cumplerequisito
        $requisitoestudiante = new RequisitoEstudiante();

        //consulto los requisitos con su esstado, de un determinado estudiante que fue previamente inscrito              
        $cumplerequisito = $em->getRepository('academicoBundle:CumpleRequisito')->findRequisitosEstudiante($estudiante->getCedula(), $periodo->getid());

        //recorro lista de objetos: cumplerequisito
        foreach ($cumplerequisito as $req) {
            //obtendo el id de la inscripcion
            $codinsc = $req->getInscripcion()->getId();
            $cr = new CumpleRequisito(); //creo un objeto nuevo: cumplerequisito
            //obtengo los datos de cada objeto cumplerequisito
            $cr->setId($req->getId());
            $cr->setEstado($req->getEstado());
            $cr->setRequisito($req->getRequisito());
            //lleno el objto tarea con varios objetos cumplerequisito
            $requisitoestudiante->getReqEst()->add($cr);
        }

        //$cumplerequisito= $em->getRepository('AcadacademicoBundle:CumpleRequisito')->find(3);
        //$cumpler = new CumpleRequisito();
        //$formulario= $this->createForm(new CumpleRequisitoType,$cumplerequisito);


        $form = $this->createForm(new RequisitoEstudianteType(), $requisitoestudiante);

        $form->handleRequest($peticion);
        if ($form->isValid()) {

            foreach ($requisitoestudiante->getReqEst() as $req) {// recorro lista de objetos: cumplerequisito
                $cod = $req->getId(); // ontengo el id de cada objeto
                $est = $req->getEstado(); // obtengo el estado de cada objto
                $cr = $em->getRepository('academicoBundle:CumpleRequisito')->find($cod); //consulto el objeto cumplerequisito
                $cr->setEstado($est); //actualizo el estado del objeto previamente encontrado

                $em->flush(); // envio a guardar/actualizar el estado de cada objeto
            }
            //consulto el numero de requisitos activos x estudiante 
            $numreqxest = $em->getRepository('academicoBundle:CumpleRequisito')->getNumeroRequisitosActivoxEstudiante($cedula, $periodo->getId());
            //consulto el numero de requisitos activos x periodo
            $numreqxper = $em->getRepository('academicoBundle:CumpleRequisito')->getNumeroRequisitosActivosxPeriodo();
            //comparo
            if ($numreqxest == $numreqxper) {
                $inscripcion = $em->getRepository('academicoBundle:Inscripcion')->find($codinsc);
                $inscripcion->setEstado(1);
                $em->flush();
                $this->get('session')->getFlashBag()->add('Info', 'Estudiante apto para matricularse');
            } else {
                $inscripcion = $em->getRepository('academicoBundle:Inscripcion')->find($codinsc);               
                $inscripcion-> setEstado(0);
                $em->flush();
                $this->get('session')->getFlashBag()->add('Info', 'requisitos ingresados');
            }

            $usuario = $this->get('security.context')->getToken()->getUser();
            $rol = strtolower($usuario->getRol());

            return $this->redirect($this->generateUrl('portada', array('role' => $rol)));
        }

        return $this->render('academicoBundle:Default:requisitoestudiante.html.twig', array(
                    'estudiante' => $estudiante,
                    'requisitos' => $cumplerequisito,
                    'periodo' => $periodo,
                    'form' => $form->createView()
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
                    $inscripcion = $em->getRepository('academicoBundle:CumpleRequisito')->getEstadoInscripcionxEstudiante($cedula, $periodo->getid());
                    if ($inscripcion) {
                        $this->get('session')->getFlashBag()->add('Info', 'No cumple los requisitos');
                        return $this->redirect($this->generateUrl('estudiante_requisito', array('cedula' => $cedula)));
                    } else {
                        $this->get('session')->getFlashBag()->add('Info', 'Estudiante apto para matricularse');

                        return $this->redirect($this->generateUrl('estudiante_busqueda'));
                    }
                } else {
                    return $this->redirect($this->generateUrl('estudiante_registro_p', array('cedula' => $cedula)));
                }
            } else {
                return $this->redirect($this->generateUrl('estudiante_registro'));
            }
        }
        return $this->render('academicoBundle:Default:buscarEst.html.twig', array(
                    'periodo'=>$periodo,
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
            $inscripcion->setEstado(0);
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
                    'requisito' => $req,
                    'periodo' => $periodo,
                    'cedulaest' => $cedula,
                    'formulario' => $formulario->createView()
                ));
    }

    public function dictadomateriaAction() {

        $peticion = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();

        $periodo = $em->getRepository('administrativoBundle:Periodo')->getPeriodoActual();
        if (!$periodo) {
            $this->get('session')->getFlashBag()->add('Info', 'Periodo no encontrado');

            //codigo para hacer que retorne a la pagina principal del usuario autenticado
            $usuario = $this->get('security.context')->getToken()->getUser();
            $rol = strtolower($usuario->getRol());
            return $this->redirect($this->generateUrl('portada', array('role' => $rol)));
        }

        $dictadomateria = new Dictadomateria();

        $formulario = $this->createForm(new DictadomateriaType(), $dictadomateria);
        $formulario->handleRequest($peticion);

        if ($formulario->isValid()) {
            $doc = new Docente($formulario->getData()->getDocente());
            $c = $doc->getCedula();

            if ($formulario->getData()->getDocente() == null) {

                $this->get('session')->getFlashBag()->add('Info', 'Por favor seleccione un docente');

                return $this->redirect($this->generateUrl('amaterias_dictadomateria'));
            }
            if ($formulario->getData()->getNivel() == null) {

                $this->get('session')->getFlashBag()->add('Info', 'Por favor seleccione un nivel');

                return $this->redirect($this->generateUrl('amaterias_dictadomateria'));
            }
            if ($formulario->getData()->getMateria() == null) {

                $this->get('session')->getFlashBag()->add('Info', 'Por favor seleccione una materia');

                return $this->redirect($this->generateUrl('amaterias_dictadomateria'));
            }

            $em->persist($dictadomateria);
            $em->flush();
            $this->get('session')->getFlashBag()->add('Info', 'Éxito! Materia asignada al docente'
            );

            return $this->redirect($this->generateUrl('amaterias_dictadomateria'));
        }

        $dicmat = $em->getRepository('academicoBundle:Estudiante')->getDictadoMateria($periodo->getId());

        //paginacion
        $paginatorDM = $this->get('knp_paginator');
        $paginationDM = $paginatorDM->paginate(
                $dicmat, $this->getRequest()->query->get('page', 1), 10
        );

        return $this->render('academicoBundle:default:docentematerias.html.twig', array(
                    'periodo' => $periodo,
                    'paginationDM' => $paginationDM,
                    'formulario' => $formulario->createView()
                ));
    }

    public function matriculaBuscarEstudianteAction() {

        $estudiante = new Estudiante();
        $peticion = $this->getRequest();
        $em = $this->getDoctrine()->getManager();
        $periodo = $em->getRepository('administrativoBundle:Periodo')->getPeriodoActual();
        $formularioantiguos = $this->createForm(new MatriculaAntiguosType(), $estudiante);
        $formularioantiguos->handleRequest($peticion);

        if ($formularioantiguos->isSubmitted()) {

            $ci = $formularioantiguos->getData()->getCedula();


            $estudiante = $em->getRepository('academicoBundle:Estudiante')->findOneBy(array(
                'cedula' => $ci
                    ));

            $est = null;

            if ($estudiante != null) {
                $est = $em->getRepository('academicoBundle:Estudiante')->findEstudiantexMatricula($estudiante->getId());

                if ($est) {

                    $repository = $this->getDoctrine()->getRepository('academicoBundle:CumpleRequisito');
                    $qb = $repository->createQueryBuilder('p');
                    $qb->select('count(p.id)');
                    $qb->where('p.estado = 1 and p.inscripcion = :id_inscripcion');
                    $qb->setParameter('id_inscripcion', $est->getId());
                    $count = $qb->getQuery()->getSingleScalarResult();

                    $repository2 = $this->getDoctrine()->getRepository('administrativoBundle:Requisito');

                    $qb2 = $repository2->createQueryBuilder('r');
                    $qb2->select('count(r.id)');
                    $qb2->where('r.estado = 1');
                    $count2 = $qb2->getQuery()->getSingleScalarResult();

                    $est2 = $em->getRepository('academicoBundle:Estudiante')->findEstudiantexMatriculado($estudiante->getId());


                    if (($count == $count2) and ($est2 == null)) {
                        return $this->redirect($this->generateUrl('estudiante_matricula', array('cedula' => $estudiante->getCedula())));
                    }
                    if (($count == 0) or ($count2 == 0)) {
                        $this->get('session')->getFlashBag()->add('Info', 'Estudiante no cumple todos los requisitos');
                        return $this->redirect($this->generateUrl('estudiante_requisito', array('cedula' => $ci)));
                    }
                    if (($count != $count2)) {
                        $this->get('session')->getFlashBag()->add('Info', 'Estudiante no cumple todos los requisitos');
                        return $this->redirect($this->generateUrl('estudiante_requisito', array('cedula' => $ci)));
                    }
                }
                $estm = $em->getRepository('academicoBundle:Estudiante')->findEstudiantexMatriculado($estudiante->getId());
                if ($estm != null) {                    
                    $this->get('session')->getFlashBag()->add('Info', 'Estudiante ya esta matriculado');
                    return $this->redirect($this->generateUrl('estudiante_buscar'));
                }
                $estma = $em->getRepository('academicoBundle:Estudiante')->findEstudiantexMatriculadoA($estudiante->getId());
                if ($estma != null) {
                    return $this->redirect($this->generateUrl('estudiante_matricula', array('cedula' => $estudiante->getCedula())));
                }
            } else {
                $this->get('session')->getFlashBag()->add('Info', 'Estudiante no encontrado');
                return $this->redirect($this->generateUrl('estudiante_buscar'));
            }
        }
        return $this->render('academicoBundle:Default:buscarEstMat.html.twig', array(
            'periodo'=>$periodo,
            'formulario' => $formularioantiguos->createView()));
    }

    public function matriculaEstudianteAction($cedula) {

        $peticion = $this->getRequest();

        $em = $this->getDoctrine()->getManager();
        $matricula = new Matricula();

        $periodo = $em->getRepository('administrativoBundle:Periodo')->findOneBy(array('estado' => 1));
        $mat = $em->getRepository('administrativoBundle:Materia')->findBy(array('estado' => 1));
        
        $estudiante = $em->getRepository('academicoBundle:Estudiante')->findOneBy(array(
                'cedula' => $cedula
                    ));
                     
        $esti = $em->getRepository('academicoBundle:Estudiante')->findEstudiantexInscripcionnovalida($estudiante->getCedula(), $periodo);
        
        $estm = $em->getRepository('academicoBundle:Estudiante')->findEstudiantexMatriculado($estudiante->getId());
                if ($estm != null) {                    
                    $this->get('session')->getFlashBag()->add('Info', 'Estudiante ya esta matriculado');
                    return $this->redirect($this->generateUrl('estudiante_lista_inscritos'));
                }
               
                if ($esti) {
                $this->get('session')->getFlashBag()->add('Info', 'Estudiante no apto para matricularse no cumple requisitos');
                return $this->redirect($this->generateUrl('estudiante_lista_inscritos'));
            } 
        
        $formulario = $this->createForm(new MatriculaType(), $matricula);
        $formulario->handleRequest($peticion);  

        if ($formulario->isSubmitted()) {
            $matricula->setEstado(1);
            $matricula->setEstudiante($estudiante);
            $matricula->setFechamatricula(new DateTime('now'));
            $em->persist($matricula);
            $em->flush();

            foreach ($mat as $mat1) {
                $materiaasignada = new MateriaAsignada();
                $materiaasignada->setMateria($mat1);
                $materiaasignada->setMatricula($matricula);
                $em->persist($materiaasignada);
                $em->flush();
            }

            $matasi = $em->getRepository('academicoBundle:MateriaAsignada')->findBy(array('matricula' => $matricula->getId()));
            $listamesevaluacion = $em->getRepository('administrativoBundle:MesEvaluacion')->findBy(array(
                'periodo' => $periodo->getId()
                    ));
            foreach ($matasi as $matasi1) {
                $asistencia = new Asistencia();
                $asistencia->setMateriaasignada($matasi1);
                $em->persist($asistencia);
                $em->flush();

                foreach ($listamesevaluacion as $meseva) {
                    $evaluacion = new Evaluacion();
                    $evaluacion->setDescripcion('');
                    $evaluacion->setMateriaasignada($matasi1);
                    $evaluacion->setMesevaluacion($meseva);
                    $evaluacion->setNotatb(0);
                    $evaluacion->setNotaec(0);
                    $evaluacion->setNotapp(0);
                    $evaluacion->setNotapt(0);
                    $evaluacion->setPromedio(0);

                    $em->persist($evaluacion);
                    $em->flush();
                }
            }
            //mensaje
            $this->get('session')->getFlashBag()->add('Info', 'Estudiante matriculado');

            //codigo para hacer que retorne a la pagina principal del usuario autenticado
            $usuario = $this->get('security.context')->getToken()->getUser();
            $rol = strtolower($usuario->getRol());
            return $this->redirect($this->generateUrl('portada', array('role' => $rol)));
        }

        return $this->render('academicoBundle:Default:estudiantematriculado2.html.twig', array('periodo' => $periodo, 'formulario' => $formulario->createView(), 'estudiante' => $estudiante));
    }

    //METODO PRA lISTAR LOS ESTUDIANTE DEL DOCENTE X MATERIA, NIVEL, SECCION

    public function notasAction($mesid) {

        $peticion = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();
        //obtengo el objeto autenticado: en este caso el docente
        $usuario = $this->get('security.context')->getToken()->getUser();
        //consulto periodo actual
        $sesion = $this->getRequest()->getSession();
        $periodo = $sesion->get('periodo'); //$em->getRepository('administrativoBundle:Periodo')->findOneBy(array(
        //'estado' => 1
        //  ));

        $materia = $sesion->get('materia');
        $nivel = $sesion->get('nivel');
        //obtengo cedula del docente autenticado
        $cedula = $usuario->getCedula();
        //obtiene las materias del docente autenticado
        $materiasdocente = $em->getRepository('academicoBundle:Dictadomateria')->getMateriasDocente($cedula, $periodo->getId());
        //obtiene lista de estudiantes
        $evaluacionestudiantesxmateria = $em->getRepository('academicoBundle:Dictadomateria')->getEvaluacionEstudiantesxMateria($materia, $periodo->getId(), $nivel, $mesid);




        $objmes = $em->getRepository('administrativoBundle:MesEvaluacion')->find($mesid);

        /**
         * NUEVO PROCESO -  EVALUACION DE ESTUDIANTES
         */
        $evaluacionestudiante = new EvaluacionEstudiante();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
                $evaluacionestudiantesxmateria, $this->getRequest()->query->get('page', 1), 10
        );

        foreach ($evaluacionestudiantesxmateria as $req) {

            $cr = new Evaluacion(); //creo un objeto nuevo: cumplerequisito
            //obtengo los datos de cada objeto cumplerequisito
            $cr->setId($req->getId());
            $cr->setMateriaasignada($req->getMateriaAsignada());
            $cr->setMesevaluacion($req->getMesEvaluacion());
            $cr->setNotatb($req->getNotatb());
            $cr->setNotaec($req->getNotaec());
            $cr->setNotapp($req->getNotapp());
            $cr->setNotapt($req->getNotapt());
            $cr->setPromedio($req->getPromedio());

            //lleno el objto tarea con varios objetos cumplerequisito
            $evaluacionestudiante->getEvaEst()->add($cr);
        }


        $form = $this->createForm(new EvaluacionEstudianteType(), $evaluacionestudiante);

        $form->handleRequest($peticion);
        if ($form->isValid()) {

            foreach ($evaluacionestudiante->getEvaEst() as $req) {// recorro lista de objetos: cumplerequisito
                $cod = $req->getId(); // ontengo el id de cada objeto
                $notatb = $req->getNotatb(); // obtengo el estado de cada objto
                $notaec = $req->getNotaec(); // obtengo el estado de cada objto
                $notapp = $req->getNotapp(); // obtengo el estado de cada objto
                $notapt = $req->getNotapt(); // obtengo el estado de cada objto
                $cr = $em->getRepository('academicoBundle:Evaluacion')->find($cod); //consulto el objeto cumplerequisito
                $cr->setNotatb($notatb);
                $cr->setNotaec($notaec);
                $cr->setNotapp($notapp);
                $cr->setNotapt($notapt);
                $em->persist($cr);
                $em->flush(); // envio a guardar/actualizar el estado de cada objeto
            }

            $this->get('session')->getFlashBag()->add('Info', 'Notas actualizadas..!!');
            $url = explode("?", $_SERVER['HTTP_REFERER']);
            $redir = $url[0];

            return $this->redirect($redir);
        }
        $cod = 0;
        if ($evaluacionestudiantesxmateria) {
            $cod = 1;
        }
        $mes = $em->getRepository('administrativoBundle:MesEvaluacion')->findBy(array(
            'estado' => true
                ));
        $listamesesEv = $em->getRepository('administrativoBundle:MesEvaluacion')->findAll();
        //creo la vista
        return $this->render('academicoBundle:default:notasdocente.html.twig', array(
                    'periodo' => $periodo,
                    'materiasdoc' => $materiasdocente,
                    'evaest' => $pagination,
                    'materia' => $materia,
                    'nivel' => $nivel,
                    'codmat' => $materia,
                    'codniv' => $nivel,
                    'codmes' => $objmes,
                    'form' => $form->createView(),
                    'cod' => $cod,
                    'listames' => $mes,
                    'mesevac' => $listamesesEv
                ));
    }

    //METODO: listar los estudiantes inscritos en el periodo actual
    public function listaestudiantesinscritosAction() {

        $em = $this->getDoctrine()->getEntityManager();

        $periodo = $em->getRepository('administrativoBundle:Periodo')->getPeriodoActual();
        if (!$periodo) {
            //mensaje
            $this->get('session')->getFlashBag()->add('Info', 'Periodo no encontrado');

            //codigo para hacer que retorne a la pagina principal del usuario autenticado
            $usuario = $this->get('security.context')->getToken()->getUser();
            $rol = strtolower($usuario->getRol());
            return $this->redirect($this->generateUrl('portada', array('role' => $rol)));
        }
        $estudiantes = $em->getRepository('academicoBundle:Inscripcion')->getListaEstudiantesInscritosxPeriodo($periodo->getId());



        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
                $estudiantes, $this->getRequest()->query->get('page', 1), 10
        );


        return $this->render('academicoBundle:default:listaestudiantesinscritos.html.twig', array(
                    'periodo' => $periodo,                    
                    'pagination'=>$pagination
                    
                ));
    }

    //METODO: modifica los datos de un estudiante previamente inscrito 
    public function modificarestudianteAction($cedula) {

        $em = $this->getDoctrine()->getEntityManager();
        $peticion = $this->getRequest();

        $periodo = $em->getRepository('administrativoBundle:Periodo')->getPeriodoActual();

        $estudiante = $em->getRepository('academicoBundle:Estudiante')->findOneBy(array(
            'cedula' => $cedula
                ));

        $formulario = $this->createForm(new EstudianteType(), $estudiante);

        $formulario->handleRequest($peticion);

        if ($formulario->isValid()) {
            $em->persist($estudiante);
            $em->flush();

            $this->get('session')->getFlashBag()->add('Info', 'Datos actualizados');


            return $this->redirect($this->generateUrl('estudiante_lista_inscritos'));
        }


        return $this->render('academicoBundle:default:modificarestudiante.html.twig', array(
                    'periodo' => $periodo,
                    'cedula' => $cedula,
                    'formulario' => $formulario->createView()
                ));
    }

    //METODO: lista los estudiantes matriculados por nivel, y secciones de un periodo actual    
    public function listaestudiantesxseccionesAction($nivel) {


        $em = $this->getDoctrine()->getEntityManager();

        $periodo = $em->getRepository('administrativoBundle:Periodo')->getPeriodoActual();
        if (!$periodo) {
            //mensaje
            $this->get('session')->getFlashBag()->add('Info', 'Periodo no encontrado');

            //codigo para hacer que retorne a la pagina principal del usuario autenticado
            $usuario = $this->get('security.context')->getToken()->getUser();
            $rol = strtolower($usuario->getRol());
            return $this->redirect($this->generateUrl('portada', array('role' => $rol)));
        }

        //obtiene lista de estudiantes matriculados de seccion: diurna
        $diurna = $em->getRepository('academicoBundle:Matricula')->getEstudiantesxSeccionDiurna($periodo->getId(), $nivel);
        //obtiene lista de estudiantes matriculados de seccion: nocturna
        $nocturna = $em->getRepository('academicoBundle:Matricula')->getEstudiantesxSeccionNocturna($periodo->getId(), $nivel);
        //obtiene lista de estudiantes matriculados de seccion: vespertina
        $vespertina = $em->getRepository('academicoBundle:Matricula')->getEstudiantesxSeccionVespertina($periodo->getId(), $nivel);
        //obtiene lista de todos los niveles
        $niveles = $em->getRepository('academicoBundle:Matricula')->getTodosNiveles();
        //obtine el nivel
        $curso = $em->getRepository('administrativoBundle:Nivel')->find($nivel);

        //seccion diurna
        $paginatorSD = $this->get('knp_paginator');
        $paginationSD = $paginatorSD->paginate(
                $diurna, $this->getRequest()->query->get('page', 1), 10
        );
        
        //seccion vespertina
        $paginatorSV = $this->get('knp_paginator');
        $paginationSV = $paginatorSV->paginate(
                $vespertina, $this->getRequest()->query->get('page', 1), 10
        );
        
        //seccion nocturna
        $paginatorSN = $this->get('knp_paginator');
        $paginationSN = $paginatorSN->paginate(
                $nocturna, $this->getRequest()->query->get('page', 1), 10
        );
        $sd=0; 
        $sv=0;
        $sn=0;
        if($diurna){
            $sd=1;
        }
        if($vespertina){
            $sv=1;
        }
        if($nocturna){
            $sn=1;
        }
        return $this->render('academicoBundle:default:listaestudiantesmatriculados.html.twig', array(
                    'periodo' => $periodo,
                    'niveles' => $niveles,
                    'diurna' => $paginationSD,
                    'nocturna' => $paginationSN,
                    'vespertina' => $paginationSV,
                    'curso' => $curso,
                    'sd'=>$sd,
                    'sv'=>$sv,
                    'sn'=>$sn
                ));
    }
    
    //METODO: lista asistencia estudiantes matriculados por nivel, y secciones de un periodo actual    
    public function listaestudiantesxseccionesmateriaAction($materias, $nivel) {

       $em = $this->getDoctrine()->getManager();
       $listamaterias = $em->getRepository('academicoBundle:Estudiante')->getMateriasxNivel($nivel);
       $periodo = $em->getRepository('administrativoBundle:Periodo')->getPeriodoActual();
                     
        $request = $this->getRequest();
        
        if (!$periodo) {
            //mensaje
            $this->get('session')->getFlashBag()->add('Info', 'Periodo no encontrado');

            //codigo para hacer que retorne a la pagina principal del usuario autenticado
            $usuario = $this->get('security.context')->getToken()->getUser();
            $rol = strtolower($usuario->getRol());
            return $this->redirect($this->generateUrl('portada', array('role' => $rol)));
        }

        //obtiene lista de todos los niveles
        $niveles = $em->getRepository('academicoBundle:Matricula')->getTodosNiveles();
        //obtine el nivel
        $curso = $em->getRepository('administrativoBundle:Nivel')->find($nivel);
        //obtiene lista de estudiantes matriculados de seccion: diurna
        $secciones = $em->getRepository('academicoBundle:Estudiante')->findEstudiantexMateriaxSecciones($materias, $nivel);      
        
        //secciones
        $paginatorSS = $this->get('knp_paginator');
        $paginationSS = $paginatorSS->paginate(
                $secciones, $this->getRequest()->query->get('page', 1), 10
        );
        
        $sd=0; 
        
        if($secciones){
            $sd=1;
        }
        $itemsecciones = new AsistenciaEstudiante();
        
        foreach ($secciones as $sec) {
            $cr = new Asistencia(); //creo un objeto nuevo: asistencia
            $cr->setId($sec->getId());
            $cr->setFaltasjustificadas($sec->getFaltasjustificadas());
            $cr->setFaltasinjustificadas($sec->getFaltasinjustificadas());
            $cr->setAtrasos($sec->getAtrasos());
            $cr->setPromediofinal($sec->getPromediofinal());
            $cr->setMateriaasignada($sec->getMateriaasignada());
            //lleno el objto tarea con varios objetos asistencia
            $itemsecciones->getFaltasjustificadas()->add($cr);
        }
        
        $formsecciones = $this->createForm(new EstudianteAsistenciaType(), $itemsecciones);
        
        $formsecciones->handleRequest($request);
          
             if ( $formsecciones->isValid() ) {     
            
                foreach ($itemsecciones->getFaltasjustificadas() as $item) {
                    $cod= $item->getId();
                    //$ha=$item->getHorasasistidas();
                    $fj=$item->getFaltasjustificadas();
                    $fi=$item->getFaltasinjustificadas();
                    $a=$item->getAtrasos();
                    
                    $cr= $em->getRepository('academicoBundle:Asistencia')->find($cod);                    
                    $cr->setFaltasjustificadas($fj);
                    $cr->setFaltasinjustificadas($fi);
                    $cr->setAtrasos($a);
                    $em->flush();
                }         
                $this->get('session')->getFlashBag()->add('Info', 'Asistencia ha sido actualizada');
                $usuario = $this->get('security.context')->getToken()->getUser();
                $rol = strtolower($usuario->getRol());
                return $this->redirect($this->generateUrl('estudiante_lista_matriculados_x_materia_x_secciones', array('materias' => $materias, 'nivel' => $nivel)));
      

            }
        
        return $this->render('academicoBundle:default:listaestudiantesmatriculadosasistecia.html.twig', array(
                    'periodo' => $periodo,
                    'niveles' => $niveles,
                    'secciones' => $paginationSS,            
                    'curso' => $curso,                    
                    'materias'=>$materias,
                    'listamaterias'=>$listamaterias,            
                    'formsecciones'=>$formsecciones->createView(),                       
                    'sd'=>$sd,
                ));
    }
        
    
        
    
    //METODO: lista las materias por nivel    
    public function listamateriasxnivelAction($nivel) {

        $em = $this->getDoctrine()->getEntityManager();
        $listamaterias = $em->getRepository('academicoBundle:Estudiante')->getMateriasxNivel($nivel);
        $periodo = $em->getRepository('administrativoBundle:Periodo')->getPeriodoActual();
        $niveles = $em->getRepository('academicoBundle:Matricula')->getTodosNiveles();
        $curso = $em->getRepository('administrativoBundle:Nivel')->find($nivel);

        if (!$periodo) {
            //mensaje
            $this->get('session')->getFlashBag()->add('Info', 'Periodo no encontrado');

            //codigo para hacer que retorne a la pagina principal del usuario autenticado
            $usuario = $this->get('security.context')->getToken()->getUser();
            $rol = strtolower($usuario->getRol());
            return $this->redirect($this->generateUrl('portada', array('role' => $rol)));
        }

         
        return $this->render('academicoBundle:default:listamateriasxnivel.html.twig', array(
                    'periodo' => $periodo,
                    'listamaterias'=>$listamaterias,
                    'niveles'=>$niveles,
                    'curso'=>$curso
            
                ));
    }
    
    
    public function listamateriasxdocenteAction($codmes) {

        $em = $this->getDoctrine()->getEntityManager();

        $periodo = $em->getRepository('administrativoBundle:Periodo')->getPeriodoActual();
        $usuario = $this->get('security.context')->getToken()->getUser();
        if (!$periodo) {
            //mensaje
            $this->get('session')->getFlashBag()->add('Info', 'Periodo no encontrado');

            //codigo para hacer que retorne a la pagina principal del usuario autenticado

            $rol = strtolower($usuario->getRol());
            return $this->redirect($this->generateUrl('portada', array('role' => $rol)));
        }

        $cedula = $usuario->getCedula();
        $materiasdocente = $em->getRepository('academicoBundle:Dictadomateria')->getMateriasDocente($cedula, $periodo->getId());

        $mes = $em->getRepository('administrativoBundle:MesEvaluacion')->findBy(array(
            'estado' => true
                ));
        //$sesion= new Session();
        //$sesion->start();        
        $objmes = $em->getRepository('administrativoBundle:MesEvaluacion')->find($codmes);
        return $this->render('academicoBundle:default:listamateriasxdocente.html.twig', array(
                    'periodo' => $periodo,
                    'materiasdoc' => $materiasdocente,
                    'listames' => $mes,
                    'codmes' => $objmes
                ));
    }


    public function listadictadomateriaAction() {

        $em = $this->getDoctrine()->getEntityManager();

        $periodo = $em->getRepository('administrativoBundle:Periodo')->getPeriodoActual();
        $usuario = $this->get('security.context')->getToken()->getUser();
        if (!$periodo) {
            //mensaje
            $this->get('session')->getFlashBag()->add('Info', 'Periodo no encontrado');
            //codigo para hacer que retorne a la pagina principal del usuario autenticado
            $rol = strtolower($usuario->getRol());
            return $this->redirect($this->generateUrl('portada', array('role' => $rol)));
        }

        $dicmat = $em->getRepository('academicoBundle:Estudiante')->getTodosDictadoMateria($periodo->getId());

        //paginacion
        $paginatorDM = $this->get('knp_paginator');
        $paginationDM = $paginatorDM->paginate(
                $dicmat, $this->getRequest()->query->get('page', 1), 10
        );

        return $this->render('academicoBundle:default:listadictadomateria.html.twig', array(
                    'periodo' => $periodo,
                    'paginationDM' => $paginationDM
                ));
    }

    public function modificardictadomateriaAction($codm) {
        $em = $this->getDoctrine()->getEntityManager();
        $peticion = $this->getRequest();
        $periodo = $em->getRepository('administrativoBundle:Periodo')->getPeriodoActual();
        $usuario = $this->get('security.context')->getToken()->getUser();
        $rol = strtolower($usuario->getRol());
        if (!$periodo) {
            //mensaje
            $this->get('session')->getFlashBag()->add('Info', 'Periodo no activo');
            //codigo para hacer que retorne a la pagina principal del usuario autenticado

            return $this->redirect($this->generateUrl('portada', array('role' => $rol)));
        }
        $dictadomateria = $em->getRepository('academicoBundle:Dictadomateria')->find($codm);

        $formulario = $this->createForm(new DictadomateriaType(), $dictadomateria);
        $formulario->handleRequest($peticion);

        if ($formulario->isValid()) {

            $em->flush();

            $this->get('session')->getFlashBag()->add('Info', 'Datos actualizados');
            return $this->redirect($this->generateUrl('portada', array('role' => $rol)));
        }


        return $this->render('academicoBundle:default:modificardictadomateria.html.twig', array(
                    'periodo' => $periodo,
                    'coddm' => $codm,
                    'formulario' => $formulario->createView()
                ));
    }

    public function eliminardictadomateriaAction() {
        $em = $this->getDoctrine()->getEntityManager();

        $periodo = $em->getRepository('administrativoBundle:Periodo')->getPeriodoActual();
        $usuario = $this->get('security.context')->getToken()->getUser();
        $rol = strtolower($usuario->getRol());
        if (!$periodo) {
            //mensaje
            $this->get('session')->getFlashBag()->add('Info', 'Periodo no activo');
            //codigo para hacer que retorne a la pagina principal del usuario autenticado

            return $this->redirect($this->generateUrl('portada', array('role' => $rol)));
        }
        $codm = $this->getRequest()->get('codm');
        $dictadomateria = $em->getRepository('academicoBundle:Dictadomateria')->find($codm);
        if ($dictadomateria) {
            //elimino el objto dictadomateria
            $em->remove($dictadomateria);
            $em->flush();
            
            $this->get('session')->getFlashBag()->add('Info', 'Éxito! Registro eliminado');
            return $this->redirect($this->generateUrl('amaterias_lista_materias_asignadas'));
        }else{
            $this->get('session')->getFlashBag()->add('Info', 'Registro no encontrado');
            return $this->redirect($this->generateUrl('portada', array('role' => $rol)));
        }
    }
    
    
    //METODO: modifica los datos de la matricula de un estudiante previamente matriculado 
    public function modificarmatriculaAction($mid) {
        
        $em = $this->getDoctrine()->getEntityManager();
        $peticion = $this->getRequest();

        $periodo = $em->getRepository('administrativoBundle:Periodo')->getPeriodoActual();

        $matricula = $em->getRepository('academicoBundle:Matricula')->findOneBy(array(
            'id' => $mid
                ));
               
        $formulario = $this->createForm(new MatriculaType(), $matricula);

        $formulario->handleRequest($peticion);
        if ($formulario->isValid()) {
            $em->persist($matricula);
            $em->flush();
            $this->get('session')->getFlashBag()->add('Info', 'Datos actualizados');
        }


        return $this->render('academicoBundle:default:modificarestudiantematricula.html.twig', array(
                    'periodo' => $periodo,
                    'mid' => $mid,
                    'formulario' => $formulario->createView(),
                    'matricula' => $matricula
                    //'estudiante' => $estudiante
                ));
    }

    //METODO: listar materias del docnete, para luego ingresar las notas de suspenso

    public function listamateriasxdocentexsuspAction() {

        $em = $this->getDoctrine()->getEntityManager();

        $periodo = $em->getRepository('administrativoBundle:Periodo')->getPeriodoActual();
        $usuario = $this->get('security.context')->getToken()->getUser();
        if (!$periodo) {
            //mensaje
            $this->get('session')->getFlashBag()->add('Info', 'Periodo no encontrado');

            //codigo para hacer que retorne a la pagina principal del usuario autenticado

            $rol = strtolower($usuario->getRol());
            return $this->redirect($this->generateUrl('portada', array('role' => $rol)));
        }

        $cedula = $usuario->getCedula();
        $materiasdocente = $em->getRepository('academicoBundle:Dictadomateria')->getMateriasDocente($cedula, $periodo->getId());

        $mes = $em->getRepository('administrativoBundle:MesEvaluacion')->findBy(array(
            'estado' => true
                ));


        return $this->render('academicoBundle:default:listamateriasxdocentexsusp.html.twig', array(
                    'periodo' => $periodo,
                    'materiasdoc' => $materiasdocente,
                    'listames' => $mes,
                ));
    }

    //METODO: insertar notas de suspenso

    public function notasuspensoAction() {

        $peticion = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();
        //obtengo el objeto autenticado: en este caso el docente
        $usuario = $this->get('security.context')->getToken()->getUser();
        //consulto periodo actual
        $sesion = $this->getRequest()->getSession();
        $periodo = $sesion->get('periodo'); //$em->getRepository('administrativoBundle:Periodo')->findOneBy(array(
        //'estado' => 1
        //  ));

        $materia = $sesion->get('materia');
        $nivel = $sesion->get('nivel');
        //obtengo cedula del docente autenticado
        $cedula = $usuario->getCedula();
        //obtiene las materias del docente autenticado
        $materiasdocente = $em->getRepository('academicoBundle:Dictadomateria')->getMateriasDocente($cedula, $periodo->getId());
        //obtiene lista de estudiantes
        $suspensoestudiantesxmateria = $em->getRepository('academicoBundle:Dictadomateria')->getSuspensoEstudiantesxMateria($materia, $periodo->getId(), $nivel);

        $mat = $em->getRepository('administrativoBundle:Materia')->find($materia->getId());
        $niv = $em->getRepository('administrativoBundle:Nivel')->find($nivel->getId());

        /**
         * NUEVO PROCESO -  SUSPENSION DE ESTUDIANTES
         */
        $suspensoestudiante = new SuspensoEstudiante();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
                $suspensoestudiantesxmateria, $this->getRequest()->query->get('page', 1), 10
        );
        $eqbd = '';
        foreach ($suspensoestudiantesxmateria as $req) {

            $asistencia = $em->getRepository('academicoBundle:Asistencia')->findOneBy(array('materiaasignada' => $req->getId()));
            if (($asistencia->getPromediofinal() < 70) && ($req->getPromediofinal() < 14)) {
                $eqbd = 'Reprobado';
            } else {
                $eqbd = 'Aprobado';
            }
            //obtengo los datos de cada objeto materiaasignada                        
            $ma = new MateriaAsignada(); //creo un objeto nuevo: materiaasignada                                    
            $ma->setId($req->getId());
            $ma->setEquivalencia($req->getEquivalencia());
            $ma->setMateria($req->getMateria());
            $ma->setMatricula($req->getMatricula());
            $ma->setNotasuspenso($req->getNotasuspenso());
            $ma->setPromediofinal($req->getPromediofinal());


            //lleno el objto tarea con varios objetos materiaasignada
            $suspensoestudiante->getEvaEst()->add($ma);
        }


        $form = $this->createForm(new SuspensoEstudianteType(), $suspensoestudiante);

        $form->handleRequest($peticion);
        $eq = '';
        $npf = 0;
        if ($form->isValid()) {

            foreach ($suspensoestudiante->getEvaEst() as $req) {// recorro lista de objetos: MA
                if ($req->getPromediofinal() < 14) {
                    $cod = $req->getId(); // ontengo el id de cada objeto
                    $suspenso = $req->getNotasuspenso();
                    $pf = $req->getPromediofinal();
                    $examens = round(20 - ($pf / 2));
                    if ($suspenso >= $examens) {
                        $npf = round(($suspenso + $pf) / 2);
                        $asistencia = $em->getRepository('academicoBundle:Asistencia')->findOneBy(array('materiaasignada' => $req->getId()));
                        if ($asistencia->getPromediofinal() < 70) {
                            $eq = 'Reprobado';
                        } else {
                            $eq = 'Aprobado';
                        }
                    } else {
                        $npf = round(($suspenso + $pf) / 2);
                        $eq = 'Reprobado';
                    }

                    $ma = $em->getRepository('academicoBundle:MateriaAsignada')->find($cod); //consulto el objeto materiaasignada
                    $ma->setNotasuspenso($suspenso);
                    $ma->setEquivalencia($eq);
                    $ma->setPromediofinal($npf);
                    $em->persist($ma);
                    $em->flush(); // envio a guardar/actualizar el estado de cada objeto
                } else {
                    $cod = $req->getId(); // ontengo el id de cada objeto                    
                    $pf = $req->getPromediofinal();
                    $asistencia = $em->getRepository('academicoBundle:Asistencia')->findOneBy(array('materiaasignada' => $req->getId()));
                    if (($asistencia->getPromediofinal() < 70)) {
                        $eq = 'Reprobado';
                    } else {
                        $eq = 'Aprobado';
                    }

                    $ma = $em->getRepository('academicoBundle:MateriaAsignada')->find($cod); //consulto el objeto materiaasignada
                    $ma->setNotasuspenso(0);
                    $ma->setPromediofinal($pf);
                    $ma->setEquivalencia($eq);
                    $em->persist($ma);
                    $em->flush(); // envio a guardar/actualizar el estado de cada objeto
                }
            }

            $this->get('session')->getFlashBag()->add('Info', 'Notas actualizadas..!!');
            $url = explode("?", $_SERVER['HTTP_REFERER']);
            $redir = $url[0];

            return $this->redirect($redir);
        }
        $cod = 0;
        if ($suspensoestudiantesxmateria) {
            $cod = 1;
        }

        $mes = $em->getRepository('administrativoBundle:MesEvaluacion')->findBy(array(
            'estado' => true
                ));
        $listamesesEv = $em->getRepository('administrativoBundle:MesEvaluacion')->findAll();
        //creo la vista
        return $this->render('academicoBundle:default:notasuspenso.html.twig', array(
                    'periodo' => $periodo,
                    'materiasdoc' => $materiasdocente,
                    'evaest' => $pagination,
                    'mat' => $mat,
                    'niv' => $niv,
                    'materia' => $materia,
                    'cod' => $cod,
                    'nivel' => $nivel,
                    'listames' => $mes,
                    'mesevac' => $listamesesEv,
                    'form' => $form->createView()
                ));
    }

    public function sesionportadaAction($niv, $mat) {

        $em = $this->getDoctrine()->getEntityManager();
        //obtengo el objeto autenticado: en este caso el docente
        $usuario = $this->get('security.context')->getToken()->getUser();
        $nivel = $em->getRepository('administrativoBundle:Nivel')->find($niv);
        $materia = $em->getRepository('administrativoBundle:Materia')->find($mat);
        //consulto periodo actual
        $sesion = $this->getRequest()->getSession();
        $periodo = $sesion->get('periodo');

        $sesion->set('nivel', $nivel);
        $sesion->set('materia', $materia);
        $mes = $em->getRepository('administrativoBundle:MesEvaluacion')->findBy(array(
            'estado' => true
                ));

        $listamesesEv = $em->getRepository('administrativoBundle:MesEvaluacion')->findAll();
        $materiasdocente = $em->getRepository('academicoBundle:Dictadomateria')->getMateriasDocente($usuario->getCedula(), $periodo->getId());
        return $this->render('academicoBundle:Default:portada_docente2.html.twig', array(
                    'periodo' => $periodo,
                    'mesevac' => $listamesesEv,
                    'materiasdoc' => $materiasdocente,
                    'listames' => $mes,
                    'materia' => $materia,
                    'nivel' => $nivel,
                ));
    }

    
    public function notasparcialesxmesAction($codmes) {
        
        $sesion = $this->getRequest()->getSession();
        $em = $this->getDoctrine()->getEntityManager();
        //obtengo el objeto autenticado: en este caso el docente
        $usuario = $this->get('security.context')->getToken()->getUser();
        //variables de sesion activas
        $periodo = $sesion->get('periodo'); 
        $materia = $sesion->get('materia');
        $nivel = $sesion->get('nivel');
        
        
        $evaluacion= $em->getRepository('academicoBundle:Dictadomateria')->getEvaluacionEstudiantesxMateria($materia->getId(),$periodo->getId(),$nivel->getId(),$codmes);
        $listamesesEv = $em->getRepository('administrativoBundle:MesEvaluacion')->findAll();
        $mes = $em->getRepository('administrativoBundle:MesEvaluacion')->findBy(array(
            'estado' => true
                ));
        
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
                $evaluacion, $this->getRequest()->query->get('page', 1), 10
        );
        $mesactual=$em->getRepository('administrativoBundle:Mes')->find($codmes);
        $materiasdocente = $em->getRepository('academicoBundle:Dictadomateria')->getMateriasDocente($usuario->getCedula(), $periodo->getId());
        return $this->render('academicoBundle:default:notasparcialesxmes.html.twig',array(
            'periodo'=>$periodo,
            'materia'=>$materia,
            'nivel'=>$nivel,
            'mesevac'=>$listamesesEv,
            'listames'=>$mes,
            'mes'=>$mesactual,
            'materiasdoc'=>$materiasdocente,
            'listaeva'=>$pagination
        ));
    }
       
    
    //METODO: lista materias para presentar acta de calificaciones estudiantes de un periodo actual    
    public function actageneralcalificacionesestudiantesAction() {

       $em = $this->getDoctrine()->getManager();
       
        //obtengo el objeto autenticado: en este caso el docente
        $usuario = $this->get('security.context')->getToken()->getUser();
        //consulto periodo actual
        $sesion = $this->getRequest()->getSession();
        $periodo = $sesion->get('periodo'); //$em->getRepository('administrativoBundle:Periodo')->findOneBy(array(
        //'estado' => 1
        //  ));

        $materia = $sesion->get('materia');
        $nivel = $sesion->get('nivel');
        //obtengo cedula del docente autenticado
        $cedula = $usuario->getCedula();
        //obtiene las materias del docente autenticado
        $materiasdocente = $em->getRepository('academicoBundle:Dictadomateria')->getMateriasDocente($cedula, $periodo->getId());
         
        if (!$periodo) {
            //mensaje
            $this->get('session')->getFlashBag()->add('Info', 'Periodo no encontrado');

            //codigo para hacer que retorne a la pagina principal del usuario autenticado

            $rol = strtolower($usuario->getRol());
            return $this->redirect($this->generateUrl('portada', array('role' => $rol)));
        }
     
        //obtiene lista de todos los niveles
        $niveles = $em->getRepository('academicoBundle:Matricula')->getTodosNiveles();
        $mes = $em->getRepository('administrativoBundle:MesEvaluacion')->findBy(array(
            'estado' => true
                ));
        $estudiantes = $em->getRepository('academicoBundle:Estudiante')->findEstudiantexActaGeneral($materia, $nivel);        
        $mesconteo = $em->getRepository('academicoBundle:Estudiante')->getMesEvaluacionxPeriodoxActivo($periodo->getId());
   
        //estudiantes
        $paginatorSS = $this->get('knp_paginator');
        $paginationSS = $paginatorSS->paginate(
                $estudiantes, $this->getRequest()->query->get('page', 1), 10
        );
        
         $listamesesEv = $em->getRepository('administrativoBundle:MesEvaluacion')->findAll();
       
        
        $sd=0; 
        
        if($estudiantes){
            $sd=1;
        }
               
        return $this->render('academicoBundle:default:actageneralcalificaciones.html.twig', array(
                    'periodo' => $periodo,
                    'niveles' => $niveles,
                    'nivel'=> $nivel,
                    'materia'=>$materia,  
                    'listamaterias'=>$materiasdocente,    
                    'listames'=>$mes,
                    'estudiantes'=>$paginationSS,
                    'materia'=>$materia,    
                    'sd'=>$sd,
                    'mesconteo' => $mesconteo,
                    'mesevac' => $listamesesEv
                ));
    }
    
    
}
