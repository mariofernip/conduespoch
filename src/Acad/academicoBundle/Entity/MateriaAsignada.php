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
 * @ORM\UniqueConstraint(name="unique_materiaasignada", columns={"matricula_id","materia_id"})
 *  })
 * @UniqueEntity(fields={"matricula","materia"}, message="El registro a insertar ya existe")
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
     * @ORM\ManyToOne(targetEntity="Acad\administrativoBundle\Entity\Materia") 
     * @ORM\JoinColumn(name="materia_id", referencedColumnName="id")
     */
    protected $materia;
    


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
     * Set materia
     *
     * @param \Acad\administrativoBundle\Entity\Materia $materia
     * @return MateriaAsignada
     */
    public function setMateria(\Acad\administrativoBundle\Entity\Materia $materia = null)
    {
        $this->materia = $materia;
    
        return $this;
    }

    /**
     * Get materia
     *
     * @return \Acad\administrativoBundle\Entity\Materia 
     */
    public function getMateria()
    {
        return $this->materia;
    }
    
    public function __toString() {
        //return $this->matricula->getEstudiante()->getNombre();
        return $this->matricula->getSeccion().' - '.$this->matricula->getEstudiante()->getCedula().' - '.$this->matricula->getEstudiante()->getApellido().' '.$this->matricula->getEstudiante()->getNombre();
        //return $this->matricula->getSeccion();
        
    }
}