<?php

namespace Acad\academicoBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Acad\academicoBundle\Form\AsistenciaType;

class EstudianteAsistenciaType extends AbstractType
{
    
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder                     
        ->add('faltasjustificadas','collection',array('type'=> new AsistenciaType(),'required'=>false))                                   
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acad\academicoBundle\Entity\AsistenciaEstudiante'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'estudiante_asistencia_form';
    }
}
