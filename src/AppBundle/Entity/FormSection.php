<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
* formbuilder.form_section
*
* @ORM\Table(name="formbuilder.form_section")
* @ORM\Entity(repositoryClass="AppBundle\Repository\FormSectionRepository")
*/
class FormSection {
    
    /**
    * @var integer
    *
    * @ORM\Column(name="id_form_section", type="bigint", nullable=false)
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="IDENTITY")
    */
    private $id;

    /**
     * @var array
     *
     * @ORM\Column(name="label", type="json_array", length=255, nullable=false)
     * @Assert\NotBlank()
     */
    private $labels;

    /**
     * @var Form
     *
     * @ORM\ManyToOne(targetEntity="Form", inversedBy="sections")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_form", referencedColumnName="id_form", nullable=false)
     * })
     */
    private $form;

    /**
     * @var integer
     *
     * @ORM\Column(name="position", type="integer", nullable=false)
     */
    private $position;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="FormField", mappedBy="section")
     */
    private $fields;

    public function __construct()
    {
        $this->fields = new ArrayCollection();
        $this->setLabels(['fr' => '']);
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
     * Get the value of form
     *
     * @return  Form
     */ 
    public function getForm()
    {
        return $this->form;
    }

    /**
     * Set the value of form
     *
     * @param  Form  $form
     *
     * @return  self
     */ 
    public function setForm(Form $form = null)
    {
        $this->form = $form;

        return $this;
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
     * Get the value of fields
     *
     * @return  FormField
     */ 
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * Set the value of fields
     *
     * @param  ArrayCollection  $fields
     *
     * @return  self
     */ 
    public function setFields(ArrayCollection $fields)
    {
        $this->fields = $fields;

        return $this;
    }

    /**
     * Add field
     *
     * @param FormField $inscrit
     * @return Form
     */
    public function addField(FormField $field)
    {
        $this->fields[] = $field;

        return $this;
    }

    /**
     * Remove field
     *
     * @param FormField $field
     */
    public function removeField(FormField $field)
    {
        $this->fields->removeElement($field);
        $field->setSection(null);
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
}
