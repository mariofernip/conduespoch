<?php

namespace Acad\administrativoBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Acad\administrativoBundle\Form\MateriasType;

class AdministradorMateriaType extends AbstractType
{
    
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder                     
        ->add('materiaadmin','collection',array('type'=> new MateriasType(),'required'=>false))                                   
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acad\administrativoBundle\Entity\MateriaAdministrador'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'administrador_materia_form';
    }
}
