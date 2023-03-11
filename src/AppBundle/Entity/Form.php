<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
* formbuilder.form
*
* @ORM\Table(name="formbuilder.form")
* @ORM\Entity(repositoryClass="AppBundle\Repository\FormRepository")
*/
class Form {
    
    /**
    * @var integer
    *
    * @ORM\Column(name="id_form", type="bigint", nullable=false)
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="IDENTITY")
    */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="FormSection", mappedBy="form")
     */
    private $sections;

    public function __construct()
    {
        $this->sections = new ArrayCollection();
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
     * Get the value of name
     *
     * @return  string
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param  string  $name
     *
     * @return  self
     */ 
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of sections
     *
     * @return  FormSection
     */ 
    public function getSections()
    {
        return $this->sections;
    }

    /**
     * Set the value of sections
     *
     * @param  ArrayCollection  $sections
     *
     * @return  self
     */ 
    public function setSections(ArrayCollection $sections)
    {
        $this->sections = $sections;

        return $this;
    }

  /**
   * Add section
   *
   * @param FormSection $inscrit
   * @return Form
   */
  public function addSection(FormSection $section)
  {
    $this->sections[] = $section;

    return $this;
  }

  /**
   * Remove section
   *
   * @param FormSection $section
   */
  public function removeSection(FormSection $section)
  {
    $this->sections->removeElement($section);
    $section->setForm(null);
  }

}
