<?php

require_once "conexion.php";

class ModeloCatPlatos
{

  /*=============================================
	CREAR ROL
	=============================================*/

  static public function mdlIngresarCatPlato($table, $name)
  {

    $stmt = Conexion::conectar()->prepare("INSERT INTO $table(name) VALUES (:name)");
    $stmt->bindParam(":id", $name, PDO::PARAM_STR);
    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }
    $stmt = null;
  }

  /*=============================================
	MOSTRAR ROL
	=============================================*/

  static public function mdlMostrarCatPlatos($tabla, $item, $valor)
  {

    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
  }

  /*=============================================
	EDITAR CATEGORIA
	=============================================*/

  static public function mdlEditarCatPlato($tabla, $datos)
  {

    $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nomCatPlato = :nomCatPlato WHERE idCatPlato = :idCatPlato");

    $stmt->bindParam(":nomCatPlato", $datos["nomCatPlato"], PDO::PARAM_STR);
    $stmt->bindParam(":idCatPlato", $datos["idCatPlato"], PDO::PARAM_INT);

    if ($stmt->execute()) {

      return "ok";
    } else {

      return "error";
    }

    $stmt = null;
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

    $stmt = null;
  }
}
