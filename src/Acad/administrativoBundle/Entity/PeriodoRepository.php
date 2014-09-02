<?php

namespace Acad\administrativoBundle\Entity;

use Doctrine\ORM\EntityRepository;


class PeriodoRepository extends EntityRepository{

    
    public function getPeriodoActual() {
        $em= $this->getEntityManager();
        
        $dql = 'select p
                FROM administrativoBundle:Periodo p               
                WHERE p.estado = 1
                order by p.id desc
                ';
        $consulta = $em->createQuery($dql);        
        $consulta->setMaxResults(1);
        
        return $consulta->getOneOrNullResult();
        
        
    }

    public function getMateriasSubperiodo($pid) {
        
        
        $em= $this->getEntityManager();
        
        $dql = 'select mp,sp,p
                FROM academicoBundle:MateriaPeriodo mp
                Join mp.subperiodo sp
                Join sp.periodo p
                WHERE p.id = :pid
                order by sp.tipo asc
                ';
        $consulta = $em->createQuery($dql);   
        $consulta->setParameter('pid', $pid);
        
        return $consulta->getResult();
        
        
    }
    
}

?>
