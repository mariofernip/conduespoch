<?php

namespace Acad\administrativoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Docente
 *
 * @ORM\Table(name="docente")
 * @UniqueEntity(fields={"email"}, message="El correo a insertar ya existe")
 * @UniqueEntity(fields={"cedula"}, message="La cedula a insertar ya existe")
 * @ORM\Entity
 */
class Docente
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
     * @ORM\Column(type="integer", nullable=false)
     * @Assert\NotBlank(message="Por favor ingrese la cédula del Docente")
     */
    protected $cedula;

    /**
     *
     * @ORM\Column(type="string", length=64, nullable=false)
     * @Assert\NotBlank(message="Por favor ingrese el nombre del Docente")
     
     */
    protected $nombre;

    /**
     *
     * @ORM\Column(type="string", length=64, nullable=false)
     * @Assert\NotBlank(message="Por favor ingrese el apellido del Docente")
     */
    protected $apellido;

    /**
     *
     * @ORM\Column(type="string", length=128, nullable=false)
     * @Assert\NotBlank(message="Por favor ingrese la dirección del Docente") 
     */
    protected $direccion;

    /**
     *
     * @ORM\Column(type="string", length=13, nullable=true)
     * @Assert\Blank()
     */
    protected $telefonofijo;

    /**
     *
     * @ORM\Column(type="string", length=13, nullable=true)
     * @Assert\Blank()
     */
    protected $celular;

    /**
     *
     * @ORM\Column(type="string", length=128, nullable=false)
     * @Assert\NotBlank()
     */
    protected $email;

    /**
     *
     * @ORM\Column(type="string", length=128, nullable=true)
     * @Assert\Blank()
     */
    protected $trabajoanterior;

    /**
     *
     * @ORM\Column(type="date", nullable=false)
     * @Assert\NotBlank(message="Por favor ingrese la fecha de ingreso del Docente")
     * @Assert\Date()
     */
    protected $fechaingreso;

    /**
     *
     * @ORM\Column(name="doc_fechasalida", type="date", nullable=true)
     * @Assert\Date()
     */
    protected $fechasalida;

    /**
     *
     * @ORM\Column(type="integer", nullable=false)
     */
    protected $estado;

}
