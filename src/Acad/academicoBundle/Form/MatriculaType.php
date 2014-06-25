<?php

namespace Acad\academicoBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MatriculaType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('periodo')                                    
            ->add('nivel')                                    
            ->add('seccion', 'choice', array('choices'   => array('Diurna' => 'Diurna', 'Vespertina' => 'Vespertina', 'Nocturna' => 'Nocturna'),  'required'  => false))                        
            ->add('estudiante','entity',array(
                    'class'=> 'academicoBundle:Estudiante',
                    'query_builder'=> function(EntityRepository $er){
                    return $er->createQueryBuilder('e')
                    ->select('e')        
                    ->join('academicoBundle:Inscripcion', 'i', 'WITH', 'e.id =i.estudiante')                            
                    ->join('administrativoBundle:Periodo', 'p', 'WITH', 'p.id = i.periodo')           
                    ->where('i.estado = 1 and p.estado = 1')
                            
                    ;                    
                }
                ))  
            ->add('observaciones')                
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acad\academicoBundle\Entity\Matricula'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'acad_academicobundle_matricula';
    }
}
