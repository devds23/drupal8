<?php
///**
// * @file Custom decorator
// */
//
//use Drupal\Core\Entity\EntityTypeManagerInterface;
//use Drupal\Core\Entity\EntityTypeManager;
//
//abstract class CustomDecorateEntityManager extends EntityTypeManager implements EntityTypeManagerInterface {
//  protected $subject;
//
//  public function __construct(EntityTypeManagerInterface $subject) {
//    $this->subject = $subject;
//    parent::__construct();
//  }
//
//  /**
//   * {@inheritdoc}
//   */
//  public function getStorage($entity_type) {
//    return $this->getHandler($entity_type, 'storage');
//  }
//}
