<?php


namespace Acad\administrativoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
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

    /**
     *
     * @ORM\Column(type="integer", nullable=false)
     */
    private $estado;

}