<?php

namespace Acad\academicoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class EvaluacionType extends AbstractType {

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

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('materiaasignada')
                ->add('notatb', 'choice', array('choices' => $this->getInclinationChoices(),))
                ->add('notaec', 'choice', array('choices' => $this->getInclinationChoices(),))
                ->add('notapp', 'choice', array('choices' => $this->getInclinationChoices(),))
                ->add('notapt', 'choice', array('choices' => $this->getInclinationChoices(),))
                ->add('promedio','number', array( 'attr' => array('style' => 'width: 30px; border: none; text-align: center'),
                        'read_only' => true,
                        'disabled' => true
          ))

        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Acad\academicoBundle\Entity\Evaluacion'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'acad_academicobundle_evaluacion';
    }

}
