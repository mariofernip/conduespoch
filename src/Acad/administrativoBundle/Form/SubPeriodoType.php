<?php

namespace Acad\administrativoBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SubPeriodoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tipo', 'choice', array('choices' => array('1' => '1', '2' => '2', '3' => '3'), 'required' => false,
             'attr' => array('style' => 'width: 60px; text-align: center'),'required'=>true))
            ->add('estado','checkbox',array('required'=>false))
            ->add('periodo','entity',array(
                    'class'=> 'administrativoBundle:Periodo',
                    'query_builder'=> function(EntityRepository $er){
                    return $er->createQueryBuilder('p')
                    ->select('p')                            
                    ->where('p.estado = 1')
                            
                    ;                    
                }
            ))  
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acad\administrativoBundle\Entity\SubPeriodo'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'acad_administrativobundle_subperiodo';
    }
}
