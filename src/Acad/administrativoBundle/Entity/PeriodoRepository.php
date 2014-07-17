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
    
    
}

?>
