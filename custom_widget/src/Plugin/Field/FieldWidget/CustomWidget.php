<?php
/**
 * @file
 * Contains \Drupal\custom_widget\Plugin\Field\FieldWidget\TextWidget
 */

namespace Drupal\custom_widget\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Field\WidgetInterface;
use Drupal\Core\Form\FormStateInterface;


/**
 * Plugin implementation of the custom widget.
 * @FieldWidget(
 *   id = "CustomWidget",
 *   label = @Translation("Custom Widget"),
 *   field_types = {
 *     "string"
 *   }
 * )
 */
class CustomWidget extends WidgetBase implements WidgetInterface {

  /**
   * @param \Drupal\Core\Field\FieldItemListInterface $items
   * @param int $delta
   * @param array $element
   * @param array $form
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *
   * @return array
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $value = isset($items[$delta]->value) ? $items[$delta]->value : '';
    $element += [
      '#type' => 'select',
      '#title' => t('CustomWidgetTitle'),
      '#options' => [0 => "Off", 1 => "On"],
      '#default_value' => $value,
    ];
    return ['value' => $element];
  }
}

