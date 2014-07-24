<?php

namespace Acad\academicoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class EvaluacionType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder      
            ->add('promedio')
            ->add('descripcion')    
             ->add('mesevaluacion', 'entity',array(
                    'class'=> 'administrativoBundle:MesEvaluacion',
                    'query_builder'=> function(EntityRepository $er){
                     return $er->createQueryBuilder('e')
                     ->join('e.mes', 'm')        
                     ->where('e.estado = true')                            
            
                    ;                    
                }
                ))    
            ->add('tiponota')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acad\academicoBundle\Entity\Evaluacion'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'acad_academicobundle_evaluacion';
    }
}
