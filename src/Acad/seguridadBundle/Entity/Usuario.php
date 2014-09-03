<?php

namespace Acad\seguridadBundle\Entity;

use Acad\seguridadBundle\Entity\Rol;
use Acad\seguridadBundle\Entity\Usuario;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="usuario")
 * @ORM\Entity(repositoryClass="Acad\seguridadBundle\Entity\UsuarioRepository")
 * @UniqueEntity(fields={"email"}, message="El correo electrónico ingresado ya existe")
 * @UniqueEntity(fields={"cedula"}, message="El número de cédula ingresado ya existe")
 */
class Usuario implements UserInterface  {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=1282)
     * @Assert\NotBlank()
     */
    protected $nombre;

    /**
     * @ORM\Column(type="string", length=128)
     * @Assert\NotBlank()
     */
    protected $apellidos;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min = 6)
     */
    protected $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $salt;


    /**
     * @ORM\Column(type="datetime")
     */
    protected $fecha_alta;

    

    /**
     * @ORM\Column(type="integer")
     */
    protected $cedula;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $estado;
    

    /**
     * @ORM\ManyToOne(targetEntity="Acad\SeguridadBundle\Entity\Rol") 
     * @ORM\JoinColumn(name="rol_id", referencedColumnName="id")
     * @Assert\NotBlank()
     */
    protected $rol;
    
    


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
     * @return Usuario
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
     * Set apellidos
     *
     * @param string $apellidos
     * @return Usuario
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    
        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string 
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Usuario
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
     * Set password
     *
     * @param string $password
     * @return Usuario
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return Usuario
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    
        return $this;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set fecha_alta
     *
     * @param \DateTime $fechaAlta
     * @return Usuario
     */
    public function setFechaAlta($fechaAlta)
    {
        $this->fecha_alta = $fechaAlta;
    
        return $this;
    }

    /**
     * Get fecha_alta
     *
     * @return \DateTime 
     */
    public function getFechaAlta()
    {
        return $this->fecha_alta;
    }

    /**
     * Set cedula
     *
     * @param integer $cedula
     * @return Usuario
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
     * Set estado
     *
     * @param boolean $estado
     * @return Usuario
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    
        return $this;
    }

    /**
     * Get estado
     *
     * @return boolean 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set rol
     *
     * @param \Acad\SeguridadBundle\Entity\Rol $rol
     * @return Usuario
     */
    public function setRol(\Acad\SeguridadBundle\Entity\Rol $rol = null)
    {
        $this->rol = $rol;
    
        return $this;
    }

    /**
     * Get rol
     *
     * @return \Acad\SeguridadBundle\Entity\Rol 
     */
    public function getRol()
    {
        return $this->rol;
    }

    public function eraseCredentials() {
        
    }

    public function getRoles() {
        return array('ROLE_'.$this->getRol()->getNombre());
    }

    public function getUsername() {
        return $this->getEmail();
                
    }

    

    public function __toString() {
        return $this->getNombre().' '.$this->getApellidos();
    }
}