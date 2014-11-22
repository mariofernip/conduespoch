<?php

namespace Acad\seguridadBundle\Controller;

use Acad\seguridadBundle\Entity\Usuario;
use Acad\administrativoBundle\Entity\Docente;
use Acad\seguridadBundle\Form\UsuarioType;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\SecurityContext;

class DefaultController extends Controller {

    public function indexAction($name) {
        return $this->render('seguridadBundle:Default:index.html.twig', array('name' => $name));
    }

    public function loginAction() {
        $periodo = '';

        $peticion = $this->getRequest();

        $sesion = $peticion->getSession();

        //obtiene el valor del último error producido relacionado con la seguridad
        $error = $peticion->attributes->get(
                SecurityContext::AUTHENTICATION_ERROR, $sesion->get(SecurityContext::AUTHENTICATION_ERROR)
        );


        return $this->render('seguridadBundle:Default:login.html.twig', array(
                    'last_username' => $sesion->get(SecurityContext::LAST_USERNAME), //contiene el valor del último nombre de usuario utilizado para intentar hacer login.
                    'error' => $error,
                    'periodo' => $periodo
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
            $em->getConnection()->beginTransaction(); // suspend auto-commit
            try {

                $rol = $formulario->getData()->getRol();

                $nombre = $formulario->getData()->getNombre();
                $apellidos = $formulario->getData()->getApellidos();
                $email = $formulario->getData()->getEmail();
                $cedula = $formulario->getData()->getCedula();
                $estado = $formulario->getData()->getEstado();
                $direccion = 'Dir. pendiente';

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

                if ($rol == 'DOCENTE') {
                    $docente = new Docente();
                    $encoder = $this->get('security.encoder_factory')->getEncoder($usuario);
                    $docente->setSalt($usuario->getSalt());
                    // $passwordCodificado = $encoder->encodePassword($usuario->getPassword(), $usuario->getSalt());
                    $docente->setPassword($passwordCodificado);
                    $docente->setNombre($nombre);
                    $docente->setApellido($apellidos);
                    $docente->setEmail($email);
                    $docente->setDireccion($direccion);
                    $docente->setCedula($cedula);
                    $docente->setFechaingreso(new \DateTime('now'));
                    $docente->setEstado($estado);
                    $em->persist($docente);
                    $em->flush();
                }
                $em->getConnection()->commit();
            } catch (\Exception $e) {
                $em->getConnection()->rollback();
                $this->get('session')->getFlashBag()->add('Info', 'Transacción no se hizo verifique la red o los valores que esta ingresando');
                $url = explode("?", $_SERVER['HTTP_REFERER']);
                $redir = $url[0];

                return $this->redirect($redir);
            }

            $this->get('session')->getFlashBag()->add('Info', '¡Enhorabuena! Usuario registrado');
            $usuario = $this->get('security.context')->getToken()->getUser();   
            $role = strtolower($usuario->getRol());
            //return $this->redirect($this->generateUrl('portada', array('role' => $role)));
            return $this->redirect($this->generateUrl('usuario_registro'));
            
            
        }

        $periodo = '';
        return $this->render('seguridadBundle:Default:registro.html.twig', array(
                    'periodo' => $periodo,
                    'formulario' => $formulario->createView()
                ));
    }

    public function portadaAction($role) {

        $em = $this->getDoctrine()->getEntityManager();
        $usuario = $this->get('security.context')->getToken()->getUser();

        $periodo = $em->getRepository('administrativoBundle:Periodo')->getPeriodoActual();
        $mes = $em->getRepository('administrativoBundle:MesEvaluacion')->findBy(array(
            'estado' => true
                ));
        $subperiodo = $em->getRepository('administrativoBundle:Periodo')->getnumeroMateriasSubperiodo($periodo);
        
        
        if ($usuario->getEstado() == true) {


            $sesion = new Session();
            $sesion->set('periodo', $periodo);
            if ($role == 'docente') {
                if ($subperiodo < 2 or $subperiodo >2) {
                    $this->get('session')->getFlashBag()->add('Info', 'URGENTE!!! Contacte al administrador del sitio las posibles fallas pueden ser que existen mas de 2 Sub Periodos activos o menos de 2 Sub periodos');
                    return $this->render('academicoBundle:Default:portada_docente_sinmaterias.html.twig', array(
                                'periodo' => $periodo,));
                }
                $listameses = $em->getRepository('administrativoBundle:MesEvaluacion')->findAll();
                $materiasdocente2 = $em->getRepository('academicoBundle:Dictadomateria')->getMateriasDocente($usuario->getCedula(), $periodo->getId());
                $materiasdocente = $em->getRepository('academicoBundle:Dictadomateria')->getMateriasDocenteSubPeriodo($usuario->getCedula(), $periodo->getId());
                $x = 1;
                $y=1;
                if (!$materiasdocente) {
                    return $this->render('academicoBundle:Default:portada_docente_sinmaterias.html.twig', array(
                                'periodo' => $periodo,));
                } else {
                    foreach ($materiasdocente as $matd) {
                        for ($index = 0; $index < $x; $index++) {
                            $codn = $matd->getNivel();
                            $nivel = $em->getRepository('administrativoBundle:Nivel')->find($codn);
                            $codm = $matd->getMateriaPeriodo()->getMateria();
                            $materia = $em->getRepository('administrativoBundle:Materia')->find($codm);
                            $sesion->set('nivel', $matd->getNivel());
                            $sesion->set('materia', $matd->getMateriaPeriodo()->getMateria());
                        }
                    }
                }
                if (!$materiasdocente2) {
                    return $this->render('academicoBundle:Default:portada_docente_sinmaterias.html.twig', array(
                                'periodo' => $periodo,));
                } else {
                    foreach ($materiasdocente2 as $matd) {
                        for ($index = 0; $index < $x; $index++) {
                            $codn = $matd->getNivel();
                            $nivel2 = $em->getRepository('administrativoBundle:Nivel')->find($codn);
                            $codm = $matd->getMateriaPeriodo()->getMateria();
                            $materia2 = $em->getRepository('administrativoBundle:Materia')->find($codm);
                            $sesion->set('nivel2', $matd->getNivel());
                            $sesion->set('materia2', $matd->getMateriaPeriodo()->getMateria());
                        }
                    }
                }
                return $this->render('academicoBundle:Default:portada_' . $role . '.html.twig', array(
                            'periodo' => $periodo,
                            'listames' => $mes,
                            'mesevac' => $listameses,
                            'lmd' => $materiasdocente,
                            'nivel' => $nivel,
                            'materia' => $materia,
                            'nivel2' => $nivel2,
                            'materia2' => $materia2
                        ));
            }
            $niveles = $em->getRepository('academicoBundle:Matricula')->getTodosNiveles();
            $listamaterias = $em->getRepository('academicoBundle:Estudiante')->getMaterias();
            if ($role == 'secretaria') {
                if (!$periodo) {
                    $this->get('session')->getFlashBag()->add('Info', 'URGENTE!!! Contacte al administrador no existe Periodo actual');
                    return $this->render('academicoBundle:Default:portada_docente_sinmaterias.html.twig', array(
                                'periodo' => ' ',));
                }
                $sp2= $em->getRepository('administrativoBundle:SubPeriodo')->findBy(array(
                    'periodo'=>$periodo,
                    'tipo'=>'2',
                    'estado'=>true
                ));
                $control=0;                
                $control2=0;
                if($sp2){
                    $control2=1;
                    $sp1= $em->getRepository('administrativoBundle:SubPeriodo')->findBy(array(
                        'periodo'=>$periodo,
                        'tipo'=>'1',
                        'estado'=>true
                    ));
                    if($sp1){
                        //debe salir mensaje para desactivar subperiodo1 = cuatrimestre 
                        $control=1;
                    }else{
                        $spmateria= $em->getRepository('administrativoBundle:Periodo')->getSubperiodoActivo($periodo->getId());
                        if($spmateria){
                            //ya se han matricularon a los estudiantes para segundo subperiodo
                            //aparece la portada normalmente
                            $control=2;
                        }else{
                            //se debe activar el boton
                            $control=3;
                        }
                    }
                    
                }
                $nsubperiodos= $em->getRepository('administrativoBundle:SubPeriodo')->findBy(array(
                    'estado'=>true
                ));
                //numero de estudiantes x niveles
                $est= $em->getRepository('academicoBundle:Matricula')->getEstudiantesxNivel($periodo->getId());
                //inscritos
                $estIA = $em->getRepository('academicoBundle:Inscripcion')->findBy(array(
                    'periodo' => $periodo,
                    'estado' => true
                        ));
                $estII = $em->getRepository('academicoBundle:Inscripcion')->findBy(array(
                    'periodo' => $periodo,
                    'estado' => false
                        ));
                $estIT = $em->getRepository('academicoBundle:Inscripcion')->findBy(array(
                    'periodo' => $periodo,
                        ));
                //matriculados
                $estMA = $em->getRepository('academicoBundle:Matricula')->findBy(array(
                    'periodo' => $periodo,
                    'estado' => true
                        ));
                $estMI = $em->getRepository('academicoBundle:Matricula')->findBy(array(
                    'periodo' => $periodo,
                    'estado' => false
                        ));
                $estMT = $em->getRepository('academicoBundle:Matricula')->findBy(array(
                    'periodo' => $periodo,
                        ));
                $lista = $em->getRepository('administrativoBundle:Nivel')->findAll();
                return $this->render('academicoBundle:Default:portada_' . $role . '.html.twig', array(
                            'periodo' => $periodo,
                            'estIA' => $estIA,
                            'estII' => $estII,
                            'estIT' => $estIT,
                            'estMA' => $estMA,
                            'estMI' => $estMI,
                            'estMT' => $estMT,
                            'lista' => $lista,
                            'estudiantes'=>$est,
                            'niveles'=>$niveles,
                            'control'=>$control,
                            'control2'=>$control2,
                            'nsubperiodos'=>$nsubperiodos
                        ));
            }

            if ($role == 'inspector') {
                if ($subperiodo < 2 or $subperiodo >2) {
                    $this->get('session')->getFlashBag()->add('Info', 'URGENTE!!! Contacte al administrador Sub Periodos no corresponden');
                    return $this->render('academicoBundle:Default:portada_docente_sinmaterias.html.twig', array(
                                'periodo' => $periodo,));
                }
                $listadocentes = $em->getRepository('administrativoBundle:Docente')->findBy(array(
                    'estado' => true
                        ));
                $listamateriasgrado = $em->getRepository('administrativoBundle:MateriaGrado')->findBy(array(
                    'estado' => true
                        ));
                $codmg = 0;
                if ($listamateriasgrado) {
                    $codmg = 1;
                }
                return $this->render('academicoBundle:Default:portada_' . $role . '.html.twig', array(
                            'periodo' => $periodo,
                            'niveles' => $niveles,
                            'listamaterias' => $listamaterias,
                            'docentes' => $listadocentes,
                            'materiagrado' => $listamateriasgrado,
                            'codmg' => $codmg
                        ));
            }



            if ($role == 'pedagogico') {

                return $this->render('academicoBundle:Default:portada_' . $role . '.html.twig', array(
                            'periodo' => $periodo
                        ));
            }
            if ($role == 'admin') {


                return $this->redirect($this->generateUrl('admin_portada'));
            }
        } else {
            $this->get('session')->getFlashBag()->add('Info', 'Usuario no activo'
            );

            return $this->redirect($this->generateUrl('usuario_logout'));
        }
    }

}
