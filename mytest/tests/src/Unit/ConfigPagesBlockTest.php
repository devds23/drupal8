<?php
namespace Drupal\Tests\mytest\Unit;

use Drupal\simpletest\WebTestBase;
use Drupal\config_pages\Plugin\Block\ConfigPagesBlock;
use Drupal\config_pages\Entity\ConfigPagesType;

/**
 * Class ConfigPagesBlockTest
 * @package Drupal\Tests\mytest\Unit
 *
 * @group mytest
 */
class ConfigPagesBlockTest extends WebTestBase {

  public static $modules = ['config_pages'];

  public $configPagesBlock;

  public function setUp() {
    parent::setUp();

    $this->container = \Drupal::getContainer();
    $plugin_definition = $this->container->get("plugin.manager.block")
      ->getDefinition("config_pages_block");
    $configuration = [
      "id" => "config_block_pages",
      "label" => "ConfigPages Block",
      "provider" => "config_pages",
      "label_display" => "visible",
      "config_page_type" => "my_own_config",
      "config_page_view_mode" => "full"
    ];
    $plugin_id = "config_pages_block";
    $this->configPagesBlock = ConfigPagesBlock::create($this->container, $configuration, $plugin_id, $plugin_definition);
  }

//  public function testBlockForm() {
//    $entity = [
//        "id" => "block_id",
//        "label" => "block_label",
//        "context" => "block_context",
//        "menu" => "block_menu",
//    ];
//    ConfigPagesType::create($entity)->save();
//
//    $this->assertNotNull(ConfigPagesType::create($entity)->save());
//  }

  public function testDefaultConfiguration() {
    $forbidden_paths = array(
      '/admin/structure/config_pages',
      '/admin/structure/config_pages/types',
    );

    foreach ($forbidden_paths as $path) {
      $this->drupalGet($path);
      $this->assertResponse(403, "Access denied to anonymous for path: $path");
    }
    $this->assertFalse(array_key_exists('cache', $this->configPagesBlock->defaultConfiguration()));

//    $this->drupalGet('');
//    $this->assertSession()->statusCodeEquals(200);
  }
//  public function testGetFormId() {
//    $this->assertEqual('config_pages_clear_confirmation_form', $this->configPagesBlock->getFormId());
//  }
}
