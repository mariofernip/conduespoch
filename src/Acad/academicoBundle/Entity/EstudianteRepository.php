<?php

namespace Acad\academicoBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller;


class EstudianteRepository extends EntityRepository {
    
    public function findEstudiantexInscripcion($cedula,$pid) {
        
        $em = $this->getEntityManager();

        $dql = 'select i,e 
                FROM academicoBundle:Inscripcion i
                Join i.estudiante e
                Join i.periodo p
                WHERE e.cedula= :cedu and
                        p.id = :pid
                order by e.cedula asc
                ';

        $consulta = $em->createQuery($dql);
        $consulta->setParameter('cedu', $cedula);                
        $consulta->setParameter('pid', $pid);                
        $consulta->setMaxResults(1);
        $consulta->execute();

        return $consulta->getOneOrNullResult();
    }
    
    
    
    
}

?>
