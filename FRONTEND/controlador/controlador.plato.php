<?php

class controladorPlatos
{

  static public function ctrMostrarPlatos($item, $valor)
  {
    $tabla = 'dishes';
    $respuesta = modeloPlatos::mdlMostrarPlatos($tabla, $item, $valor);
    return $respuesta;
  }

  static public function ctrMostrarPlatos2($item, $valor)
  {
    $tabla = 'dishes';
    $respuesta = modeloPlatos::mdlMostrarPlatos2($tabla, $item, $valor);
    return $respuesta;
  }
}
