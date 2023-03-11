<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
* formbuilder.form_field
*
* @ORM\Table(name="formbuilder.form_field")
* @ORM\Entity(repositoryClass="AppBundle\Repository\FormFieldRepository")
*/
class FormField {
    
    /**
    * @var integer
    *
    * @ORM\Column(name="id_form_field", type="bigint", nullable=false)
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="IDENTITY")
    */
    private $id;

    /**
     * @var array
     *
     * @ORM\Column(name="labels", type="json_array", nullable=false)
     * @Assert\NotBlank()
     */
    private $labels;

    /**
     * @var FormSection
     *
     * @ORM\ManyToOne(targetEntity="FormSection", inversedBy="fields")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_form_section", referencedColumnName="id_form_section", nullable=false)
     * })
     */
    private $section;

    /**
     * @var integer
     *
     * @ORM\Column(name="position", type="integer", nullable=false)
     */
    private $position;

    /**
     * @var array
     *
     * @ORM\Column(name="choices", type="json_array", nullable=true)
     */
    private $choices;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="default_value", type="string", nullable=true)
     */
    private $defaultValue;

    /**
     * @var array
     *
     * @ORM\Column(name="placeholders", type="json_array", nullable=true)
     */
    private $placeholders;

    /**
     * @var string
     *
     * @ORM\Column(name="target_entity", type="string", nullable=true)
     */
    private $targetEntity;

    /**
     * @var bool
     *
     * @ORM\Column(name="required", type="boolean", nullable=false)
     */
    private $required;

    /**
     * @var bool
     *
     * @ORM\Column(name="disabled", type="boolean", nullable=false)
     */
    private $disabled;

    /**
     * @var bool
     *
     * @ORM\Column(name="multiple", type="boolean", nullable=false)
     */
    private $multiple;

    /**
     * @var string
     *
     * @ORM\Column(name="choice_label", type="string", nullable=true)
     */
    private $ChoiceLabel;


    public function __construct()
    {
        $this->setLabels(['fr' => '']);
        $this->setPlaceholders(['fr' => '']);
        $this->setChoices([]);
        
        $this->required = false;
        $this->disabled = false;
        $this->multiple = false;
    }

    
    /**
    * Get id
    *
    * @return integer
    */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of position
     *
     * @return  integer
     */ 
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set the value of position
     *
     * @param  integer  $position
     *
     * @return  self
     */ 
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get the value of labels
     *
     * @return  array
     */ 
    public function getLabels()
    {
        return $this->labels;
    }

    /**
     * Set the value of labels
     *
     * @param  array  $labels
     *
     * @return  self
     */ 
    public function setLabels(array $labels)
    {
        $this->labels = $labels;

        return $this;
    }

    /**
     * Get the value of section
     *
     * @return  FormSection
     */ 
    public function getSection()
    {
        return $this->section;
    }

    /**
     * Set the value of section
     *
     * @param  FormSection  $section
     *
     * @return  self
     */ 
    public function setSection(FormSection $section = null)
    {
        $this->section = $section;

        return $this;
    }

    /**
     * Get the value of choices
     *
     * @return  array
     */ 
    public function getChoices()
    {
        return $this->choices;
    }

    /**
     * Set the value of choices
     *
     * @param  array  $choices
     *
     * @return  self
     */ 
    public function setChoices(array $choices)
    {
        $this->choices = $choices;

        return $this;
    }

    /**
     * Get the value of type
     *
     * @return  string
     */ 
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @param  string  $type
     *
     * @return  self
     */ 
    public function setType(string $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of defaultValue
     *
     * @return  string
     */ 
    public function getDefaultValue()
    {
        return $this->defaultValue;
    }

    /**
     * Set the value of defaultValue
     *
     * @param  string  $defaultValue
     *
     * @return  self
     */ 
    public function setDefaultValue(string $defaultValue = null)
    {
        $this->defaultValue = $defaultValue;

        return $this;
    }
    
    /**
     * Get localized label
     * @param string $locale
     * @return string
     */
    public function getLabel(string $locale="fr"){
        $labels = $this->getLabels();
        if (isset($labels[$locale])){
            return $labels[$locale];
        }
        return $labels['fr'];
    }

    /**
     * Get the value of placeholders
     *
     * @return  array
     */ 
    public function getPlaceholders()
    {
        return $this->placeholders;
    }

    /**
     * Set the value of placeholders
     *
     * @param  array  $placeholders
     *
     * @return  self
     */ 
    public function setPlaceholders(array $placeholders = null)
    {
        $this->placeholders = $placeholders;

        return $this;
    }

    /**
     * Get localized placeholder
     * @param string $locale
     * @return string|null
     */
    public function getPlaceholder(string $locale="fr"){
        $placeholders = $this->getPlaceholders();

        if (isset($placeholders[$locale])){
            return $placeholders[$locale];
        }else if (isset($placeholders['fr'])){
            return $placeholders['fr'];
        }

        return null;
    }

    /**
     * Get the value of targetEntity
     *
     * @return  string
     */ 
    public function getTargetEntity()
    {
        return $this->targetEntity;
    }

    /**
     * Set the value of targetEntity
     *
     * @param  string  $targetEntity
     *
     * @return  self
     */ 
    public function setTargetEntity(string $targetEntity = null)
    {
        $this->targetEntity = $targetEntity;

        return $this;
    }

    /**
     * Get the value of required
     *
     * @return  bool
     */ 
    public function getRequired()
    {
        return $this->required;
    }

    /**
     * Set the value of required
     *
     * @param  bool  $required
     *
     * @return  self
     */ 
    public function setRequired(bool $required)
    {
        $this->required = $required;

        return $this;
    }

    /**
     * Get the value of disabled
     *
     * @return  bool
     */ 
    public function getDisabled()
    {
        return $this->disabled;
    }

    /**
     * Set the value of disabled
     *
     * @param  bool  $disabled
     *
     * @return  self
     */ 
    public function setDisabled(bool $disabled)
    {
        $this->disabled = $disabled;

        return $this;
    }

    /**
     * Get the value of multiple
     *
     * @return  bool
     */ 
    public function getMultiple()
    {
        return $this->multiple;
    }

    /**
     * Set the value of multiple
     *
     * @param  bool  $multiple
     *
     * @return  self
     */ 
    public function setMultiple(bool $multiple)
    {
        $this->multiple = $multiple;

        return $this;
    }

    /**
     * Get the value of ChoiceLabel
     *
     * @return  string
     */ 
    public function getChoiceLabel()
    {
        return $this->ChoiceLabel;
    }

    /**
     * Set the value of ChoiceLabel
     *
     * @param  string  $ChoiceLabel
     *
     * @return  self
     */ 
    public function setChoiceLabel(string $ChoiceLabel)
    {
        $this->ChoiceLabel = $ChoiceLabel;

        return $this;
    }

}
