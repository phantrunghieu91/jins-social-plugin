<?php
/**
 * Plugin Name: Jins Social Plugin
 * Plugin URI: https://github.com/phantrunghieu91/jins-social-plugin
 * Description: A plugin that adds social media icons to your website.
 * Version: 0.0.0
 * Author: Trung Hieu "Jin" Phan
 * Author URI: https://github.com/phantrunghieu91
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: jins-social-plugin
 * Domain Path: /languages
 */

defined('ABSPATH') or die('No script kiddies please!');

// Import vendor
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
  require_once __DIR__ . '/vendor/autoload.php';
}

// Initialize the core of the plugin
if (class_exists('jinsSocialPlugin\\inc\\Init')) {
  jinsSocialPlugin\inc\Init::register_services();
}

// activate the plugin
function activate_jins_social_plugin() {
  jinsSocialPlugin\inc\base\Activate::activate();
}
register_activation_hook(__FILE__, 'activate_jins_social_plugin');

// deactivate the plugin
function deactivate_jins_social_plugin() {
  jinsSocialPlugin\inc\base\Deactivate::deactivate();
}
register_deactivation_hook(__FILE__, 'deactivate_jins_social_plugin');

// Add BrowserSync script for development
add_action('wp_footer', function () {
  echo '<script id="__bs_script__">//<![CDATA[
  document.write("<script async src=\'http://HOST:3000/browser-sync/browser-sync-client.js\'><\/script>".replace("HOST", location.hostname));
  //]]></script>';
});