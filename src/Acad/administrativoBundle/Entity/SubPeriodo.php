<?php

namespace Acad\administrativoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * @ORM\Table(name="subperiodo",
 * uniqueConstraints={
 * @ORM\UniqueConstraint(name="unique_subperiodo", columns={"periodo_id","tipo"})
 *  })
 * @UniqueEntity(fields={"periodo", "tipo"}, message="El regisro a insertar ya existe")
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
     * @ORM\Column(type="string", length=32, nullable=false)
     * @Assert\Choice(choices = {"1", "2","3"})
     */
    protected $tipo;    
        
    
    /**
     *
     * @ORM\Column(type="date", nullable=true)     
     * @Assert\Date()
     */
    protected $finicio;

    /**
     *
     * @ORM\Column(type="date", nullable=true)    
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
    
    public function __toString() {
        $ntipo='';
        if($this->tipo=='1'){
            $ntipo='Cuatrimestre';
        }
        if($this->tipo=='2'){
            $ntipo='Bimestre';
        }
        if($this->tipo=='3'){
            $ntipo='General';
        }
        return  $ntipo;
    }
}
