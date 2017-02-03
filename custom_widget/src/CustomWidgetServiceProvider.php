<?php
///**
// * @file
// * Contains Drupal\my_module\MyModuleServiceProvider
// */
//
//namespace Drupal\custom_widget;
//
//use Drupal\Core\DependencyInjection\ContainerBuilder;
//use Drupal\Core\DependencyInjection\ServiceProviderBase;
//
//class CustomWidgetServiceProvider extends ServiceProviderBase {
//
//  /**
//   * {@inheritdoc}
//   */
//  public function alter(ContainerBuilder $container) {
//    // Overrides entity.manager service for our own.
//    $currentService = $container->get('entity_type.manager');
//    $container->set('entity_type.manager', new CustomDecorateEntityManager($currentService));
//  }
//}
