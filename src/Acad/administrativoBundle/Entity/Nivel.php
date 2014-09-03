<?php

namespace Acad\administrativoBundle\Entity;

use Acad\administrativoBundle\Entity\Curso;
use Acad\administrativoBundle\Entity\Paralelo;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * @ORM\Table(name="nivel", 
 * uniqueConstraints={
 * @ORM\UniqueConstraint(name="unique_nivel", columns={"curso_id","paralelo_id"})
 *  })
 * @UniqueEntity(fields={"curso","paralelo"}, message="El registro a insertar ya existe")
 * @ORM\Entity
 */


class Nivel {
    
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer") 
     * @ORM\GeneratedValue  
     */
    protected $id;     
    
    
    /** @ORM\Column(type="string", length=128, nullable=true) 
     */    
    protected $descripcion;
    
    /**
     * @ORM\ManyToOne(targetEntity="Acad\administrativoBundle\Entity\Curso") 
     * @ORM\JoinColumn(name="curso_id", referencedColumnName="id")
     * @Assert\NotBlank(message="Por favor seleccione un curso")
     */
    protected $curso;
    
    /**
     * @ORM\ManyToOne(targetEntity="Acad\administrativoBundle\Entity\Paralelo")      
     * @ORM\JoinColumn(name="paralelo_id", referencedColumnName="id")
     * @Assert\NotBlank(message="Por favor seleccione un paralelo")
     */
    protected $paralelo;
    
    
   

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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Nivel
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    
        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set curso
     *
     * @param \Acad\administrativoBundle\Entity\Curso $curso
     * @return Nivel
     */
    public function setCurso(\Acad\administrativoBundle\Entity\Curso $curso = null)
    {
        $this->curso = $curso;
    
        return $this;
    }

    /**
     * Get curso
     *
     * @return \Acad\administrativoBundle\Entity\Curso 
     */
    public function getCurso()
    {
        return $this->curso;
    }

    /**
     * Set paralelo
     *
     * @param \Acad\administrativoBundle\Entity\Paralelo $paralelo
     * @return Nivel
     */
    public function setParalelo(\Acad\administrativoBundle\Entity\Paralelo $paralelo = null)
    {
        $this->paralelo = $paralelo;
    
        return $this;
    }

    /**
     * Get paralelo
     *
     * @return \Acad\administrativoBundle\Entity\Paralelo 
     */
    public function getParalelo()
    {
        return $this->paralelo;
    }
    
    public function __toString() {
        return $this->curso->getNombre().' '.$this->paralelo->getNombre();
    }
}