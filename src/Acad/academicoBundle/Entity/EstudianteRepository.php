<?php

namespace Acad\academicoBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller;


class EstudianteRepository extends EntityRepository {
    
    
    public function findEstudiantexInscripcion($cedula,$pid) {
        
        $em = $this->getEntityManager();

        $dql = 'select i,e,p
                FROM academicoBundle:Inscripcion i                
                Join i.estudiante e               
                Join i.periodo p                
                WHERE e.cedula = :cedu and
                          p.id = :pid                           
                
                ';

        $consulta = $em->createQuery($dql);
        $consulta->setParameter('cedu', $cedula);                
        $consulta->setParameter('pid', $pid);                
             

        return $consulta->getOneOrNullResult();
    }
    
    
    public function getDictadoMateria($pid) {
        
        $em = $this->getEntityManager();

        $dql = 'select dm,p
                FROM academicoBundle:Dictadomateria dm                               
                JOIN dm.periodo p
                where p.id = :pid
                order by dm.id desc                
                ';

        $consulta = $em->createQuery($dql);
        $consulta->setParameter('pid', $pid);    
        $consulta->setMaxResults(5);

        return $consulta->getResult();
        
    }
    
    public function getTodosDictadoMateria($pid) {
        
        $em = $this->getEntityManager();

        $dql = 'select dm,p
                FROM academicoBundle:Dictadomateria dm                               
                JOIN dm.periodo p
                where p.id = :pid
                order by dm.id desc                
                ';

        $consulta = $em->createQuery($dql);
        $consulta->setParameter('pid', $pid);            

        return $consulta->getResult();
        
    }
    
