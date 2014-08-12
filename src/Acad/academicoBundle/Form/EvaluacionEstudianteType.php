<?php

namespace Acad\academicoBundle\Form;

use Acad\academicoBundle\Form\EvaluacionEstudianteType;
use Acad\academicoBundle\Form\EvaluacionType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EvaluacionEstudianteType extends AbstractType
{
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('descripcion')
            ->add('evaest','collection',array('type'=> new EvaluacionType(),'required'=>false))
        ;
    }
    
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acad\academicoBundle\Entity\EvaluacionEstudiante'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'acad_academicobundle_evaluacionestudiante';
    }
}
