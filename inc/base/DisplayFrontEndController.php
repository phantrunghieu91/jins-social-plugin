<?php
/**
 * @package Jins Social Plugin
 * * Handles the display of plugin in the front end
 */
namespace jinsSocialPlugin\inc\base;
use jinsSocialPlugin\inc\base\BaseController;
use jinsSocialPlugin\inc\api\SettingsApi;
use jinsSocialPlugin\inc\api\callbacks\DisplayFrontEndCallbacks;

class DisplayFrontEndController extends BaseController {

  private $socials;
  public $settings;
  public $callbacks;
  public $subpages;

  public function register() {
    $this->settings = new SettingsApi();
    $this->callbacks = new DisplayFrontEndCallbacks();
    $this->subpages = [];

    $this->socials = get_option('jins_social_plugin_socials') ?? [];
    
    $this->setSettings();
    $this->setSections();
    
    $this->setSubpage();
    $this->settings->addSubPages($this->subpages)->register();

    add_action( 'wp_footer', [$this, 'displaySocialIcons'] );
  }

  private function setSubpage() {
    $this->subpages = [
      [
        'parent_slug' => 'jins_social_plugin',
        'page_title' => 'Display Front End Settings',
        'menu_title' => 'Front End Settings',
        'capability' => 'manage_options',
        'menu_slug' => 'jins_social_plugin_display_fe',
        'callback' => [$this->callbacks, 'displayFrontEndPage'],
      ],
    ];
  }

  private function setSettings() {
    $args = [
      [
        'option_group' => 'jins_social_plugin_display_front_end_settings',
        'option_name' => 'jins_social_plugin_display_fe_settings',
        'callback' => [$this->callbacks, 'fieldSanitize'],
      ],
    ];
    $this->settings->setSettings($args);  
  }

  private function setSections() {
    $args = [
      [
        'id' => 'jins_social_plugin_display_fe_index',
        'title' => 'Display Front End Settings',
        'callback' => [$this->callbacks, 'sectionManager'],
        'page' => 'jins_social_plugin_display_fe',
      ],
    ];
    $this->settings->setSections($args);
  }
  
  public function displaySocialIcons() {
    $socials = [];
    foreach ($this->socials as $option) {
      $socials[] = [
        'name' => $option['social_name'],
        'url' => $option['social_url'],
        'icon' => $option['social_icon'],
      ];
    }
    require_once "$this->plugin_path/templates/front-end.php";
  }
}