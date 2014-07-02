<?php

namespace Acad\academicoBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller;


class CumpleRequisitoRepository extends EntityRepository {
    
    public function findRequisitosEstudiante($cedula,$pid) {
        
        $em = $this->getEntityManager();

        $dql = 'select cr, i,p,e,r
                FROM academicoBundle:CumpleRequisito cr                
                Join cr.requisito r
                Join cr.inscripcion i
                Join i.periodo p
                Join i.estudiante e
                WHERE e.cedula = :cedu and
                          p.id = :pid  and
                          i.estado= 1 and
                          r.estado= 1
                order by r.descripcion asc
                ';
        $consulta = $em->createQuery($dql);
        $consulta->setParameter('cedu', $cedula);                
        $consulta->setParameter('pid', $pid);                        

        return $consulta->getResult();
    }

}

?>
