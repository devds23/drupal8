<?php

/**
 * @file
 * Contains custom_entity.page.inc.
 *
 * Page callback for Custom entity entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Custom entity templates.
 *
 * Default template: custom_entity.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_custom_entity(array &$variables) {
  // Fetch CustomEntity Entity Object.
  $custom_entity = $variables['elements']['#custom_entity'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
