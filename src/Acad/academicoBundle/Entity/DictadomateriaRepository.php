<?php

namespace Acad\academicoBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller;


class DictadomateriaRepository extends EntityRepository {
    
    public function getMateriasDocente($cedula,$pid) {
        
        $em = $this->getEntityManager();

        $dql = 'select dm,d,n,p,m,mp
                FROM academicoBundle:Dictadomateria dm
                Join dm.docente d
                Join dm.nivel n
                Join dm.periodo p
                Join dm.materiaperiodo mp
                Join mp.materia m
                WHERE d.cedula = :cedu and
                          p.id = :pid
                          
                
                ';
        $consulta = $em->createQuery($dql);
        $consulta->setParameter('cedu', $cedula);                
        $consulta->setParameter('pid', $pid);                        

        return $consulta->getResult();
    }

    public function getMateriasDocenteSubPeriodo($cedula,$pid) {
        
        $em = $this->getEntityManager();
        $std = 0;
        $dql = 'select dm,d,n,p,m,mp,sp
                FROM academicoBundle:Dictadomateria dm
                Join dm.docente d
                Join dm.nivel n
                Join dm.periodo p
                Join dm.materiaperiodo mp
                Join mp.subperiodo sp
                Join mp.materia m
                WHERE d.cedula = :cedu and
                          p.id = :pid  and
                          sp.estado != :std                          
                
                ';
        $consulta = $em->createQuery($dql);
        $consulta->setParameter('cedu', $cedula);                
        $consulta->setParameter('pid', $pid);                        
        $consulta->setParameter('std', $std);                        

        return $consulta->getResult();
    }

     public function getMateriasInspectorSubPeriodo($pid) {
        
        $em = $this->getEntityManager();
        $std = 0;
        $dql = 'select dm,n,p,m,mp,sp
                FROM academicoBundle:Dictadomateria dm
                Join dm.nivel n
                Join dm.periodo p
                Join dm.materiaperiodo mp
                Join mp.subperiodo sp
                Join mp.materia m
                WHERE     p.id = :pid  and
                          sp.estado != :std                          
                
                ';
        $consulta = $em->createQuery($dql);              
        $consulta->setParameter('pid', $pid);                        
        $consulta->setParameter('std', $std);                        

        return $consulta->getResult();
    }
    
    public function getEstudiantesxMateriaSD($mid,$pid,$nid) {
        $seccion='Diurna';
        $em = $this->getEntityManager();
        $dql = 'select ma,m,p,n,e,mp
                FROM academicoBundle:MateriaAsignada ma
                Join ma.matricula m
                Join m.periodo p  
                Join m.estudiante e
                Join m.nivel n
                Join ma.materiaperiodo mp
                WHERE mp.materia = :mid and
                          p.id = :pid and
                          m.estado = 1 and
                         m.nivel= :nid  and
                          m.seccion = :sec
                          
                ';
        $consulta = $em->createQuery($dql);
        $consulta->setParameter('mid', $mid);                
        $consulta->setParameter('pid', $pid);                        
        $consulta->setParameter('nid', $nid);                        
        $consulta->setParameter('sec', $seccion);                        
        return $consulta->getResult();
        
    }
    
    public function getEstudiantesxMateriaSV($mid,$pid,$nid) {
        $seccion='Vespertina';
        $em = $this->getEntityManager();
        $dql = 'select ma,m,p,n,e,mp
                FROM academicoBundle:MateriaAsignada ma
                Join ma.matricula m
                Join m.periodo p  
                Join m.estudiante e
                Join m.nivel n
                Join ma.materiaperiodo mp
                WHERE mp.materia = :mid and
                          p.id = :pid and
                          m.estado = 1 and
                         m.nivel= :nid  and
                          m.seccion = :sec
                          
                ';
        $consulta = $em->createQuery($dql);
        $consulta->setParameter('mid', $mid);                
        $consulta->setParameter('pid', $pid);                        
        $consulta->setParameter('nid', $nid);                        
        $consulta->setParameter('sec', $seccion);                        
        return $consulta->getResult();
        
    }
    
    public function getEstudiantesxMateriaSN($mid,$pid,$nid) {
        $seccion='Nocturna';
        $em = $this->getEntityManager();
        $dql = 'select ma,m,p,n,e,mp
                FROM academicoBundle:MateriaAsignada ma
                Join ma.matricula m
                Join m.periodo p  
                Join m.estudiante e
                Join m.nivel n
                Join ma.materiaperiodo mp
                WHERE mp.materia = :mid and
                          p.id = :pid and
                          m.estado = 1 and
                         m.nivel= :nid  and
                          m.seccion = :sec
                          
                ';
        $consulta = $em->createQuery($dql);
        $consulta->setParameter('mid', $mid);                
        $consulta->setParameter('pid', $pid);                        
        $consulta->setParameter('nid', $nid);                        
        $consulta->setParameter('sec', $seccion);                        
        return $consulta->getResult();
        
    }
    
