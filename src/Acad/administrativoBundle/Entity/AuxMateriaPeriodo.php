<?php


namespace Acad\administrativoBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


class AuxMateriaPeriodo {
    
    
    protected $id;
    
   
    protected $matperAux;
       
    

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    public function setMatPerAux($matperaux)
    {
        $this->matperAux = $matperaux;
    
        return $this;
    }

    
    public function getMatPerAux()
    {
        return $this->matperAux;
    }
    
     public function __construct() {
        $this->matperAux= new ArrayCollection();
    }
}