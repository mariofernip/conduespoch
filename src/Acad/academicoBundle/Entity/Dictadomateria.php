<?php

namespace Acad\academicoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dictadomateria
 *
 * @ORM\Table(name="dictadomateria")
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
     */
    protected $periodo;

    /**
     * 
     * @ORM\ManyToOne(targetEntity="Acad\academicoBundle\Entity\Materia") 
     * @ORM\JoinColumn(name="materia_id", referencedColumnName="id")
     */
    protected $materia;

    
   
}
