<?php

namespace Acad\academicoBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="evaluacion", 
 * uniqueConstraints={
 * @ORM\UniqueConstraint(name="unique_evaluacion", columns={"materiaasignada_id", "mesevaluacion_id", "tiponota_id"})
 *  })
 * @UniqueEntity(fields={"materiaasignada", "mesevaluacion", "tiponota"}, message="El registro a insertar ya existe")
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
     
     */
    protected $materiaasignada;
    
    /**
     *
     * @ORM\Column(type="float", nullable=false)
     */
    protected $promedio;

    /**     
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    protected $descripcion;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Acad\administrativoBundle\Entity\MesEvaluacion") 
     * @ORM\JoinColumn(name="mesevaluacion_id", referencedColumnName="id")
     * @Assert\NotBlank(message="Por favor seleccione un mes")
     */
    protected $mesevaluacion;
    
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
     * Set mesevaluacion
     *
     * @param \Acad\administrativoBundle\Entity\MesEvaluacion $mesevaluacion
     * @return Evaluacion
     */
    public function setMesevaluacion(\Acad\administrativoBundle\Entity\MesEvaluacion $mesevaluacion = null)
    {
        $this->mesevaluacion = $mesevaluacion;
    
        return $this;
    }

    /**
     * Get mesevaluacion
     *
     * @return \Acad\administrativoBundle\Entity\MesEvaluacion 
     */
    public function getMesevaluacion()
    {
        return $this->mesevaluacion;
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