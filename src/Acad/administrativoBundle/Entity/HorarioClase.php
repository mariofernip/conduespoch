<?php

namespace Acad\administrativoBundle\Entity;


use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="horarioclase", 
 * uniqueConstraints={
 * @ORM\UniqueConstraint(name="unique_horarioclase", columns={"hora_id","dia_id","dictadomateria_id"})
 *  })
 * @UniqueEntity(fields={"hora", "dia", "dictadomateria"}, message="Registro ya existe")
 * @ORM\Entity
 */

class HorarioClase {
    
    
    /**
     *
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Acad\administrativoBundle\Entity\Dia") 
     * @ORM\JoinColumn(name="dia_id", referencedColumnName="id")
     * @Assert\NotBlank(message="Por favor seleccione un dia")   
     */
    protected $dia;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="Acad\administrativoBundle\Entity\Hora") 
     * @ORM\JoinColumn(name="hora_id", referencedColumnName="id")
      @Assert\NotBlank(message="Por favor seleccione una hora")   
     */
    protected $hora;

     /**
     *
     * @ORM\Column(type="string", length=64, nullable=true)
     * @Assert\NotBlank(message="Por favor ingrese la observacion")
     */
    protected $observacion;
    
    /**
     * @ORM\ManyToOne(targetEntity="Acad\academicoBundle\Entity\Dictadomateria") 
     * @ORM\JoinColumn(name="dictadomateria_id", referencedColumnName="id")
      @Assert\NotBlank(message="Seleccione un dictado materia")   
     */
    protected $dictadomateria;

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
     * Set observacion
     *
     * @param string $observacion
     * @return HorarioClase
     */
    public function setObservacion($observacion)
    {
        $this->observacion = $observacion;
    
        return $this;
    }

    /**
     * Get observacion
     *
     * @return string 
     */
    public function getObservacion()
    {
        return $this->observacion;
    }

    /**
     * Set dia
     *
     * @param \Acad\administrativoBundle\Entity\Dia $dia
     * @return HorarioClase
     */
    public function setDia(\Acad\administrativoBundle\Entity\Dia $dia = null)
    {
        $this->dia = $dia;
    
        return $this;
    }

    /**
     * Get dia
     *
     * @return \Acad\administrativoBundle\Entity\Dia 
     */
    public function getDia()
    {
        return $this->dia;
    }

    /**
     * Set hora
     *
     * @param \Acad\administrativoBundle\Entity\Hora $hora
     * @return HorarioClase
     */
    public function setHora(\Acad\administrativoBundle\Entity\Hora $hora = null)
    {
        $this->hora = $hora;
    
        return $this;
    }

    /**
     * Get hora
     *
     * @return \Acad\administrativoBundle\Entity\Hora 
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * Set dictadomateria
     *
     * @param \Acad\academicoBundle\Entity\Dictadomateria $dictadomateria
     * @return HorarioClase
     */
    public function setDictadomateria(\Acad\academicoBundle\Entity\Dictadomateria $dictadomateria = null)
    {
        $this->dictadomateria = $dictadomateria;
    
        return $this;
    }

    /**
     * Get dictadomateria
     *
     * @return \Acad\academicoBundle\Entity\Dictadomateria 
     */
    public function getDictadomateria()
    {
        return $this->dictadomateria;
    }
}