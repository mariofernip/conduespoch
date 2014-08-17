<?php

namespace Acad\academicoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MateriaAsignadaType extends AbstractType
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
            ->add('equivalencia','text', array( 'attr' => array('style' => 'width: 80px; border: none; text-align: center'),
                        'read_only' => true,
                        'disabled' => true))
            ->add('notasuspenso', 'choice', array('choices' => $this->getInclinationChoices(),))
            ->add('promediofinal','number', array( 'attr' => array('style' => 'width: 40px; border: none; text-align: center'),
                        'read_only' => true,
                        'disabled' => true))
            ->add('matricula')            
            
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acad\academicoBundle\Entity\MateriaAsignada'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'acad_academicobundle_materiaasignada';
    }
}
