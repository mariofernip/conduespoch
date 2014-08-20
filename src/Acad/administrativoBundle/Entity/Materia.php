<?php


namespace Acad\administrativoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Table(name="materia")
 * @UniqueEntity(fields={"nombre"}, message="El nombre a insertar ya existe")
 * @ORM\Entity
 */

class Materia {
    
    /** 
     * @ORM\Id
     * @ORM\Column( type="integer") 
     * @ORM\GeneratedValue  
     */
    protected $id;
        
     /** @ORM\Column(type="string", length=32, unique=true, nullable=false) 
      *  @Assert\NotBlank(message="Por favor ingrese el nombre de la Materia")
      */
    protected $nombre;

    /**
     * @ORM\ManyToOne(targetEntity="Acad\administrativoBundle\Entity\Area") 
     * @ORM\JoinColumn(name="area_id", referencedColumnName="id")
     */
    protected $area;
    
    /**
     *
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Blank()
     */
    protected $numerocreditos;

    /**
     *
     * @ORM\Column(type="string", length=128, nullable=true)
     * @Assert\Blank()
     */
    protected $descripcion;

    /** @ORM\Column(type="boolean", nullable=true)      
     */ 
    private $estado;


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
     * @return Materia
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
     * Set numerocreditos
     *
     * @param integer $numerocreditos
     * @return Materia
     */
    public function setNumerocreditos($numerocreditos)
    {
        $this->numerocreditos = $numerocreditos;
    
        return $this;
    }

    /**
     * Get numerocreditos
     *
     * @return integer 
     */
    public function getNumerocreditos()
    {
        return $this->numerocreditos;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Materia
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
     * @return Materia
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

    /**
     * Set area
     *
     * @param \Acad\administrativoBundle\Entity\Area $area
     * @return Materia
     */
    public function setArea(\Acad\administrativoBundle\Entity\Area $area = null)
    {
        $this->area = $area;
    
        return $this;
    }

    /**
     * Get area
     *
     * @return \Acad\administrativoBundle\Entity\Area 
     */
    public function getArea()
    {
        return $this->area;
    }
    
     public function __toString() {
        return $this->getNombre();
    }
}