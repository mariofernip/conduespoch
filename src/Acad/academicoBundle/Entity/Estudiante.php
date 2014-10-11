<?php

namespace Acad\academicoBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile ;


/**
 * @ORM\Table(name="estudiante")
 * @ORM\Entity(repositoryClass="Acad\academicoBundle\Entity\EstudianteRepository")
 * @UniqueEntity(fields={"email"}, message="El correo electrónico ingresado ya existe")
 * @UniqueEntity(fields={"cedula"}, message="El número de cédula ingresado ya existe")
 * @ORM\HasLifecycleCallbacks
 */
class Estudiante {
    
    private $temp;
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
   protected $id;
   
   /** @ORM\Column(type="integer", nullable=false, unique=true) 
    * @Assert\NotBlank(message="Por favor ingrese el número de cédula")
    */    
   protected $cedula;
   
   /** @ORM\Column(type="string", length=64, nullable=false) 
    * @Assert\NotBlank(message="Por favor ingrese un nombre")
    */    
   protected $nombre;
   
   /** @ORM\Column(type="string", length=64, nullable=false)
    *  @Assert\NotBlank(message="Por favor ingrese un apellido")
    */        
   protected $apellido;
   
   /** @ORM\Column(type="string", length=13, nullable=true) 
    */    
   protected $telefonofijo;
   
   /** @ORM\Column(type="string", length=13, nullable=true) 
    */    
   protected $celular;
   
   /** @ORM\Column(type="string", length=128, nullable=true) 
    */    
   protected $calle;
   
   /** @ORM\Column(type="string", length=64, nullable=true) 
    */    
   protected $barrio;
   
   /** @ORM\Column(type="string", length=64, nullable=true)
    */    
   protected $parroquia;
   
   /** @ORM\Column(type="string", length=32, nullable=true) 
    */    
   protected $ciudad;
   
   /** @ORM\Column(type="string", length=128, nullable=false) 
    *  @Assert\Email()    
    */    
   protected $email;
   
   /** @ORM\Column(type="string", length=64, nullable=true) 
    */    
   protected $ocupacion;
   
   /** @ORM\Column(type="string", length=32, nullable=true) 
    */    
   protected $lugarnacimiento;
   
   /** @ORM\Column(type="string", length=32, nullable=false)     
    */
   protected $estado;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $path;
   
    /**
     * @Assert\File(maxSize="6000000")
     */
    private $foto;

    /**
     * Sets foto.
     *
     * @param UploadedFile $foto
     */
    public function setFoto(UploadedFile $foto = null)
    {
        $this->foto = $foto;
        // check if we have an old image path
        if (isset($this->path)) {
            // store the old name to delete after the update
            $this->temp = $this->path;
            $this->path = null;
        } else {
            $this->path = 'initial';
        }
    }

    /**
     * Get foto.
     *
     * @return UploadedFile
     */
    public function getFoto()
    {
        return $this->foto;
    }
    
     public function getAbsolutePath()
    {
        return null === $this->path
            ? null
            : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
        return null === $this->path
            ? null
            : $this->getUploadDir().'/'.$this->path;
    }

    protected function getUploadRootDir()
    {
        // la ruta absoluta del directorio donde se deben
        // guardar los archivos cargados
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // se deshace del __DIR__ para no meter la pata
        // al mostrar el documento/imagen cargada en la vista.
        return 'uploads/documents';
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
     * Set cedula
     *
     * @param string $cedula
     * @return Estudiante
     */
    public function setCedula($cedula)
    {
        $this->cedula = $cedula;
    
        return $this;
    }

    /**
     * Get cedula
     *
     * @return string 
     */
    public function getCedula()
    {
        return $this->cedula;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Estudiante
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apellido
     *
     * @param string $apellido
     * @return Estudiante
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    
        return $this;
    }

    /**
     * Get apellido
     *
     * @return string 
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set telefonofijo
     *
     * @param string $telefonofijo
     * @return Estudiante
     */
    public function setTelefonofijo($telefonofijo)
    {
        $this->telefonofijo = $telefonofijo;
    
        return $this;
    }

    /**
     * Get telefonofijo
     *
     * @return string 
     */
    public function getTelefonofijo()
    {
        return $this->telefonofijo;
    }

    /**
     * Set celular
     *
     * @param string $celular
     * @return Estudiante
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;
    
        return $this;
    }

    /**
     * Get celular
     *
     * @return string 
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * Set calle
     *
     * @param string $calle
     * @return Estudiante
     */
    public function setCalle($calle)
    {
        $this->calle = $calle;
    
        return $this;
    }

    /**
     * Get calle
     *
     * @return string 
     */
    public function getCalle()
    {
        return $this->calle;
    }

    /**
     * Set barrio
     *
     * @param string $barrio
     * @return Estudiante
     */
    public function setBarrio($barrio)
    {
        $this->barrio = $barrio;
    
        return $this;
    }

    /**
     * Get barrio
     *
     * @return string 
     */
    public function getBarrio()
    {
        return $this->barrio;
    }

    /**
     * Set parroquia
     *
     * @param string $parroquia
     * @return Estudiante
     */
    public function setParroquia($parroquia)
    {
        $this->parroquia = $parroquia;
    
        return $this;
    }

    /**
     * Get parroquia
     *
     * @return string 
     */
    public function getParroquia()
    {
        return $this->parroquia;
    }

    /**
     * Set ciudad
     *
     * @param string $ciudad
     * @return Estudiante
     */
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;
    
        return $this;
    }

    /**
     * Get ciudad
     *
     * @return string 
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Estudiante
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set ocupacion
     *
     * @param string $ocupacion
     * @return Estudiante
     */
    public function setOcupacion($ocupacion)
    {
        $this->ocupacion = $ocupacion;
    
        return $this;
    }

    /**
     * Get ocupacion
     *
     * @return string 
     */
    public function getOcupacion()
    {
        return $this->ocupacion;
    }

    /**
     * Set lugarnacimiento
     *
     * @param string $lugarnacimiento
     * @return Estudiante
     */
    public function setLugarnacimiento($lugarnacimiento)
    {
        $this->lugarnacimiento = $lugarnacimiento;
    
        return $this;
    }

    /**
     * Get lugarnacimiento
     *
     * @return string 
     */
    public function getLugarnacimiento()
    {
        return $this->lugarnacimiento;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return Estudiante
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    
        return $this;
    }

    /**
     * Get estado
     *
     * @return string 
     */
    public function getEstado()
    {
        return $this->estado;
    }
    
    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->getFoto()) {
            // haz lo que quieras para generar un nombre único
            $filename = sha1(uniqid(mt_rand(), true));
            $this->path = $filename.'.'.$this->getFoto()->guessExtension();
        }
    }
    
    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->getFoto()) {
            return;
        }

        // si hay un error al mover el archivo, move() automáticamente
        // envía una excepción. This will properly prevent
        // the entity from being persisted to the database on error
        $this->getFoto()->move($this->getUploadRootDir(), $this->path);

        // check if we have an old image
        if (isset($this->temp)) {
            // delete the old image
            unlink($this->getUploadRootDir().'/'.$this->temp);
            // clear the temp image path
            $this->temp = null;
        }
        $this->foto = null;
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if ($foto == $this->getAbsolutePath()) {
            unlink($foto);
        }
    }
    
    public function __toString() {
        return $this->getCedula().' - '.$this->getNombre().' '.$this->getApellido();
    }
}