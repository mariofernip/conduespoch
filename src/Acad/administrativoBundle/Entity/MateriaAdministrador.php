<?php


namespace Acad\administrativoBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * 
 * @ORM\Entity
 */
class MateriaAdministrador {
    
    
    protected $id;
    
   
    protected $materiaadmin;
       
    

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    public function setMateriaAdmin($materiaadmin)
    {
        $this->materiaadmin = $materiaadmin;
    
        return $this;
    }

    
    public function getMateriaAdmin()
    {
        return $this->materiaadmin;
    }
    
     public function __construct() {
        $this->materiaadmin= new ArrayCollection();
    }
}