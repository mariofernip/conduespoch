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
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
//            ->add('estado','entity',array(
//                    'class' => 'AcadacademicoBundle:CumpleRequisito',
//                    'property' => 'estado',))
//            ->add('requisito','entity',array(
//                    'class' => 'AcadadministrativoBundle:Requisito',
//                    'property' => 'descripcion',))
                //->add('requisito','collection',array('type'=> new RequisitoType()))                
                ->add('requisito')
                ->add('estado', 'checkbox')
        //->add('id')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acad\academicoBundle\Entity\CumpleRequisito'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'acad_academicobundle_cumplerequisito';
    }
}
