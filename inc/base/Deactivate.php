<?php
/**
 * @package: Jins Social Plugin
 */
namespace jinsSocialPlugin\inc\base;
class Deactivate {
  public static function deactivate() {
    flush_rewrite_rules();
  }
}