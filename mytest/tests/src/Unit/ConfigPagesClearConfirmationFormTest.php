<?php

namespace Drupal\Tests\mytest\Unit;

use Drupal\config_pages\Form\ConfigPagesClearConfirmationForm;
use Drupal\Tests\UnitTestCase;


/**
 * Class ConfigPagesClearConfirmationFormTest
 * @package Drupal\Tests\mytest\Unit
 *
 * @group mytest
 */
class ConfigPagesClearConfirmationFormTest extends UnitTestCase {

  public $configPagesBlock;

  public function setUp() {
    $this->configPagesBlock = new ConfigPagesClearConfirmationForm();
    parent::setUp();

  }

  public function testGetFormId() {
    $this->assertEquals('config_pages_clear_confirmation_form', $this->configPagesBlock->getFormId());
  }

}
