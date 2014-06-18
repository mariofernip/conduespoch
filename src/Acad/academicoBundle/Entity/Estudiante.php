<?php

namespace Acad\academicoBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Table(name="estudiante")
 * @ORM\Entity
 * @UniqueEntity(fields={"email"}, message="UniqueEntity_validator")
 * @UniqueEntity(fields={"cedula"}, message="UniqueEntity_validator")
 */
class Estudiante {
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
   protected $id;
   
   /** @ORM\Column(type="integer", nullable=false, unique=true) 
    * @Assert\NotBlank(message="Por favor ingrese el número de cédula")
    */    
   protected $cedula;
   
   /** @ORM\Column(type="string", length=64, nullable=false) 
    * @Assert\NotBlank(message="Por favor ingrese un nombre")
    */    
   protected $nombre;
   
   /** @ORM\Column(type="string", length=64, nullable=false)
    *  @Assert\NotBlank(message="Por favor ingrese un apellido")
    */        
   protected $apellido;
   
   /** @ORM\Column(type="string", length=13, nullable=true) 
    *  @Assert\Blank()
    */    
   protected $telefonofijo;
   
   /** @ORM\Column(type="string", length=13, nullable=true) 
    *  @Assert\Blank()
    */    
   protected $celular;
   
   /** @ORM\Column(type="string", length=128, nullable=true) 
    *  @Assert\Blank()
    */    
   protected $calle;
   
   /** @ORM\Column(type="string", length=64, nullable=true) 
    *  @Assert\Blank()
    */    
   protected $barrio;
   
   /** @ORM\Column(type="string", length=64, nullable=true)
    *  @Assert\Blank() 
    */    
   protected $parroquia;
   
   /** @ORM\Column(type="string", length=32, nullable=true) 
    *  @Assert\Blank()
    */    
   protected $ciudad;
   
   /** @ORM\Column(type="string", length=128, nullable=false) 
    *  @Assert\Email()    
    */    
   protected $email;
   
   /** @ORM\Column(type="string", length=64, nullable=true) 
    * @Assert\Blank()
    */    
   protected $ocupacion;
   
   /** @ORM\Column(type="string", length=32, nullable=true) 
    *  @Assert\Blank()
    */    
   protected $lugarnacimiento;
   
   /** @ORM\Column(type="string", length=32, nullable=false)     
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
     * @param string $cedula
     * @return Estudiante
     */
    public function setCedula($cedula)
    {
        $this->cedula = $cedula;
    
        return $this;
    }

    /**
     * Get cedula
     *
     * @return string 
     */
    public function getCedula()
    {
        return $this->cedula;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Estudiante
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
     * @return Estudiante
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
     * Set telefonofijo
     *
     * @param string $telefonofijo
     * @return Estudiante
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
     * @return Estudiante
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
     * Set calle
     *
     * @param string $calle
     * @return Estudiante
     */
    public function setCalle($calle)
    {
        $this->calle = $calle;
    
        return $this;
    }

    /**
     * Get calle
     *
     * @return string 
     */
    public function getCalle()
    {
        return $this->calle;
    }

    /**
     * Set barrio
     *
     * @param string $barrio
     * @return Estudiante
     */
    public function setBarrio($barrio)
    {
        $this->barrio = $barrio;
    
        return $this;
    }

    /**
     * Get barrio
     *
     * @return string 
     */
    public function getBarrio()
    {
        return $this->barrio;
    }

    /**
     * Set parroquia
     *
     * @param string $parroquia
     * @return Estudiante
     */
    public function setParroquia($parroquia)
    {
        $this->parroquia = $parroquia;
    
        return $this;
    }

    /**
     * Get parroquia
     *
     * @return string 
     */
    public function getParroquia()
    {
        return $this->parroquia;
    }

    /**
     * Set ciudad
     *
     * @param string $ciudad
     * @return Estudiante
     */
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;
    
        return $this;
    }

    /**
     * Get ciudad
     *
     * @return string 
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Estudiante
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
     * Set ocupacion
     *
     * @param string $ocupacion
     * @return Estudiante
     */
    public function setOcupacion($ocupacion)
    {
        $this->ocupacion = $ocupacion;
    
        return $this;
    }

    /**
     * Get ocupacion
     *
     * @return string 
     */
    public function getOcupacion()
    {
        return $this->ocupacion;
    }

    /**
     * Set lugarnacimiento
     *
     * @param string $lugarnacimiento
     * @return Estudiante
     */
    public function setLugarnacimiento($lugarnacimiento)
    {
        $this->lugarnacimiento = $lugarnacimiento;
    
        return $this;
    }

    /**
     * Get lugarnacimiento
     *
     * @return string 
     */
    public function getLugarnacimiento()
    {
        return $this->lugarnacimiento;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return Estudiante
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    
        return $this;
    }

    /**
     * Get estado
     *
     * @return string 
     */
    public function getEstado()
    {
        return $this->estado;
    }
    
    public function __toString() {
        return $this->getNombre().' '.$this->getApellido();
    }
}