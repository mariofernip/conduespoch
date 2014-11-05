<?php

namespace Acad\administrativoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Table(name="periodo")
 * @UniqueEntity(fields={"nombre"}, message="El nombre a insertar ya existe")
 * @ORM\Entity(repositoryClass="Acad\administrativoBundle\Entity\PeriodoRepository")
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
     
     * @Assert\Date()
     */
    protected $finicioperiodo;

    /**
     *
     * @ORM\Column(type="date", nullable=false)
     
     * @Assert\Date()
     */
    protected $ffinperiodo;
    
    
    /**
     *
     * @ORM\Column(type="date", nullable=true)
     * @Assert\Date()
     */
    protected $finiciomatricula;

    /**
     *
     * @ORM\Column(type="date", nullable=true)
     * @Assert\Date()
     */
    protected $ffinmatricula;
    
    /**
     *
     * @ORM\Column(type="date", nullable=true)
     * @Assert\Date()
     */
    protected $finicioinscripcion;

    /**
     *
     * @ORM\Column(type="date", nullable=true)
     * @Assert\Date()
     */
    protected $ffininscripcion;

    /**
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $estado;
    

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
     * @return Periodo
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

    /**
     * Set finicioperiodo
     *
     * @param \DateTime $finicioperiodo
     * @return Periodo
     */
    public function setFinicioperiodo($finicioperiodo)
    {
        $this->finicioperiodo = $finicioperiodo;
    
        return $this;
    }

    /**
     * Get finicioperiodo
     *
     * @return \DateTime 
     */
    public function getFinicioperiodo()
    {
        return $this->finicioperiodo;
    }

    /**
     * Set ffinperiodo
     *
     * @param \DateTime $ffinperiodo
     * @return Periodo
     */
    public function setFfinperiodo($ffinperiodo)
    {
        $this->ffinperiodo = $ffinperiodo;
    
        return $this;
    }

    /**
     * Get ffinperiodo
     *
     * @return \DateTime 
     */
    public function getFfinperiodo()
    {
        return $this->ffinperiodo;
    }

    /**
     * Set finiciomatricula
     *
     * @param \DateTime $finiciomatricula
     * @return Periodo
     */
    public function setFiniciomatricula($finiciomatricula)
    {
        $this->finiciomatricula = $finiciomatricula;
    
        return $this;
    }

    /**
     * Get finiciomatricula
     *
     * @return \DateTime 
     */
    public function getFiniciomatricula()
    {
        return $this->finiciomatricula;
    }

    /**
     * Set ffinmatricula
     *
     * @param \DateTime $ffinmatricula
     * @return Periodo
     */
    public function setFfinmatricula($ffinmatricula)
    {
        $this->ffinmatricula = $ffinmatricula;
    
        return $this;
    }

    /**
     * Get ffinmatricula
     *
     * @return \DateTime 
     */
    public function getFfinmatricula()
    {
        return $this->ffinmatricula;
    }

    /**
     * Set finicioinscripcion
     *
     * @param \DateTime $finicioinscripcion
     * @return Periodo
     */
    public function setFinicioinscripcion($finicioinscripcion)
    {
        $this->finicioinscripcion = $finicioinscripcion;
    
        return $this;
    }

    /**
     * Get finicioinscripcion
     *
     * @return \DateTime 
     */
    public function getFinicioinscripcion()
    {
        return $this->finicioinscripcion;
    }

    /**
     * Set ffininscripcion
     *
     * @param \DateTime $ffininscripcion
     * @return Periodo
     */
    public function setFfininscripcion($ffininscripcion)
    {
        $this->ffininscripcion = $ffininscripcion;
    
        return $this;
    }

    /**
     * Get ffininscripcion
     *
     * @return \DateTime 
     */
    public function getFfininscripcion()
    {
        return $this->ffininscripcion;
    }

    
    public function setEstado($estado)
    {
        $this->estado = $estado;
    
        return $this;
    }

    /**
     * Get estado
     *
     * @return 
     */
    public function getEstado()
    {
        return $this->estado;
    }
    
     public function __toString() {
        return $this->getNombre();
    }
}