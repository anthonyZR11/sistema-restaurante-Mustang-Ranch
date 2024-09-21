<?php

require_once "conexion.php";

class ModeloCatPlatos
{
  const TABLE = 'dish_items';

  static public function mdlIngresarCatPlato($table, $name)
  {
    try {
      $stmt = Conexion::conectar()->prepare("INSERT INTO $table (name) VALUES (:name)");
      $stmt->bindParam(":name", $name, PDO::PARAM_STR);
      $response = $stmt->execute();
      $stmt = null;
      return $response;
    } catch (Exception $e) {
      if ($e->getCode() == 23000) {
        return false;
      } else {
        throw new Exception("Error en la base de datos: " . $e->getMessage(), 500);
      }
    }
  }

  static public function mdlMostrarCatPlatos($table)
  {
    $stmt = Conexion::conectar()->prepare("SELECT * FROM $table WHERE status = 1");
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
    $stmt->execute();
    $response = $stmt->rowCount() > 0;
    $stmt = null;
    return $response;
  }

  /*=============================================
	BORRAR CATEGORIA
	=============================================*/

  static public function mdlBorrarCatPlato($table, $id)
  {

    $stmt = Conexion::conectar()->prepare("UPDATE $table SET status = 0 WHERE id = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
    $response = $stmt->rowCount() > 0;
    $stmt = null;
    return $response;
  }
}
