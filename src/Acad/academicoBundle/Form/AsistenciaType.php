<?php

namespace Acad\academicoBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AsistenciaType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder                                    
            ->add('faltasjustificadas', 'choice', array(
            'choices' => $this->getInclinationChoices(), 
            ))                                   
            ->add('faltasinjustificadas', 'choice', array(
            'choices' => $this->getInclinationChoices(), 
            ))                                                            
            ->add('atrasos', 'choice', array(
            'choices' => $this->getInclinationChoices(), 
            ))                                                           
            ->add('promediofinal', 'text', array(
             'attr' => array('style' => 'width: 30px; border: none; text-align: center'),
             'read_only' => true,
             'disabled' => true
          ))         
           ->add('materiaasignada', 'entity', array(
             'attr' => array('style' => 'width: 270px; border: none'),
             'class'   =>  'Acad\academicoBundle\Entity\MateriaAsignada',
             'read_only' => true,
             'disabled' => true
          ))                                      
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
            'data_class' => 'Acad\academicoBundle\Entity\Asistencia'
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
