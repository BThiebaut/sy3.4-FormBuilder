<?php

namespace AppBundle\Form\Model;

use AppBundle\Entity\FormField;
use AppBundle\Form\Type\FormType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

abstract class AbstractFieldModel extends FormType
{

    /**
     * @var FormField
     */
    protected $formField;

    /**
     * Build translatable labels type field
     * @param FormBuilderInterface &$builder
     */
    abstract public function buildLabels(FormBuilderInterface &$builder);

    /**
     * Build position type field
     * @param FormBuilderInterface &$builder
     */
    abstract public function buildPosition(FormBuilderInterface &$builder);

    /**
     * Build choices type field
     * @param FormBuilderInterface &$builder
     */
    abstract public function buildChoices(FormBuilderInterface &$builder);

    /**
     * Build defaultValue type field
     * @param FormBuilderInterface &$builder
     */
    abstract public function buildDefaultValue(FormBuilderInterface &$builder);

    /**
     * Build translatable placeholders type field
     * @param FormBuilderInterface &$builder
     */
    abstract public function buildPlaceholders(FormBuilderInterface &$builder);

    /**
     * Build targetEntity type field
     * @param FormBuilderInterface &$builder
     */
    abstract public function buildTargetEntity(FormBuilderInterface &$builder);

    /**
     * Build required type field
     * @param FormBuilderInterface &$builder
     */
    abstract public function buildRequired(FormBuilderInterface &$builder);

    /**
     * Build disabled type field
     * @param FormBuilderInterface &$builder
     */
    abstract public function buildDisabled(FormBuilderInterface &$builder);

    /**
     * Build multiple type field
     * @param FormBuilderInterface &$builder
     */
    abstract public function buildMultiple(FormBuilderInterface &$builder);

    /**
     * Build choiceLabel type field
     * @param FormBuilderInterface &$builder
     */
    abstract public function buildChoiceLabel(FormBuilderInterface &$builder);

    /**
     * Get the displayed name of the model
     * @return string
     */
    abstract public static function getName();

    /**
     * Get the bloc prefix name
     * @return string
     */
    abstract public static function getBlockName();

    /**
     * Get the twig views to render this model
     * @return string
     */
    abstract public static function getTwigPath();
    
    /**
     * Get attriube name
     */
    public function getAttribleName()
    {
        $name = FormField::FIELD_NAME_NEW;
        if ($this->formField !== null && !!$this->formField->getId()){
            $name = FormField::FIELD_NAME_PREFIX . $this->formField->getId();
        }

        return $name;
    }

    
    /**
    * {@inheritdoc}
    */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->initExtraParams($options);
        $this->buildLabels($builder);
        $this->buildPosition($builder);
        $this->buildChoices($builder);
        $this->buildDefaultValue($builder);
        $this->buildPlaceholders($builder);
        $this->buildTargetEntity($builder);
        $this->buildRequired($builder);
        $this->buildDisabled($builder);
        $this->buildMultiple($builder);
        $this->buildChoiceLabel($builder);
    }
    
    /**
    * {@inheritdoc}
    */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);
        
        $resolver->setDefaults(array(
            'data_class'    => null,
            'translation_domain' => 'forms',
        ));
    }
    
    /**
    * {@inheritdoc}
    */
    public function getBlockPrefix()
    {
        return self::getBlockName();
    }

}
