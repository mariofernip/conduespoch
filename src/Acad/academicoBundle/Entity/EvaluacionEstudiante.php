<?php


namespace Acad\academicoBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


class EvaluacionEstudiante {

    protected $id;
 
    
   
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
    
}