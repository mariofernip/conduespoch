<?php

namespace Acad\academicoBundle\Entity;

use Acad\academicoBundle\Entity\Inscripcion;
use Acad\administrativoBundle\Entity\Requisito;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="cumplerequisito",
 * uniqueConstraints={
 * @ORM\UniqueConstraint(name="unique_cumplerequisito", columns={"requisito_id","inscripcion_id"})
 *  })
 * @UniqueEntity(fields={"requisito","inscripcion"}, message="El registro a insertar ya existe")
 * @ORM\Entity(repositoryClass="Acad\academicoBundle\Entity\CumpleRequisitoRepository")
 */

class CumpleRequisito {
    
   
     /** @ORM\Column(type="integer", nullable=false)      
     */    
    protected $estado;
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
   protected $id;
   
   
    /**
     * @ORM\ManyToOne(targetEntity="Acad\administrativoBundle\Entity\Requisito") 
     * @ORM\JoinColumn(name="requisito_id", referencedColumnName="id")     
     */
    protected $requisito;
    
    
     /**
     * @ORM\ManyToOne(targetEntity="Acad\academicoBundle\Entity\Inscripcion") 
     * @ORM\JoinColumn(name="inscripcion_id", referencedColumnName="id")
     */
    protected $inscripcion;
   
   public function __construct() {
        $this->requisito = new ArrayCollection();
        $this->estado= new ArrayCollection();
    }
    

    public function setId($id)
    {
        $this->id = $id;
    
        return $this;
    }
    
    

    /**
     * Set estado
     *
     * @param integer $estado
     * @return CumpleRequisito
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set requisito
     *
     * @param \Acad\administrativoBundle\Entity\Requisito $requisito
     * @return CumpleRequisito
     */
    public function setRequisito(\Acad\administrativoBundle\Entity\Requisito $requisito = null)
    {
        $this->requisito = $requisito;
    
        return $this;
    }

    /**
     * Get requisito
     *
     * @return \Acad\administrativoBundle\Entity\Requisito 
     */
    public function getRequisito()
    {
        return $this->requisito;
    }

    /**
     * Set inscripcion
     *
     * @param \Acad\academicoBundle\Entity\Inscripcion $inscripcion
     * @return CumpleRequisito
     */
    public function setInscripcion(\Acad\academicoBundle\Entity\Inscripcion $inscripcion = null)
    {
        $this->inscripcion = $inscripcion;
    
        return $this;
    }

    /**
     * Get inscripcion
     *
     * @return \Acad\academicoBundle\Entity\Inscripcion 
     */
    public function getInscripcion()
    {
        return $this->inscripcion;
    }
    
    public function __toString() {
        return $this->requisito->getDescripcion();
    }
}