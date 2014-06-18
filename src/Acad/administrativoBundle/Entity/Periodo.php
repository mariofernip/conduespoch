<?php

namespace Acad\administrativoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Table(name="periodo")
 * @UniqueEntity(fields={"nombre"}, message="El nombre a insertar ya existe")
 * @ORM\Entity
 */
class Periodo {
    
    
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer") 
     * @ORM\GeneratedValue  
     */
    protected $id;
    
    /** @ORM\Column(type="string", length=32, unique=true, nullable=false) 
     *  @Assert\NotBlank(message="Por favor ingrese el nombre del Período")
    */    
    
    protected $nombre;
    
    /**
     *
     * @ORM\Column(type="date", nullable=false)
     * @Assert\NotBlank(message="Por favor ingrese la fecha de inicio del Período")
     * @Assert\Date()
     */
    protected $finicioperiodo;

    /**
     *
     * @ORM\Column(type="date", nullable=false)
     * @Assert\NotBlank(message="Por favor ingrese la fecha de finalización del Período")
     * @Assert\Date()
     */
    protected $ffinperiodo;
    
    
    /**
     *
     * @ORM\Column(type="date", nullable=true)
     * @Assert\Blank()
     * @Assert\Date()
     */
    protected $finiciomatricula;

    /**
     *
     * @ORM\Column(type="date", nullable=true)
     * @Assert\Blank()
     * @Assert\Date()
     */
    protected $ffinmatricula;
    
    /**
     *
     * @ORM\Column(type="date", nullable=true)
     * @Assert\Blank()
     * @Assert\Date()
     */
    protected $finicioinscripcion;

    /**
     *
     * @ORM\Column(type="date", nullable=true)
     * @Assert\Blank()
     * @Assert\Date()
     */
    protected $ffininscripcion;

    /**
     *
     * @ORM\Column(type="integer", nullable=false)
     */
    protected $estado;
    
}