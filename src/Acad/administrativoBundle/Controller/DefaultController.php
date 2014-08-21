<?php

namespace Acad\administrativoBundle\Controller;

use Acad\administrativoBundle\Entity\Area;
use Acad\administrativoBundle\Entity\AuxRequisito;
use Acad\administrativoBundle\Entity\Curso;
use Acad\administrativoBundle\Entity\Docente;
use Acad\administrativoBundle\Entity\EvaluacionxMes;
use Acad\administrativoBundle\Entity\Hora;
use Acad\administrativoBundle\Entity\Materia;
use Acad\administrativoBundle\Entity\Mes;
use Acad\administrativoBundle\Entity\MesEvaluacion;
use Acad\administrativoBundle\Entity\Nivel;
use Acad\administrativoBundle\Entity\Periodo;
use Acad\administrativoBundle\Entity\Requisito;
use Acad\administrativoBundle\Form\AreaType;
use Acad\administrativoBundle\Form\AuxRequisitoType;
use Acad\administrativoBundle\Form\CursoType;
use Acad\administrativoBundle\Form\DocenteType;
use Acad\administrativoBundle\Form\EvaluacionxMesType;
use Acad\administrativoBundle\Form\HoraType;
use Acad\administrativoBundle\Form\MateriaType;
use Acad\administrativoBundle\Form\MesType;
use Acad\administrativoBundle\Form\NivelType;
use Acad\administrativoBundle\Form\PeriodoType;
use Acad\administrativoBundle\Form\RequisitoType;
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
    
    public function portadaAction() {
        $periodo='';
        return $this->render('administrativoBundle:Default:portada_admin.html.twig',array(
            'periodo'=>$periodo
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

        $mes = new Mes();
        $formulario = $this->createForm(new MesType(), $mes);
        $formulario->handleRequest($peticion);

        if ($formulario->isValid()) {
            $em->persist($mes);
            $em->flush();

            $this->get('session')->getFlashBag()->add('Info', 'Mes ingresado correctamente..!');
            return $this->redirect($this->generateUrl('admin_portada'));
        }
        $periodo = '';
        $listameses = $em->getRepository('administrativoBundle:Mes')->findAll();
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
        $listameses = $em->getRepository('administrativoBundle:Mes')->findAll();
        return $this->render('administrativoBundle:Default:mes_listatodos.html.twig', array(
                    'periodo' => $periodo,
                    'listam' => $listameses,
                ));
    }

    //metodo: permite modificar todos los meses previamente registrados
    public function mesmodicarAction($codmes) {

        $peticion = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();

        $mes = $em->getRepository('administrativoBundle:Mes')->find($codmes);
        $formulario = $this->createForm(new MesType(), $mes);
        $formulario->handleRequest($peticion);

        if ($formulario->isValid()) {

            $em->flush();

            $this->get('session')->getFlashBag()->add('Info', 'Mes actualizado');
            return $this->redirect($this->generateUrl('admin_mes_listar_todos'));
        }
        $periodo = '';
        $listameses = $em->getRepository('administrativoBundle:Mes')->findAll();
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
    
    
}
