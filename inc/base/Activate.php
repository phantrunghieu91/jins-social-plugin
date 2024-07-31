<?php
/**
 * @package: Jins Social Plugin
 */
namespace jinsSocialPlugin\inc\base;
class Activate {
  public static function activate() {
    $default = [];
    if (! get_option('jins_social_plugin_dashboard')) update_option('jins_social_plugin_dashboard', $default);
    flush_rewrite_rules();
  } 
}