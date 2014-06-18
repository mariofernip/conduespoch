<?php

namespace Acad\academicoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Inscripcion
 *
 * @ORM\Table(name="inscripcion",
 * uniqueConstraints={
 * @ORM\UniqueConstraint(name="unique_materiaasignada", columns={"periodo_id","estudiante_id"})
 *  })
 * @UniqueEntity(fields={"periodo_id","estudiante_id"}, message="El registro a insertar ya existe")
 * @ORM\Entity
 */
class Inscripcion
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
     * @ORM\ManyToOne(targetEntity="Acad\academicoBundle\Entity\Estudiante") 
     * @ORM\JoinColumn(name="estudiante_id", referencedColumnName="id")
     * @Assert\NotBlank()
     */
    protected $estudiante;
    
    /**
     *
     * @ORM\Column(type="integer", nullable=false)
     */
    protected $estado;

   /**
     *
     * @ORM\ManyToOne(targetEntity="Acad\administrativoBundle\Entity\Periodo") 
     * @ORM\JoinColumn(name="periodo_id", referencedColumnName="id")
     * @Assert\NotBlank()
     */
    protected $periodo;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Acad\administrativoBundle\Entity\Requisito") 
     * @ORM\JoinColumn(name="requisito_id", referencedColumnName="id")
     * @Assert\NotBlank()
     */
    protected $requisito;
    
    

}
