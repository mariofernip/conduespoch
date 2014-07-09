<?php


namespace Acad\academicoBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="requisitoestudiante")
 * @ORM\Entity
 */
class RequisitoEstudiante {
    
    /**
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string", length=25)
     */
    protected $descripcion;
    
   
    protected $reqest;
    

    public function __construct() {
        $this->reqest= new ArrayCollection();
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
     * @param string $descripcion
     * @return RequisitoEstudiante
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    
        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    
    //
    public function setReqEst($reqest)
    {
        $this->reqest = $reqest;
    
        return $this;
    }

    
    public function getReqEst()
    {
        return $this->reqest;
    }
    
}