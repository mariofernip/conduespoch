<?php

namespace Acad\academicoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * @ORM\Table(name="examengrado", 
 * uniqueConstraints={
 * @ORM\UniqueConstraint(name="unique_examengrado", columns={"matricula_id","materiagrado_id"})
 *  })
 * @UniqueEntity(fields={"materiagrado","matricula"}, message="Registro duplicado")
 * @ORM\Entity(repositoryClass="Acad\academicoBundle\Entity\ExamenGradoRepository")
 */


class ExamenGrado {
    
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer") 
     * @ORM\GeneratedValue  
     */
    protected $id;     
    
    
    /**
     * @ORM\ManyToOne(targetEntity="Acad\academicoBundle\Entity\Matricula") 
     * @ORM\JoinColumn(name="matricula_id", referencedColumnName="id")
     * @Assert\NotBlank(message="Por favor seleccione un estudiante")
     */
    protected $matricula;
    
    /**
     * @ORM\ManyToOne(targetEntity="Acad\administrativoBundle\Entity\MateriaGrado")      
     * @ORM\JoinColumn(name="materiagrado_id", referencedColumnName="id")
     * @Assert\NotBlank(message="Por favor seleccione una materia")
     */
    protected $materiagrado;
    
    /** @ORM\Column(type="string", length=32, nullable=true)      
     */ 
    protected $equivalencia;

    /** @ORM\Column(type="string", length=96, nullable=true)      
     */ 
    protected $descripcion;
    
    /**
     * @ORM\Column(type="integer", nullable=false)
     * @Assert\Range(min=0, max=20)
     */
    protected $nota;
    

    public function __toString() {
        return $this->matricula->getEstudiante();
    }

    public function setId($id) {
        $this->id = $id;

        return $this;
    }
    
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
     * Set equivalencia
     *
     * @param string $equivalencia
     * @return ExamenGrado
     */
    public function setEquivalencia($equivalencia)
    {
        $this->equivalencia = $equivalencia;
    
        return $this;
    }

    /**
     * Get equivalencia
     *
     * @return string 
     */
    public function getEquivalencia()
    {
        return $this->equivalencia;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return ExamenGrado
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
     * Set matricula
     *
     * @param \Acad\academicoBundle\Entity\Matricula $matricula
     * @return ExamenGrado
     */
    public function setMatricula(\Acad\academicoBundle\Entity\Matricula $matricula = null)
    {
        $this->matricula = $matricula;
    
        return $this;
    }

    /**
     * Get matricula
     *
     * @return \Acad\academicoBundle\Entity\Matricula 
     */
    public function getMatricula()
    {
        return $this->matricula;
    }

    /**
     * Set materiagrado
     *
     * @param \Acad\administrativoBundle\Entity\MateriaGrado $materiagrado
     * @return ExamenGrado
     */
    public function setMateriagrado(\Acad\administrativoBundle\Entity\MateriaGrado $materiagrado = null)
    {
        $this->materiagrado = $materiagrado;
    
        return $this;
    }

    /**
     * Get materiagrado
     *
     * @return \Acad\administrativoBundle\Entity\MateriaGrado 
     */
    public function getMateriagrado()
    {
        return $this->materiagrado;
    }

    /**
     * Set nota
     *
     * @param integer $nota
     * @return ExamenGrado
     */
    public function setNota($nota)
    {
        $this->nota = $nota;
    
        return $this;
    }

    /**
     * Get nota
     *
     * @return integer 
     */
    public function getNota()
    {
        return $this->nota;
    }
}