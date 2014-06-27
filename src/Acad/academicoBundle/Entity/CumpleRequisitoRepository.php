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

    public function getEstudiantesMatricula() {
        
        $em = $this->getEntityManager();

        $dql = 'select m,e,ee,i
                FROM academicoBundle:Matricula m               
                Join m.estudiante e                
                Join academicoBundle:Inscripcion i                
                join i.estudiante ee
                WHERE e.cedula != ee.cedula
                ';
        $consulta = $em->createQuery($dql);
        
        return $consulta->getResult();
        
    } 
    

}

?>
