<?php

namespace Acad\administrativoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Tiponota
 *
 * @ORM\Table(name="tiponota")
 * @ORM\Entity
 */
class Tiponota
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
     * @ORM\Column(type="string", length=64, nullable=false)
     * @Assert\NotBlank(message="Por favor ingrese la descripción del Tipo Nota")
     
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Tiponota
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
        return $this->getDescripcion();
    }
}