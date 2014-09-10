<?php

namespace Acad\academicoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ExamenGradoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    
    public function setInclination($inclination) {
        $this->inclination = (int) $inclination;
    }

    private function getInclinationChoices() {
        $choices = array();
        for ($i = 0; $i <= 20; $i++) {
            $choices[$i] = "$i";
        }
        return $choices;
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('equivalencia','text',array('disabled'=>true))
           //->add('nota', 'choice', array('choices' => $this->getInclinationChoices(),))
            ->add('nota','number', array( 'attr' => array('style' => 'width: 50px; border: none; text-align: center'))) 
            ->add('matricula')
            ->add('descripcion')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acad\academicoBundle\Entity\ExamenGrado'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'acad_academicobundle_examengrado';
    }
}
