<?php

namespace Drupal\custom_entity;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Adyax test entity.
 *
 * @see \Drupal\custom_entity\Entity\AdyaxTest.
 */
class AdyaxTestAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\custom_entity\Entity\AdyaxTestInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished adyax test entities');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published adyax test entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit adyax test entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete adyax test entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add adyax test entities');
  }

}
