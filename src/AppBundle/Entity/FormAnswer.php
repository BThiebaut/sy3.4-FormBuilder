<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
* formbuilder.form_answer
*
* @ORM\Table(name="formbuilder.form_answer")
* @ORM\Entity(repositoryClass="AppBundle\Repository\FormAnswerRepository")
*/
class FormAnswer {
    
    /**
    * @var integer
    *
    * @ORM\Column(name="id_form_answer", type="bigint", nullable=false)
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="IDENTITY")
    */
    private $id;

    /**
     * @var FormField
     *
     * @ORM\ManyToOne(targetEntity="FormField")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_form_field", referencedColumnName="id_form_field", nullable=false)
     * })
     */
    private $field;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="text", nullable=true)
     */
    private $value;

    
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
     * Get the value of field
     *
     * @return  FormField
     */ 
    public function getField()
    {
        return $this->field;
    }

    /**
     * Set the value of field
     *
     * @param  FormField  $field
     *
     * @return  self
     */ 
    public function setField(FormField $field)
    {
        $this->field = $field;

        return $this;
    }

    /**
     * Get the value of value
     *
     * @return  string
     */ 
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set the value of value
     *
     * @param  string  $value
     *
     * @return  self
     */ 
    public function setValue(string $value = null)
    {
        $this->value = $value;

        return $this;
    }
}
