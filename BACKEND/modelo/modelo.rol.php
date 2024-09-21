<?php

require_once "conexion.php";

class ModeloRoles
{
  const TABLE = 'roles';

  static public function mdlCrearRol($table, $name)
  {
    try {
      $stmt = conexion::conectar()->prepare("INSERT INTO $table (name) VALUES (:name)");
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

  static public function mdlMostrarRoles($table)
  {
    $stmt = conexion::conectar()->prepare("SELECT * FROM $table WHERE status = 1 ORDER BY id DESC");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  /*=============================================
	EDITAR CATEGORIA
	=============================================*/

  static public function mdlEditarRol($table, $data)
  {
    $stmt = conexion::conectar()->prepare("UPDATE $table SET name = :name WHERE id = :id");

    $stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
    $stmt->bindParam(":id", $data["id"], PDO::PARAM_INT);
    $stmt->execute();

    $lastInsertId = conexion::conectar()->lastInsertId();
    $stmt = null;
    return ($lastInsertId) ? true : false;
  }

  /*=============================================
	BORRAR CATEGORIA
	=============================================*/

  static public function mdlBorrarRol($table, $id)
  {
    $stmt = Conexion::conectar()->prepare("UPDATE $table SET status = 0 WHERE id = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
    $response = $stmt->rowCount() > 0;
    $stmt = null;
    return $response;
  }
}
