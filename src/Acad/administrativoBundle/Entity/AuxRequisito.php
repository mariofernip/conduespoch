<?php


namespace Acad\administrativoBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


class AuxRequisito {


    protected $id;
 
    
   
    protected $estreq;
    

    public function __construct() {
        $this->estreq= new ArrayCollection();
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
    public function setEstReq($estreq)
    {
        $this->estreq = $estreq;
    
        return $this;
    }

    
    public function getEstReq()
    {
        return $this->estreq;
    }
    
}