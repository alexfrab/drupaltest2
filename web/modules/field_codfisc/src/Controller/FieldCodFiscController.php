<?php

namespace Drupal\field_codfisc\Controller;

//use Drupal\examples\Utility\DescriptionTemplateTrait;

/**
 * Controller for field codice fiscale description page.
 *
 * This class uses the DescriptionTemplateTrait to display text we put in the
 * templates/description.html.twig file.
 */
class FieldCodFiscController {

  //use DescriptionTemplateTrait;

  /**
   * {@inheritdoc}
   */
  protected function getModuleName() {
    return 'field_codfisc';
  }

    /**
   * Generate a render array with our templated content.
   *
   * @return array
   *   A render array.
   */
  public function description() {
    $template_path = $this->getDescriptionTemplatePath();
    $template = file_get_contents($template_path);
    $build = [
      'description' => [
        '#type' => 'inline_template',
        '#template' => $template,
        '#context' => $this->getDescriptionVariables(),
      ],
    ];
    return $build;
  }

  /**
   * Variables to act as context to the twig template file.
   *
   * @return array
   *   Associative array that defines context for a template.
   */
  protected function getDescriptionVariables() {
    $variables = [
      'module' => $this->getModuleName(),
    ];
    return $variables;
  }

  /**
   * Get full path to the template.
   *
   * @return string
   *   Path string.
   */
  protected function getDescriptionTemplatePath() {
    return drupal_get_path('module', $this->getModuleName()) . "/templates/description.html.twig";
  }
  
}
