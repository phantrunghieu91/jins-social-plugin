<?php
/**
 * @package: Jins Social Plugin
 * Enqueue all scripts and styles
 */
namespace jinsSocialPlugin\inc\base;
use jinsSocialPlugin\inc\base\BaseController;

class Enqueue extends BaseController {
  public function register() {
    add_action('admin_enqueue_scripts', [$this, 'enqueueAdmin']);
    add_action('wp_enqueue_scripts', [$this, 'enqueueFrontEnd']);
  }
  function enqueueAdmin() {
    // enqueue all our scripts
    if(is_admin(  )) {
      wp_enqueue_media();
      wp_enqueue_style('jins-social-plugin', "$this->plugin_url/assets/css/jins-social-plugin.min.css", [], null, 'all');
      wp_enqueue_script('jins-social-plugin', "$this->plugin_url/assets/js/jins-social-plugin.min.js", [], null, true);
    }
  }

  function enqueueFrontEnd() {
    wp_enqueue_style('jins-social-plugin', "$this->plugin_url/assets/css/jins-social-plugin-fe.min.css", [], null, 'all');
    // wp_enqueue_script('jins-social-plugin', "$this->plugin_url/assets/js/jins-social-plugin-fe.min.js", [], null, true);
  }
}