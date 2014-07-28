<?php

namespace Acad\academicoBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
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
     * @Assert\Range(min=1)
     */
    protected $horasmodulo;

    /**
     *
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Range(min=0)
     */
    protected $faltasjustificadas;

    /**
     *
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Range(min=0)
     */
    protected $faltasinjustificadas;

    /**
     *
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Range(min=0)
     */
    protected $atrasos;

    /**
     *
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Range(min=0)
     */
    protected $horasasistidas;

    /**
     *
     * @ORM\Column(type="String", nullable=true)
     */
    protected $observaciones;

    /**
     *
     * @ORM\Column(type="float", nullable=true)
     * @Assert\Range(min=0, max=20)
     */
    protected $promediofinal;

    /**
     *
     * @ORM\Column(type="float", nullable=true)
     * @Assert\Range(min=0, max=20)
     */
    protected $suspenso;

    /**
     *
     * @ORM\Column(type="float", nullable=true)
     * @Assert\Range(min=0, max=20)
     */
    protected $notagrado;

    /**
     *
     * @ORM\Column(type="float", nullable=true)
     * @Assert\Range(min=0, max=20)
     */
    protected $promediototal;


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
     * Set horasmodulo
     *
     * @param integer $horasmodulo
     * @return Asistencia
     */
    public function setHorasmodulo($horasmodulo)
    {
        $this->horasmodulo = $horasmodulo;
    
        return $this;
    }

    /**
     * Get horasmodulo
     *
     * @return integer 
     */
    public function getHorasmodulo()
    {
        return $this->horasmodulo;
    }

    /**
     * Set faltasjustificadas
     *
     * @param integer $faltasjustificadas
     * @return Asistencia
     */
    public function setFaltasjustificadas($faltasjustificadas)
    {
        $this->faltasjustificadas = $faltasjustificadas;
    
        return $this;
    }

    /**
     * Get faltasjustificadas
     *
     * @return integer 
     */
    public function getFaltasjustificadas()
    {
        return $this->faltasjustificadas;
    }

    /**
     * Set faltasinjustificadas
     *
     * @param integer $faltasinjustificadas
     * @return Asistencia
     */
    public function setFaltasinjustificadas($faltasinjustificadas)
    {
        $this->faltasinjustificadas = $faltasinjustificadas;
    
        return $this;
    }

    /**
     * Get faltasinjustificadas
     *
     * @return integer 
     */
    public function getFaltasinjustificadas()
    {
        return $this->faltasinjustificadas;
    }

    /**
     * Set atrasos
     *
     * @param integer $atrasos
     * @return Asistencia
     */
    public function setAtrasos($atrasos)
    {
        $this->atrasos = $atrasos;
    
        return $this;
    }

    /**
     * Get atrasos
     *
     * @return integer 
     */
    public function getAtrasos()
    {
        return $this->atrasos;
    }

    /**
     * Set horasasistidas
     *
     * @param integer $horasasistidas
     * @return Asistencia
     */
    public function setHorasasistidas($horasasistidas)
    {
        $this->horasasistidas = $horasasistidas;
    
        return $this;
    }

    /**
     * Get horasasistidas
     *
     * @return integer 
     */
    public function getHorasasistidas()
    {
        return $this->horasasistidas;
    }

    /**
     * Set observaciones
     *
     * @param integer $observaciones
     * @return Asistencia
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;
    
        return $this;
    }

    /**
     * Get observaciones
     *
     * @return integer 
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set promediofinal
     *
     * @param float $promediofinal
     * @return Asistencia
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
     * Set suspenso
     *
     * @param float $suspenso
     * @return Asistencia
     */
    public function setSuspenso($suspenso)
    {
        $this->suspenso = $suspenso;
    
        return $this;
    }

    /**
     * Get suspenso
     *
     * @return float 
     */
    public function getSuspenso()
    {
        return $this->suspenso;
    }

    /**
     * Set notagrado
     *
     * @param float $notagrado
     * @return Asistencia
     */
    public function setNotagrado($notagrado)
    {
        $this->notagrado = $notagrado;
    
        return $this;
    }

    /**
     * Get notagrado
     *
     * @return float 
     */
    public function getNotagrado()
    {
        return $this->notagrado;
    }

    /**
     * Set promediototal
     *
     * @param float $promediototal
     * @return Asistencia
     */
    public function setPromediototal($promediototal)
    {
        $this->promediototal = $promediototal;
    
        return $this;
    }

    /**
     * Get promediototal
     *
     * @return float 
     */
    public function getPromediototal()
    {
        return $this->promediototal;
    }

    /**
     * Set materiaasiganda
     *
     * @param \Acad\academicoBundle\Entity\MateriaAsignada $materiaasiganda
     * @return Asistencia
     */
    public function setMateriaasiganda(\Acad\academicoBundle\Entity\MateriaAsignada $materiaasiganda = null)
    {
        $this->materiaasiganda = $materiaasiganda;
    
        return $this;
    }

    /**
     * Get materiaasiganda
     *
     * @return \Acad\academicoBundle\Entity\MateriaAsignada 
     */
    public function getMateriaasiganda()
    {
        return $this->materiaasiganda;
    }
}