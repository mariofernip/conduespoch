<?php


namespace Acad\administrativoBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


class AuxHorarioClase {


    protected $id;
 
    
   
    protected $dochoraclase;
    

    public function __construct() {
        $this->dochoraclase= new ArrayCollection();
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
    public function setDocHoraClase($dochoraclase)
    {
        $this->dochoraclase = $dochoraclase;
    
        return $this;
    }

    
    public function getDocHoraClase()
    {
        return $this->dochoraclase;
    }
    
}