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
                ';

        $consulta = $em->createQuery($dql);
        $consulta->setParameter('pid', $pid);                                              

        return $consulta->getResult();
        
    }
    
     public function findEstudiantexMatricula($eid) {
        
        $em = $this->getEntityManager();


                $consulta = $em->createQuery('
                SELECT i FROM academicoBundle:Inscripcion i
                WHERE i.estado = 1
                AND i.estudiante = :id_estudiante');
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
    
     public function findEstudiantexMateriaxSeccionNocturna($materias) {
        
        $em = $this->getEntityManager();
        $seccion='Nocturna';
        $dql =  'SELECT ma, m, e, a FROM academicoBundle:Asistencia a
                join a.materiaasiganda ma
                join ma.matricula m
                join m.estudiante e
                WHERE m.estado = 1 
                AND ma.materia = :mid 
                AND m.seccion = :sec';   
                
        $estudiante = $em->createQuery($dql);
        $estudiante->setParameter('mid', $materias);
        $estudiante->setParameter('sec', $seccion);
        
        return $estudiante->getResult();
        
    }
    
    public function findEstudiantexMateriaxSeccionDiurna($materias) {
        
        $em = $this->getEntityManager();
        $seccion='Diurna';
        $dql =  'SELECT ma, m, e, a FROM academicoBundle:Asistencia a
                join a.materiaasiganda ma
                join ma.matricula m
                join m.estudiante e
                WHERE m.estado = 1 
                AND ma.materia = :mid 
                AND m.seccion = :sec';   
                
        $estudiante = $em->createQuery($dql);
        $estudiante->setParameter('mid', $materias);
        $estudiante->setParameter('sec', $seccion);
        
        return $estudiante->getResult();
        
    }
    
    public function findEstudiantexMateriaxSeccionVespertina($materias) {
        
        $em = $this->getEntityManager();
        $seccion='Vespertina';
        $dql =  'SELECT ma, m, e, a FROM academicoBundle:Asistencia a
                join a.materiaasiganda ma
                join ma.matricula m
                join m.estudiante e
                WHERE m.estado = 1 
                AND ma.materia = :mid 
                AND m.seccion = :sec';   
                       
        $estudiante = $em->createQuery($dql);
        $estudiante->setParameter('mid', $materias);
        $estudiante->setParameter('sec', $seccion);
        
        return $estudiante->getResult();
        
    }
    
    
        public function getMaterias() {
        
        $em = $this->getEntityManager();

        $dql = 'select dm, ma, n  FROM academicoBundle:Dictadomateria dm   
                join dm.materia ma
                join dm.nivel n
                where ma.estado = 1';
        
        $consulta = $em->createQuery($dql);
        return $consulta->getResult();
        
    }

    
}

?>
