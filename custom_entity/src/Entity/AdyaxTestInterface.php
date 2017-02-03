<?php

namespace Drupal\custom_entity\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Adyax test entities.
 *
 * @ingroup custom_entity
 */
interface AdyaxTestInterface extends  ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Adyax test name.
   *
   * @return string
   *   Name of the Adyax test.
   */
  public function getName();

  /**
   * Sets the Adyax test name.
   *
   * @param string $name
   *   The Adyax test name.
   *
   * @return \Drupal\custom_entity\Entity\AdyaxTestInterface
   *   The called Adyax test entity.
   */
  public function setName($name);

  /**
   * Gets the Adyax test creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Adyax test.
   */
  public function getCreatedTime();

  /**
   * Sets the Adyax test creation timestamp.
   *
   * @param int $timestamp
   *   The Adyax test creation timestamp.
   *
   * @return \Drupal\custom_entity\Entity\AdyaxTestInterface
   *   The called Adyax test entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Adyax test published status indicator.
   *
   * Unpublished Adyax test are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Adyax test is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Adyax test.
   *
   * @param bool $published
   *   TRUE to set this Adyax test to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\custom_entity\Entity\AdyaxTestInterface
   *   The called Adyax test entity.
   */
  public function setPublished($published);

}
