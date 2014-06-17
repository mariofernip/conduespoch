<?php

namespace yony\academicoBundle\Entity;

use yony\academicoBundle\Entity\Curso;
use yony\academicoBundle\Entity\Paralelo;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * @ORM\Table(name="nivel", 
 * uniqueConstraints={
 * @ORM\UniqueConstraint(name="unique_nivel", columns={"curso_id","paralelo_id"})
 *  })
 * @UniqueEntity(fields={"curso_id","paralelo_id"}, message="UniqueEntity_validator")
 * @ORM\Entity
 */


class Nivel {
    
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer") 
     * @ORM\GeneratedValue  
     */
    protected $id;     
    
    
    /** @ORM\Column(type="string", length=128, nullable=true) */    
    protected $descripcion;
    
    /**
     * @ORM\ManyToOne(targetEntity="yony\academicoBundle\Entity\Curso") 
     * @ORM\JoinColumn(name="curso_id", referencedColumnName="id")
     */
    protected $curso;
    
    /**
     * @ORM\ManyToOne(targetEntity="yony\academicoBundle\Entity\Paralelo")      
     * @ORM\JoinColumn(name="paralelo_id", referencedColumnName="id")
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
     * @param \yony\academicoBundle\Entity\Curso $curso
     * @return Nivel
     */
    public function setCurso(\yony\academicoBundle\Entity\Curso $curso = null)
    {
        $this->curso = $curso;
    
        return $this;
    }

    /**
     * Get curso
     *
     * @return \yony\academicoBundle\Entity\Curso 
     */
    public function getCurso()
    {
        return $this->curso;
    }

    /**
     * Set paralelo
     *
     * @param \yony\academicoBundle\Entity\Paralelo $paralelo
     * @return Nivel
     */
    public function setParalelo(\yony\academicoBundle\Entity\Paralelo $paralelo = null)
    {
        $this->paralelo = $paralelo;
    
        return $this;
    }

    /**
     * Get paralelo
     *
     * @return \yony\academicoBundle\Entity\Paralelo 
     */
    public function getParalelo()
    {
        return $this->paralelo;
    }
    
    public function __toString() {
        return $this->curso->getNombre().' '.$this->paralelo->getNombre();
    }
}