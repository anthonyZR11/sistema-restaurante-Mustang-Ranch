<?php

class ControladorCatPlatos
{

  static public function ctrCrearCatPlato($name)
  {
    if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $name)) {

      $table = ModeloCatPlatos::TABLE;
      $name = strtoupper($name);
      $respuesta = ModeloCatPlatos::mdlIngresarCatPlato($table, $name);

      if ($respuesta) {
        return [
          "status_code" => "200",
          "status" => "success",
          "message" => "Categoria agregada exitosamente"
        ];
      } else {
        return [
          "status_code" => "409",
          "status" => "error",
          "message" => "La categoria ya existe"
        ];
      }
    }
  }

  static public function ctrMostrarCatPlatos()
  {
    $table = ModeloCatPlatos::TABLE;
    $respuesta = ModeloCatPlatos::mdlMostrarCatPlatos($table);
    return $respuesta;
  }

  static public function ctrEditarCatPlato($data)
  {
    $name = $data['name'];

    if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $name)) {
      $table = ModeloCatPlatos::TABLE;

      $data = [
        "name" => strtoupper($data["name"]),
        "id" => $data["id"]
      ];

      $respuesta = ModeloCatPlatos::mdlEditarCatPlato($table, $data);

      if ($respuesta) {
        return [
          "status_code" => "200",
          "status" => "success",
          "message" => "Categoria actualizada exitosamente"
        ];
      } else {
        return [
          "status_code" => "409",
          "status" => "warning",
          "message" => "No se realizaron cambios"
        ];
      }
    }
  }

  static public function ctrBorrarCatPlato($id)
  {
    $table = ModeloCatPlatos::TABLE;
    $respuesta = ModeloCatPlatos::mdlBorrarCatPlato($table, $id);

    if ($respuesta) {
      return [
        "status_code" => "200",
        "status" => "success",
        "message" => "Categoria eliminada exitosamente"
      ];
    } else {
      return [
        "status_code" => "409",
        "status" => "warning",
        "message" => "No se realizaron cambios"
      ];
    }
  }
}
