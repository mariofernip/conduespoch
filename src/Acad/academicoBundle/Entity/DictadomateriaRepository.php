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

    public function getEstudiantesxMateriaSD($mid,$pid,$nid) {
        $seccion='Diurna';
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
                         m.nivel= :nid  and
                          m.seccion = :sec
                          
                ';
        $consulta = $em->createQuery($dql);
        $consulta->setParameter('mid', $mid);                
        $consulta->setParameter('pid', $pid);                        
        $consulta->setParameter('nid', $nid);                        
        $consulta->setParameter('sec', $seccion);                        
        return $consulta->getResult();
        
    }
    
    public function getEstudiantesxMateriaSV($mid,$pid,$nid) {
        $seccion='Vespertina';
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
                         m.nivel= :nid  and
                          m.seccion = :sec
                          
                ';
        $consulta = $em->createQuery($dql);
        $consulta->setParameter('mid', $mid);                
        $consulta->setParameter('pid', $pid);                        
        $consulta->setParameter('nid', $nid);                        
        $consulta->setParameter('sec', $seccion);                        
        return $consulta->getResult();
        
    }
    
    public function getEstudiantesxMateriaSN($mid,$pid,$nid) {
        $seccion='Nocturna';
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
                         m.nivel= :nid  and
                          m.seccion = :sec
                          
                ';
        $consulta = $em->createQuery($dql);
        $consulta->setParameter('mid', $mid);                
        $consulta->setParameter('pid', $pid);                        
        $consulta->setParameter('nid', $nid);                        
        $consulta->setParameter('sec', $seccion);                        
        return $consulta->getResult();
        
    }
    
    public function getEvaluacionEstudiantesxMateria($mid,$pid,$nid,$mesid) {
        
        $em = $this->getEntityManager();

        $dql = 'select ev, ma,me,m,p
                FROM academicoBundle:Evaluacion ev
                Join ev.materiaasignada ma
                Join ma.matricula m
                Join m.periodo p
                Join m.nivel n
                
                
                
                Join ev.mesevaluacion me
                WHERE ma.materia = :mid and                          
                          me.id = :mesid and
                          p.id= :pid and
                          n.id = :nid
                       
                ';
        $consulta = $em->createQuery($dql);
        $consulta->setParameter('mid', $mid);                
        $consulta->setParameter('pid', $pid);                        
        $consulta->setParameter('nid', $nid);    
        $consulta->setParameter('mesid', $mesid);    
        
        
        return $consulta->getResult();
        
    }
    
    
    public function getEvaluacionExistente($mat,$mes, $nota) {
        
        
        $em = $this->getEntityManager();

        $dql = 'select ev
                FROM academicoBundle:Evaluacion ev
                
                WHERE ev.materiaasignada = :mat and
                          ev.mesevaluacion = :mes and
                          ev.tiponota = :nota
                          
                ';
        $consulta = $em->createQuery($dql);
        $consulta->setParameter('mat', $mat);                
        $consulta->setParameter('mes', $mes);                        
        $consulta->setParameter('nota', $nota);                        
        
        return $consulta->getOneOrNullResult();
        
    }
    
    
}

?>
