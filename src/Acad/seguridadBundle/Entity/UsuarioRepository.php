<?php

namespace Acad\seguridadBundle\Entity;

use Doctrine\ORM\EntityRepository;


class UsuarioRepository extends EntityRepository {
    
    public function findTodasLasCompras($usuario) {
        
//        $em=  $this->getEntityManager();
//        
//        $consulta=$em->createQuery('
//            Select v,o,t
//                from AcadBundle:Venta v
//                join v.oferta o
//                join o.tienda t
//                where v.usuario = :id
//                order by  v.fecha desc ');
//        $consulta->setParameter('id', $usuario);
//        
//        return $consulta->getResult();
    }
    
    
    
    

}

?>