    public function getEvaluacionEstudiantesxMateria($mid,$pid,$nid,$mesid) {
        
        $em = $this->getEntityManager();

        $dql = 'select ev, ma,me,m,p,mp
                FROM academicoBundle:Evaluacion ev
                Join ev.materiaasignada ma
                Join ma.matricula m
                Join m.periodo p
                Join m.nivel n
                Join ma.materiaperiodo mp
                
                
                Join ev.mesevaluacion me
                WHERE mp.materia = :mid and                          
                          me.id = :mesid and
                          p.id= :pid and
                          n.id = :nid
                       
                ';
        $consulta = $em->createQuery($dql);
        $consulta->setParameter('mid', $mid);                
        $consulta->setParameter('pid', $pid);                        
        $consulta->setParameter('nid', $nid);    
        $consulta->setParameter('mesid', $mesid);    
        
        
        return $consulta->getResult();
        
    }
    
    
    public function getEvaluacionExistente($mat,$mes, $nota) {
        
        
        $em = $this->getEntityManager();

        $dql = 'select ev
                FROM academicoBundle:Evaluacion ev
                
                WHERE ev.materiaasignada = :mat and
                          ev.mesevaluacion = :mes and
                          ev.tiponota = :nota
                          
                ';
        $consulta = $em->createQuery($dql);
        $consulta->setParameter('mat', $mat);                
        $consulta->setParameter('mes', $mes);                        
        $consulta->setParameter('nota', $nota);                        
        
        return $consulta->getOneOrNullResult();
        
    }

    // obtiene lista de estudiantes en suspenso, 
    public function getSuspensoEstudiantesxMateria($mid,$pid,$nid) {
        
        $em = $this->getEntityManager();

        $dql = 'select ma,m,mat,p,n,mp
                FROM academicoBundle:MateriaAsignada ma
                Join ma.matricula m
                Join ma.materiaperiodo mp
                Join mp.materia mat
                Join m.periodo p
                Join m.nivel n
                WHERE mat.id = :mid and                                                    
                          p.id= :pid and
                          n.id = :nid
                          order by ma.promediofinal asc
                ';
        $consulta = $em->createQuery($dql);
        $consulta->setParameter('mid', $mid);                
        $consulta->setParameter('pid', $pid);                        
        $consulta->setParameter('nid', $nid);            
        
        
        return $consulta->getResult();
        
    }

    public function getHorarioDocente($did, $pid) {
        
        $em = $this->getEntityManager();

        $dql = 'select hc,dm,p,d
                FROM administrativoBundle:HorarioClase hc
                Join hc.dictadomateria dm
                Join dm. periodo p
                Join dm.docente d                
                WHERE p.id = :pid and                                                    
                          d.id= :did
                          
                       
                ';
        $consulta = $em->createQuery($dql);
        $consulta->setParameter('pid', $pid);                
        $consulta->setParameter('did', $did);                        
        return $consulta->getResult();
        
    }
    

    // obtiene lista de estudiantes en suspenso, 
    public function getSuspensoEstudiantesxMateriaRPT($mid,$pid,$nid) {
        
        $em = $this->getEntityManager();
        $dql = 'select ma,m,mat,p,n,mp
                FROM academicoBundle:MateriaAsignada ma
                Join ma.matricula m
                Join ma.materiaperiodo mp
                Join mp.materia mat
                Join m.periodo p
                Join m.nivel n
                WHERE mat.id = :mid and                                                    
                          p.id= :pid and
                          n.id = :nid and
                          ma.notasuspenso > 0
                          
                       
                ';
        $consulta = $em->createQuery($dql);
        $consulta->setParameter('mid', $mid);                
        $consulta->setParameter('pid', $pid);                                
        $consulta->setParameter('nid', $nid);            
        
        return $consulta->getResult();

        
    }
    
       // obtiene lista de estudiantes en suspenso, 
    public function getSuspensoEstudiantesxMateriaRPT_seccion($mid,$pid,$nid) {
        
        $em = $this->getEntityManager();
        $dql = 'select ma,m,mat,p,n,mp
                FROM academicoBundle:MateriaAsignada ma
                Join ma.matricula m
                Join ma.materiaperiodo mp
                Join mp.materia mat
                Join m.periodo p
                Join m.nivel n
                WHERE mat.id = :mid and                                                    
                          p.id= :pid and
                          n.id = :nid and
                          ma.notasuspenso > 0
                          
                       
                ';
        $consulta = $em->createQuery($dql);
        $consulta->setParameter('mid', $mid);                
        $consulta->setParameter('pid', $pid);                                
        $consulta->setParameter('nid', $nid);            
        $consulta->setMaxResults(1);
        return $consulta->getResult();

        
    }
    
}

?>
