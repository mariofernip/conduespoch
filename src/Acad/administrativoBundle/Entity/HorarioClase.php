<?php

namespace Acad\administrativoBundle\Entity;


use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="horarioclase", 
 * uniqueConstraints={
 * @ORM\UniqueConstraint(name="unique_horarioclase", columns={"hora_id","dia_id","materia_id","periodo_id", "docente_id", "nivel_id"})
 *  })
 * @UniqueEntity(fields={"hora", "dia", "materia","periodo","docente","nivel"}, message="Registro ya existe")
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
     * @ORM\Column(type="text", length=64, nullable=true)
     * @Assert\NotBlank(message="Por favor ingrese la observacion")
     */
    protected $observacion;
    
    /**
     * @ORM\ManyToOne(targetEntity="Acad\administrativoBundle\Entity\Materia") 
     * @ORM\JoinColumn(name="materia_id", referencedColumnName="id")
      @Assert\NotBlank(message="Por favor seleccione una materia")   
     */
    protected $materia;

    /**
     * @ORM\ManyToOne(targetEntity="Acad\administrativoBundle\Entity\Periodo") 
     * @ORM\JoinColumn(name="periodo_id", referencedColumnName="id")
      @Assert\NotBlank(message="Por favor seleccione un periodo")   
     */
    protected $periodo;

    /**
     * @ORM\ManyToOne(targetEntity="Acad\administrativoBundle\Entity\Docente") 
     * @ORM\JoinColumn(name="docente_id", referencedColumnName="id")
      @Assert\NotBlank(message="Por favor seleccione un docente")   
     */
    protected $docente;
    
     /**
     * @ORM\ManyToOne(targetEntity="Acad\administrativoBundle\Entity\Nivel") 
     * @ORM\JoinColumn(name="nivel_id", referencedColumnName="id")
      @Assert\NotBlank(message="Por favor seleccione un nivel")   
     */
    protected $nivel;

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
     * Set materia
     *
     * @param \Acad\administrativoBundle\Entity\Materia $materia
     * @return HorarioClase
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
     * @return HorarioClase
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
     * Set docente
     *
     * @param \Acad\administrativoBundle\Entity\Docente $docente
     * @return HorarioClase
     */
    public function setDocente(\Acad\administrativoBundle\Entity\Docente $docente = null)
    {
        $this->docente = $docente;
    
        return $this;
    }

    /**
     * Get docente
     *
     * @return \Acad\administrativoBundle\Entity\Docente 
     */
    public function getDocente()
    {
        return $this->docente;
    }

    /**
     * Set nivel
     *
     * @param \Acad\administrativoBundle\Entity\Nivel $nivel
     * @return HorarioClase
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
}