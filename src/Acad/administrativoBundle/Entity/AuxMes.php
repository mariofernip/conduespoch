<?php


namespace Acad\administrativoBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


class AuxMes {


    protected $id;
 
    
   
    protected $estmes;
    

    public function __construct() {
        $this->estmes= new ArrayCollection();
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
    
    //
    public function setEstMes($estmes)
    {
        $this->estmes = $estmes;
    
        return $this;
    }

    
    public function getEstMes()
    {
        return $this->estmes;
    }
    
}