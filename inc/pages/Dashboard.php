<?php
/**
 * @package Jins Social Plugin
 * Dashboard page controller
 */
namespace jinsSocialPlugin\inc\pages;

use jinsSocialPlugin\inc\base\BaseController;
use jinsSocialPlugin\inc\api\SettingsApi;
use jinsSocialPlugin\inc\api\callbacks\DashboardCallbacks;

class Dashboard extends BaseController
{
  public $settings;
  public $callbacks;
  public $pages = array();

  public function register()
  {
    $this->settings = new SettingsApi();
    $this->callbacks = new DashboardCallbacks();

    $this->setPages();

    $this->setSettings();
    $this->setSections();

    $this->settings->addPages($this->pages)->register();
  }

  public function setPages()
  {
    $this->pages = [
      [
        'page_title' => 'Jins Social Plugin',
        'menu_title' => 'Jins Social',
        'capability' => 'manage_options',
        'menu_slug' => 'jins_social_plugin',
        'callback' => [$this->callbacks, 'dashboardPage'],
        'icon_url' => 'dashicons-admin-site',
        'position' => 110,
      ]
    ];
  }

  public function setSettings()
  {
    $args = [
      [
        'option_group' => 'jins_social_plugin_settings',
        'option_name' => 'jins_social_plugin_dashboard',
        'callback' => [$this->callbacks, 'fieldSanitize']
      ]
    ];
    $this->settings->setSettings($args);
  }
  public function setSections()
  {
    $args = [
      [
        'id' => 'jins_social_admin_index',
        'title' => 'Settings',
        'callback' => [$this->callbacks, 'sectionManager'],
        'page' => 'jins_social_plugin', // same as menu_slug
      ]
    ];
    $this->settings->setSections($args);
  }
}