<?php

namespace AppBundle\Form;

use AppBundle\Form\Type\FormType as TypeFormType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class FormType extends TypeFormType
{
    
    /**
    * {@inheritdoc}
    */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->initExtraParams($options);
        $builder
        ->add('name', TextType::class, [
            'required' => true
        ])
        ->add('sections', CollectionType::class, [
            'entry_type'    => SectionType::class,
            'entry_options' => [
                'label' => false,
                'extraParams' => $options['extraParams']
            ],
            'label'          => "Sections",
            'allow_add'     => true,
            'allow_delete'  => true,
            'delete_empty'  => true,
            'by_reference'  => false,
            'required'      => false,
            'label_attr'    => array("class" => "hidden"),
            ])
        ;
    }
    
    /**
    * {@inheritdoc}
    */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);
        
        $resolver->setDefaults(array(
            'data_class'    => 'AppBundle\Entity\Form',
            'translation_domain' => 'forms',
        ));
    }
    
    /**
    * {@inheritdoc}
    */
    public function getBlockPrefix()
    {
        return 'Form';
    }
    

}
