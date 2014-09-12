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

    public function getEstudiantesxNivel($pid) {
        
        $em= $this->getEntityManager();
        $dql = 'select count(n.id) as num, c.nombre as nivel, pl.nombre as paralelo
                FROM academicoBundle:Matricula m             
                Join m.periodo p
                Join m.nivel n
                Join n.paralelo pl
                Join n.curso c
                WHERE p.id= :pid 
                group by n.id, c.nombre, pl.nombre
                    
                ';
        $consulta = $em->createQuery($dql);        
        $consulta->setParameter('pid', $pid);
        //$consulta->setParameter('nid', $nid);
        
        return $consulta->getResult();
    }

    public function getMateriasSegundoSP($pid) {
        $tipo='2';
        
        $em= $this->getEntityManager();
        $dql = 'select mp,sp,p
                FROM academicoBundle:MateriaPeriodo mp             
                Join mp.subperiodo sp
                Join sp.periodo p
                WHERE p.id= :pid and
                    sp.tipo= :tipo                                    
                ';
        $consulta = $em->createQuery($dql);        
        $consulta->setParameter('pid', $pid);
        $consulta->setParameter('tipo', $tipo);
        
        return $consulta->getResult();
        
        
    }
    
    
}

?>
