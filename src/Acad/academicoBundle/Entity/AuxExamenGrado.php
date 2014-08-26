<?php


namespace Acad\academicoBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


class AuxExamenGrado {

    protected $exagrado;

    public function __construct() {
        $this->exagrado= new ArrayCollection();
        
    }
    
    
    //
    public function setExaGrado($exagrado)
    {
        $this->exagrado = $exagrado;
    
        return $this;
    }

    
    public function getExaGrado()
    {
        return $this->exagrado;
    }
    

}
