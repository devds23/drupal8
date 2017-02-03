<?php
/**
 * @file
 *
 * Configuration Custom Form
 */

namespace Drupal\custom_config\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class ConfigFormCustomConfigForm extends ConfigFormBase {

  function getFormId() {
    return 'custom_config_admin_settings';
  }

  /**
   * @param array $form
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *
   * @return array
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form = parent::buildForm($form, $form_state);
    $config = $this->config('custom_config.config');
    $form['message'] = [
      '#type' => 'textarea',
      '#title' => 'Site config message key',
      '#default_value' => $config->get('message3'),
    ];
    $form['langcode'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Language code'),
      '#default_value' => $config->get('langcode'),
    ];
    $form['email'] = [
      '#type' => 'email',
      '#title' => $this->t('Your .com email address.'),
      '#default_value' => $config->get('email_address')
    ];
    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Your Name'),
      '#default_value' => $config->get('some_name'),
    ];

    $form['about'] = [
      '#type' => 'textarea',
      '#title' => "About",
      '#default_value' => $config->get('about'),
    ];

    $form['gender'] = [
      '#type' => 'radios',
      '#title' => 'Your gender',
      '#default_value' => $config->get('gender'),
      '#options' => array(0 => t('male'), 1 => t('female')),
    ];

    $form['question'] = [
      '#type' => 'checkbox',
      '#default_value' => $config->get('question'),
      '#title' => 'Have you custom configs',
    ];

    return $form;
  }

  /**
   * @param array $form
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $values = $form_state->getValues();

    $this->config('custom_config.config')
      ->set('email_address', $values['email'])
      ->set('some_name', $values['name'])
      ->set('about', $values['about'])
      ->set('gender', $values['gender'])
      ->set('question', $values['question'])
      ->set('message3', $values['message'])
      ->set('langcode', $values['langcode'])
      ->save();

    parent::submitForm($form, $form_state);
  }

  /**
   * {@inheritdoc}.
   */
  protected function getEditableConfigNames() {
    return ['custom_config.config'];
  }
}
