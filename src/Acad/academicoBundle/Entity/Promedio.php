<?php

namespace Acad\academicoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * @ORM\Table(name="promedio")
 * @ORM\Entity
 */

class Promedio {
    
    /**
     * @ORM\Id
     * @ORM\Column( type="integer") 
     * @ORM\GeneratedValue  
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Acad\academicoBundle\Entity\Matricula") 
     * @ORM\JoinColumn(name="matricula_id", referencedColumnName="id")
     */
    protected $matricula;
    
    
    /**
     * @ORM\Column(type="float", nullable=false)
     * @Assert\Range(min=0, max=20)
     */
    protected $pmodulos;
    
    /**
     * @ORM\Column(type="float", nullable=false)
     * @Assert\Range(min=0, max=20)
     */
    protected $pgrado;
    
    
    /**
     * @ORM\Column(type="float", nullable=false)
     * @Assert\Range(min=0, max=20)
     */
    protected $pgeneral;
    
    /**
     * @ORM\Column(type="string", length=32, nullable=true)          
     */
    protected $equivalencia;
    
    public function __toString() {
        return $this->matricula->getEstudiante()->getCedula() . ' - ' . $this->matricula->getEstudiante()->getApellido() . ' ' . $this->matricula->getEstudiante()->getNombre();
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
     * Set pmodulos
     *
     * @param float $pmodulos
     * @return Promedio
     */
    public function setPmodulos($pmodulos)
    {
        $this->pmodulos = $pmodulos;
    
        return $this;
    }

    /**
     * Get pmodulos
     *
     * @return float 
     */
    public function getPmodulos()
    {
        return $this->pmodulos;
    }

    /**
     * Set pgrado
     *
     * @param float $pgrado
     * @return Promedio
     */
    public function setPgrado($pgrado)
    {
        $this->pgrado = $pgrado;
    
        return $this;
    }

    /**
     * Get pgrado
     *
     * @return float 
     */
    public function getPgrado()
    {
        return $this->pgrado;
    }

    /**
     * Set pgeneral
     *
     * @param float $pgeneral
     * @return Promedio
     */
    public function setPgeneral($pgeneral)
    {
        $this->pgeneral = $pgeneral;
    
        return $this;
    }

    /**
     * Get pgeneral
     *
     * @return float 
     */
    public function getPgeneral()
    {
        return $this->pgeneral;
    }

    /**
     * Set equivalencia
     *
     * @param string $equivalencia
     * @return Promedio
     */
    public function setEquivalencia($equivalencia)
    {
        $this->equivalencia = $equivalencia;
    
        return $this;
    }

    /**
     * Get equivalencia
     *
     * @return string 
     */
    public function getEquivalencia()
    {
        return $this->equivalencia;
    }

    /**
     * Set matricula
     *
     * @param \Acad\academicoBundle\Entity\Matricula $matricula
     * @return Promedio
     */
    public function setMatricula(\Acad\academicoBundle\Entity\Matricula $matricula = null)
    {
        $this->matricula = $matricula;
    
        return $this;
    }

    /**
     * Get matricula
     *
     * @return \Acad\academicoBundle\Entity\Matricula 
     */
    public function getMatricula()
    {
        return $this->matricula;
    }
}