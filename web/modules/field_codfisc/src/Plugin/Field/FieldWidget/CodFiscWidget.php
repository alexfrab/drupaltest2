<?php

namespace Drupal\field_codfisc\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'field_codfisc_text' widget.
 *
 * @FieldWidget(
 *   id = "field_codfisc_text",
 *   module = "field_codfisc",
 *   label = @Translation("Codice Fiscale"),
 *   field_types = {
 *     "field_codfisc"
 *   }
 * )
 */
class CodFiscWidget extends WidgetBase {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
        $value = isset($items[$delta]->value) ? $items[$delta]->value : '';
        $element += [
            '#type' => 'textfield',
            '#default_value' => $value,
            '#size' => 25,
            '#maxlength' => 16,
            '#element_validate' => [
                [$this, 'validate'],
            ],
        ];
    
        return ['value' => $element];
  }

  /**
   * Validate the codfisc text field.
   */
  public function validate($element, FormStateInterface $form_state) {
        $value = $element['#value'];
        if (strlen($value) == 0) {
            $form_state->setValueForElement($element, '');
            return;
        }
        
        if (!preg_match('/^[A-Za-z]{6}[0-9]{2}[A-Za-z][0-9]{2}[A-Za-z][0-9]{3}[A-Za-z]$/iD', strtolower($value))) {
            $form_state->setError($element, t("I caratteri inseriti non rispettano il formato del codice fiscale"));
        }
    }

}


// #VERIFICA CODICE FISCALE ANCHE IN CASO DI OMOCODIA
// https://github.com/massiws/CodeLogin/blob/master/code_login.module
