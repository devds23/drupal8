<?php

namespace Drupal\other_entity\Entity;

use Drupal\views\EntityViewsData;

/**
 * Provides Views data for Custom entity entities.
 */
class CustomEntityViewsData extends EntityViewsData {

  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    // Additional information for Views integration, such as table joins, can be
    // put here.

    return $data;
  }

}
