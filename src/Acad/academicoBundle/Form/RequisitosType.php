<?php

namespace Acad\academicoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class RequisitosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {   
        
//     $builder->add('Requisitos', 'choice', array(
//    'choices'   => array(
//        'options'   => '',
//    ),
//    'multiple'  => true,
//    'expanded' => true,        
//));

//         $builder->add('requisito','entity' ,'choices', array(
//         
//            'class' => 'administrativoBundle:Requisito',
//                
//            'query_builder' => function(EntityRepository $er) {
//            return $er->createQueryBuilder('u')
//                      ->where('u.estado = 1');
//            },
//        'multiple'  => true,
//        'expanded' => true,              
//        ));
//        
        
        $builder->add('requisito','entity' ,array(
         
            'class' => 'administrativoBundle:Requisito',
                
            'query_builder' => function(EntityRepository $er) {
            return $er->createQueryBuilder('u')
                      ->where('u.estado = 1');
            },
        'multiple'  => true,
        'expanded' => true,              
        ));
        
        
        
        
//
////        $formModifier = function (FormInterface $form, Requisito $requisito = null) {
////            $positions = null === $requisito ? array() : $requisito->getAvailablePositions();
////
////            $form->add('position', 'entity', array(
////                'class'       => 'AcmeDemoBundle:Position',
////                'empty_value' => '',
////                'choices'     => $positions,
////            ));
////        };
//
//        $builder->addEventListener(
//            FormEvents::PRE_SET_DATA,
//            function (FormEvent $event) use ($formModifier) {
//                // this would be your entity, i.e. SportMeetup
//                $data = $event->getData();
//
//                $formModifier($event->getForm(), $data->getSport());
//            }
//        );
//
//        $builder->get('sport')->addEventListener(
//            FormEvents::POST_SUBMIT,
//            function (FormEvent $event) use ($formModifier) {
//                // It's important here to fetch $event->getForm()->getData(), as
//                // $event->getData() will get you the client data (that is, the ID)
//                $sport = $event->getForm()->getData();
//
//                // since we've added the listener to the child, we'll have to pass on
//                // the parent to the callback functions!
//                $formModifier($event->getForm()->getParent(), $sport);
//            }
//        );
    }

//    public function setDefaultOptions(OptionsResolverInterface $resolver)
//    {
//        $resolver->setDefaults(array(
//            'data_class' => 'Acad\administrativoBundle\Entity\Requisito'
//        ));
//    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'acad_administrativobundle_requisito';
    }
    
    
}