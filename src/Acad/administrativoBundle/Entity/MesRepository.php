<?php

namespace Acad\administrativoBundle\Entity;

use Doctrine\ORM\EntityRepository;


class MesRepository extends EntityRepository {
    
    
    public function getTodosMeses() {
        
        $em = $this->getEntityManager();

        $dql = 'select m
                FROM administrativoBundle:Nota                                                
                WHERE m.estado= true
                ';

        $consulta = $em->createQuery($dql);

        return $consulta->getOneOrNullResult();        
        
    }
    
    public function getMesEvaluacionxPeriodo($pid) {
        
        
        $em = $this->getEntityManager();

        $dql = 'select me,p
                FROM administrativoBundle:MesEvaluacion me                                               
                Join me.periodo p
                WHERE p.id = :pid
                ';

        $consulta = $em->createQuery($dql);
        $consulta->setParameter('pid', $pid);
        return $consulta->getResult();        
        
        
        
    }
    
}

?>
