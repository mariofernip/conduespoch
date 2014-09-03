<?php

namespace Acad\academicoBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;
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
                          p.id = :pid                          
                order by r.descripcion asc
                ';
        $consulta = $em->createQuery($dql);
        $consulta->setParameter('cedu', $cedula);                
        $consulta->setParameter('pid', $pid);                        

        return $consulta->getResult();
    }

    public function getNumeroRequisitosActivoxEstudiante($cedula,$pid) {
        
        $em = $this->getEntityManager();

        $dql = 'select count(cr.estado)
                FROM academicoBundle:CumpleRequisito cr                
                Join cr.requisito r
                Join cr.inscripcion i
                Join i.periodo p
                Join i.estudiante e
                WHERE e.cedula = :cedu and
                          p.id = :pid  and                          
                          r.estado= 1 and
                          cr.estado= true
                GROUP BY cr.estado
                ';
        $consulta = $em->createQuery($dql);
        $consulta->setParameter('cedu', $cedula);                
        $consulta->setParameter('pid', $pid);                        

        //return $numRequisitos = $consulta->getResult(Query::HYDRATE_SINGLE_SCALAR); 
        return $consulta->getOneOrNullResult();
    }
    
    public function getNumeroRequisitosActivosxPeriodo() {
        
        $em = $this->getEntityManager();

        $dql = 'select count(r.estado)
                FROM administrativoBundle:Requisito r                
                WHERE r.estado= 1
                GROUP BY r.estado
                ';
        $consulta = $em->createQuery($dql);        

        //return $numRequisitos = $consulta->getResult(Query::HYDRATE_SINGLE_SCALAR); 
        return $consulta->getOneOrNullResult();
    } 
 
    public function getEStadoInscripcionxEstudiante($cedula, $pid) {
        
        
        $em = $this->getEntityManager();

        $dql = 'select i,p,e
                FROM academicoBundle:Inscripcion i
                join i.periodo p
                join i.estudiante e
                WHERE e.cedula = :cedu and
                      p.id = :pid and
                      i.estado = 0
                
                ';
        $consulta = $em->createQuery($dql);        
        $consulta->setParameter('cedu', $cedula);                
        $consulta->setParameter('pid', $pid);                        

        return $consulta->getOneOrNullResult();
        
    }
    
}

?>
