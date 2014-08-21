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
             ->add('nombre')   
            ->add('area', 'entity', array(
                    'class' => 'Acad\administrativoBundle\Entity\Area',
                    'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('a')
                                ->select('a')                                
                        ;
                    }
                ))   
            ->add('numerocreditos')   
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
