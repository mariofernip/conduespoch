<?php

namespace Acad\academicoBundle\Controller;

use Acad\academicoBundle\Entity\Asistencia;
use Acad\academicoBundle\Entity\CumpleRequisito;
use Acad\academicoBundle\Entity\Dictadomateria;
use Acad\academicoBundle\Entity\Estudiante;
use Acad\academicoBundle\Entity\Evaluacion;
use Acad\academicoBundle\Entity\Inscripcion;
use Acad\academicoBundle\Entity\MateriaAsignada;
use Acad\academicoBundle\Entity\Matricula;
use Acad\academicoBundle\Entity\RequisitoEstudiante;
use Acad\academicoBundle\Form\AsistenciaType;
use Acad\academicoBundle\Form\DictadomateriaType;
use Acad\academicoBundle\Form\EstudianteType;
use Acad\academicoBundle\Form\EvaluacionType;
use Acad\academicoBundle\Form\MatriculaAntiguosType;
use Acad\academicoBundle\Form\MatriculaType;
use Acad\academicoBundle\Form\RequisitoEstudianteType;
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

        $formulario = $this->createForm(new MatriculaType(), $matricula);
        $formulario->handleRequest($peticion);

        $estudiante = $em->getRepository('academicoBundle:Estudiante')->findOneBy(array(
            'cedula' => $cedula
                ));

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
            
             foreach ($matasi as $matasi1) {
                $asistencia = new Asistencia();
                $asistencia->setMateriaasiganda($matasi1);
                $em->persist($asistencia);
                $em->flush();
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

    public function notasAction($materia, $nivel) {

        $peticion = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();
        //obtengo el objeto autenticado: en este caso el docente
        $usuario = $this->get('security.context')->getToken()->getUser();
        //consulto periodo actual
        $periodo = $em->getRepository('administrativoBundle:Periodo')->findOneBy(array(
            'estado' => 1
                ));
        //obtengo cedula del docente autenticado
        $cedula = $usuario->getCedula();
        //obtiene las materias del docente autenticado
        $materiasdocente = $em->getRepository('academicoBundle:Dictadomateria')->getMateriasDocente($cedula, $periodo->getId());
        //obtiene los estudiante que reciben una materia en un nivel de la seccion diruna
        $estudiantesxmateriaSD = $em->getRepository('academicoBundle:Dictadomateria')->getEstudiantesxMateriaSD($materia, $periodo->getId(), $nivel);
        //obtiene los estudiante que reciben una materia en un nivel de la seccion vespertina
        $estudiantesxmateriaSV = $em->getRepository('academicoBundle:Dictadomateria')->getEstudiantesxMateriaSV($materia, $periodo->getId(), $nivel);
        //obtiene los estudiante que reciben una materia en un nivel de la seccion nocturna
        $estudiantesxmateriaSN = $em->getRepository('academicoBundle:Dictadomateria')->getEstudiantesxMateriaSN($materia, $periodo->getId(), $nivel);
        $evaluacionestudiantesxmateria = $em->getRepository('academicoBundle:Dictadomateria')->getEvaluacionEstudiantesxMateria($materia, $periodo->getId(), $nivel);

        $evaluacion = new Evaluacion();
        $formulario = $this->createForm(new EvaluacionType(), $evaluacion);

        $formulario->handleRequest($peticion);
        $mat = $em->getRepository('administrativoBundle:Materia')->find($materia);
        $niv = $em->getRepository('administrativoBundle:Nivel')->find($nivel);


        //PAGINACION
        //seccion diurna
        $paginatorSD = $this->get('knp_paginator');
        $paginationSD = $paginatorSD->paginate(
                $estudiantesxmateriaSD, $this->getRequest()->query->get('page', 1), 10
        );

        //seccion vespertina
        $paginatorSV = $this->get('knp_paginator');
        $paginationSV = $paginatorSV->paginate(
                $estudiantesxmateriaSV, $this->getRequest()->query->get('page', 1), 10
        );

        //seccion nocturna
        $paginatorSN = $this->get('knp_paginator');
        $paginationSN = $paginatorSN->paginate(
                $estudiantesxmateriaSN, $this->getRequest()->query->get('page', 1), 10
        );
        $sd = 0;
        $sv = 0;
        $sn = 0;
        if ($estudiantesxmateriaSD) {
            $sd = 1;
        }
        if ($estudiantesxmateriaSV) {
            $sv = 1;
        }
        if ($estudiantesxmateriaSN) {
            $sn = 1;
        }





        //creo la vista
        return $this->render('academicoBundle:default:notasdocente.html.twig', array(
                    'periodo' => $periodo,
                    'materiasdoc' => $materiasdocente,
                    'estudiantes' => $estudiantesxmateriaSD,
                    'evaest' => $evaluacionestudiantesxmateria,
                    'mat' => $mat,
                    'niv' => $niv,
                    'codmat' => $materia,
                    'codniv' => $nivel,
                    'paginationSD' => $paginationSD,
                    'paginationSV' => $paginationSV,
                    'paginationSN' => $paginationSN,
                    'sd' => $sd,
                    'sv' => $sv,
                    'sn' => $sn,
                    'formulario' => $formulario->createView()
                ));
    }

    public function evaluacionAction() {

        $peticion = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();
        //obtengo el objeto autenticado: en este caso el docente
        $usuario = $this->get('security.context')->getToken()->getUser();
        //consulto periodo actual
        $periodo = $em->getRepository('administrativoBundle:Periodo')->findOneBy(array(
            'estado' => 1
                ));
        //obtengo cedula del docente autenticado
        $cedula = $usuario->getCedula();
        //obtiene las materias del docente autenticado
        $materiasdocente = $em->getRepository('academicoBundle:Dictadomateria')->getMateriasDocente($cedula, $periodo->getId());
        //obtiene los estudiante que reciben una materia en un nivel
        //$estudiantesxmateria = $em->getRepository('AcadacademicoBundle:Dictadomateria')->getEstudiantesxMateria($materia, $periodo->getId(), $nivel);
        $codigo = $this->getRequest()->get('codigo');
        $materiaasig = $em->getRepository('academicoBundle:MateriaAsignada')->find($codigo);

        $evaluacion = new Evaluacion();
        $formulario = $this->createForm(new EvaluacionType(), $evaluacion);

        $formulario->handleRequest($peticion);
        if (!$materiaasig) {
            return $this->redirect($this->generateUrl('portada', array('role' => 'docente')));
        }
        $evaluacion->setMateriaasignada($materiaasig);


        $url = explode("?", $_SERVER['HTTP_REFERER']);
        $redir = $url[0];

        if ($formulario->isValid()) {
            $codmes = $formulario->getData()->getMesEvaluacion();
            $codtiponota = $formulario->getData()->getTipoNota();
            $matasi = $em->getRepository('academicoBundle:Dictadomateria')->getEvaluacionExistente($codigo, $codmes->getId(), $codtiponota->getId());
            if (!$matasi) {
                $evaluacion->setMateriaasignada($materiaasig);
                $em->persist($evaluacion);
                $em->flush();

                //mensaje
                $this->get('session')->getFlashBag()->add('Info', 'Nota guardada');
                //redirecciono a la pagina anterior
                return $this->redirect($redir);
            } else {

                //mensaje
                $this->get('session')->getFlashBag()->add('Info', 'Nota previamente ingresada');
                //redirecciono a la pagina anterior
                return $this->redirect($redir);
            }
        } else {

            $this->get('session')->getFlashBag()->add('Info', 'Nota no válida');
            //redirecciono a la pagina anterior
            return $this->redirect($redir);
        }

        //creo la vista
        return $this->render('academicoBundle:default:evaluacion.html.twig', array(
                    'periodo' => $periodo,
                    'materiasdoc' => $materiasdocente,
                    'datos' => $materiaasig,
                    'codigo' => $codigo,
                    'formulario' => $formulario->createView()
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

       $em = $this->getDoctrine()->getEntityManager();
       $listamaterias = $em->getRepository('academicoBundle:Estudiante')->getMateriasxNivel($nivel);
        $periodo = $em->getRepository('administrativoBundle:Periodo')->getPeriodoActual();
        
        $codigo= $this->getRequest()->get('codigo');
        
        $asistencia= $em->getRepository('academicoBundle:Asistencia')->findOneBy(array('id' => $codigo));
        
        $form = $this->createForm( new AsistenciaType(), $asistencia);
        $request = $this->getRequest();
        
        if ( $request->getMethod() == 'POST' ) {
        $form->bind( $request );
        
        if ( $form->isValid() ) {
            $em->persist( $asistencia );
            $em->flush();
            $this->get('session')->getFlashBag()->add('Info', 'Asistencia Actualizada');
            }
        }
        
        if (!$periodo) {
            //mensaje
            $this->get('session')->getFlashBag()->add('Info', 'Periodo no encontrado');

            //codigo para hacer que retorne a la pagina principal del usuario autenticado
            $usuario = $this->get('security.context')->getToken()->getUser();
            $rol = strtolower($usuario->getRol());
            return $this->redirect($this->generateUrl('portada', array('role' => $rol)));
        }

        //obtiene lista de estudiantes matriculados de seccion: diurna
        $diurna = $em->getRepository('academicoBundle:Estudiante')->findEstudiantexMateriaxSeccionDiurna($materias, $nivel);      
        //obtiene lista de estudiantes matriculados de seccion: nocturna
        $nocturna = $em->getRepository('academicoBundle:Estudiante')->findEstudiantexMateriaxSeccionNocturna($materias, $nivel);
        //obtiene lista de estudiantes matriculados de seccion: vespertina
        $vespertina = $em->getRepository('academicoBundle:Estudiante')->findEstudiantexMateriaxSeccionVespertina($materias, $nivel);
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
        return $this->render('academicoBundle:default:listaestudiantesmatriculadosasistecia.html.twig', array(
                    'periodo' => $periodo,
                    'niveles' => $niveles,
                    'diurna' => $paginationSD,
                    'nocturna' => $paginationSN,
                    'vespertina' => $paginationSV,
                    'curso' => $curso,
                    'sd'=>$sd,
                    'sv'=>$sv,
                    'sn'=>$sn,
                    'materias'=>$materias,
                    'listamaterias'=>$listamaterias,
                    'form'=>$form->createView()
                    
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
    
    
    public function listamateriasxdocenteAction() {

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



        return $this->render('academicoBundle:default:listamateriasxdocente.html.twig', array(
                    'periodo' => $periodo,
                    'materiasdoc' => $materiasdocente
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
    
    
    
}
