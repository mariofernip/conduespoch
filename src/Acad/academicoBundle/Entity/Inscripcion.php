<?php

namespace Acad\academicoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Inscripcion
 *
 * @ORM\Table(name="inscripcion",
 * uniqueConstraints={
 * @ORM\UniqueConstraint(name="unique_inscripcion", columns={"periodo_id","estudiante_id"})
 *  })
 * @UniqueEntity(fields={"periodo","estudiante"}, message="El registro a insertar ya existe")
 * @ORM\Entity
 */
class Inscripcion
{
    /**
     *
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    protected $id;
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="Acad\academicoBundle\Entity\Estudiante") 
     * @ORM\JoinColumn(name="estudiante_id", referencedColumnName="id")
     * @Assert\NotBlank()
     */
    protected $estudiante;
    
    /**
     *
     * @ORM\Column(type="integer", nullable=false)
     */
    protected $estado;

   /**
     *
     * @ORM\ManyToOne(targetEntity="Acad\administrativoBundle\Entity\Periodo") 
     * @ORM\JoinColumn(name="periodo_id", referencedColumnName="id")
     * @Assert\NotBlank()
     */
    protected $periodo;


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
     * @param integer $estado
     * @return Inscripcion
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    
        return $this;
    }

    /**
     * Get estado
     *
     * @return integer 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set estudiante
     *
     * @param \Acad\academicoBundle\Entity\Estudiante $estudiante
     * @return Inscripcion
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

    /**
     * Set periodo
     *
     * @param \Acad\administrativoBundle\Entity\Periodo $periodo
     * @return Inscripcion
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
        return $this->estudiante->getNombre();
    }
  
}