<?php

namespace Acad\academicoBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller;


class EstudianteRepository extends EntityRepository {
    
    public function findEstudiantexInscripcion($cedula) {
        
        $em = $this->getEntityManager();

        $dql = 'select i, e 
                FROM AcadacademicoBundle:Inscripcion i
                JOIN i.estudiante e
                WHERE e.cedula= :cedu                
                ';

        $consulta = $em->createQuery($dql);
        $consulta->setParameter('cedu', $cedula);        
        


        return $consulta->getSingleResult();
        
        
    }
    
    
}

?>
