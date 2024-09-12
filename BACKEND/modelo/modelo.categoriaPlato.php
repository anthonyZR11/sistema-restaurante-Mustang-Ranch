<?php

require_once "conexion.php";

class ModeloCatPlatos
{
  const TABLE = 'dish_items';

  static public function mdlIngresarCatPlato($tabla, $datos)
  {
    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nomCatPlato) VALUES (:nomCatPlato)");
    $stmt->bindParam(":nomCatPlato", $datos["nomCatPlato"], PDO::PARAM_STR);
    if ($stmt->execute()) {

      return "ok";
    } else {

      return "error";
    }

    $stmt->close();
    $stmt = null;
  }

  static public function mdlMostrarCatPlatos($table)
  {
    $stmt = Conexion::conectar()->prepare("SELECT * FROM $table");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt = null;
  }

  /*=============================================
	EDITAR CATEGORIA
	=============================================*/

  static public function mdlEditarCatPlato($table, $data)
  {

    $stmt = Conexion::conectar()->prepare("UPDATE $table SET name = :name WHERE id = :id");

    $stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
    $stmt->bindParam(":id", $data["id"], PDO::PARAM_INT);
    $response = $stmt->execute();
    $stmt = null;
    return $response;
  }

  /*=============================================
	BORRAR CATEGORIA
	=============================================*/

  static public function mdlBorrarCatPlato($tabla, $datos)
  {

    $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idCatPlato = :idCatPlato");

    $stmt->bindParam(":idCatPlato", $datos, PDO::PARAM_INT);

    if ($stmt->execute()) {

      return "ok";
    } else {

      return "error";
    }

    $stmt->close();

    $stmt = null;
  }
}
