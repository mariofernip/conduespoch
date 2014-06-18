<?php

namespace Acad\academicoBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="evaluacion", 
 * uniqueConstraints={
 * @ORM\UniqueConstraint(name="unique_evaluacion", columns={"materiaasignada_id", "mes_id", "tiponota_id"})
 *  })
 * @UniqueEntity(fields={"materiaasignada_id", "mes_id", "tiponota_id"}, message="El registro a insertar ya existe")
 * @ORM\Entity
 */

class Evaluacion
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
     * @ORM\ManyToOne(targetEntity="Acad\academicoBundle\Entity\MateriaAsignada") 
     * @ORM\JoinColumn(name="materiaasignada_id", referencedColumnName="id")
     * @Assert\NotBlank(message="Por favor llene el campo")
     */
    protected $materiaasignada;
    
    /**
     *
     * @ORM\Column(type="float", nullable=true)
     */
    protected $promedio;

    /**     
     * @ORM\Column(type="string", length=128, nullable=true)
     * @Assert\Blank()
     */
    protected $descripcion;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Acad\administrativoBundle\Entity\Mes") 
     * @ORM\JoinColumn(name="mes_id", referencedColumnName="id")
     * @Assert\NotBlank(message="Por favor seleccione un mes")
     */
    protected $mes;
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="Acad\administrativoBundle\Entity\Tiponota") 
     * @ORM\JoinColumn(name="tiponota_id", referencedColumnName="id")
     * @Assert\NotBlank(message="Por favor seleccione el tipo de nota")
     */
    protected $tiponota;

    
    



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
     * Set promedio
     *
     * @param float $promedio
     * @return Evaluacion
     */
    public function setPromedio($promedio)
    {
        $this->promedio = $promedio;
    
        return $this;
    }

    /**
     * Get promedio
     *
     * @return float 
     */
    public function getPromedio()
    {
        return $this->promedio;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Evaluacion
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
     * Set materiaasignada
     *
     * @param \Acad\academicoBundle\Entity\MateriaAsignada $materiaasignada
     * @return Evaluacion
     */
    public function setMateriaasignada(\Acad\academicoBundle\Entity\MateriaAsignada $materiaasignada = null)
    {
        $this->materiaasignada = $materiaasignada;
    
        return $this;
    }

    /**
     * Get materiaasignada
     *
     * @return \Acad\academicoBundle\Entity\MateriaAsignada 
     */
    public function getMateriaasignada()
    {
        return $this->materiaasignada;
    }

    /**
     * Set mes
     *
     * @param \Acad\administrativoBundle\Entity\Mes $mes
     * @return Evaluacion
     */
    public function setMes(\Acad\administrativoBundle\Entity\Mes $mes = null)
    {
        $this->mes = $mes;
    
        return $this;
    }

    /**
     * Get mes
     *
     * @return \Acad\administrativoBundle\Entity\Mes 
     */
    public function getMes()
    {
        return $this->mes;
    }

    /**
     * Set tiponota
     *
     * @param \Acad\administrativoBundle\Entity\Tiponota $tiponota
     * @return Evaluacion
     */
    public function setTiponota(\Acad\administrativoBundle\Entity\Tiponota $tiponota = null)
    {
        $this->tiponota = $tiponota;
    
        return $this;
    }

    /**
     * Get tiponota
     *
     * @return \Acad\administrativoBundle\Entity\Tiponota 
     */
    public function getTiponota()
    {
        return $this->tiponota;
    }
}