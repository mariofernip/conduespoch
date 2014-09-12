<?php

namespace Acad\administrativoBundle\Entity;

use Doctrine\ORM\EntityRepository;


class PeriodoRepository extends EntityRepository{

    
    public function getPeriodoActual() {
        $em= $this->getEntityManager();
        
        $dql = 'select p
                FROM administrativoBundle:Periodo p               
                WHERE p.estado = 1
                order by p.id desc
                ';
        $consulta = $em->createQuery($dql);        
        $consulta->setMaxResults(1);
        
        return $consulta->getOneOrNullResult();
        
        
    }

    public function getMateriasSubperiodo($pid) {
        
        
        $em= $this->getEntityManager();
        
        $dql = 'select mp,sp,p
                FROM academicoBundle:MateriaPeriodo mp
                Join mp.subperiodo sp
                Join sp.periodo p
                WHERE p.id = :pid
                order by sp.tipo asc
                ';
        $consulta = $em->createQuery($dql);   
        $consulta->setParameter('pid', $pid);
        
        return $consulta->getResult();
        
        
    }
    
    
     public function getMateriasSubperiodounoytres($pid) {
        
        
        $em= $this->getEntityManager();
        $tu = 1;
        $tt = 3;  
        $dql = 'select mp,sp,p
                FROM academicoBundle:MateriaPeriodo mp
                Join mp.subperiodo sp
                Join sp.periodo p
                WHERE p.id = :pid and
                sp.tipo = :tu or
                sp.tipo = :tt                
                ';
        $consulta = $em->createQuery($dql);   
        $consulta->setParameter('pid', $pid);
        $consulta->setParameter('tu', $tu);
        $consulta->setParameter('tt', $tt);
       
        return $consulta->getResult();
        
        
    }
   
    
    public function getprimerSubperiodo($pid) {
        
        
        $em= $this->getEntityManager();
        
        $dql = 'select sp,p
                FROM administrativoBundle:SubPeriodo sp
                Join sp.periodo p
                WHERE p.id = :pid
                order by sp.tipo asc
                ';
        $consulta = $em->createQuery($dql);   
        $consulta->setParameter('pid', $pid);
        
        return $consulta->getResult();
        
        
    }

    
    public function getnumeroMateriasSubperiodo($pid) {
        
        
        $em= $this->getEntityManager();
        $std = 0;
        $dql = 'select count(sp.id) 
                FROM administrativoBundle:SubPeriodo sp
                Join sp.periodo p
                WHERE p.id = :pid and
                sp.estado != :std
                ';
        $consulta = $em->createQuery($dql);   
        $consulta->setParameter('pid', $pid);
        $consulta->setParameter('std', $std);
        
        $count = $consulta->getSingleScalarResult();
        return $count;
        
        
    }
    
    public function getnumeroMateriasSubperiodounoytres($pid)
     {                
        $em= $this->getEntityManager();
        $std = 1;
        $tipo1 = 1;        
        $tipo3 = 3;                
        $dql = 'select count(sp.id) 
                FROM administrativoBundle:SubPeriodo sp
                Join sp.periodo p
                WHERE p.id = :pid and
                sp.estado = :std and
                sp.tipo = :tu 
                
                ';
        
        $consulta = $em->createQuery($dql);   
        $consulta->setParameter('pid', $pid);
        $consulta->setParameter('std', $std);
        $consulta->setParameter('tu', $tipo1);        
        $count = $consulta->getSingleScalarResult();
        
        $dql3 = 'select count(sp.id) 
                FROM administrativoBundle:SubPeriodo sp
                Join sp.periodo p
                WHERE p.id = :pid and
                sp.estado = :std and
                 sp.tipo = :tt
                
                ';
        $consulta3 = $em->createQuery($dql3);   
        $consulta3->setParameter('pid', $pid);
        $consulta3->setParameter('std', $std);
        $consulta3->setParameter('tt', $tipo3);        
        $count3 = $consulta3->getSingleScalarResult();
        
        $total = $count+$count3;
        
        return $total;
        
        
    }
    
    public function getTodasHoras() {
        
        $em = $this->getEntityManager();

        $dql = 'select h
                FROM administrativoBundle:Hora h                                               
                ORDER BY h.hora_inicio ASC
                ';
 

        $consulta = $em->createQuery($dql);

        return $consulta->getResult();
        
    }
    

    public function getSubperiodoActivo($pid) {
        
        
        $em = $this->getEntityManager();
        $tipo='2';
        $dql = 'select ma,mp,sp,p
                FROM academicoBundle:MateriaAsignada ma                                               
                Join ma.materiaperiodo mp
                Join mp.subperiodo sp
                Join sp.periodo p
                where
                    p.id = :pid and
                    sp.tipo = :tipo
                
                ';
 

        $consulta = $em->createQuery($dql);
        
        $consulta->setParameter('pid', $pid);
        $consulta->setParameter('tipo', $tipo);

        return $consulta->getResult();
    }
    
}





?>
