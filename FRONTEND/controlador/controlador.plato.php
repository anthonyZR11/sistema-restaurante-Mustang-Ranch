<?php

class controladorPlatos
{

  static public function ctrMostrarPlatos($item, $valor)
  {
    $tabla = 'dishes';
    $respuesta = modeloPlatos::mdlMostrarPlatos($tabla, $item, $valor);
    return $respuesta;
  }

  static public function ctrCrearCatPlato($data)
  {
    $table = modeloPlatos::TABLE;
    $respuesta = modeloPlatos::mdlIngresarPlato($table, $data);
    return $respuesta;
  }

  static public function ctrEditarPlato($data)
  {
    $table = modeloPlatos::TABLE;
    $respuesta = modeloPlatos::mdlEditarPlato($table, $data);
    return $respuesta;
  }
  static public function ctrBorrarCatPlato($id)
  {
    $table = modeloPlatos::TABLE;
    $respuesta = modeloPlatos::mdlBorrarPlato($table, $id);
    return $respuesta;
  }
}
