<?php

namespace Acad\academicoBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Table(name="materiaperiodo",
 * uniqueConstraints={
 * @ORM\UniqueConstraint(name="unique_periodomateria", columns={"subperiodo_id","materia_id"})
 *  })
 * @UniqueEntity(fields={"subperiodo","materia"}, message="El registro a insertar ya existe")
 * @ORM\Entity
 */

class MateriaPeriodo {    
    /**
     *
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    protected $id;
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="Acad\administrativoBundle\Entity\Materia") 
     * @ORM\JoinColumn(name="materia_id", referencedColumnName="id")
     * @Assert\NotBlank()
     */
   
    protected $materia;
    /**
     *
     * @ORM\ManyToOne(targetEntity="Acad\administrativoBundle\Entity\SubPeriodo") 
     * @ORM\JoinColumn(name="subperiodo_id", referencedColumnName="id")
     * @Assert\NotBlank()
     */
    protected $subperiodo;
       
     
     

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set materia
     *
     * @param \Acad\administrativoBundle\Entity\Materia $materia
     * @return MateriaPeriodo
     */
    public function setMateria(\Acad\administrativoBundle\Entity\Materia $materia = null)
    {
        $this->materia = $materia;
    
        return $this;
    }

    /**
     * Get materia
     *
     * @return \Acad\administrativoBundle\Entity\Materia 
     */
    public function getMateria()
    {
        return $this->materia;
    }

    /**
     * Set subperiodo
     *
     * @param \Acad\administrativoBundle\Entity\SubPeriodo $subperiodo
     * @return MateriaPeriodo
     */
    public function setSubperiodo(\Acad\administrativoBundle\Entity\SubPeriodo $subperiodo = null)
    {
        $this->subperiodo = $subperiodo;
    
        return $this;
    }

    /**
     * Get subperiodo
     *
     * @return \Acad\administrativoBundle\Entity\SubPeriodo 
     */
    public function getSubperiodo()
    {
        return $this->subperiodo;
    }
}