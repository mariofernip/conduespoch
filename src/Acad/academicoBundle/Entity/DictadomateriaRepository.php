<?php

namespace Acad\academicoBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller;


class DictadomateriaRepository extends EntityRepository {
    
    public function getMateriasDocente($cedula,$pid) {
        
        $em = $this->getEntityManager();

        $dql = 'select dm,d,n,p,m
                FROM academicoBundle:Dictadomateria dm
                Join dm.docente d
                Join dm.nivel n
                Join dm.periodo p
                Join dm.materia m
                WHERE d.cedula = :cedu and
                          p.id = :pid
                          
                
                ';
        $consulta = $em->createQuery($dql);
        $consulta->setParameter('cedu', $cedula);                
        $consulta->setParameter('pid', $pid);                        

        return $consulta->getResult();
    }

    

}

?>
