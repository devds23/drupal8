<?php
/**
 * @file
 * Contains \Drupal\custom_block\Plugin\Block\ColorTimer.
 */

namespace Drupal\custom_block\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Access\AccessResult;
use Drupal\Core\Session\AccountInterface;

/**
 * @Block(
 *   id = "custom_block",
 *   admin_label = @Translation("New Year countdown"),
 *   context = {
 *      "node" = @ContextDefinition(
 *        "entity:node",
 *        label = @Translation("Node")
 *      )
 *   }
 * )
 */
class ColorTimer extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return array(
      'hex' => "#cb42f4",
    );
  }

//  protected function blockAccess(AccountInterface $account) {
//    return AccessResult::allowedIfHasPermission($account, 'authenticated');
//  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);
    $config = $this->getConfiguration();

    $form['hex'] = array(
      '#type' => 'color',
      '#title' => t('Color countdown to New Year'),
      '#default_value' => $config['hex'],
    );

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['hex'] = $form_state->getValue('hex');
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $config = $this->getConfiguration();
    $now = new \DateTime();

    $future_date = new \DateTime('2017-01-01 00:00:00');
    $interval = $future_date->diff($now);
    $remain = $interval->format("%a days, %h hours, %i minutes, %s seconds");
    $time = time();
    $check = $time - (60 * 60 * 24 * 10);

    $diff_time = mktime(0, 0, 0, 1, 1, 2018) - time();
    $arr_id = \Drupal::service('entity.query')->get('custom_entity')->condition("created", $check, '<')->execute();
    $arrs = \Drupal::service('entity_type.manager')->getStorage('custom_entity')->loadMultiple($arr_id);
//    ksm(\Drupal::service('entity_type.manager')->getStorage('custom_entity'));
    foreach ($arrs as $key => $value) {
      $value->created = $time;
      $value->save();
    }
    $block = [
      '#theme' => 'custom_twig',
      '#cache' => ['max-age' => 0],
      '#time' => $remain,
      '#color' => $config['hex'],
      '#attached' => [
        'drupalSettings' => [
          'custom_block' => [
            'colorCountdown' => [
              'remain' => $diff_time,
            ],
          ],
        ],
      ],
    ];

    return $block;
  }
}

//    $block = [
//      '#type' => 'markup',
//      '#markup' => $remain,
//      '#cache' => ['max-age' => 0],
//      '#attached' => [
//        'library' => [
//          'custom_block/color-countdown'
//        ],
//        'drupalSettings' => [
//          'custom_block' => [
//            'colorCountdown' => [
//              'remain' => $diff_time,
//            ],
//          ],
//        ],
//      ],
//    ];
