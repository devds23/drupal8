<?php

namespace Drupal\other_entity\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Custom entity entities.
 *
 * @ingroup other_entity
 */
interface CustomEntityInterface extends  ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Custom entity type.
   *
   * @return string
   *   The Custom entity type.
   */
  public function getType();

  /**
   * Gets the Custom entity name.
   *
   * @return string
   *   Name of the Custom entity.
   */
  public function getName();

  /**
   * Sets the Custom entity name.
   *
   * @param string $name
   *   The Custom entity name.
   *
   * @return \Drupal\other_entity\Entity\CustomEntityInterface
   *   The called Custom entity entity.
   */
  public function setName($name);

  /**
   * Gets the Custom entity creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Custom entity.
   */
  public function getCreatedTime();

  /**
   * Sets the Custom entity creation timestamp.
   *
   * @param int $timestamp
   *   The Custom entity creation timestamp.
   *
   * @return \Drupal\other_entity\Entity\CustomEntityInterface
   *   The called Custom entity entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Custom entity published status indicator.
   *
   * Unpublished Custom entity are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Custom entity is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Custom entity.
   *
   * @param bool $published
   *   TRUE to set this Custom entity to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\other_entity\Entity\CustomEntityInterface
   *   The called Custom entity entity.
   */
  public function setPublished($published);

}
