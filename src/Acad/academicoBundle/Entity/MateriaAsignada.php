<?php

namespace Acad\academicoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Acad\administrativoBundle\Entity\Materia;
use Acad\academicoBundle\Entity\Matricula;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Table(name="materiaasignada",
 * uniqueConstraints={
 * @ORM\UniqueConstraint(name="unique_materiaasignada", columns={"matricula_id","materiaperiodo_id"})
 *  })
 * @UniqueEntity(fields={"matricula","materiaperiodo"}, message="El registro a insertar ya existe")
 * @ORM\Entity
 */
class MateriaAsignada {

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
     * @ORM\ManyToOne(targetEntity="Acad\academicoBundle\Entity\MateriaPeriodo") 
     * @ORM\JoinColumn(name="materiaperiodo_id", referencedColumnName="id")
     */
    protected $materiaperiodo;

    /**
     * @ORM\Column(type="string", length=32, nullable=true)          
     */
    protected $equivalencia;

    /**
     * @ORM\Column(type="float", nullable=true)          
     */
    protected $notasuspenso;

    /**
     * @ORM\Column(type="float", nullable=true)          
     */
    protected $promediofinal;

    public function setId($id) {
        $this->id = $id;

        return $this;
    }


    public function __toString() {
        //return $this->matricula->getEstudiante()->getNombre();
        return $this->matricula->getSeccion() . ' - ' . $this->matricula->getEstudiante()->getCedula() . ' - ' . $this->matricula->getEstudiante()->getApellido() . ' ' . $this->matricula->getEstudiante()->getNombre();
        //return $this->matricula->getSeccion();
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
     * Set equivalencia
     *
     * @param string $equivalencia
     * @return MateriaAsignada
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
     * Set notasuspenso
     *
     * @param float $notasuspenso
     * @return MateriaAsignada
     */
    public function setNotasuspenso($notasuspenso)
    {
        $this->notasuspenso = $notasuspenso;
    
        return $this;
    }

    /**
     * Get notasuspenso
     *
     * @return float 
     */
    public function getNotasuspenso()
    {
        return $this->notasuspenso;
    }

    /**
     * Set promediofinal
     *
     * @param float $promediofinal
     * @return MateriaAsignada
     */
    public function setPromediofinal($promediofinal)
    {
        $this->promediofinal = $promediofinal;
    
        return $this;
    }

    /**
     * Get promediofinal
     *
     * @return float 
     */
    public function getPromediofinal()
    {
        return $this->promediofinal;
    }

    /**
     * Set matricula
     *
     * @param \Acad\academicoBundle\Entity\Matricula $matricula
     * @return MateriaAsignada
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

    /**
     * Set materiaperiodo
     *
     * @param \Acad\academicoBundle\Entity\MateriaPeriodo $materiaperiodo
     * @return MateriaAsignada
     */
    public function setMateriaperiodo(\Acad\academicoBundle\Entity\MateriaPeriodo $materiaperiodo = null)
    {
        $this->materiaperiodo = $materiaperiodo;
    
        return $this;
    }

    /**
     * Get materiaperiodo
     *
     * @return \Acad\academicoBundle\Entity\MateriaPeriodo 
     */
    public function getMateriaperiodo()
    {
        return $this->materiaperiodo;
    }
}