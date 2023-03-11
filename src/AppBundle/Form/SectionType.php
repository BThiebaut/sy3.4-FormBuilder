<?php

namespace AppBundle\Form;

use AppBundle\Form\Type\FormType as TypeFormType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class SectionType extends TypeFormType
{

    /**
    * {@inheritdoc}
    */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->initExtraParams($options);
        
        $builder
        ->add('labels', CollectionType::class, [
            'entry_type' => TextType::class
            ]
        )
        ->add('position', HiddenType::class)
        ;
    }

    /**
    * {@inheritdoc}
    */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);
        
        $resolver->setDefaults(array(
            'data_class'    => 'AppBundle\Entity\FormSection',
            'translation_domain' => 'forms',
        ));
    }

    /**
    * {@inheritdoc}
    */
    public function getBlockPrefix()
    {
        return 'FormSection';
    }


}
