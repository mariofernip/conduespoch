<?php

namespace Acad\administrativoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PerfilDocenteType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('apellido')
            ->add('direccion')
            ->add('telefonofijo')
            ->add('celular')
            ->add('email','email')
            ->add('password','repeated',array(
                'type' => 'password',
                'invalid_message' => 'Las dos contraseñas deben coincidir',
                'options' => array('label'=>'Contraseña'),
                'required'    => false,
            ))  
            ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acad\administrativoBundle\Entity\Docente'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'acad_administrativobundle_docente';
    }
}
