<?php
/**
 * @file
 * Contains \Drupal\custom_example\Form\NewPath.
 */

namespace Drupal\custom_routing\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Routing\RouteBuilderInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Path\PathValidator;


/**
 * Implements an example form.
 */
class NewPath extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'custom_routing_form';
  }

  /**
   * {@inheritdoc}.
   */
  protected function getEditableConfigNames() {
    return ['custom_routing.path'];
  }

  public function __construct(RouteBuilderInterface $routeBuilder, PathValidator $pathValidator) {
    $this->routeBuilder = $routeBuilder;
    $this->pathValidator = $pathValidator;
  }

  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('router.builder'),
      $container->get('path.validator')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form = parent::buildForm($form, $form_state);
    $config = $this->config('custom_routing.path');

    $form['new_uri'] = array(
      '#type' => 'textfield',
      '#title' => $config->get('new_uri'),
    );

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);

    $values = $form_state->getValues();

    if ($this->pathValidator->isValid($values['new_uri'])) {
      $form_state->setErrorByName('new_uri', $this->t("The path %uri already exist", array("%uri" => $values['new_uri'])));
    }

  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $values = $form_state->getValues();

    $this->config('custom_routing.path')
      ->set('new_uri', $values['new_uri'])
      ->save();

    parent::submitForm($form, $form_state);
    $this->routeBuilder->rebuild();
  }

}
