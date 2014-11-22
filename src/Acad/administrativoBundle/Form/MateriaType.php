<?php

namespace Acad\administrativoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MateriaType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', 'text', array(
             'attr' => array('style' => 'width: 250px; text-align: left'),'required'=>true))   
            ->add('numerohoras', 'number', array(
             'attr' => array('style' => 'width: 50px; text-align: center'),'required'=>true))   
            ->add('numerocreditos', 'number', array(
             'attr' => array('style' => 'width: 50px; text-align: center'),'required'=>false))   
            ->add('descripcion')
            ->add('estado','checkbox',array('required'=>false))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acad\administrativoBundle\Entity\Materia'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'acad_administrativobundle_materia';
    }
}
