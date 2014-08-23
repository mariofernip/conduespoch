<?php

namespace Acad\administrativoBundle\Form;

use Acad\administrativoBundle\Form\HorarioClaseType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AuxHorarioClaseType extends AbstractType
{
    
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder            
            ->add('dochoraclase','collection',array('type'=> new HorarioClaseType(),'required'=>false))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acad\administrativoBundle\Entity\AuxHorarioClase'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'acad_administrativobundle_auxdochorc';
    }
}
