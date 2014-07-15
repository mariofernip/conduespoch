<?php

namespace Acad\academicoBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller;


class DictadomateriaRepository extends EntityRepository {
    
    public function getMateriasDocente($cedula,$pid) {
        
        $em = $this->getEntityManager();

        $dql = 'select dm,d,n,p,m
                FROM academicoBundle:Dictadomateria dm
                Join dm.docente d
                Join dm.nivel n
                Join dm.periodo p
                Join dm.materia m
                WHERE d.cedula = :cedu and
                          p.id = :pid
                          
                
                ';
        $consulta = $em->createQuery($dql);
        $consulta->setParameter('cedu', $cedula);                
        $consulta->setParameter('pid', $pid);                        

        return $consulta->getResult();
    }

    public function getEstudiantesxMateria($mid,$pid,$nid) {
        
        $em = $this->getEntityManager();
        $dql = 'select ma,m,p,n,e
                FROM academicoBundle:MateriaAsignada ma
                Join ma.matricula m
                Join m.periodo p  
                Join m.estudiante e
                Join m.nivel n
                WHERE ma.materia = :mid and
                          p.id = :pid and
                          m.estado = 1 and
                         m.nivel= :nid 
                          
                          
                ';
        $consulta = $em->createQuery($dql);
        $consulta->setParameter('mid', $mid);                
        $consulta->setParameter('pid', $pid);                        
        $consulta->setParameter('nid', $nid);                        
                
        return $consulta->getResult();
        
    }
    

    public function getEvaluacionEstudiantesxMateria($mid,$pid,$nid) {
        
        $em = $this->getEntityManager();

        $dql = 'select ev
                FROM academicoBundle:evaluacion ev
                Join ev.materiaasignada ma
                Join ma.matricula m
                Join m.periodo p
                Join m.estudiante e
                Join m.nivel n
                WHERE ma.materia = :mid and
                          p.id = :pid and
                          m.estado = 1 and
                          m.nivel= :nid
                ';
        $consulta = $em->createQuery($dql);
        $consulta->setParameter('mid', $mid);                
        $consulta->setParameter('pid', $pid);                        
        $consulta->setParameter('nid', $nid);                        
        
        return $consulta->getResult();
        
    }
    
    
}

?>
