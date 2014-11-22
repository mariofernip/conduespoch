<?php

namespace Acad\administrativoBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class MateriasType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder                                    
            ->add('nombre', 'text', array(
             'attr' => array('style' => 'width: 300px; border: none; text-align: left')))   
            ->add('numerohoras', 'number', array(
             'attr' => array('style' => 'width: 50px; text-align: center'),'required'=>true))   
            ->add('numerocreditos', 'number', array(
             'attr' => array('style' => 'width: 50px; text-align: center'),'required'=>false))  
            ->add('descripcion')   
            ->add('estado','checkbox',array('required'  => false,))       
        ;
    }
    
    
     public function setInclination($inclination)
{
    $this->inclination = (int) $inclination;
}
    
    private function getInclinationChoices()
    {
        $choices = array();
        for($i=0; $i<= 10; $i++) {
            $choices[$i] = "$i"; 
        }
        return $choices;
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
        return 'acad_academicobundle_asistencia';
    }
}
