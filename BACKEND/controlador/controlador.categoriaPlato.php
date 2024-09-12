<?php

class ControladorCatPlatos
{

  static public function ctrCrearCatPlato($name)
  {
    if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $name)) {

      $table = ModeloRoles::TABLE;
      $name = ["name" => strtoupper($name)];
      $respuesta = ModeloCatPlatos::mdlIngresarCatPlato($table, $name);
      return $respuesta;
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
      return $respuesta;
    }
  }

  static public function ctrBorrarCatPlato()
  {

    if (isset($_GET["idCatPlato"])) {

      $respuesta = ModeloCatPlatos::mdlMostrarCatPlatos("plato", "idCatPlato", $_GET["idCatPlato"]);

      if (!$respuesta) {

        $tabla = "categoria_plato";
        $datos = $_GET["idCatPlato"];

        $respuesta = ModeloCatPlatos::mdlBorrarCatPlato($tabla, $datos);

        if ($respuesta == "ok") {
          $a = '';
        }
      }
    }
  }
}
