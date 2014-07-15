<?php


namespace Acad\administrativoBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="evaluacionxmes")
 * @ORM\Entity
 */
class EvaluacionxMes {
    
   
   /**
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    protected $id;
    
    protected $evames;
    

    public function __construct() {
        $this->evames= new ArrayCollection();
    }
    
    
    //
    public function setEvaMes($evames)
    {
        $this->evames = $evames;
    
        return $this;
    }

    
    public function getEvaMes()
    {
        return $this->evames;
    }
    
}