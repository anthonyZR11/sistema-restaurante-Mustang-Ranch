<?php
class Utils
{
  public static function getScripts($url, $urlTemporal)
  {
    $route = null;
    if (isset($url) && (
      $url == "login" ||
      $url == "principal" ||
      $url == "usuario" ||
      $url == "rol" ||
      $url == "plato" ||
      $url == "categoria-plato")) {

      if ($urlTemporal == "login") {
        $route = $urlTemporal;
      } else {
        if ($url == "principal") {
          $url = 'plantilla';
        }
        $route = $url;
      }
    }
    return $route;
  }
}
