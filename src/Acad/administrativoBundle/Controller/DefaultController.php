<?php

namespace Acad\administrativoBundle\Controller;

use Acad\academicoBundle\Entity\MateriaPeriodo;
use Acad\academicoBundle\Form\MateriaPeriodoType;
use Acad\administrativoBundle\Entity\Area;
use Acad\administrativoBundle\Entity\AuxMes;
use Acad\administrativoBundle\Entity\AuxRequisito;
use Acad\administrativoBundle\Entity\Curso;
use Acad\administrativoBundle\Entity\Dia;
use Acad\administrativoBundle\Entity\Docente;
use Acad\administrativoBundle\Entity\EvaluacionxMes;
use Acad\administrativoBundle\Entity\Hora;
use Acad\administrativoBundle\Entity\Materia;
use Acad\administrativoBundle\Entity\MateriaAdministrador;
use Acad\administrativoBundle\Entity\MateriaGrado;
use Acad\administrativoBundle\Entity\Nota;
use Acad\administrativoBundle\Entity\MesEvaluacion;
use Acad\administrativoBundle\Entity\Nivel;
use Acad\administrativoBundle\Entity\Paralelo;
use Acad\administrativoBundle\Entity\Periodo;
use Acad\administrativoBundle\Entity\Requisito;
use Acad\administrativoBundle\Entity\SubPeriodo;
use Acad\administrativoBundle\Form\AdministradorMateriaType;
use Acad\administrativoBundle\Form\AreaType;
use Acad\administrativoBundle\Form\AuxMesType;
use Acad\administrativoBundle\Form\AuxRequisitoType;
use Acad\administrativoBundle\Form\CursoType;
use Acad\administrativoBundle\Form\DiaType;
use Acad\administrativoBundle\Form\DocenteType;
use Acad\administrativoBundle\Form\EvaluacionxMesType;
use Acad\administrativoBundle\Form\HoraType;
use Acad\administrativoBundle\Form\MateriaGradoType;
use Acad\administrativoBundle\Form\MateriaType;
use Acad\administrativoBundle\Form\MesType;
use Acad\administrativoBundle\Form\NivelType;
use Acad\administrativoBundle\Form\ParaleloType;
use Acad\administrativoBundle\Form\PeriodoType;
use Acad\administrativoBundle\Form\RequisitoType;
use Acad\administrativoBundle\Form\SubPeriodoType;
use Acad\seguridadBundle\Form\ModificarUsuarioType;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;


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
    
    
     //METODO: lista los datos de las areas 
    public function listadocenteModificarAction() {

        $em = $this->getDoctrine()->getEntityManager();

        $periodo='';

        $listadocentes = $em->getRepository('administrativoBundle:Docente')->findBy(array("estado" => 1));
        
        if($listadocentes){
            $sd=1;
        }
        return $this->render('administrativoBundle:default:listadocentes.html.twig', array(                   
                    
                    'periodo' => $periodo,
                    'listadocentes'=>$listadocentes,
                    'sd'=>$sd
                ));
    }
    
    
     //METODO: modifica los datos de las areas
    public function docenteModificarAction($did) {

        $em = $this->getDoctrine()->getEntityManager();
        $peticion = $this->getRequest();

        $periodo='';
        $docente = $em->getRepository('administrativoBundle:Docente')->findOneBy(array(
            'id' => $did
                ));
        
        
        $formulario = $this->createForm(new DocenteType(), $docente);

        $formulario->handleRequest($peticion);

        if ($formulario->isValid()) {
            $em->persist($docente);
            $em->flush();

            $this->get('session')->getFlashBag()->add('Info', 'Datos actualizados');


            return $this->redirect($this->generateUrl('admin_portada'));
        }

        
        return $this->render('administrativoBundle:default:modificardocente.html.twig', array(                   
                    'id' => $did,
                    'periodo' => $periodo,                    
                    'formulario' => $formulario->createView()
                ));
    }
        
    
    public function registroperiodoAction() {

        $peticion = $this->getRequest();

        $em = $this->getDoctrine()->getEntityManager();
        $pe= $em->getRepository('administrativoBundle:Periodo')->findBy(array(
            'estado'=>true
            ));
        if($pe){
            $this->get('session')->getFlashBag()->add('Info', 'Error: Ya existe un periodo activo'
            );

            return $this->redirect($this->generateUrl('periodo_modificar'));
        }
        $periodo = new Periodo();

        $formulario = $this->createForm(new PeriodoType(), $periodo);
        $formulario->handleRequest($peticion);



        if ($formulario->isValid()) {
            //$periodo->setEstado(true);
            $periodo->setFinicioperiodo(new \DateTime('now'));
            $periodo->setFfinperiodo(new \DateTime('now'));
            $em->persist($periodo);
            $em->flush();
            $sesion= new Session();
            $sesion->set('periodoA', $periodo);
            

            $this->get('session')->getFlashBag()->add('Info', 'Periodo agregado correctamente'
            );
            $this->get('session')->getFlashBag()->add('Info', 'Active los meses del nuevo periodo'
            );
            return $this->redirect($this->generateUrl('admin_mes_modificar_todos'));
            //return $this->redirect($this->generateUrl('mes_evaluacion', array('pid' => $periodo->getId())));
        }


        return $this->render('administrativoBundle:default:registroperiodo.html.twig', array(
                    'periodo' => $periodo,
                    'formulario' => $formulario->createView()
                ));
    }
    
    //metodo para poner los rangos de fechas de la tabla MesEvaluacion
    
    
    public function mesevaluacionAction() {

        $em = $this->getDoctrine()->getEntityManager();

        $peticion = $this->getRequest();

        $periodo = $em->getRepository('administrativoBundle:Periodo')->getPeriodoActual();
        
        if(!$periodo){
            $this->get('session')->getFlashBag()->add('Info', 'No existe un periodo activo');
            return $this->redirect($this->generateUrl('admin_portada'));
        }
        //creo un objeto mesevaluacion para poder crear el formulario
        $evaluacionxmes= new EvaluacionxMes();

        //consulto los objetos mesevaluacion con su estado activo, de un determinado periodo 
        $mesevaluacion = $em->getRepository('administrativoBundle:Nota')->getMesEvaluacionxPeriodo($periodo->getId());

        //recorro lista de objetos: cumplerequisito
        foreach ($mesevaluacion as $req) {
            
            
            $cr = new MesEvaluacion(); //creo un objeto nuevo: mesevaluacion
            //obtengo los datos de cada objeto cumplerequisito
            $cr->setId($req->getId());
            $cr->setEstado($req->getEstado());
            $cr->setFiniciomes($req->getFiniciomes());
            $cr->setFfinmes($req->getFfinmes());
            $cr->setNota($req->getNota());
            //lleno el objto tarea con varios objetos cumplerequisito
            $evaluacionxmes->getEvaMes()->add($cr);
        }

        $form = $this->createForm(new EvaluacionxMesType(), $evaluacionxmes);

        $form->handleRequest($peticion);
        if ($form->isValid()) {

            foreach ($evaluacionxmes->getEvaMes() as $req) {// recorro lista de objetos: cumplerequisito
                $cod = $req->getId(); // ontengo el id de cada objeto
                $est = $req->getEstado(); // obtengo el estado de cada objto
                $fi=$req->getFiniciomes();
                $ff=$req->getFfinmes();
                $cr = $em->getRepository('administrativoBundle:MesEvaluacion')->find($cod); //consulto el objeto cumplerequisito
                $cr->setEstado($est); //actualizo el estado del objeto previamente encontrado
                $cr->setFiniciomes($fi);
                $cr->setFfinmes($ff);
                $em->flush(); // envio a guardar/actualizar el estado de cada objeto
            }
                $this->get('session')->getFlashBag()->add('Info', 'Fechas actualizadas');
                return $this->redirect($this->generateUrl('mes_evaluacion'));
        }
        
        return $this->render('administrativoBundle:Default:evaluacionxmes.html.twig', array(
                    'codigo'=>$periodo->getId(),
                    'requisitos' => $mesevaluacion,
                     'periodo'=>$periodo,
                    'form' => $form->createView()
                ));
    }
    
    public function portadaAction() {
        $periodo='';
        
        return $this->render('administrativoBundle:Default:portada_admin.html.twig',array(
            'periodo'=>$periodo,             
        
        ));
        
        
    }
    
    
    public function areaIngresarAction(){
        
        $periodo=''; 
        
        $peticion = $this->getRequest();
        $em = $this->getDoctrine()->getManager();

        $area = new Area();

        $formulario = $this->createForm(new AreaType(), $area);

        $formulario->handleRequest($peticion);
        
        if ($formulario->isValid()) {

            //inserta nueva area               
            $em->persist($area);
            $em->flush();

            
            $this->get('session')->getFlashBag()->add('Info', 'Éxito! Area ingresada'
            );
            //llamo al la vista requisito estudiante
            return $this->redirect($this->generateUrl('admin_portada'));
        }
        
        return $this->render('administrativoBundle:Default:registroarea.html.twig', array(
                    'periodo' => $periodo,
                    'formulario' => $formulario->createView())
        );
    }
    
    //METODO: lista los datos de las areas 
    public function listaareaModificarAction() {

        $em = $this->getDoctrine()->getEntityManager();

        $periodo='';

        $listaareas = $em->getRepository('administrativoBundle:Area')->findAll();
        
 


        if($listaareas){
            $sd=1;
        }
        return $this->render('administrativoBundle:default:listaareas.html.twig', array(                   
                    
                    'periodo' => $periodo,
                    'listaareas'=>$listaareas,
                    'sd'=>$sd
                ));
    }
    
    
     //METODO: modifica los datos de las areas
    public function areaModificarAction($aid) {

        $em = $this->getDoctrine()->getEntityManager();
        $peticion = $this->getRequest();

        $periodo='';
        $area = $em->getRepository('administrativoBundle:Area')->findOneBy(array(
            'id' => $aid
                ));
        
        
        $formulario = $this->createForm(new AreaType(), $area);

        $formulario->handleRequest($peticion);

        if ($formulario->isValid()) {
            $em->persist($area);
            $em->flush();

            $this->get('session')->getFlashBag()->add('Info', 'Datos actualizados');


            return $this->redirect($this->generateUrl('admin_portada'));
        }

        
        return $this->render('administrativoBundle:default:modificararea.html.twig', array(                   
                    'id' => $aid,
                    'periodo' => $periodo,                    
                    'formulario' => $formulario->createView()
                ));
    }
    
    
    public function cursoIngresarAction(){
        
        $periodo=''; 
        
        $peticion = $this->getRequest();
        $em = $this->getDoctrine()->getManager();

        $curso = new Curso();

        $formulario = $this->createForm(new CursoType(), $curso);

        $formulario->handleRequest($peticion);
        
        if ($formulario->isValid()) {

            //inserta nueva area               
            $em->persist($curso);
            $em->flush();

            
            $this->get('session')->getFlashBag()->add('Info', 'Éxito! Curso ingresada'
            );
            //llamo al la vista requisito estudiante
            return $this->redirect($this->generateUrl('admin_portada'));
        }
        
        return $this->render('administrativoBundle:Default:registrocurso.html.twig', array(
                    'periodo' => $periodo,
                    'formulario' => $formulario->createView())
        );
    }
    
    //METODO: lista los datos de las areas 
    public function listacursoModificarAction() {

        $em = $this->getDoctrine()->getEntityManager();

        $periodo='';

        $listacursos = $em->getRepository('administrativoBundle:Curso')->findAll();
        
 


        if($listacursos){
            $sd=1;
        }
        return $this->render('administrativoBundle:default:listacursos.html.twig', array(                   
                    
                    'periodo' => $periodo,
                    'listacursos'=>$listacursos,
                    'sd'=>$sd
                ));
    }
    
    
     //METODO: modifica los datos de las areas
    public function cursoModificarAction($cid) {

        $em = $this->getDoctrine()->getEntityManager();
        $peticion = $this->getRequest();

        $periodo='';
        $curso = $em->getRepository('administrativoBundle:Curso')->findOneBy(array(
            'id' => $cid
                ));
        
        
        $formulario = $this->createForm(new CursoType(), $curso);

        $formulario->handleRequest($peticion);

        if ($formulario->isValid()) {
            $em->persist($curso);
            $em->flush();

            $this->get('session')->getFlashBag()->add('Info', 'Datos actualizados');


            return $this->redirect($this->generateUrl('admin_portada'));
        }
        
        return $this->render('administrativoBundle:default:modificarcurso.html.twig', array(                   
                    'id' => $cid,
                    'periodo' => $periodo,                    
                    'formulario' => $formulario->createView()
                ));
    }
    
    
     public function horaIngresarAction(){
        
        $periodo=''; 
        
        $peticion = $this->getRequest();
        $em = $this->getDoctrine()->getManager();

        $hora = new Hora();

        $formulario = $this->createForm(new HoraType(), $hora);

        $formulario->handleRequest($peticion);
        
        if ($formulario->isValid()) {

            //inserta nueva area               
            $em->persist($hora);
            $em->flush();

            
            $this->get('session')->getFlashBag()->add('Info', 'Éxito! Hora ingresada'
            );
            //llamo al la vista requisito estudiante
            return $this->redirect($this->generateUrl('admin_portada'));
        }
        
        return $this->render('administrativoBundle:Default:registrohora.html.twig', array(
                    'periodo' => $periodo,
                    'formulario' => $formulario->createView())
        );
    }
    
    //METODO: lista los datos de las horas
    public function listahoraModificarAction() {

        $em = $this->getDoctrine()->getEntityManager();

        $periodo='';

        $listahoras = $em->getRepository('administrativoBundle:Hora')->findAll();
        $sd=0;
        if($listahoras){
            $sd=1;
        }
        return $this->render('administrativoBundle:default:listahoras.html.twig', array(                   
                    
                    'periodo' => $periodo,
                    'listahoras'=>$listahoras,
                    'sd'=>$sd
                ));
    }
    
    
     //METODO: modifica los datos de las horas
    public function horaModificarAction($hid) {

        $em = $this->getDoctrine()->getEntityManager();
        $peticion = $this->getRequest();

        $periodo='';
        $hora = $em->getRepository('administrativoBundle:Hora')->findOneBy(array(
            'id' => $hid
                ));
        
        
        $formulario = $this->createForm(new HoraType(), $hora);

        $formulario->handleRequest($peticion);

        if ($formulario->isValid()) {
            $em->persist($hora);
            $em->flush();

            $this->get('session')->getFlashBag()->add('Info', 'Datos actualizados');


            return $this->redirect($this->generateUrl('admin_portada'));
        }
        
        return $this->render('administrativoBundle:default:modificarhora.html.twig', array(                   
                    'id' => $hid,
                    'periodo' => $periodo,                    
                    'formulario' => $formulario->createView()
                ));
    }
    
    
     public function materiaIngresarAction(){
        
        $periodo=''; 
        
        $peticion = $this->getRequest();
        $em = $this->getDoctrine()->getManager();

        $materia = new Materia();

        $formulario = $this->createForm(new MateriaType(), $materia);

        $formulario->handleRequest($peticion);
        
        if ($formulario->isValid()) {

            //inserta nueva area               
            $em->persist($materia);
            $em->flush();

            
            $this->get('session')->getFlashBag()->add('Info', 'Éxito! Materia ingresada'
            );
            //llamo al la vista requisito estudiante
            return $this->redirect($this->generateUrl('admin_portada'));
        }
        
        return $this->render('administrativoBundle:Default:registromateria.html.twig', array(
                    'periodo' => $periodo,
                    'formulario' => $formulario->createView())
        );
    }
    
    //METODO: lista los datos de las materias
    public function listamateriaModificarAction() {

        $em = $this->getDoctrine()->getEntityManager();

        $periodo='';

        $listamaterias = $em->getRepository('administrativoBundle:Materia')->findAll();
   
        if($listamaterias){
            $sd=1;
        }
        return $this->render('administrativoBundle:default:listamaterias.html.twig', array(                   
                    
                    'periodo' => $periodo,
                    'listamaterias'=>$listamaterias,
                    'sd'=>$sd
                ));
    }
    
    
     //METODO: modifica los datos de las materia
    public function materiaModificarAction($mid) {

        $em = $this->getDoctrine()->getEntityManager();
        $peticion = $this->getRequest();

        $periodo='';
        $materia = $em->getRepository('administrativoBundle:Materia')->findOneBy(array(
            'id' => $mid
                ));
        
        
        $formulario = $this->createForm(new MateriaType(), $materia);

        $formulario->handleRequest($peticion);

        if ($formulario->isValid()) {
            $em->persist($materia);
            $em->flush();

            $this->get('session')->getFlashBag()->add('Info', 'Datos actualizados');


            return $this->redirect($this->generateUrl('admin_portada'));
        }
        
        return $this->render('administrativoBundle:default:modificarmateria.html.twig', array(                   
                    'id' => $mid,
                    'periodo' => $periodo,                    
                    'formulario' => $formulario->createView()
                ));
    }
    
    //metodo: registrar un nuevo mes

    public function registromesAction() {

        $peticion = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();

        $mes = new Nota();
        $formulario = $this->createForm(new MesType(), $mes);
        $formulario->handleRequest($peticion);

        if ($formulario->isValid()) {
            $em->persist($mes);
            $em->flush();

            $this->get('session')->getFlashBag()->add('Info', 'Nota ingresado correctamente..!');
            return $this->redirect($this->generateUrl('admin_portada'));
        }
        $periodo = '';
        $listameses = $em->getRepository('administrativoBundle:Nota')->findAll();
        return $this->render('administrativoBundle:Default:mes_registro.html.twig', array(
                    'periodo' => $periodo,
                    'listam' => $listameses,
                    'formulario' => $formulario->createView()
                ));
    }

    //metodo: permite listar todos los meses previamente registrados
    public function listatodosmesesAction() {

        $em = $this->getDoctrine()->getEntityManager();

        $periodo = '';
        $listameses = $em->getRepository('administrativoBundle:Nota')->findAll();
        return $this->render('administrativoBundle:Default:mes_listatodos.html.twig', array(
                    'periodo' => $periodo,
                    'listam' => $listameses,
                ));
    }

    //metodo: permite modificar todos los meses previamente registrados
    public function mesmodicarAction($codmes) {

        $peticion = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();

        $mes = $em->getRepository('administrativoBundle:Nota')->find($codmes);
        $formulario = $this->createForm(new MesType(), $mes);
        $formulario->handleRequest($peticion);

        if ($formulario->isValid()) {

            $em->flush();

            $this->get('session')->getFlashBag()->add('Info', 'Nota actualizado');
            return $this->redirect($this->generateUrl('admin_mes_listar_todos'));
        }
        $periodo = '';
        $listameses = $em->getRepository('administrativoBundle:Nota')->findAll();
        return $this->render('administrativoBundle:Default:mes_modificar.html.twig', array(
                    'periodo' => $periodo,
                    'listam' => $listameses,
                    'codmes' => $codmes,
                    'formulario' => $formulario->createView()
                ));
    }

    //metodo: registrar un nuevo nivel    
    public function nivelregistroAction() {

        $peticion = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();

        $nivel = new Nivel();
        $formulario = $this->createForm(new NivelType(), $nivel);
        $formulario->handleRequest($peticion);

        if ($formulario->isValid()) {
            $em->persist($nivel);
            $em->flush();

            $this->get('session')->getFlashBag()->add('Info', 'Curso ingresado correctamente..!');
            return $this->redirect($this->generateUrl('admin_portada'));
        }
        $periodo = '';
        $listaniveles = $em->getRepository('administrativoBundle:Nivel')->findAll();
        return $this->render('administrativoBundle:Default:nivel_registro.html.twig', array(
                    'periodo' => $periodo,
                    'lista' => $listaniveles,
                    'formulario' => $formulario->createView()
                ));
    }

    //metodo: permite listar todos los niveles previamente registrados
    public function listatodosnivelesAction() {

        $em = $this->getDoctrine()->getEntityManager();

        $periodo = '';
        $listaniveles = $em->getRepository('administrativoBundle:Nivel')->findAll();
        return $this->render('administrativoBundle:Default:nivel_listatodos.html.twig', array(
                    'periodo' => $periodo,
                    'lista' => $listaniveles,
                ));
    }

    //metodo: permite modificar todos los niveles previamente registrados
    public function nivelmodicarAction($codnivel) {

        $peticion = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();

        $nivel = $em->getRepository('administrativoBundle:Nivel')->find($codnivel);
        $formulario = $this->createForm(new NivelType(), $nivel);
        $formulario->handleRequest($peticion);

        if ($formulario->isValid()) {
            $em->flush();
            $this->get('session')->getFlashBag()->add('Info', 'Curso actualizado');
            return $this->redirect($this->generateUrl('admin_nivel_listar_todos'));
        }
        $periodo = '';
        $listaniveles = $em->getRepository('administrativoBundle:Nivel')->findAll();
        return $this->render('administrativoBundle:Default:nivel_modificar.html.twig', array(
                    'periodo' => $periodo,
                    'lista' => $listaniveles,
                    'codnivel' => $codnivel,
                    'formulario' => $formulario->createView()
                ));
    }

    //metodo: registrar un nuevo nivel    
    public function requisitoregistroAction() {

        $peticion = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();

        $requisito = new Requisito();
        $formulario = $this->createForm(new RequisitoType(), $requisito);
        $formulario->handleRequest($peticion);

        if ($formulario->isValid()) {
            $em->persist($requisito);
            $em->flush();

            $this->get('session')->getFlashBag()->add('Info', 'Requisito ingresado correctamente..!');
            return $this->redirect($this->generateUrl('admin_requisito_registro'));
        }
        $periodo = '';
        $listarequisitos = $em->getRepository('administrativoBundle:Requisito')->findAll();
        return $this->render('administrativoBundle:Default:requisito_registro.html.twig', array(
                    'periodo' => $periodo,
                    'lista' => $listarequisitos,
                    'formulario' => $formulario->createView()
                ));
    }

    //metodo: permite listar todos los requisitos previamente registrados
    public function listatodosrequisitosAction() {

        $em = $this->getDoctrine()->getEntityManager();

        $periodo = '';
        $listarequisitos = $em->getRepository('administrativoBundle:Requisito')->findAll();
        return $this->render('administrativoBundle:Default:requisito_listatodos.html.twig', array(
                    'periodo' => $periodo,
                    'lista' => $listarequisitos,
                ));
    }

    //metodo: permite modificar todos los requisitos previamente registrados
    public function requisitomodicarAction($codreq) {

        $peticion = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();

        $requisito = $em->getRepository('administrativoBundle:Requisito')->find($codreq);
        $formulario = $this->createForm(new RequisitoType(), $requisito);
        $formulario->handleRequest($peticion);

        if ($formulario->isValid()) {
            $em->flush();
            $this->get('session')->getFlashBag()->add('Info', 'Requisito actualizado');
            return $this->redirect($this->generateUrl('admin_requisito_listar_todos'));
        }
        $periodo = '';
        $listarequisitos = $em->getRepository('administrativoBundle:Requisito')->findAll();
        return $this->render('administrativoBundle:Default:requisito_modificar.html.twig', array(
                    'periodo' => $periodo,
                    'lista' => $listarequisitos,
                    'codreq' => $codreq,
                    'formulario' => $formulario->createView()
                ));
    }

    public function requisitomodicarestadosAction() {
        $em = $this->getDoctrine()->getEntityManager();

        $peticion = $this->getRequest();

        //creo un objeto requisitoestudiante: el cual contiene la lista de cumplerequisito
        $auxrequisitos = new AuxRequisito();


        //consulto los requisitos con su esstado, de un determinado estudiante que fue previamente inscrito              
        $estadorequisitos = $em->getRepository('administrativoBundle:Requisito')->findAll();

        //recorro lista de objetos: cumplerequisito
        foreach ($estadorequisitos as $req) {
            //obtendo el id de la inscripcion            
            $cr = new Requisito();
            //obtengo los datos de cada objeto cumplerequisito
            $cr->setId($req->getId());
            $cr->setEstado($req->getEstado());
            $cr->setDescripcion($req->getDescripcion());
            //lleno el objto tarea con varios objetos cumplerequisito
            $auxrequisitos->getEstReq()->add($cr);
        }


        $form = $this->createForm(new AuxRequisitoType(), $auxrequisitos);

        $form->handleRequest($peticion);
        if ($form->isValid()) {

            foreach ($auxrequisitos->getEstReq() as $req) {// recorro lista de objetos: cumplerequisito
                $cod = $req->getId(); // ontengo el id de cada objeto
                $est = $req->getEstado(); // obtengo el estado de cada objto
                $ne = $req->getDescripcion();
                $cr = $em->getRepository('administrativoBundle:Requisito')->find($cod); //consulto el objeto cumplerequisito
                $cr->setEstado($est); //actualizo el estado del objeto previamente encontrado
                $cr->setDescripcion($ne);

                $em->flush(); // envio a guardar/actualizar el estado de cada objeto
            }


            return $this->redirect($this->generateUrl('admin_portada'));
        }
        $periodo = '';
        return $this->render('administrativoBundle:Default:requisito_estado.html.twig', array(
                    'periodo' => $periodo,
                    'form' => $form->createView()
                ));
    }
    
    
      //METODO: modifica los datos de las materia
    public function materiaModificartodosAction() {

        $em = $this->getDoctrine()->getEntityManager();        
        $request = $this->getRequest();
        $periodo='';
        
        
        $materias = $em->getRepository('administrativoBundle:Materia')->findAll();      
        //obtiene la materia actual
        
        //secciones
        $paginatorSS = $this->get('knp_paginator');
        $paginationSS = $paginatorSS->paginate(
                $materias, $this->getRequest()->query->get('page', 1), 10
        );
        
        $sd=0; 
        
        if($materias){
            $sd=1;
        }
        $itemmaterias = new MateriaAdministrador();
        
        foreach ($materias as $mat) {
            $cr = new Materia(); //creo un objeto nuevo: asistencia
            $cr->setId($mat->getId());
            $cr->setNombre($mat->getNombre());
            $cr->setEstado($mat->getEstado());
            $cr->setNumerocreditos($mat->getNumerocreditos());
            $cr->setNumerohoras($mat->getNumerohoras());
            
            //lleno el objto tarea con varios objetos asistencia
            $itemmaterias->getMateriaAdmin()->add($cr);
        }
        
        $formmaterias = $this->createForm(new AdministradorMateriaType(), $itemmaterias);
        
        $formmaterias->handleRequest($request);
          
             if ( $formmaterias->isValid() ) {     
            
                foreach ($itemmaterias->getMateriaAdmin() as $item) {
                    $cod= $item->getId();
                    $fi=$item->getNombre();
                    $a=$item->getEstado();
                    $ob=$item->getNumerocreditos();
                    $nh=$item->getNumerohoras();
                    $cr= $em->getRepository('administrativoBundle:Materia')->find($cod);                    
                    $cr->setNumerohoras($nh);                    
                    $cr->setNombre($fi);
                    $cr->setEstado($a);
                    $cr->setNumerocreditos($ob);                    
                    $em->flush();
                }         
                $this->get('session')->getFlashBag()->add('Info', 'Materias han sido actualizada');
               
                return $this->redirect($this->generateUrl('admin_portada'));
      

            }
        
        return $this->render('administrativoBundle:default:listamateriasmodificar.html.twig', array(
                    'periodo' => $periodo,
                    'materias' => $paginationSS,            
                    'formmaterias'=>$formmaterias->createView(),                       
                    'sd'=>$sd,
            
                ));
    
        
    }
   
    
    public function periodomodificarAction() {
        
        $em = $this->getDoctrine()->getEntityManager();
        $peticion= $this->getRequest();
        
        $periodo= $em->getRepository('administrativoBundle:Periodo')->getPeriodoActual();
        if(!$periodo){
            $this->get('session')->getFlashBag()->add('Info', 'Error: Ningún periodo activo');
            return $this->redirect($this->generateUrl('admin_portada'));
        }
        
        $formulario= $this->createForm(new PeriodoType(), $periodo);
        $formulario->handleRequest($peticion);
        
        if($formulario->isValid()){
            $em->persist($periodo);
            $em->flush();
            $this->get('session')->getFlashBag()->add('Info', 'Periodo actualizado');
            return $this->redirect($this->generateUrl('periodo_modificar'));
        }
        
        
        return $this->render('administrativoBundle:Default:periodo_modificar.html.twig', array(
                    'periodo' => $periodo,
                    'formulario' => $formulario->createView()
                ));
    }

    //modificar el estado de todos los meses
    
    public function mesmodicartodosAction() {
        $em = $this->getDoctrine()->getEntityManager();

        $peticion = $this->getRequest();

        //creo un objeto requisitoestudiante: el cual contiene la lista de cumplerequisito
        $auxmes = new AuxMes();


        //consulto los requisitos con su esstado, de un determinado estudiante que fue previamente inscrito              
        $estadomesess = $em->getRepository('administrativoBundle:Nota')->findAll();

        //recorro lista de objetos: cumplerequisito
        foreach ($estadomesess as $req) {
            //obtendo el id de la inscripcion            
            $cr = new Nota();
            //obtengo los datos de cada objeto cumplerequisito
            $cr->setId($req->getId());
            $cr->setEstado($req->getEstado());
            $cr->setNombre($req->getNombre());
            //lleno el objto tarea con varios objetos cumplerequisito
            $auxmes->getEstMes()->add($cr);
        }


        $form = $this->createForm(new AuxMesType(), $auxmes);

        $form->handleRequest($peticion);
        if ($form->isValid()) {

            foreach ($auxmes->getEstMes() as $req) {// recorro lista de objetos: cumplerequisito
                $cod = $req->getId(); // ontengo el id de cada objeto
                $est = $req->getEstado(); // obtengo el estado de cada objto
                $ne = $req->getNombre();
                $cr = $em->getRepository('administrativoBundle:Nota')->find($cod); //consulto el objeto cumplerequisito
                $cr->setEstado($est); //actualizo el estado del objeto previamente encontrado
                $cr->setNombre($ne);

                $em->flush(); // envio a guardar/actualizar el estado de cada objeto
            }


            return $this->redirect($this->generateUrl('admin_portada'));
        }
        $periodo = '';
        return $this->render('administrativoBundle:Default:mes_cambiarestado.html.twig', array(
                    'periodo' => $periodo,
                    'form' => $form->createView()
                ));
    }
    
    //metodo: registrar un nuevo paralelo
    public function paraleloregistroAction() {

        $peticion = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();

        $paralelo= new Paralelo();
        $formulario = $this->createForm(new ParaleloType(), $paralelo);
        $formulario->handleRequest($peticion);

        if ($formulario->isValid()) {
            $em->persist($paralelo);
            $em->flush();

            $this->get('session')->getFlashBag()->add('Info', 'Paralelo ingresado correctamente..!');
            return $this->redirect($this->generateUrl('admin_portada'));
        }
        $periodo = '';
        $listaparalelos = $em->getRepository('administrativoBundle:Paralelo')->findAll();
        return $this->render('administrativoBundle:Default:paralelo_registro.html.twig', array(
                    'periodo' => $periodo,
                    'lista' => $listaparalelos,
                    'formulario' => $formulario->createView()
                ));
    }
    
    //metodo: permite modificar todos los paralelos previamente registrados
    public function paralelomodificarAction($codpar) {

        $peticion = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();

        $paralelo = $em->getRepository('administrativoBundle:Paralelo')->find($codpar);
        $formulario = $this->createForm(new ParaleloType(), $paralelo);
        $formulario->handleRequest($peticion);

        if ($formulario->isValid()) {
            $em->flush();
            $this->get('session')->getFlashBag()->add('Info', 'Paralelo actualizado');
            return $this->redirect($this->generateUrl('admin_paralelo_listar_todos'));
        }
        $periodo = '';
        $listaparalelos = $em->getRepository('administrativoBundle:Paralelo')->findAll();
        return $this->render('administrativoBundle:Default:paralelo_modificar.html.twig', array(
                    'periodo' => $periodo,
                    'lista' => $listaparalelos,
                    'codpar' => $codpar,
                    'formulario' => $formulario->createView()
                ));
    }

    
    //metodo: permite listar todos los paralelos previamente registrados
    public function listatodosparalelosAction() {

        $em = $this->getDoctrine()->getEntityManager();

        $periodo = '';
        $listaparalelos = $em->getRepository('administrativoBundle:Paralelo')->findAll();
        return $this->render('administrativoBundle:Default:paralelo_listatodos.html.twig', array(
                    'periodo' => $periodo,
                    'lista' => $listaparalelos,
                ));
    }
    
    //metodo: registrar un nuevo dia
    public function diaregistroAction() {

        $peticion = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();

        $dia= new Dia();
        $formulario = $this->createForm(new DiaType(), $dia);
        $formulario->handleRequest($peticion);

        if ($formulario->isValid()) {
            $em->persist($dia);
            $em->flush();

            $this->get('session')->getFlashBag()->add('Info', 'Día ingresado correctamente..!');
            return $this->redirect($this->generateUrl('admin_portada'));
        }
        $periodo = '';
        $listadias = $em->getRepository('administrativoBundle:Dia')->findAll();
        return $this->render('administrativoBundle:Default:dia_registro.html.twig', array(
                    'periodo' => $periodo,
                    'lista' => $listadias,
                    'formulario' => $formulario->createView()
                ));
    }
    
    
    //metodo: permite modificar todos los dias previamente registrados
    public function diamodificarAction($coddia) {

        $peticion = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();

        $dia = $em->getRepository('administrativoBundle:Dia')->find($coddia);
        $formulario = $this->createForm(new DiaType(), $dia);
        $formulario->handleRequest($peticion);

        if ($formulario->isValid()) {
            $em->flush();
            $this->get('session')->getFlashBag()->add('Info', 'Día actualizado');
            return $this->redirect($this->generateUrl('admin_dia_listar_todos'));
        }
        $periodo = '';
        $listadias = $em->getRepository('administrativoBundle:Dia')->findAll();
        return $this->render('administrativoBundle:Default:dia_modificar.html.twig', array(
                    'periodo' => $periodo,
                    'lista' => $listadias,
                    'coddia' => $coddia,
                    'formulario' => $formulario->createView()
                ));
    }

    //metodo: permite listar todos los paralelos previamente registrados
    public function listartodosdiasAction() {

        $em = $this->getDoctrine()->getEntityManager();

        $periodo = '';
        $listadias = $em->getRepository('administrativoBundle:Dia')->findAll();
        return $this->render('administrativoBundle:Default:dia_listatodos.html.twig', array(
                    'periodo' => $periodo,
                    'lista' => $listadias,
                ));
    }

    
    //metodo: permite registrar las materias de grado en un nuevo periodo   
    public function materiagradoregistrarAction() {
        
        $peticion = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();

        $materiagrado = new MateriaGrado();
        $formulario = $this->createForm(new MateriaGradoType(), $materiagrado);
        $formulario->handleRequest($peticion);

        if ($formulario->isValid()) {
            $em->persist($materiagrado);
            $em->flush();

            $this->get('session')->getFlashBag()->add('Info', 'Materia ingresada correctamente..!');
            return $this->redirect($this->generateUrl('admin_materiagrado_registro'));
        }
        $periodo = '';
        $periodoA = $em->getRepository('administrativoBundle:Periodo')->getPeriodoActual();
        $listamateriagrado = $em->getRepository('administrativoBundle:MateriaGrado')->findBy(array(
            'periodo'=>$periodoA
        ));
        $mg=0;
        if($listamateriagrado){
            $mg=1;
        }
        return $this->render('administrativoBundle:Default:materiagrado_registro.html.twig', array(
                    'periodo' => $periodo,
                    'lista' => $listamateriagrado,
                    'mg'=>$mg,
                    'formulario' => $formulario->createView()
                ));                
    }
    
    //metodo: permite modificar todos los dias previamente registrados
    public function materiagradomodificarAction($codmg) {

        $peticion = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();

        $materigrado = $em->getRepository('administrativoBundle:MateriaGrado')->find($codmg);
        $formulario = $this->createForm(new MateriaGradoType(), $materigrado);
        $formulario->handleRequest($peticion);

        if ($formulario->isValid()) {
            $em->flush();
            $this->get('session')->getFlashBag()->add('Info', 'Materia actualizada');
            return $this->redirect($this->generateUrl('admin_materiagrado_listar_todos'));
        }
        $periodo = '';
        $periodoA = $em->getRepository('administrativoBundle:Periodo')->getPeriodoActual();
        $listamateriagrado = $em->getRepository('administrativoBundle:MateriaGrado')->findBy(array(
            'periodo'=>$periodoA
        ));
        $mg=0;
        if($listamateriagrado){
            $mg=1;
        }
        return $this->render('administrativoBundle:Default:materiagrado_modificar.html.twig', array(
                    'periodo' => $periodo,
                    'lista' => $listamateriagrado,
                    'codmg' => $codmg,
                    'mg'=>$mg,
                    'formulario' => $formulario->createView()
                ));
    }

    
    //metodo: permite listar todos las materias de grado previamente registradas
    public function materiagradolistatodosAction() {

        $em = $this->getDoctrine()->getEntityManager();

        $periodo = '';
        $periodoA = $em->getRepository('administrativoBundle:Periodo')->getPeriodoActual();
        $listamateriagrado = $em->getRepository('administrativoBundle:MateriaGrado')->findBy(array(
            'periodo'=>$periodoA
        ));
        $mg=0;
        if($listamateriagrado){
            $mg=1;
        }
        return $this->render('administrativoBundle:Default:materiagrado_listatodos.html.twig', array(
                    'periodo' => $periodo,
                    'mg'=>$mg,
                    'lista' => $listamateriagrado,
                ));
    }
    
    
    public function configuraciongeneralAction() {
        $periodo='';
        
        $em = $this->getDoctrine()->getEntityManager();

        $listamaterias = $em->getRepository('administrativoBundle:Materia')->findAll();
        
        $listacursos = $em->getRepository('administrativoBundle:Curso')->findAll();
        
        $listaparalelos = $em->getRepository('administrativoBundle:Paralelo')->findAll();
        
        $listaniveles = $em->getRepository('administrativoBundle:Nivel')->findAll();
        
        $listarequisitos = $em->getRepository('administrativoBundle:Requisito')->findAll();
        
        $listadias = $em->getRepository('administrativoBundle:Dia')->findAll();
        
        $listameses = $em->getRepository('administrativoBundle:Nota')->findAll();
        
        $listahoras = $em->getRepository('administrativoBundle:Hora')->findAll();
        
        $listadocentes = $em->getRepository('administrativoBundle:Docente')->findAll();
        

        return $this->render('administrativoBundle:Default:configuracion_general.html.twig',array(
            'periodo'=>$periodo,
            'listamaterias'=>$listamaterias,
            'listacursos'=>$listacursos,
            'listaparalelos'=>$listaparalelos,            
            'listaniveles'=>$listaniveles,
            'listarequisitos'=>$listarequisitos,
            'listadias'=>$listadias, 
            'listameses'=>$listameses,
            'listahoras'=>$listahoras,
            'listadocentes'=>$listadocentes, 
        
        ));
        
        
    }
    
    
    public function configuracionactualAction() {
        $periodo='';
        
        $em = $this->getDoctrine()->getEntityManager();
        
        $listamaterias = $em->getRepository('administrativoBundle:Materia')->findBy(array('estado'=>1));
                
        $listarequisitos = $em->getRepository('administrativoBundle:Requisito')->findBy(array('estado'=>1));
        
        $listameses = $em->getRepository('administrativoBundle:Nota')->findBy(array('estado'=>1));
                
        $listadocentes = $em->getRepository('administrativoBundle:Docente')->findBy(array('estado'=>1));
        

        return $this->render('administrativoBundle:Default:configuracion_actual.html.twig',array(
            'periodo'=>$periodo,
            'listamaterias'=>$listamaterias,
            'listarequisitos'=>$listarequisitos,
            'listameses'=>$listameses,
            'listadocentes'=>$listadocentes, 
        
        ));
        
        
    }
    
    //METODO: lista los datos de los usuarios
    public function listausuarioModificarAction() {

        $em = $this->getDoctrine()->getEntityManager();

        $periodo='';

        $listausuarios = $em->getRepository('seguridadBundle:Usuario')->findAll();
        
        if($listausuarios){
            $sd=1;
        }
        return $this->render('administrativoBundle:default:listausuarios.html.twig', array(                   
                    
                    'periodo' => $periodo,
                    'listausuarios'=>$listausuarios,
                    'sd'=>$sd
                ));
    }
    
    
     //METODO: modifica los datos de los usuarios
    public function usuarioModificarAction($uid) {

        $em = $this->getDoctrine()->getEntityManager();
        $peticion = $this->getRequest();
       // $usuariom =  new Usuario();
        $periodo='';
        $usuario = $em->getRepository('seguridadBundle:Usuario')->findOneBy(array(
            'id' => $uid
                ));
        $userdoc = $em->getRepository('administrativoBundle:Docente')->findOneBy(array(
            'cedula' => $usuario->getCedula()
                ));
        
        $formulario = $this->createForm(new ModificarUsuarioType(), $usuario);
        $passwordOriginal = $formulario->getData()->getPassword();
        $formulario->handleRequest($peticion);
        if ($formulario->isValid()) {
             if (null == $usuario->getPassword()) {
                // El docente no cambia su contraseña, utilizar la original
                $usuario->setPassword($passwordOriginal);
            } else {
                $encoder = $this->get('security.encoder_factory')
                        ->getEncoder($usuario);
                $usuario->setSalt(md5(time()));
                $passwordCodificado = $encoder->encodePassword($usuario->getPassword(), $docente->getSalt()
                );
                $usuario->setPassword($passwordCodificado);
            }
            $rol = $formulario->getData()->getRol();

            $nombre = $formulario->getData()->getNombre();
            $apellidos = $formulario->getData()->getApellidos();
            $email = $formulario->getData()->getEmail();
            $cedula = $formulario->getData()->getCedula();
            $estado = $formulario->getData()->getEstado();
            $direccion = 'Dir. pendiente';

            $em->persist($usuario);
            $em->flush();

            if ($userdoc && $formulario->getData()->getRol()=='DOCENTE') {
                $this->get('session')->getFlashBag()->add('Info', 'Datos estan ya registrados como Docente');

                return $this->redirect($this->generateUrl('admin_portada'));
            }
            
            if ($rol == 'DOCENTE') {
                $docente = new Docente();
                $encoder = $this->get('security.encoder_factory')->getEncoder($usuario);
                $docente->setSalt($usuario->getSalt());
                $docente->setPassword($usuario->getPassword());
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
            
            
            
            $this->get('session')->getFlashBag()->add('Info', 'Datos actualizados');


            return $this->redirect($this->generateUrl('admin_portada'));
        }

        
        return $this->render('administrativoBundle:default:modificarusuario.html.twig', array(                   
                    'id' => $uid,
                    'periodo' => $periodo,                    
                    'formulario' => $formulario->createView()
                ));
    }

    
    //metodo: inserta un nuevo subperiodo    
    public function subperiodoregistroAction() {
        
        $em = $this->getDoctrine()->getManager();
        
        $peticion = $this->getRequest();
        $periodo= $em->getRepository('administrativoBundle:Periodo')->getPeriodoActual();
       
        $usuario = $this->get('security.context')->getToken()->getUser();
        
        $rol = strtolower($usuario->getRol());
        
        $mat = $em->getRepository('administrativoBundle:Materia')->findBy(array('estado' => 1));
        if (!$mat) {
            $this->get('session')->getFlashBag()->add('Info', 'Error! No existe materias a cargar');
            return $this->redirect($this->generateUrl('portada', array('role' => $rol)));
        }
        

        $subperiodo = new SubPeriodo();

        $listasubperiodo= $em->getRepository('administrativoBundle:SubPeriodo')->findBy(array(
            'periodo'=>$periodo
        ));
        
        $materiaperiodos= $em->getRepository('administrativoBundle:Periodo')->getprimerSubperiodo($periodo);
        $sd=0;
        if($listasubperiodo){
           $sd=1;         
        
        }
        $formulario = $this->createForm(new SubPeriodoType(), $subperiodo);

        $formulario->handleRequest($peticion);
        
        if ($formulario->isValid()) {

            //inserta nueva area               
            $em->persist($subperiodo);
            $em->flush();

            if($materiaperiodos==null){
            //LENAR LA TABLA: MATERIAPERIODO
            foreach ($mat as $mat1) {
                $materiaperiodo = new MateriaPeriodo();
                $materiaperiodo->setMateria($mat1);
                $materiaperiodo->setSubperiodo($subperiodo);
                $em->persist($materiaperiodo);
                $em->flush();
            }            
            }

            
            
            $this->get('session')->getFlashBag()->add('Info', 'Éxito! Subperiodo ingresado'
            );
            //llamo al la vista requisito estudiante
            return $this->redirect($this->generateUrl('admin_portada'));
        }
        
        return $this->render('administrativoBundle:Default:subperiodo_registro.html.twig', array(
                    'periodo' => $periodo,
                    'sd'=>$sd,
                    'lista'=>$listasubperiodo,
                    'formulario' => $formulario->createView())
        );
        
        
    }
    
    
      //metodo: modificar un  subperiodo    
    public function subperiodomodificarAction($sid) {
        
        $em = $this->getDoctrine()->getManager();
        $periodo='';
        $subperiodo= $em->getRepository('administrativoBundle:SubPeriodo')->find($sid);
        $peticion = $this->getRequest();
        

        $formulario = $this->createForm(new SubPeriodoType(), $subperiodo);

        $formulario->handleRequest($peticion);
        
        if ($formulario->isValid()) {

            //inserta nueva area               
            $em->flush();

            
            $this->get('session')->getFlashBag()->add('Info', 'Éxito! Subperiodo actualizado'
            );
            //llamo al la vista requisito estudiante
            return $this->redirect($this->generateUrl('admin_portada'));
        }
        
        return $this->render('administrativoBundle:Default:subperiodo_modificar.html.twig', array(
                    'periodo' => $periodo,
                    'sid'=>$sid,
                    'formulario' => $formulario->createView())
        );
        
        
    }
    
      //metodo: listar los subperiodos de periodo actual    
    public function subperiodolistartodosAction() {
        
        $em = $this->getDoctrine()->getManager();
        $periodo= $em->getRepository('administrativoBundle:Periodo')->getPeriodoActual();
        $listasubperiodo= $em->getRepository('administrativoBundle:SubPeriodo')->findBy(array(
            'periodo'=>$periodo
        ));
        $sd=0;
        if($listasubperiodo){
           $sd=1;
            
        }
        
        return $this->render('administrativoBundle:Default:subperiodo_listatodos.html.twig', array(
                    'periodo' => $periodo,
                     'lista'=>$listasubperiodo,
                     'sd'=>$sd
                    
        ));
    }
    
    //metodo: inserta las matreias en un determinado subperiodo    
    public function materiaperiodoregistroAction() {
        
        
        
        $peticion = $this->getRequest();
        $em = $this->getDoctrine()->getManager();

        $periodo= $em->getRepository('administrativoBundle:Periodo')->getPeriodoActual();
        $listamatperiodo= $em->getRepository('administrativoBundle:Periodo')->getMateriasSubperiodo($periodo->getId());
        $sd=0;
        if($listamatperiodo){
           $sd=1;
            
        }
        
        $materiaperiodo = new MateriaPeriodo();

        $formulario = $this->createForm(new MateriaPeriodoType(), $materiaperiodo);

        $formulario->handleRequest($peticion);
        
        if ($formulario->isValid()) {

            //inserta nueva area               
            $em->persist($materiaperiodo);
            $em->flush();

            
            $this->get('session')->getFlashBag()->add('Info', 'Éxito! Materia ingresada'
            );
            //llamo al la vista requisito estudiante
            return $this->redirect($this->generateUrl('admin_portada'));
        }
        
        return $this->render('administrativoBundle:Default:materiaperiodo_registro.html.twig', array(
                    'periodo' => $periodo,
                    'sd'=>$sd,
                    'lista'=>$listamatperiodo,
                    'formulario' => $formulario->createView())
        );
        
        
    }
    
    //metodo: inserta las matreias en un determinado subperiodo    
    public function materiaperiodomodificarAction($mpid) {
        
        $periodo=''; 
        
        $peticion = $this->getRequest();
        $em = $this->getDoctrine()->getManager();

        $materiaperiodo = $em->getRepository('academicoBundle:MateriaPeriodo')->find($mpid);

        $formulario = $this->createForm(new MateriaPeriodoType(), $materiaperiodo);

        $formulario->handleRequest($peticion);
        
        if ($formulario->isValid()) {

            //inserta nueva area               
            $em->flush();
            
            $this->get('session')->getFlashBag()->add('Info', 'Éxito! Materia actualizada'
            );
            //llamo al la vista requisito estudiante
            return $this->redirect($this->generateUrl('admin_portada'));
        }
        
        return $this->render('administrativoBundle:Default:materiaperiodo_modificar.html.twig', array(
                    'periodo' => $periodo,
                    'mpid'=>$mpid,
                    'formulario' => $formulario->createView())
        );
        
        
    }
    

    //metodo: listar las materias en subperiodos: de un periodo actual
    public function materiaperiodolistartodosAction() {
        
        $em = $this->getDoctrine()->getManager();
        $periodo= $em->getRepository('administrativoBundle:Periodo')->getPeriodoActual();
        $listamatperiodo= $em->getRepository('administrativoBundle:Periodo')->getMateriasSubperiodo($periodo->getId());
        $sd=0;
        if($listamatperiodo){
           $sd=1;
            
        }
        
        return $this->render('administrativoBundle:Default:materiaperiodo_listatodos.html.twig', array(
                    'periodo' => $periodo,
                     'lista'=>$listamatperiodo,
                     'sd'=>$sd
                    
        ));
    }
    
    
}
