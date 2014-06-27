<?php

namespace Acad\academicoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CumpleRequisitoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
//            ->add('estado','entity',array(
//                    'class' => 'AcadacademicoBundle:CumpleRequisito',
//                    'property' => 'estado',))
            ->add('requisito','entity',array(
                    'class' => 'administrativoBundle:Requisito',
                    'property' => 'descripcion',))
         ->add('estado','checkbox')
                //->add('requisito')
        ;
        
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        //$resolver->setDefaults(array(
        return array(
            'data_class' => 'Acad\academicoBundle\Entity\CumpleRequisito'
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'acad_academicobundle_cumplerequisito';
    }
}
