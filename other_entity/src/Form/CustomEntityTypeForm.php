<?php

namespace Drupal\other_entity\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class CustomEntityTypeForm.
 *
 * @package Drupal\other_entity\Form
 */
class CustomEntityTypeForm extends EntityForm {

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    $custom_entity_type = $this->entity;
    $form['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $custom_entity_type->label(),
      '#description' => $this->t("Label for the Custom entity type."),
      '#required' => TRUE,
    ];

    $form['id'] = [
      '#type' => 'machine_name',
      '#default_value' => $custom_entity_type->id(),
      '#machine_name' => [
        'exists' => '\Drupal\other_entity\Entity\CustomEntityType::load',
      ],
      '#disabled' => !$custom_entity_type->isNew(),
    ];

    /* You will need additional form elements for your custom properties. */

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $custom_entity_type = $this->entity;
    $status = $custom_entity_type->save();

    switch ($status) {
      case SAVED_NEW:
        drupal_set_message($this->t('Created the %label Custom entity type.', [
          '%label' => $custom_entity_type->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label Custom entity type.', [
          '%label' => $custom_entity_type->label(),
        ]));
    }
    $form_state->setRedirectUrl($custom_entity_type->toUrl('collection'));
  }

}
