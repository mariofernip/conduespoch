<?php

namespace Acad\academicoBundle\Entity;

use Doctrine\ORM\EntityRepository;


class MatriculaRepository extends EntityRepository{
    
          
    public function getTodosNiveles() {
        
        $em= $this->getEntityManager();
        
        $dql = 'select n,c,p
                FROM administrativoBundle:Nivel n
                Join n.curso c
                Join n.paralelo p
                
                order by n.id asc
                ';
        $consulta = $em->createQuery($dql);                
        
        return $consulta->getResult();
        
    }
    
    public function getEstudiantesxSeccionDiurna($pid,$nivel) {
        
        $em= $this->getEntityManager();
        $seccion='Diurna';
        $dql = 'select m,e,p,n
                FROM academicoBundle:Matricula m             
                Join m.estudiante e
                Join m.periodo p
                Join m.nivel n
                WHERE p.id= :pid and
                    m.seccion= :sec and
                    n.id =:nid
                order by e.apellido asc
                ';
        $consulta = $em->createQuery($dql);        
        $consulta->setParameter('pid', $pid);
        $consulta->setParameter('sec', $seccion);
        $consulta->setParameter('nid', $nivel);
        
        return $consulta->getResult();
                
    }
    
    public function getEstudiantesxSeccionNocturna($pid, $nivel) {
        
        $em= $this->getEntityManager();
        $seccion='Nocturna';
        $dql = 'select m,e,p,n
                FROM academicoBundle:Matricula m             
                Join m.estudiante e
                Join m.periodo p
                Join m.nivel n
                WHERE p.id= :pid and
                    m.seccion= :sec and
                    n.id =:nid
                order by e.apellido asc
                ';
        $consulta = $em->createQuery($dql);        
        $consulta->setParameter('pid', $pid);
        $consulta->setParameter('sec', $seccion);
        $consulta->setParameter('nid', $nivel);
        
        return $consulta->getResult();
                
    }
    
    public function getEstudiantesxSeccionVespertina($pid,$nivel) {
        
        $em= $this->getEntityManager();
        $seccion='Vespertina';
        $dql = 'select m,e,p,n
                FROM academicoBundle:Matricula m             
                Join m.estudiante e
                Join m.periodo p
                Join m.nivel n
                WHERE p.id= :pid and
                    m.seccion= :sec and
                    n.id =:nid
                order by e.apellido asc
                ';
        $consulta = $em->createQuery($dql);        
        $consulta->setParameter('pid', $pid);
        $consulta->setParameter('sec', $seccion);
        $consulta->setParameter('nid', $nivel);
        
        return $consulta->getResult();
                
    }
    
}

?>
