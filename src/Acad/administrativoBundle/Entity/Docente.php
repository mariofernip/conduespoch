<?php

namespace Acad\administrativoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Docente
 *
 * @ORM\Table(name="docente")
 * @UniqueEntity(fields={"email"}, message="El correo a insertar ya existe")
 * @UniqueEntity(fields={"cedula"}, message="La cedula a insertar ya existe")
 * @ORM\Entity
 */
class Docente
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
     * @ORM\Column(type="integer", nullable=false)
     * @Assert\NotBlank(message="Por favor ingrese la cédula del Docente")
     */
    protected $cedula;

    /**
     *
     * @ORM\Column(type="string", length=64, nullable=false)
     * @Assert\NotBlank(message="Por favor ingrese el nombre del Docente")
     
     */
    protected $nombre;

    /**
     *
     * @ORM\Column(type="string", length=64, nullable=false)
     * @Assert\NotBlank(message="Por favor ingrese el apellido del Docente")
     */
    protected $apellido;

    /**
     *
     * @ORM\Column(type="string", length=128, nullable=false)
     * @Assert\NotBlank(message="Por favor ingrese la dirección del Docente") 
     */
    protected $direccion;

    /**
     *
     * @ORM\Column(type="string", length=13, nullable=true)
     * @Assert\Blank()
     */
    protected $telefonofijo;

    /**
     *
     * @ORM\Column(type="string", length=13, nullable=true)
     * @Assert\Blank()
     */
    protected $celular;

    /**
     *
     * @ORM\Column(type="string", length=128, nullable=false)
     * @Assert\NotBlank()
     */
    protected $email;

    /**
     *
     * @ORM\Column(type="string", length=128, nullable=true)
     * @Assert\Blank()
     */
    protected $trabajoanterior;

    /**
     *
     * @ORM\Column(type="date", nullable=false)
     * @Assert\Date()
     */
    protected $fechaingreso;

    /**
     *
     * @ORM\Column(name="doc_fechasalida", type="date", nullable=true)
     * @Assert\Date()
     */
    protected $fechasalida;

    /** @ORM\Column(type="boolean", nullable=true)      
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
     * Set cedula
     *
     * @param integer $cedula
     * @return Docente
     */
    public function setCedula($cedula)
    {
        $this->cedula = $cedula;
    
        return $this;
    }

    /**
     * Get cedula
     *
     * @return integer 
     */
    public function getCedula()
    {
        return $this->cedula;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Docente
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
     * Set apellido
     *
     * @param string $apellido
     * @return Docente
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    
        return $this;
    }

    /**
     * Get apellido
     *
     * @return string 
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Docente
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    
        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set telefonofijo
     *
     * @param string $telefonofijo
     * @return Docente
     */
    public function setTelefonofijo($telefonofijo)
    {
        $this->telefonofijo = $telefonofijo;
    
        return $this;
    }

    /**
     * Get telefonofijo
     *
     * @return string 
     */
    public function getTelefonofijo()
    {
        return $this->telefonofijo;
    }

    /**
     * Set celular
     *
     * @param string $celular
     * @return Docente
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;
    
        return $this;
    }

    /**
     * Get celular
     *
     * @return string 
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Docente
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set trabajoanterior
     *
     * @param string $trabajoanterior
     * @return Docente
     */
    public function setTrabajoanterior($trabajoanterior)
    {
        $this->trabajoanterior = $trabajoanterior;
    
        return $this;
    }

    /**
     * Get trabajoanterior
     *
     * @return string 
     */
    public function getTrabajoanterior()
    {
        return $this->trabajoanterior;
    }

    /**
     * Set fechaingreso
     *
     * @param \DateTime $fechaingreso
     * @return Docente
     */
    public function setFechaingreso($fechaingreso)
    {
        $this->fechaingreso = $fechaingreso;
    
        return $this;
    }

    /**
     * Get fechaingreso
     *
     * @return \DateTime 
     */
    public function getFechaingreso()
    {
        return $this->fechaingreso;
    }

    /**
     * Set fechasalida
     *
     * @param \DateTime $fechasalida
     * @return Docente
     */
    public function setFechasalida($fechasalida)
    {
        $this->fechasalida = $fechasalida;
    
        return $this;
    }

    /**
     * Get fechasalida
     *
     * @return \DateTime 
     */
    public function getFechasalida()
    {
        return $this->fechasalida;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     * @return Docente
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
        return $this->getNombre().' '.$this->getApellido();
    }
}