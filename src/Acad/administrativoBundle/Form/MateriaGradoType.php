<?php

namespace Acad\administrativoBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MateriaGradoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
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
            ->add('materia','entity',array(
                    'class'=> 'administrativoBundle:Materia',
                    'query_builder'=> function(EntityRepository $er){
                    return $er->createQueryBuilder('m')
                    ->select('m')                            
                    ->where('m.estado = 1')
                            
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
            'data_class' => 'Acad\administrativoBundle\Entity\MateriaGrado'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'acad_administrativobundle_materiagrado';
    }
}
