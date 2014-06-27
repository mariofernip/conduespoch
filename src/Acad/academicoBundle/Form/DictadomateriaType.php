<?php

namespace Acad\academicoBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DictadomateriaType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nivel')
            ->add('docente','entity',array(
                'class'=>'administrativoBundle:Docente',
                'query_builder'=>  function(EntityRepository $er){
            
                    return $er->createqueryBuilder('d')
                        ->select('d')    
                        ->where('d.estado=1'); }
                ))
            ->add('periodo')
            ->add('materia')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acad\academicoBundle\Entity\Dictadomateria'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'acad_academicobundle_dictadomateria';
    }
}
