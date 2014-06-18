<?php

namespace Acad\academicoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Asistencia
 *
 * @ORM\Table(name="asistencia")
 * @ORM\Entity
 */
class Asistencia
{
    /**
     *
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Acad\academicoBundle\Entity\MateriaAsignada") 
     * @ORM\JoinColumn(name="materiaasignada_id", referencedColumnName="id")
     * 
     */
    protected $materiaasiganda;

    /**
     *
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Blank()
     * @Assert\Range(min=1)
     */
    protected $horasmodulo;

    /**
     *
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Blank()
     * @Assert\Range(min=0)
     */
    protected $faltasjustificadas;

    /**
     *
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Blank()
     * @Assert\Range(min=0)
     */
    protected $faltasinjustificadas;

    /**
     *
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Blank()
     * @Assert\Range(min=0)
     */
    protected $atrasos;

    /**
     *
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Blank()
     * @Assert\Range(min=0)
     */
    protected $horasasistidas;

    /**
     *
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Blank()
     */
    protected $observaciones;

    /**
     *
     * @ORM\Column(type="float", nullable=true)
     * @Assert\Blank()
     * @Assert\Range(min=0, max=20)
     */
    protected $promediofinal;

    /**
     *
     * @ORM\Column(type="float", nullable=true)
     * @Assert\Blank()
     * @Assert\Range(min=0, max=20)
     */
    protected $suspenso;

    /**
     *
     * @ORM\Column(type="float", nullable=true)
     * @Assert\Blank()
     * @Assert\Range(min=0, max=20)
     */
    protected $notagrado;

    /**
     *
     * @ORM\Column(type="float", nullable=true)
     * @Assert\Blank()
     * @Assert\Range(min=0, max=20)
     */
    protected $promediototal;

}
