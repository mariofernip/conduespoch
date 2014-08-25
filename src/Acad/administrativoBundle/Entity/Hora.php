<?php

namespace Acad\administrativoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Hora
 *
 * @ORM\Table(name="hora")
 * @ORM\Entity
 */
class Hora
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
     * @ORM\Column(type="time", nullable=false)
     * @Assert\NotBlank(message="Por favor ingrese la fecha de inicio")
     */
    protected $hora_inicio;

   /**
     *
     * @ORM\Column(type="time", nullable=false)
     * @Assert\NotBlank(message="Por favor ingrese la fecha de fin")
     */
    protected $hora_fin;

    /**
     *
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    protected $descripcion;
    
    

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
     * Set hora_inicio
     *
     * @param \Time $horaInicio
     * @return Hora
     */
    public function setHoraInicio($horaInicio)
    {
        $this->hora_inicio = $horaInicio;
    
        return $this;
    }

    /**
     * Get hora_inicio
     *
     * @return \Time 
     */
    public function getHoraInicio()
    {
        return $this->hora_inicio;
    }

    /**
     * Set hora_fin
     *
     * @param \Time $horaFin
     * @return Hora
     */
    public function setHoraFin($horaFin)
    {
        $this->hora_fin = $horaFin;
    
        return $this;
    }

    /**
     * Get hora_fin
     *
     * @return \Time 
     */
    public function getHoraFin()
    {
        return $this->hora_fin;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Hora
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
    
     public function __toString() {
        return date_format($this->getHoraInicio(), 'H:i').' -- '. date_format($this->getHoraFin(), 'H:i');
    }
    
    
}