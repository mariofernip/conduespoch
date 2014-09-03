<?php

namespace Acad\administrativoBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Table(name="requisito")
 * @ORM\Entity
 * @UniqueEntity(fields={"descripcion"}, message="El registro a insertar ya existe")
 */
class Requisito {
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    
    protected $id;
    
    /** @ORM\Column(type="string", length=128, nullable=false, unique=true)
     * @Assert\NotBlank(message="Por favor ingrese un nombre")
     *  */
    protected $descripcion;
    
    /** @ORM\Column(type="boolean", nullable=true) 
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Requisito
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

    /**
     * Set estado
     *
     * @param integer $estado
     * @return Requisito
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
    
    public function __toString() {
        return $this->getDescripcion();
    }
}