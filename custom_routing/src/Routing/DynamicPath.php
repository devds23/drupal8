<?php
/**
 * @file
 * Contains \Drupal\example\Routing\ExampleRoutes.
 */

namespace Drupal\custom_routing\Routing;

use Symfony\Component\Routing\Route;

/**
 * Defines dynamic routes.
 */
class DynamicPath {

  /**
   * {@inheritdoc}
   */
  public function routes() {
    $routes = array();

    $config = \Drupal::service('config.factory')->getEditable('custom_routing.path');

    $path = $config->get('new_uri');

    $routes['custom_routing.path'] = new Route(
      '/' . $path . '/{type}',
      array(
        '_controller' => '\Drupal\custom_routing\Controller\RecentNodeController::recentNode',
        '_title' => 'Hello',
        'type' => 'article',
      ),
      array(
        '_permission'  => 'access content',
      )
    );

    return $routes;
  }

}
