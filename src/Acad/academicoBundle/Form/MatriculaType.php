<?php

namespace Acad\academicoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MatriculaType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('seccion', 'choice', array('choices'   => array('Diurna' => 'Diurna', 'Vespertina' => 'Vespertina', 'Nocturna' => 'Nocturna'),  'required'  => false))
            ->add('observaciones')            
            ->add('nivel')            
            ->add('fechamatricula')  
            ->add('periodo')  
            ->add('estudiante')  
                
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acad\academicoBundle\Entity\Matricula'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'acad_academicobundle_matricula';
    }
}
