<?php

namespace AppBundle\Form\Model;

use AppBundle\Entity\FormField;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

abstract class TextTypeModel extends AbstractFieldModel
{

    /**
     * Build translatable labels type field
     * @param FormBuilderInterface &$builder
     */
    public function buildLabels(FormBuilderInterface &$builder){
        $builder
            ->add('locale', ChoiceType::class, [
                'choices' => [
                    'fr' => 'fr',
                    'en' => 'en',
                ],
                'label' => 'Locale',
                'mapped' => false
            ])
            ->add('value', TextType::class, [
                'label' => 'label',
                'mapped' => false
            ])
        ;
    }

    /**
     * Build position type field
     * @param FormBuilderInterface &$builder
     */
    public function buildPosition(FormBuilderInterface &$builder){

    }

    /**
     * Build choices type field
     * @param FormBuilderInterface &$builder
     */
    public function buildChoices(FormBuilderInterface &$builder){

    }

    /**
     * Build defaultValue type field
     * @param FormBuilderInterface &$builder
     */
    public function buildDefaultValue(FormBuilderInterface &$builder){

    }

    /**
     * Build translatable placeholders type field
     * @param FormBuilderInterface &$builder
     */
    public function buildPlaceholders(FormBuilderInterface &$builder){

    }

    /**
     * Build targetEntity type field
     * @param FormBuilderInterface &$builder
     */
    public function buildTargetEntity(FormBuilderInterface &$builder){

    }

    /**
     * Build required type field
     * @param FormBuilderInterface &$builder
     */
    public function buildRequired(FormBuilderInterface &$builder){

    }

    /**
     * Build disabled type field
     * @param FormBuilderInterface &$builder
     */
    public function buildDisabled(FormBuilderInterface &$builder){

    }

    /**
     * Build multiple type field
     * @param FormBuilderInterface &$builder
     */
    public function buildMultiple(FormBuilderInterface &$builder){

    }

    /**
     * Build choiceLabel type field
     * @param FormBuilderInterface &$builder
     */
    public function buildChoiceLabel(FormBuilderInterface &$builder){

    }

    /**
     * Get the displayed name of the model
     * @return string
     */
    public static function getName(){
        return "Texte";
    }

    /**
     * Get the bloc prefix name
     * @return string
     */
    public static function getBlockName(){
        return "TextTypeModel";
    }

    /**
     * Get the twig views to render this model
     * @return string
     */
    public static function getTwigPath(){
        return 'models/text.html.twig';
    }
    
}
