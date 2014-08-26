<?php

namespace Acad\administrativoBundle\Entity;

use Acad\administrativoBundle\Entity\Curso;
use Acad\administrativoBundle\Entity\Paralelo;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * @ORM\Table(name="materiagrado", 
 * uniqueConstraints={
 * @ORM\UniqueConstraint(name="unique_materiagrado", columns={"materia_id","periodo_id"})
 *  })
 * @UniqueEntity(fields={"materia","periodo"}, message="Registro duplicado")
 * @ORM\Entity
 */


class MateriaGrado {
    
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer") 
     * @ORM\GeneratedValue  
     */
    protected $id;     
    
    
    /**
     * @ORM\ManyToOne(targetEntity="Acad\administrativoBundle\Entity\Materia") 
     * @ORM\JoinColumn(name="materia_id", referencedColumnName="id")
     * @Assert\NotBlank(message="Por favor seleccione una materia")
     */
    protected $materia;
    
    /**
     * @ORM\ManyToOne(targetEntity="Acad\administrativoBundle\Entity\Periodo")      
     * @ORM\JoinColumn(name="periodo_id", referencedColumnName="id")
     * @Assert\NotBlank(message="Por favor seleccione un periodo")
     */
    protected $periodo;
    
    /** @ORM\Column(type="boolean", nullable=true)      
     */ 
    protected $estado;

    
    
    
    public function __toString() {
        return $this->materia->getNombre();
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
     * Set estado
     *
     * @param boolean $estado
     * @return MateriaGrado
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
     * Set materia
     *
     * @param \Acad\administrativoBundle\Entity\Materia $materia
     * @return MateriaGrado
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
     * Set periodo
     *
     * @param \Acad\administrativoBundle\Entity\Periodo $periodo
     * @return MateriaGrado
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