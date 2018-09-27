<?php

namespace Drupal\field_codfisc\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Plugin implementation of the 'field_codfisc' field type.
 *
 * @FieldType(
 *   id = "field_codfisc",
 *   label = @Translation("Custom Codice Fiscale"),
 *   module = "field_codfisc",
 *   description = @Translation("Demonstrates a custom codice fiscale field."),
 *   default_widget = "field_codfisc_text",
 *   default_formatter = "field_codfisc_form_text"
 * )
 */
class CodFiscItem extends FieldItemBase {
  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    return [
      'columns' => [
        'value' => [
          'type' => 'text',
          'size' => 'tiny',		//aggiornare size a 16 ?
          'not null' => FALSE,
        ],
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function isEmpty() {
    $value = $this->get('value')->getValue();
    return $value === NULL || $value === '';
  }

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties['value'] = DataDefinition::create('string')
      ->setLabel(t('Cod. Fiscale'));

    return $properties;
  }

}
