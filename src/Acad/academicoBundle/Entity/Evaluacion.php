<?php

namespace Acad\academicoBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="evaluacion", 
 * uniqueConstraints={
 * @ORM\UniqueConstraint(name="unique_evaluacion", columns={"materiaasignada_id", "mesevaluacion_id"})
 *  })
 * @UniqueEntity(fields={"materiaasignada", "mesevaluacion" }, message="El registro a insertar ya existe")
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
     * @ORM\Column(type="float", nullable=false)
     * @Assert\LessThan(value = 21)
     * @Assert\GreaterThan(value = -1)
     */
    protected $notatb;
    
    /**
     * @ORM\Column(type="float", nullable=false)
     * @Assert\Range(min=0, max=20)
     */
    protected $notaec;
    
    /**
     * @ORM\Column(type="float", nullable=false)
     * @Assert\Range(min=0, max=20)
     */
    protected $notapp;
    
    /**
     * @ORM\Column(type="float", nullable=false)
     * @Assert\Range(min=0, max=20)
     */
    protected $notapt;

      public function setId($id)
    {
        $this->id = $id;
    
        return $this;
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
     * Set notatb
     *
     * @param float $notatb
     * @return Evaluacion
     */
    public function setNotatb($notatb)
    {
        $this->notatb = $notatb;
    
        return $this;
    }

    /**
     * Get notatb
     *
     * @return float 
     */
    public function getNotatb()
    {
        return $this->notatb;
    }

    /**
     * Set notaec
     *
     * @param float $notaec
     * @return Evaluacion
     */
    public function setNotaec($notaec)
    {
        $this->notaec = $notaec;
    
        return $this;
    }

    /**
     * Get notaec
     *
     * @return float 
     */
    public function getNotaec()
    {
        return $this->notaec;
    }

    /**
     * Set notapp
     *
     * @param float $notapp
     * @return Evaluacion
     */
    public function setNotapp($notapp)
    {
        $this->notapp = $notapp;
    
        return $this;
    }

    /**
     * Get notapp
     *
     * @return float 
     */
    public function getNotapp()
    {
        return $this->notapp;
    }

    /**
     * Set notapt
     *
     * @param float $notapt
     * @return Evaluacion
     */
    public function setNotapt($notapt)
    {
        $this->notapt = $notapt;
    
        return $this;
    }

    /**
     * Get notapt
     *
     * @return float 
     */
    public function getNotapt()
    {
        return $this->notapt;
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
}