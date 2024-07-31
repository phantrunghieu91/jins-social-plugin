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

  private $options;
  public $settings;
  public $callbacks;

  public function register() {
    $this->settings = new SettingsApi();
    $this->callbacks = new DisplayFrontEndCallbacks();

    $this->options = get_option('jins_social_plugin_dashboard') ?? [];

    if( empty($this->options) ) {
      return;
    }
    add_action( 'wp_footer', [$this, 'displaySocialIcons'] );
  }

  public function displaySocialIcons() {
    $socials = [];
    foreach ($this->options as $option) {
      $socials[] = [
        'name' => $option['social_name'],
        'url' => $option['social_url'],
        'icon' => $option['social_icon'],
      ];
    }
    require_once "$this->plugin_path/templates/front-end.php";
  }
}