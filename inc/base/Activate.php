<?php
/**
 * @package: Jins Social Plugin
 */
namespace jinsSocialPlugin\inc\base;
class Activate {
  public static function activate() {
    $dashboard_default = [];
    $display_fe_default = [
      'horizontal-position' => 'right',
      'vertical-position' => 'bottom',
      'icon-size' => '2em',
      'gap' => '.625em',
      'margin-vertical' => '1em',
      'margin-horizontal' => '1em',
    ];

    if (! get_option('jins_social_plugin_socials')) update_option('jins_social_plugin_socials', $dashboard_default);
    if (! get_option('jins_social_plugin_display_fe_settings')) update_option('jins_social_plugin_display_fe_settings', $display_fe_default);
    flush_rewrite_rules();
  } 
}