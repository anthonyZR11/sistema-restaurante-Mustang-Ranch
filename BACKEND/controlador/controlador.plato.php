<?php

class controladorPlatos
{

  static public function ctrMostrarPlatos()
  {
    $table = modeloPlatos::TABLE;
    $respuesta = modeloPlatos::mdlMostrarPlatos($table);
    return $respuesta;
  }

  static public function ctrCrearCatPlato($data)
  {
    $table = modeloPlatos::TABLE;
    $respuesta = modeloPlatos::mdlIngresarPlato($table, $data);

    if ($respuesta) {
      return [
        "status_code" => 200,
        "status" => "success",
        "message" => "Plato agregado correctamente"
      ];
    } else {
      return [
        "status_code" => 409,
        "status" => "error",
        "message" => "El plato ya existe en la base de datos"
      ];
    }
  }

  static public function ctrEditarPlato($data)
  {
    $table = modeloPlatos::TABLE;
    $respuesta = modeloPlatos::mdlEditarPlato($table, $data);

    if ($respuesta) {
      return [
        "status_code" => 200,
        "status" => "success",
        "message" => "Plato actualizado correctamente"
      ];
    } else {
      return [
        "status_code" => 409,
        "status" => "error",
        "message" => "El plato ya existe en la base de datos"
      ];
    }
  }

  static public function ctrBorrarCatPlato($id)
  {
    $table = modeloPlatos::TABLE;
    $respuesta = modeloPlatos::mdlBorrarPlato($table, $id);

    if ($respuesta) {
      return [
        "status_code" => 200,
        "status" => "success",
        "message" => "Plato eliminado correctamente"
      ];
    } else {
      return [
        "status_code" => 404,
        "status" => "success",
        "message" => "No se realizo la eliminacion del plato"
      ];
    }
  }

  static public function ctrLoadLastDish()
  {
    $table = modeloPlatos::TABLE;
    $respuesta = modeloPlatos::mdlLoadLastDish($table);
    return $respuesta;
  }

  static public function ctrLoadTopDish()
  {
    $table = modeloPlatos::TABLE;
    $respuesta = modeloPlatos::mldLoadTopDish($table);
    return $respuesta;
  }
}
