<?php
/**
 * @package Jins Social Plugin
 * Callbacks for Display Front End page
 */
namespace jinsSocialPlugin\inc\api\callbacks;
use jinsSocialPlugin\inc\base\BaseController;

class DisplayFrontEndCallbacks extends BaseController {
  public function fieldSanitize($input) {
    // $options = get_option( 'jins_social_plugin_dashboard' ) ?? []; 

    // if( count($options) == 0 ) {
    //   return $options[] = $input;
    // }

    return $input;
  }
  public function sectionManager() {
    echo 'Settings for displaying social media icons in the front end';
  }
}