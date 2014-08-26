<?php

namespace Acad\academicoBundle\Form;

use Acad\administrativoBundle\Form\HorarioClaseType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AuxExamenGradoType extends AbstractType
{
    
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder            
            ->add('exagrado','collection',array('type'=> new ExamenGradoType(),'required'=>false))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acad\academicoBundle\Entity\AuxExamenGrado'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'acad_administrativobundle_auxexamengrado';
    }
}