     public function findEstudiantexMatricula($eid) {
        
        $em = $this->getEntityManager();


                $consulta = $em->createQuery('
                SELECT i FROM academicoBundle:Inscripcion i
                WHERE i.estudiante = :id_estudiante');
                $consulta->setParameter('id_estudiante', $eid);     

        return $consulta->getOneOrNullResult();
    }
    
    public function findEstudiantexMatriculado($eid) {
        
        $em = $this->getEntityManager();


                $consulta = $em->createQuery('
                SELECT m FROM academicoBundle:Matricula m
                WHERE m.estado = 1
                AND m.estudiante = :id_estudiante');
                $consulta->setParameter('id_estudiante', $eid);     

        return $consulta->getOneOrNullResult();
    }
    
    public function findEstudiantexMatriculadoA($eid) {
        
        $em = $this->getEntityManager();


                $consulta = $em->createQuery('
                SELECT m FROM academicoBundle:Matricula m
                WHERE m.estado = 0
                AND m.estudiante = :id_estudiante');
                $consulta->setParameter('id_estudiante', $eid);     

        return $consulta->getOneOrNullResult();
    }
    
     public function findEstudiantexMateriaxSeccionNocturna($materias, $nivel) {
        
        $em = $this->getEntityManager();
        $seccion='Nocturna';
        $dql =  'SELECT ma, m, e, a FROM academicoBundle:Asistencia a
                join a.materiaasignada ma
                join ma.matricula m
                join m.estudiante e
                join m.nivel n
                WHERE m.estado = 1 
                AND n.id =:nid 
                AND ma.materia = :mid 
                AND m.seccion = :sec';   
                
        $estudiante = $em->createQuery($dql);
        $estudiante->setParameter('mid', $materias);
        $estudiante->setParameter('sec', $seccion);
        $estudiante->setParameter('nid', $nivel);
        return $estudiante->getResult();
        
    }
    
    public function findEstudiantexMateriaxSeccionDiurna($materias, $nivel) {
        
        $em = $this->getEntityManager();
        $seccion='Diurna';
        $dql =  'SELECT ma, m, e, a FROM academicoBundle:Asistencia a
                join a.materiaasignada ma
                join ma.matricula m
                join m.estudiante e
                join m.nivel n
                WHERE m.estado = 1 
                AND n.id =:nid 
                AND ma.materia = :mid 
                AND m.seccion = :sec';   
                
        $estudiante = $em->createQuery($dql);
        $estudiante->setParameter('mid', $materias);
        $estudiante->setParameter('sec', $seccion);
        $estudiante->setParameter('nid', $nivel);
        return $estudiante->getResult();
        
    }
    
    public function findEstudiantexMateriaxSeccionVespertina($materias, $nivel) {
        
        $em = $this->getEntityManager();
        $seccion='Vespertina';
        $dql =  'SELECT ma, m, e, a FROM academicoBundle:Asistencia a
                join a.materiaasignada ma
                join ma.matricula m
                join m.estudiante e
                join m.nivel n
                WHERE m.estado = 1 
                AND n.id =:nid 
                AND ma.materia = :mid 
                AND m.seccion = :sec';   
                
        $estudiante = $em->createQuery($dql);
        $estudiante->setParameter('mid', $materias);
        $estudiante->setParameter('sec', $seccion);
        $estudiante->setParameter('nid', $nivel);
        return $estudiante->getResult();
        
    }
    
    
     public function findEstudiantexMateriaxSecciones($materias, $nivel) {
        
        $em = $this->getEntityManager();
        $dql =  'SELECT ma, m, e, a FROM academicoBundle:Asistencia a
                join a.materiaasignada ma
                join ma.matricula m
                join m.estudiante e
                join m.nivel n
                
                WHERE m.estado = 1 
                AND n.id =:nid 
                AND ma.materia = :mid 
                ORDER BY m.seccion
                ';   
                
        $estudiante = $em->createQuery($dql);
        $estudiante->setParameter('mid', $materias);
        $estudiante->setParameter('nid', $nivel);
        return $estudiante->getResult();
        
    }
    
        public function getMaterias() {
        
        $em = $this->getEntityManager();

        $dql = 'select dm, ma  FROM academicoBundle:Dictadomateria dm   
                join dm.materia ma
                where ma.estado = 1';
        
        $consulta = $em->createQuery($dql);
        return $consulta->getResult();
        
    }
    
    public function getMateriasxNivel($nid) {
        
        $em = $this->getEntityManager();

        $dql = 'select dm, ma  FROM academicoBundle:Dictadomateria dm   
                join dm.materia ma
                where ma.estado = 1
                and dm.nivel = :nid ';
        
        $consulta = $em->createQuery($dql);
        $consulta->setParameter('nid', $nid);
        return $consulta->getResult();
        
    }
    
public function findEstudiantexActaGeneral($materias, $nivel) {
        
        $em = $this->getEntityManager();
        
        $dql =  'SELECT sum(a.notatb) as notatb, sum(a.notaec) as notaec, sum(a.notapp) as notapp, sum(a.notapt) as notapt, e.cedula, e.apellido, e.nombre, m.seccion FROM academicoBundle:Evaluacion a
                join a.materiaasignada ma
                join ma.matricula m
                join m.estudiante e
                join m.nivel n
                WHERE m.estado = 1 
                AND n.id =:nid 
                AND ma.materia = :mid
                GROUP BY e.cedula, e.apellido, e.nombre, m.seccion
                ';   
        
        
        $estudiante = $em->createQuery($dql);
        $estudiante->setParameter('mid', $materias);
        $estudiante->setParameter('nid', $nivel);
        return $estudiante->getResult();        
    }
 
    public function getMesEvaluacionxPeriodoxActivo($pid) {
        
        
        $em = $this->getEntityManager();

        $dql = 'select count(me.id)
                FROM administrativoBundle:MesEvaluacion me                                               
                Join me.periodo p
                WHERE p.id = :pid
                ';

        $consulta = $em->createQuery($dql);
        $consulta->setParameter('pid', $pid);
              
        $count = $consulta->getSingleScalarResult();
         return $count;  
    }
}

?>
