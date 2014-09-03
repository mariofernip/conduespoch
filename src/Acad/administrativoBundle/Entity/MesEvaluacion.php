<?php

namespace Acad\administrativoBundle\Entity;


use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="mesevaluacion", 
 * uniqueConstraints={
 * @ORM\UniqueConstraint(name="unique_evaluacionnota", columns={"nota_id","periodo_id"})
 *  })
 * @UniqueEntity(fields={"nota", "periodo"}, message="Registro ya existe")
 * @ORM\Entity
 */

class MesEvaluacion {
    
    
    /**
     *
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Acad\administrativoBundle\Entity\Nota") 
     * @ORM\JoinColumn(name="nota_id", referencedColumnName="id")
     * @Assert\NotBlank(message="Por favor seleccione un periodo")   
     */
    protected $nota;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="Acad\administrativoBundle\Entity\Periodo") 
     * @ORM\JoinColumn(name="periodo_id", referencedColumnName="id")
      @Assert\NotBlank(message="Por favor seleccione un periodo")   
     */
    protected $periodo;

    /**
     * @ORM\Column(type="date", nullable=false)
     * @Assert\NotBlank(message="Por favor ingrese la fecha de inicio del mes")
     * @Assert\Date()
     */
    protected $finiciomes;
    
    
    /**
     * @ORM\Column(type="date", nullable=false)
     * @Assert\NotBlank(message="Por favor ingrese la fecha fin del mes")
     * @Assert\Date()
     */
    protected $ffinmes;
    
    
    /**
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $estado;
    
 
    public function setId($id)
    {
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
     * Set finiciomes
     *
     * @param \DateTime $finiciomes
     * @return MesEvaluacion
     */
    public function setFiniciomes($finiciomes)
    {
        $this->finiciomes = $finiciomes;
    
        return $this;
    }

    /**
     * Get finiciomes
     *
     * @return \DateTime 
     */
    public function getFiniciomes()
    {
        return $this->finiciomes;
    }

    /**
     * Set ffinmes
     *
     * @param \DateTime $ffinmes
     * @return MesEvaluacion
     */
    public function setFfinmes($ffinmes)
    {
        $this->ffinmes = $ffinmes;
    
        return $this;
    }

    /**
     * Get ffinmes
     *
     * @return \DateTime 
     */
    public function getFfinmes()
    {
        return $this->ffinmes;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     * @return MesEvaluacion
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
     * @param \Acad\adminiestrativoBundle\Entity\Periodo $periodo
     * @return MesEvaluacion
     */
    public function setPeriodo(\Acad\administrativoBundle\Entity\Periodo $periodo = null)
    {
        $this->periodo = $periodo;
    
        return $this;
    }

    /**
     * Get periodo
     *
     * @return \Acad\adminiestrativoBundle\Entity\Periodo 
     */
    public function getPeriodo()
    {
        return $this->periodo;
    }
    
    public function __toString() {
        return $this->nota->getNombre();
    }

    /**
     * Set nota
     *
     * @param \Acad\administrativoBundle\Entity\Nota $nota
     * @return MesEvaluacion
     */
    public function setNota(\Acad\administrativoBundle\Entity\Nota $nota = null)
    {
        $this->nota = $nota;
    
        return $this;
    }

    /**
     * Get nota
     *
     * @return \Acad\administrativoBundle\Entity\Nota 
     */
    public function getNota()
    {
        return $this->nota;
    }
}