<?php
/**
 * @file
 * Contains \Drupal\custom_routing\Controller\RecentNodeController
 */

namespace Drupal\custom_routing\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Entity\Query\QueryFactory;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;

class RecentNodeController extends ControllerBase {

  protected $entityTypeManager;
  protected $queryFactory;

  public function __construct(EntityTypeManagerInterface $entityTypeManager, QueryFactory $queryFactory) {
    $this->entityTypeManager = $entityTypeManager;
    $this->queryFactory = $queryFactory;
  }

  /**
   * {@inheritdoc}
   * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
   *
   * @return static
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('entity.manager'),
      $container->get('entity.query')
    );
  }

  public function recentNode($type) {

    $p = $this->entityTypeManager->getStorage('node_type')->loadMultiple();

    $list_types = [];
    foreach ($p as $name => $value) {
      $list_types[] = $name;
    }

    if (!in_array($type, $list_types)) {
      return drupal_set_message("Error: content type doesn't exist", "error");
    }

    $recent = time() - (60 * 60 * 24 * 3);
    $query = $this->queryFactory->get('node');
    $ids = $query->condition('type', $type)->condition('changed', $recent, '>')->execute();
    $nodes_array = $this->entityTypeManager->getStorage('node')
      ->loadMultiple($ids);
    $data = [];
    foreach ($nodes_array as $n) {
      $data[] = node_view($n);
    }

    return $data;
  }
}
