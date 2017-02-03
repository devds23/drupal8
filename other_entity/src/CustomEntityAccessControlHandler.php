<?php

namespace Drupal\other_entity;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Custom entity entity.
 *
 * @see \Drupal\other_entity\Entity\CustomEntity.
 */
class CustomEntityAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\other_entity\Entity\CustomEntityInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished custom entity entities');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published custom entity entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit custom entity entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete custom entity entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add custom entity entities');
  }

}
