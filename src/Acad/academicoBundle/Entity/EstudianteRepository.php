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
    
    public function findEstudiantexInscripcionnovalida($cedula,$pid) {
        
        $em = $this->getEntityManager();

        $dql = 'select i,e,p
                FROM academicoBundle:Inscripcion i                
                Join i.estudiante e               
                Join i.periodo p                
                WHERE e.cedula = :cedu and
                          p.id = :pid  and
                          i.estado = 0
                
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
                order by dm.id desc                
                ';

        $consulta = $em->createQuery($dql);
        $consulta->setParameter('pid', $pid);    
        $consulta->setMaxResults(5);

        return $consulta->getResult();
        
    }
    
    public function getTodosDictadoMateria($pid) {
        
        $em = $this->getEntityManager();

        $dql = 'select dm,p
                FROM academicoBundle:Dictadomateria dm                               
                JOIN dm.periodo p
                where p.id = :pid
                order by dm.id desc                
                ';

        $consulta = $em->createQuery($dql);
        $consulta->setParameter('pid', $pid);            

        return $consulta->getResult();
        
    }
    
     public function findEstudiantexMatricula($eid) {
        
        $em = $this->getEntityManager();


                $consulta = $em->createQuery('
                SELECT i FROM academicoBundle:Inscripcion i
                WHERE i.estudiante = :id_estudiante');
                $consulta->setParameter('id_estudiante', $eid);     

        return $consulta->getOneOrNullResult();
    }
    
    public function findEstudiantexMatriculado($eid) {
        
        $em = $this->getEntityManager();


                $consulta = $em->createQuery('
                SELECT m FROM academicoBundle:Matricula m
                WHERE m.estado = 1
                AND m.estudiante = :id_estudiante');
                $consulta->setParameter('id_estudiante', $eid);     

        return $consulta->getOneOrNullResult();
    }
    
    public function findEstudiantexMatriculadoA($eid) {
        
        $em = $this->getEntityManager();


                $consulta = $em->createQuery('
                SELECT m FROM academicoBundle:Matricula m
                WHERE m.estado = 0
                AND m.estudiante = :id_estudiante');
                $consulta->setParameter('id_estudiante', $eid);     

        return $consulta->getOneOrNullResult();
    }
    
     public function findEstudiantexMateriaxSeccionNocturna($materias, $nivel) {
        
        $em = $this->getEntityManager();
        $seccion='Nocturna';
        $dql =  'SELECT ma, m, e, a, mp FROM academicoBundle:Asistencia a
                join a.materiaasignada ma
                join ma.matricula m
                Join ma.materiaperiodo mp
                join m.estudiante e
                join m.nivel n
                WHERE m.estado = 1 
                AND n.id =:nid 
                AND mp.materia = :mid 
                AND m.seccion = :sec';   
                
        $estudiante = $em->createQuery($dql);
        $estudiante->setParameter('mid', $materias);
        $estudiante->setParameter('sec', $seccion);
        $estudiante->setParameter('nid', $nivel);
        return $estudiante->getResult();
        
    }
    
    public function findEstudiantexMateriaxSeccionDiurna($materias, $nivel) {
        
        $em = $this->getEntityManager();
        $seccion='Diurna';
        $dql =  'SELECT ma, m, e, a,mp FROM academicoBundle:Asistencia a
                join a.materiaasignada ma
                join ma.matricula m
                join m.estudiante e
                join m.nivel n
                Join ma.materiaperiodo mp
                WHERE m.estado = 1 
                AND n.id =:nid 
                AND mp.materia = :mid 
                AND m.seccion = :sec';   
                
        $estudiante = $em->createQuery($dql);
        $estudiante->setParameter('mid', $materias);
        $estudiante->setParameter('sec', $seccion);
        $estudiante->setParameter('nid', $nivel);
        return $estudiante->getResult();
        
    }
    
    public function findEstudiantexMateriaxSeccionVespertina($materias, $nivel) {
        
        $em = $this->getEntityManager();
        $seccion='Vespertina';
        $dql =  'SELECT ma, m, e, a,mp FROM academicoBundle:Asistencia a
                join a.materiaasignada ma
                join ma.matricula m
                join m.estudiante e
                join m.nivel n
                Join ma.materiaperiodo mp
                WHERE m.estado = 1 
                AND n.id =:nid 
                AND mp.materia = :mid 
                AND m.seccion = :sec';   
                
        $estudiante = $em->createQuery($dql);
        $estudiante->setParameter('mid', $materias);
        $estudiante->setParameter('sec', $seccion);
        $estudiante->setParameter('nid', $nivel);
        return $estudiante->getResult();
        
    }
    
    
     public function findEstudiantexMateriaxSecciones($materias, $nivel) {
        
        $em = $this->getEntityManager();
        $dql =  'SELECT ma, m, e, a, mp FROM academicoBundle:Asistencia a
                join a.materiaasignada ma
                join ma.matricula m
                join m.estudiante e
                join m.nivel n
                Join ma.materiaperiodo mp
                WHERE m.estado = 1 
                AND n.id =:nid 
                AND mp.materia = :mid 
                ORDER BY m.seccion
                ';   
                
        $estudiante = $em->createQuery($dql);
        $estudiante->setParameter('mid', $materias);
        $estudiante->setParameter('nid', $nivel);
        return $estudiante->getResult();
        
    }
    
    public function findEstudiantexMateriaxSeccionesd($materias, $nivel) {
        
        $em = $this->getEntityManager();
        $seccion='Diurna';
        $dql =  'SELECT ma, m, e, a, mp FROM academicoBundle:Asistencia a
                join a.materiaasignada ma
                join ma.matricula m
                join m.estudiante e
                join m.nivel n
                Join ma.materiaperiodo mp
                WHERE m.estado = 1 
                AND n.id =:nid 
                AND mp.materia = :mid 
                AND m.seccion = :sec
                ';   
                
        $estudiante = $em->createQuery($dql);
        $estudiante->setParameter('mid', $materias);
        $estudiante->setParameter('nid', $nivel);
        $estudiante->setParameter('sec', $seccion);
        return $estudiante->getResult();
        
    }
    
    
     public function findEstudiantexMateriaxSeccionesv($materias, $nivel) {
        
        $em = $this->getEntityManager();
        $seccion='Vespertina';
        $dql =  'SELECT ma, m, e, a, mp FROM academicoBundle:Asistencia a
                join a.materiaasignada ma
                join ma.matricula m
                join m.estudiante e
                join m.nivel n
                Join ma.materiaperiodo mp
                WHERE m.estado = 1 
                AND n.id =:nid 
                AND mp.materia = :mid 
                AND m.seccion = :sec
                ';   
                
        $estudiante = $em->createQuery($dql);
        $estudiante->setParameter('mid', $materias);
        $estudiante->setParameter('nid', $nivel);
        $estudiante->setParameter('sec', $seccion);
        return $estudiante->getResult();
        
    }
   
     public function findEstudiantexMateriaxSeccionesn($materias, $nivel) {
        
        $em = $this->getEntityManager();
        $seccion='Nocturna';
        $dql =  'SELECT ma, m, e, a, mp FROM academicoBundle:Asistencia a
                join a.materiaasignada ma
                join ma.matricula m
                join m.estudiante e
                join m.nivel n
                Join ma.materiaperiodo mp
                WHERE m.estado = 1 
                AND n.id =:nid 
                AND mp.materia = :mid 
                AND m.seccion = :sec
                ';   
                
        $estudiante = $em->createQuery($dql);
        $estudiante->setParameter('mid', $materias);
        $estudiante->setParameter('nid', $nivel);
        $estudiante->setParameter('sec', $seccion);
        return $estudiante->getResult();
        
    }
   
    
        public function getMaterias() {
        
        $em = $this->getEntityManager();

        $dql = 'select dm, ma,mp  FROM academicoBundle:Dictadomateria dm   
                Join dm.materiaperiodo mp
                join mp.materia ma
                where ma.estado = 1';
        
        $consulta = $em->createQuery($dql);
        return $consulta->getResult();
        
    }
    
    public function getMateriasxNivel($nid) {
        
        $em = $this->getEntityManager();

        $dql = 'select dm, ma, mp  FROM academicoBundle:Dictadomateria dm   
                Join dm.materiaperiodo mp
                join mp.materia ma
                where ma.estado = 1
                and dm.nivel = :nid ';
        
        $consulta = $em->createQuery($dql);
        $consulta->setParameter('nid', $nid);
        return $consulta->getResult();
        
    }
    
public function findEstudiantexActaGeneral($materias, $nivel) {
        
        $em = $this->getEntityManager();
        
        $dql =  'SELECT sum(a.notatb) as notatb, sum(a.notaec) as notaec, sum(a.notapp) as notapp, sum(a.notapt) as notapt, e.cedula, e.apellido, e.nombre, m.seccion FROM academicoBundle:Evaluacion a
                join a.materiaasignada ma
                join ma.matricula m
                join m.estudiante e
                join m.nivel n
                Join ma.materiaperiodo mp
                WHERE m.estado = 1 
                AND n.id =:nid 
                AND mp.materia = :mid
                GROUP BY e.cedula, e.apellido, e.nombre, m.seccion
                ';   
        
        
        $estudiante = $em->createQuery($dql);
        $estudiante->setParameter('mid', $materias);
        $estudiante->setParameter('nid', $nivel);
        return $estudiante->getResult();        
    }
 
    public function getMesEvaluacionxPeriodoxActivo($pid) {
        
        
        $em = $this->getEntityManager();

        $dql = 'select count(me.id)
                FROM administrativoBundle:MesEvaluacion me                                               
                Join me.periodo p
                WHERE p.id = :pid
                ';

        $consulta = $em->createQuery($dql);
        $consulta->setParameter('pid', $pid);
              
        $count = $consulta->getSingleScalarResult();
         return $count;  
    }
    
    
    public function getMesEvaluacionxSub1PeriodoActivo($pid) {
        
        
        $em = $this->getEntityManager();
        $tipo = 1;
        $dql = 'select count(mp.id)
                FROM academicoBundle:MateriaPeriodo mp
                Join mp.subperiodo sp
                Join sp.periodo p
                WHERE p.id = :pid and 
                      sp.tipo = :tipo                        
                ';
        
        $consulta = $em->createQuery($dql);
        $consulta->setParameter('pid', $pid);
        $consulta->setParameter('tipo', $tipo);              
        $count = $consulta->getSingleScalarResult();
         return $count;  
    }
    
    public function getMesEvaluacionxSub2PeriodoActivo($pid) {
        
        $em = $this->getEntityManager();
        $tipo = 2;
        $dql = 'select count(mp.id)
                FROM academicoBundle:MateriaPeriodo mp
                Join mp.subperiodo sp
                Join sp.periodo p
                WHERE p.id = :pid and 
                      sp.tipo =:tipo                        
                ';
        

        $consulta = $em->createQuery($dql);
        $consulta->setParameter('pid', $pid);
        $consulta->setParameter('tipo', $tipo);
              
        $count = $consulta->getSingleScalarResult();
         return $count; 
    }
    
    public function getHorarioDictadoMateria($did, $pid) {
        
        $em = $this->getEntityManager();

        $dql = 'select dm,p,hc,m,mp
                FROM administrativoBundle:HorarioClase hc
                join hc.dictadomateria dm
                Join dm.materiaperiodo mp
                join mp.materia m
                join dm.periodo p
                join dm.docente d
                where p.id = :pid
                and d.cedula =:did
                order by  hc.dia, m.nombre asc
                ';

        $consulta = $em->createQuery($dql);
        $consulta->setParameter('pid', $pid); 
        $consulta->setParameter('did', $did);
        

        return $consulta->getResult();
        
    }
    
    
    public function findEstudiantexActaGeneral_secciond($materias, $nivel) {
        
        $em = $this->getEntityManager();
        $seccion='Diurna';
        $dql =  'SELECT sum(a.notatb) as notatb, sum(a.notaec) as notaec, sum(a.notapp) as notapp, sum(a.notapt) as notapt, e.cedula, e.apellido, e.nombre FROM academicoBundle:Evaluacion a
                join a.materiaasignada ma
                join ma.matricula m
                join m.estudiante e
                join m.nivel n
                Join ma.materiaperiodo mp
                WHERE m.estado = 1 
                AND n.id =:nid 
                AND mp.materia = :mid
                AND m.seccion = :sec                
                GROUP BY e.cedula, e.apellido, e.nombre
                ';   
        
        
        $estudiante = $em->createQuery($dql);
        $estudiante->setParameter('mid', $materias);
        $estudiante->setParameter('sec', $seccion);
        $estudiante->setParameter('nid', $nivel);
        //$estudiante->setParameter('subp', $subp);
        
        return $estudiante->getResult();        
    }

    
    public function findsecretariaEstudiantexActaGeneral_secciond($nivel) {
        
        $em = $this->getEntityManager();
        $seccion='Diurna';
        $dql =  'SELECT p, m, e, n  FROM academicoBundle:Promedio p
                join p.matricula m
                join m.estudiante e
                join m.nivel n
                WHERE m.estado = 1 
                AND n.id =:nid 
                AND m.seccion = :sec 
                ORDER BY e.apellido
                ';   
        
        
        $estudiante = $em->createQuery($dql);
        $estudiante->setParameter('sec', $seccion);
        $estudiante->setParameter('nid', $nivel);
        
        return $estudiante->getResult();        
    }
    
    public function findsecretariaEstudiantexActaGeneral_seccionv($nivel) {
        
        $em = $this->getEntityManager();
        $seccion='Vespertina';
        $dql =  'SELECT p, m, e, n  FROM academicoBundle:Promedio p
                join p.matricula m
                join m.estudiante e
                join m.nivel n
                WHERE m.estado = 1 
                AND n.id =:nid 
                AND m.seccion = :sec 
                ORDER BY e.apellido
                ';   
        
        
        $estudiante = $em->createQuery($dql);
        $estudiante->setParameter('sec', $seccion);
        $estudiante->setParameter('nid', $nivel);
        
        return $estudiante->getResult();        
    }
    
    public function findsecretariaEstudiantexActaGeneral_seccionn($nivel) {
        
        $em = $this->getEntityManager();
        $seccion='Nocturna';
        $dql =  'SELECT p, m, e, n  FROM academicoBundle:Promedio p
                join p.matricula m
                join m.estudiante e
                join m.nivel n
                WHERE m.estado = 1 
                AND n.id =:nid 
                AND m.seccion = :sec 
                ORDER BY e.apellido
                ';   
        
        
        $estudiante = $em->createQuery($dql);
        $estudiante->setParameter('sec', $seccion);
        $estudiante->setParameter('nid', $nivel);
        
        return $estudiante->getResult();        
    }
    
    
    
//     public function findEstudiantexActaGeneral_secciond($materias, $nivel) {
//        
//        $em = $this->getEntityManager();
//        $seccion='Diurna';
//        $dql =  'SELECT sum(a.notatb) as notatb, sum(a.notaec) as notaec, sum(a.notapp) as notapp, sum(a.notapt) as notapt, e.cedula, e.apellido, e.nombre FROM academicoBundle:Evaluacion a
//                join a.materiaasignada ma
//                join ma.matricula m
//                join m.estudiante e
//                join m.nivel n
//                Join ma.materiaperiodo mp
//                WHERE m.estado = 1 
//                AND n.id =:nid 
//                AND mp.materia = :mid
//                AND m.seccion = :sec
//                GROUP BY e.cedula, e.apellido, e.nombre
//                ';   
//        
//        
//        $estudiante = $em->createQuery($dql);
//        $estudiante->setParameter('mid', $materias);
//        $estudiante->setParameter('sec', $seccion);
//        $estudiante->setParameter('nid', $nivel);
//        
//        return $estudiante->getResult();        
//    }

    
    public function findEstudiantexActaGeneral_seccionv($materias, $nivel) {
        
        $em = $this->getEntityManager();
        $seccion='Vespertina';
        $dql =  'SELECT sum(a.notatb) as notatb, sum(a.notaec) as notaec, sum(a.notapp) as notapp, sum(a.notapt) as notapt, e.cedula, e.apellido, e.nombre FROM academicoBundle:Evaluacion a
                join a.materiaasignada ma
                join ma.matricula m
                join m.estudiante e
                join m.nivel n
                Join ma.materiaperiodo mp
                WHERE m.estado = 1 
                AND n.id =:nid 
                AND mp.materia = :mid
                AND m.seccion = :sec
                GROUP BY e.cedula, e.apellido, e.nombre
                ';   
        
        
        $estudiante = $em->createQuery($dql);
        $estudiante->setParameter('mid', $materias);
        $estudiante->setParameter('sec', $seccion);
        $estudiante->setParameter('nid', $nivel);
        return $estudiante->getResult();        
    }

    
    public function findEstudiantexActaGeneral_seccionn($materias, $nivel) {
        
        $em = $this->getEntityManager();
        $seccion='Nocturna';
        $dql =  'SELECT sum(a.notatb) as notatb, sum(a.notaec) as notaec, sum(a.notapp) as notapp, sum(a.notapt) as notapt, e.cedula, e.apellido, e.nombre FROM academicoBundle:Evaluacion a
                join a.materiaasignada ma
                join ma.matricula m
                join m.estudiante e
                join m.nivel n
                Join ma.materiaperiodo mp
                WHERE m.estado = 1 
                AND n.id =:nid 
                AND mp.materia = :mid
                AND m.seccion = :sec
                GROUP BY e.cedula, e.apellido, e.nombre
                ';   
        
        
        $estudiante = $em->createQuery($dql);
        $estudiante->setParameter('mid', $materias);
        $estudiante->setParameter('sec', $seccion);
        $estudiante->setParameter('nid', $nivel);
        return $estudiante->getResult();        
    }

    
     public function getMesConteo($mat, $pid) {
        
        
        $em = $this->getEntityManager();
       // $tipo = 2;
        $dql = 'select count(mp.id)
                FROM academicoBundle:MateriaPeriodo mp
                Join mp.subperiodo sp
                Join sp.periodo p
                WHERE p.id = :pid and 
                      mp.materia = :mat
                ';
        
        $consulta = $em->createQuery($dql);
        $consulta->setParameter('pid', $pid);
        $consulta->setParameter('mat', $mat);      
        $count = $consulta->getSingleScalarResult();
         return $count;  
    }
    
//     public function getMesConteo($mat, $pid, $tipo) {
//        
//        
//        $em = $this->getEntityManager();
//       // $tipo = 2;
//        $dql = 'select count(mp.id)
//                FROM academicoBundle:MateriaPeriodo mp
//                Join mp.subperiodo sp
//                Join sp.periodo p
//                WHERE p.id = :pid and 
//                      sp.tipo = :tipo and
//                      mp.materia = :mat
//                ';
//        
//        $consulta = $em->createQuery($dql);
//        $consulta->setParameter('pid', $pid);
//        $consulta->setParameter('mat', $mat);           
//        $consulta->setParameter('tipo', $tipo);    
//        $count = $consulta->getSingleScalarResult();
//         return $count;  
//    }
    
}

?>
