<?php


namespace Acad\academicoBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


class SuspensoEstudiante {

    protected $id;
 
    
   protected $asiest;
    protected $evaest;
    

    public function __construct() {
        $this->evaest= new ArrayCollection();
        
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
    public function setEvaEst($evaest)
    {
        $this->evaest = $evaest;
    
        return $this;
    }

    
    public function getEvaEst()
    {
        return $this->evaest;
    }
    

    public function setAsiEst($asiest)
    {
        $this->asiest = $asiest;
    
        return $this;
    }

    
    public function getAsiEst()
    {
        return $this->asiest;
    }
    
}
