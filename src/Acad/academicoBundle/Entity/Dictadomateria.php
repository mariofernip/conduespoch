<?php

namespace Acad\academicoBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="dictadomateria", 
 * uniqueConstraints={
 * @ORM\UniqueConstraint(name="unique_dictadomateria", columns={"nivel_id", "docente_id", "periodo_id","materia_id"})
 *  })
 * @UniqueEntity(fields={"nivel", "docente", "periodo","materia"}, message="El registro a insertar ya existe")
 * @UniqueEntity(fields={"nivel","periodo","materia"}, message="La materia selecciona ya fue designada a otro docente")
 * @ORM\Entity
 */

class Dictadomateria
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
     * @ORM\ManyToOne(targetEntity="Acad\administrativoBundle\Entity\Nivel") 
     * @ORM\JoinColumn(name="nivel_id", referencedColumnName="id")     
     */
    protected $nivel;

    /**
     * 
     * @ORM\ManyToOne(targetEntity="Acad\administrativoBundle\Entity\Docente") 
     * @ORM\JoinColumn(name="docente_id", referencedColumnName="id")     
     */
    protected $docente;

    /**
     * 
     * @ORM\ManyToOne(targetEntity="Acad\administrativoBundle\Entity\Periodo") 
     * @ORM\JoinColumn(name="periodo_id", referencedColumnName="id")
     * @Assert\NotBlank(message="Por favor seleccione un periodo")
     */
    protected $periodo;

    /**
     * 
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
     * Set nivel
     *
     * @param \Acad\administrativoBundle\Entity\Nivel $nivel
     * @return Dictadomateria
     */
    public function setNivel(\Acad\administrativoBundle\Entity\Nivel $nivel = null)
    {
        $this->nivel = $nivel;
    
        return $this;
    }

    /**
     * Get nivel
     *
     * @return \Acad\administrativoBundle\Entity\Nivel 
     */
    public function getNivel()
    {
        return $this->nivel;
    }

    /**
     * Set docente
     *
     * @param \Acad\administrativoBundle\Entity\Docente $docente
     * @return Dictadomateria
     */
    public function setDocente(\Acad\administrativoBundle\Entity\Docente $docente = null)
    {
        $this->docente = $docente;
    
        return $this;
    }

    /**
     * Get docente
     *
     * @return \Acad\administrativoBundle\Entity\Docente 
     */
    public function getDocente()
    {
        return $this->docente;
    }

    /**
     * Set periodo
     *
     * @param \Acad\administrativoBundle\Entity\Periodo $periodo
     * @return Dictadomateria
     */
    public function setPeriodo(\Acad\administrativoBundle\Entity\Periodo $periodo = null)
    {
        $this->periodo = $periodo;
    
        return $this;
    }

    /**
     * Get periodo
     *
     * @return \Acad\administrativoBundle\Entity\Periodo 
     */
    public function getPeriodo()
    {
        return $this->periodo;
    }

    /**
     * Set materia
     *
     * @param \Acad\administrativoBundle\Entity\Materia $materia
     * @return Dictadomateria
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
}