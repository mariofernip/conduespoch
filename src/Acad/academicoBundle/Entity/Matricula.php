<?php

namespace Acad\academicoBundle\Entity;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Table(name="matricula", 
 * uniqueConstraints={
 * @ORM\UniqueConstraint(name="unique_matricula", columns={"nivel_id","periodo_id", "estudiante_id"})
 *  })
 * @UniqueEntity(fields={"nivel", "periodo", "estudiante"}, message="El estudiante ya ha sido previamente matriculado")
 * @ORM\Entity
 */

class Matricula {
    
    /** 
     * @ORM\Id
     * @ORM\Column( type="integer") 
     * @ORM\GeneratedValue  
     */
    protected $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Acad\administrativoBundle\Entity\Nivel") 
     * @ORM\JoinColumn(name="nivel_id", referencedColumnName="id")
     * @Assert\NotBlank(message="Por favor seleccione un curso")
     */
    protected $nivel;
    
    /**
     * @ORM\ManyToOne(targetEntity="Acad\administrativoBundle\Entity\Periodo") 
     * @ORM\JoinColumn(name="periodo_id", referencedColumnName="id")
     */
    protected $periodo;
    
    /**
     * @ORM\ManyToOne(targetEntity="Acad\academicoBundle\Entity\Estudiante") 
     * @ORM\JoinColumn(name="estudiante_id", referencedColumnName="id")
     * @Assert\NotBlank(message="Por favor seleccionar un estudiante")
     */
    protected $estudiante;
    
    
     /**
     *
     * @ORM\Column(type="string", length=32, nullable=false)
     * @Assert\Choice(choices = {"Diurna", "Vespertina","Nocturna"})
     * @Assert\NotBlank(message="Por favor seleccione una sección")
     */
     protected $seccion;

    /**
     *
     * @ORM\Column(type="date", nullable=false)
     */
    protected $fechamatricula;

    /**
     *
     * @ORM\Column(type="integer", length=16, nullable=false)
     */
    protected $estado;

    /**
     *
     * @ORM\Column(type="string", length=128, nullable=true)
     * @Assert\Blank()
     */
    protected $observaciones;
    
    


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
     * Set seccion
     *
     * @param string $seccion
     * @return Matricula
     */
    public function setSeccion($seccion)
    {
        $this->seccion = $seccion;
    
        return $this;
    }

    /**
     * Get seccion
     *
     * @return string 
     */
    public function getSeccion()
    {
        return $this->seccion;
    }

    /**
     * Set fechamatricula
     *
     * @param \DateTime $fechamatricula
     * @return Matricula
     */
    public function setFechamatricula($fechamatricula)
    {
        $this->fechamatricula = $fechamatricula;
    
        return $this;
    }

    /**
     * Get fechamatricula
     *
     * @return \DateTime 
     */
    public function getFechamatricula()
    {
        return $this->fechamatricula;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return Matricula
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    
        return $this;
    }

    /**
     * Get estado
     *
     * @return string 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return Matricula
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;
    
        return $this;
    }

    /**
     * Get observaciones
     *
     * @return string 
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set nivel
     *
     * @param \Acad\academicoBundle\Entity\Nivel $nivel
     * @return Matricula
     */
    public function setNivel(\Acad\administrativoBundle\Entity\Nivel $nivel = null)
    {
        $this->nivel = $nivel;
    
        return $this;
    }

    /**
     * Get nivel
     *
     * @return \Acad\administrativoBundle\Entity\Nivel 
     */
    public function getNivel()
    {
        return $this->nivel;
    }

    /**
     * Set periodo
     *
     * @param \Acad\administrativoBundle\Entity\Periodo $periodo
     * @return Matricula
     */
    public function setPeriodo(\Acad\administrativoBundle\Entity\Periodo $periodo = null)
    {
        $this->periodo = $periodo;
    
        return $this;
    }

    /**
     * Get periodo
     *
     * @return \Acad\administrativoBundle\Entity\Periodo 
     */
    public function getPeriodo()
    {
        return $this->periodo;
    }

    /**
     * Set estudiante
     *
     * @param \Acad\academicoBundle\Entity\Estudiante $estudiante
     * @return Matricula
     */
    public function setEstudiante(\Acad\academicoBundle\Entity\Estudiante $estudiante = null)
    {
        $this->estudiante = $estudiante;
    
        return $this;
    }

    /**
     * Get estudiante
     *
     * @return \Acad\academicoBundle\Entity\Estudiante 
     */
    public function getEstudiante()
    {
        return $this->estudiante;
    }
}