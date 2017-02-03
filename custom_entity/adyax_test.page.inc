<?php

/**
 * @file
 * Contains adyax_test.page.inc.
 *
 * Page callback for Adyax test entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Adyax test templates.
 *
 * Default template: adyax_test.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_adyax_test(array &$variables) {
  // Fetch AdyaxTest Entity Object.
  $adyax_test = $variables['elements']['#adyax_test'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
