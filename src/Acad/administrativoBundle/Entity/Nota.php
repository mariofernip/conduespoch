<?php

namespace Acad\administrativoBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="nota")
 * @ORM\Entity(repositoryClass="Acad\administrativoBundle\Entity\MesRepository")
 * @UniqueEntity(fields={"nombre"}, message="El registro a insertar ya existe")
 */
class Nota {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /** @ORM\Column(type="string", length=64, nullable=false)
     * @Assert\NotBlank(message="Por favor ingrese un nombre")
     */
    protected $nombre;

    /**
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $estado;

    public function setId($id) {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Mes
     */
    public function setNombre($nombre) {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre() {
        return $this->nombre;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Mes
     */
    public function setEstado($estado) {
        $this->estado = $estado;

        return $this;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function __toString() {
        return $this->getNombre();
    }

}