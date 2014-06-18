<?php


namespace Acad\academicoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Acad\administrativoBundle\Entity\Materia;
use Acad\academicoBundle\Entity\Matricula;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Table(name="materiaasignada",
 * uniqueConstraints={
 * @ORM\UniqueConstraint(name="unique_materiaasignada", columns={"matricula_id","materia_id"})
 *  })
 * @UniqueEntity(fields={"matricula_id","materia_id"}, message="El registro a insertar ya existe")
 * @ORM\Entity
 */
class MateriaAsignada {
    
    /** 
     * @ORM\Id
     * @ORM\Column( type="integer") 
     * @ORM\GeneratedValue  
     */
    protected $id;
        
     
      /**
     * @ORM\ManyToOne(targetEntity="Acad\academicoBundle\Entity\Matricula") 
     * @ORM\JoinColumn(name="matricula_id", referencedColumnName="id")
     */
    protected $matricula;
    
    
      /**
     * @ORM\ManyToOne(targetEntity="Acad\administrativoBundle\Entity\Materia") 
     * @ORM\JoinColumn(name="materia_id", referencedColumnName="id")
     */
    protected $materia;
    

}