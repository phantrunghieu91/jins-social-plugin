<?php
/**
 * @package Jins Social Plugin
 * Callbacks for Display Front End page
 */
namespace jinsSocialPlugin\inc\api\callbacks;
use jinsSocialPlugin\inc\base\BaseController;

class DisplayFrontEndCallbacks extends BaseController {
  public function displayFrontEndPage() {
    return require_once "$this->plugin_path/templates/display-on-frontend.php";
  }
  public function fieldSanitize($input) {
    return $input;
  }
  public function sectionManager() {
    echo __('Settings for displaying social media icons in the front end!', 'jins-social-plugin');
  }
}