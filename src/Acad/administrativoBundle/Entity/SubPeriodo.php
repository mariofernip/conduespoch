<?php

namespace Acad\administrativoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Table(name="subperiodo")
 * @ORM\Entity
 */
class SubPeriodo {
    
    
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer") 
     * @ORM\GeneratedValue  
     */
    protected $id;
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="Acad\administrativoBundle\Entity\Periodo") 
     * @ORM\JoinColumn(name="periodo_id", referencedColumnName="id")
     * @Assert\NotBlank()
     */
    protected $periodo;
    
    /**
     *
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\GeneratedValue
     */
    protected $tipo;    
        
    
    /**
     *
     * @ORM\Column(type="date", nullable=false)     
     * @Assert\Date()
     */
    protected $finicio;

    /**
     *
     * @ORM\Column(type="date", nullable=false)    
     * @Assert\Date()
     */
    protected $ffin;
    
    /**
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $estado;
    


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
     * Set tipo
     *
     * @param integer $tipo
     * @return SubPeriodo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    
        return $this;
    }

    /**
     * Get tipo
     *
     * @return integer 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set finicio
     *
     * @param \DateTime $finicio
     * @return SubPeriodo
     */
    public function setFinicio($finicio)
    {
        $this->finicio = $finicio;
    
        return $this;
    }

    /**
     * Get finicio
     *
     * @return \DateTime 
     */
    public function getFinicio()
    {
        return $this->finicio;
    }

    /**
     * Set ffin
     *
     * @param \DateTime $ffin
     * @return SubPeriodo
     */
    public function setFfin($ffin)
    {
        $this->ffin = $ffin;
    
        return $this;
    }

    /**
     * Get ffin
     *
     * @return \DateTime 
     */
    public function getFfin()
    {
        return $this->ffin;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     * @return SubPeriodo
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    
        return $this;
    }

    /**
     * Get estado
     *
     * @return boolean 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set periodo
     *
     * @param \Acad\administrativoBundle\Entity\Periodo $periodo
     * @return SubPeriodo
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
}