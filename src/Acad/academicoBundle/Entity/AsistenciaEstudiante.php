<?php


namespace Acad\academicoBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * 
 * @ORM\Entity
 */
class AsistenciaEstudiante {
    
    /**
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    protected $id;
    
    /**
     * @ORM\Column(type="integer", length=25)
     */
    protected $horasasistidas;
    
   
    protected $faltasjustificadas;
    

    public function __construct() {
        $this->faltasjustificadas= new ArrayCollection();
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
     * Set descripcion
     *
     * @param string $horasasistidas
     * @return AsistenciaEstudiante
     */
    public function setHorasasistidas($horasasistidas)
    {
        $this->horasasistidas = $horasasistidas;
    
        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getHorasasistidas()
    {
        return $this->horasasistidas;
    }
    
    //
    public function setFaltasjustificadas($faltasjustificadas)
    {
        $this->faltasjustificadas = $faltasjustificadas;
    
        return $this;
    }

    
    public function getFaltasjustificadas()
    {
        return $this->faltasjustificadas;
    }
    
}