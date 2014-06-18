<?php

namespace Acad\administrativoBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="paralelo")
 * @ORM\Entity
 * @UniqueEntity(fields={"nombre"}, message="El registro a insertar ya existe")
 */

class Paralelo {
    
     /** 
     * @ORM\Id    
      *@ORM\Column( type="integer")  
     * @ORM\GeneratedValue  
     */
    protected $id;
    
    /** @ORM\Column(type="string", length=32, nullable=false, unique=true) 
     * @Assert\NotBlank(message="Por favor ingrese un nombre")
     */
    protected $nombre;
    
    
    

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
     * Set nombre
     *
     * @param string $nombre
     * @return Paralelo
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }
    
    public function __toString() {
        return $this->getNombre();
    }
}