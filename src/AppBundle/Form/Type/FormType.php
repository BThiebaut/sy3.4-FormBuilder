<?php

namespace AppBundle\Form\Type;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;


class FormType extends AbstractType
{
  
  protected $extraParams;
  
  /**
   * Initialisation des paramètres externes
   * Méthode à appeler en premier dans buildForm() des classes filles
   * Les paramètres externes doivent être déclarés en protected dans la classe fille
   * @param array $options
   */
  public function initExtraParams(array $options)
  {
    $this->extraParams = ( isset($options["extraParams"]) && is_array($options["extraParams"]) ? $options["extraParams"] : array() );
    
    foreach($this->extraParams as $attribute => $value) {
      if( property_exists($this, $attribute) ) {
        $this->$attribute = $value;
      } else {
        // error ?
      }
    }
  }
  
  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults(
      array(
        'extraParams' => array()
      )
    );
  }
}
