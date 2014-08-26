<?php

namespace Acad\academicoBundle\Entity;

use Doctrine\ORM\EntityRepository;


class ExamenGradoRepository extends EntityRepository{
    
          
    public function getEstudiantesExamenGrado($nid, $pid,$mgid) {
        
        
        $em = $this->getEntityManager();

        $dql = 'select e,m,n,p,mg
                FROM academicoBundle:ExamenGrado e
                join e.matricula m
                join m.nivel n                
                join e.materiagrado mg
                join mg.periodo p
                where p.id = :pid and
                      n.id = :nid and
                      mg.id = :mgid
                
                ';

        $consulta = $em->createQuery($dql);
        $consulta->setParameter('pid', $pid); 
        $consulta->setParameter('nid', $nid);
        $consulta->setParameter('mgid', $mgid);

        return $consulta->getResult();
        
        
    }
    
}

?>
