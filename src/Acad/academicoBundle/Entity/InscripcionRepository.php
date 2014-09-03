<?php

namespace Acad\academicoBundle\Entity;

use Doctrine\ORM\EntityRepository;


class InscripcionRepository extends EntityRepository {
 
    
    public function getListaEstudiantesInscritosxPeriodo($pid) {
        $em= $this->getEntityManager();
        
        $dql = 'select i,e,p
                FROM academicoBundle:Inscripcion  i             
                Join i.estudiante e
                Join i.periodo p
                WHERE p.id= :pid                
                ';
        $consulta = $em->createQuery($dql);        
        $consulta->setParameter('pid', $pid);
        
        
        return $consulta->getResult();
        
        
    }
    
    
}

?>
