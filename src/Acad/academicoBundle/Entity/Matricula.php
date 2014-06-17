<?php

namespace yony\academicoBundle\Entity;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Table(name="matricula", 
 * uniqueConstraints={
 * @ORM\UniqueConstraint(name="unique_matricula", columns={"nivel_id","periodo_id", "estudiante_id"})
 *  })
 * @UniqueEntity(fields={"nivel_id", "periodo_id", "estudiante_id"}, message="UniqueEntity_validator")
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
     * @ORM\ManyToOne(targetEntity="yony\academicoBundle\Entity\Nivel") 
     * @ORM\JoinColumn(name="nivel_id", referencedColumnName="id")
     */
    protected $nivel;
    
    /**
     * @ORM\ManyToOne(targetEntity="yony\academicoBundle\Entity\Periodo") 
     * @ORM\JoinColumn(name="periodo_id", referencedColumnName="id")
     */
    protected $periodo;
    
    /**
     * @ORM\ManyToOne(targetEntity="yony\academicoBundle\Entity\Estudiante") 
     * @ORM\JoinColumn(name="estudiante_id", referencedColumnName="id")
     */
    protected $estudiante;
    
    
     /**
     *
     * @ORM\Column(type="string", length=32, nullable=false)
     */
     protected $seccion;

    /**
     *
     * @ORM\Column(type="date", nullable=false)
     */
    protected $fechamatricula;

    /**
     *
     * @ORM\Column(type="string", length=16, nullable=false)
     */
    protected $estado;

    /**
     *
     * @ORM\Column(type="string", length=128, nullable=true)
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
     * @param \yony\academicoBundle\Entity\Nivel $nivel
     * @return Matricula
     */
    public function setNivel(\yony\academicoBundle\Entity\Nivel $nivel = null)
    {
        $this->nivel = $nivel;
    
        return $this;
    }

    /**
     * Get nivel
     *
     * @return \yony\academicoBundle\Entity\Nivel 
     */
    public function getNivel()
    {
        return $this->nivel;
    }

    /**
     * Set periodo
     *
     * @param \yony\academicoBundle\Entity\Periodo $periodo
     * @return Matricula
     */
    public function setPeriodo(\yony\academicoBundle\Entity\Periodo $periodo = null)
    {
        $this->periodo = $periodo;
    
        return $this;
    }

    /**
     * Get periodo
     *
     * @return \yony\academicoBundle\Entity\Periodo 
     */
    public function getPeriodo()
    {
        return $this->periodo;
    }

    /**
     * Set estudiante
     *
     * @param \yony\academicoBundle\Entity\Estudiante $estudiante
     * @return Matricula
     */
    public function setEstudiante(\yony\academicoBundle\Entity\Estudiante $estudiante = null)
    {
        $this->estudiante = $estudiante;
    
        return $this;
    }

    /**
     * Get estudiante
     *
     * @return \yony\academicoBundle\Entity\Estudiante 
     */
    public function getEstudiante()
    {
        return $this->estudiante;
    }
}