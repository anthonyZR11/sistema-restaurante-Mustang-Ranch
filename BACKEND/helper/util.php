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
      if ($url == "principal") {
        $url = 'plantilla';
      }
      $route = $url;
    } else if ($urlTemporal == "login") {
      $route = $urlTemporal;
    }
    return $route;
  }
}
