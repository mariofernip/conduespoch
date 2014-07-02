<?php

namespace Acad\academicoBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller;


class EstudianteRepository extends EntityRepository {
    
    
    public function findEstudiantexInscripcion($cedula,$pid) {
        
        $em = $this->getEntityManager();

        $dql = 'select i,e,p
                FROM academicoBundle:Inscripcion i                
                Join i.estudiante e               
                Join i.periodo p                
                WHERE e.cedula = :cedu and
                          p.id = :pid                           
                
                ';

        $consulta = $em->createQuery($dql);
        $consulta->setParameter('cedu', $cedula);                
        $consulta->setParameter('pid', $pid);                
             

        return $consulta->getOneOrNullResult();
    }
    
    
    public function getDictadoMateria($pid) {
        
        $em = $this->getEntityManager();

        $dql = 'select dm,p
                FROM academicoBundle:Dictadomateria dm                               
                JOIN dm.periodo p
                where p.id = :pid
                ';

        $consulta = $em->createQuery($dql);
        $consulta->setParameter('pid', $pid);                                              

        return $consulta->getResult();
        
    }
}

?>
