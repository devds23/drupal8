<?php

namespace Drupal\other_entity\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBundleBase;

/**
 * Defines the Custom entity type entity.
 *
 * @ConfigEntityType(
 *   id = "custom_entity_type",
 *   label = @Translation("Custom entity type"),
 *   handlers = {
 *     "list_builder" = "Drupal\other_entity\CustomEntityTypeListBuilder",
 *     "form" = {
 *       "add" = "Drupal\other_entity\Form\CustomEntityTypeForm",
 *       "edit" = "Drupal\other_entity\Form\CustomEntityTypeForm",
 *       "delete" = "Drupal\other_entity\Form\CustomEntityTypeDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\other_entity\CustomEntityTypeHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "custom_entity_type",
 *   admin_permission = "administer site configuration",
 *   bundle_of = "custom_entity",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/custom_entity_type/{custom_entity_type}",
 *     "add-form" = "/admin/structure/custom_entity_type/add",
 *     "edit-form" = "/admin/structure/custom_entity_type/{custom_entity_type}/edit",
 *     "delete-form" = "/admin/structure/custom_entity_type/{custom_entity_type}/delete",
 *     "collection" = "/admin/structure/custom_entity_type"
 *   }
 * )
 */
class CustomEntityType extends ConfigEntityBundleBase implements CustomEntityTypeInterface {

  /**
   * The Custom entity type ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Custom entity type label.
   *
   * @var string
   */
  protected $label;

}
