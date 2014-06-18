<?php

namespace Acad\administrativoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Tiponota
 *
 * @ORM\Table(name="tiponota")
 * @ORM\Entity
 */
class Tiponota
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
     * @ORM\Column(type="string", length=64, nullable=false)
     * @Assert\NotBlank(message="Por favor ingrese la descripción del Tipo Nota")
     
     */
    protected $descripcion;


}
