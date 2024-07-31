<?php
/**
 * @package: Jins Social Plugin
 * * Initialize the core of the plugin
 * 
*/
namespace jinsSocialPlugin\inc;
class Init {
  /**
   * * Summary of get_services: Return a list of classes to be instantiated
   * 
   * @return string[]
   */
  public static function get_services() {
    return [
      base\Enqueue::class,
      pages\Dashboard::class,
    ];
  }
  public static function register_services() {
    foreach (self::get_services() as $class) {
      $service = self::instantiate($class);
      if (method_exists($service, 'register')) {
        $service->register();
      }
    }
  }
  /**
   * * Summary of instantiate: Create a new instance of a class
   * @param mixed $class
   * @return object
   */
  private static function instantiate($class) {
    return new $class();
  }
}