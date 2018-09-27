<?php

namespace Drupal\field_codfisc\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * Plugin implementation of the 'field_codfisc_form_text' formatter.
 *
 * @FieldFormatter(
 *   id = "field_codfisc_form_text",
 *   module = "field_codfisc",
 *   label = @Translation("Codice fiscale formatter"),
 *   field_types = {
 *     "field_codfisc"
 *   }
 * )
 */
class CodFiscFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = [];

    foreach ($items as $delta => $item) {
      $elements[$delta] = [
        // We create a render array to produce the desired markup,
        // "<p style="color: #hexcolor">The color code ... #hexcolor</p>".
        // See theme_html_tag().
        '#type' => 'html_tag',
        '#tag' => 'p',
        //'#attributes' => [
        //  'style' => 'color: ' . $item->value,
        //],
        //'#value' => $this->t('Ecco il tanto atteso CODICE FISCALE: @code', ['@code' => $item->value]),
        '#value' => $item->value,
      ];
    }

    return $elements;
  }

}
