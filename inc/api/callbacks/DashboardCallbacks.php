<?php
/**
 * @package Jins Social Plugin
 * Callbacks for Dashboard page
 */
namespace jinsSocialPlugin\inc\api\callbacks;
use jinsSocialPlugin\inc\base\BaseController;
class DashboardCallbacks extends BaseController {
  public function dashboardPage() {
    return require_once("$this->plugin_path/templates/dashboard.php");
  }
  public function fieldSanitize($input) {
    $options = get_option( 'jins_social_plugin_dashboard' ) ?? []; 

    if( count($options) == 0 ) {
      return $options[] = $input;
    }

    return $input;
  }
  public function sectionManager() {
    echo 'Add new social media links (Prepare icons first)';
  }
}