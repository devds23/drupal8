<?php
/**
 * @file
 * Contains \Drupal\cache_block\Plugin\Block\CacheableBlock.
 */

namespace Drupal\cache_block\Plugin\Block;

use Drupal;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Annotation\Translation;
use Drupal\Core\Routing;

/**
 * Provides a 'Cache Block' block.
 *
 * @Block(
 *   id = "cache_block",
 *   admin_label = @Translation("Cache block"),
 * )
 */
class CacheableBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {

    $key = 'xxx';
    $message = "Empty";
    $value = Drupal::request()->query->get($key);
//    kint($value);

    if($value) {
      $time = date("Y-m-d H:i:s");
      $vars = array('@value' => $value, '@time' => $time);
      $message = $this->t('@value (@time)', $vars);
    }

    return array(
      '#markup' => $message,
      '#cache' => [
        'keys' => ['block_cache', 'user', 1, 'full'],
        'tags' => ["url.query_args:$key"],
        'contexts' => ['user'],
        'max-age' => 60,
      ],
    );
  }
}
?>
