<?php

namespace Acad\academicoBundle\Form;

use Acad\academicoBundle\Form\MateriaAsignadaType;
use Acad\academicoBundle\Form\SuspensoEstudianteType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SuspensoEstudianteType extends AbstractType
{
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('descripcion')
            ->add('evaest','collection',array('type'=> new MateriaAsignadaType() ,'required'=>false))
        ;
    }
    
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acad\academicoBundle\Entity\SuspensoEstudiante'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'acad_academicobundle_suspensoestudiante';
    }
}
