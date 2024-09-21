<?php
require_once 'conexion.php';
class modeloPlatos
{
  const TABLE = 'dishes';

  static public function mdlMostrarPlatos($table)
  {
    $stmt = Conexion::conectar()->prepare("SELECT
        d.id,
        d.name,
        d.dish_item_id,
        d.url_image,
        d.description,
        d.price_base,
        d.price_discount,
        di.name AS itemName
      FROM $table AS d
      INNER JOIN dish_items AS di
      ON d.dish_item_id = di.id
      WHERE d.status = 1");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  /*=============================================
		REGISTRO DE USUARIO
		=============================================*/

  static public function mdlIngresarPlato($table, $data)
  {
    $conn = conexion::conectar();
    try {
      $stmt = $conn->prepare(
        "INSERT INTO $table
          (name,
          dish_item_id,
          url_image,
          description,
          price_base,
          price_discount,
          user_id) 
        VALUES 
          (:name,
          :dishItem,
          :urlPhoto,
          :description,
          :priceBase,
          :priceDiscount,
          :userId)"
      );

      $stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
      $stmt->bindParam(":dishItem", $data["dishItem"], PDO::PARAM_INT);
      $stmt->bindParam(":urlPhoto", $data["urlPhoto"], PDO::PARAM_STR);
      $stmt->bindParam(":description", $data["description"], PDO::PARAM_STR);
      $stmt->bindParam(":priceBase", $data["priceBase"], PDO::PARAM_STR);
      $stmt->bindParam(":priceDiscount", $data["priceDiscount"], PDO::PARAM_STR);
      $stmt->bindParam(":userId", $data["userId"], PDO::PARAM_INT);
      $stmt->execute();

      $lastInsertId = $conn->lastInsertId();
      $stmt = null;

      return ($lastInsertId) ? true : false;
    } catch (Exception $e) {
      if ($e->getCode() == 23000) {
        return false;
      } else {
        throw new Exception("Error en la base de datos: " . $e->getMessage(), 500);
      }
    }
  }

  static public function mdlEditarPlato($table, $data)
  {
    $stmt = Conexion::conectar()->prepare("UPDATE $table 
    SET name = :name,
      dish_item_id = :dishItem,
      url_image = :urlPhoto,
      description = :description,
      price_base = :priceBase,
      price_discount = :priceDiscount,
      user_id = :userId
    WHERE id = :id");

    $stmt->bindParam(":id", $data["id"], PDO::PARAM_STR);
    $stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
    $stmt->bindParam(":dishItem", $data["dishItem"], PDO::PARAM_INT);
    $stmt->bindParam(":urlPhoto", $data["urlPhoto"], PDO::PARAM_STR);
    $stmt->bindParam(":description", $data["description"], PDO::PARAM_STR);
    $stmt->bindParam(":priceBase", $data["priceBase"], PDO::PARAM_STR);
    $stmt->bindParam(":priceDiscount", $data["priceDiscount"], PDO::PARAM_STR);
    $stmt->bindParam(":priceDiscount", $data["priceDiscount"], PDO::PARAM_STR);
    $stmt->bindParam(":userId", $data["userId"], PDO::PARAM_INT);
    $stmt->execute();

    $response = $stmt->rowCount() > 0;

    $stmt = null;
    return $response;
  }

  static public function mdlBorrarPlato($table, $id)
  {

    $stmt = Conexion::conectar()->prepare("UPDATE $table
    SET status = 0
    WHERE id = :id");

    $stmt->bindParam(":id", $id, PDO::PARAM_INT);

    $stmt->execute();

    $response = $stmt->rowCount() > 0;
    $stmt = null;
    return $response;
  }

  static public function mdlLoadLastDish($table)
  {

    $stmt = Conexion::conectar()->prepare("SELECT id, name FROM $table ORDER BY created_at DESC LIMIT 10");
    $stmt->execute();
    $response =  $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt = null;
    return $response;
  }
  static public function mldLoadTopDish($table)
  {

    $stmt = Conexion::conectar()->prepare("SELECT id, name FROM $table WHERE flag = 1 LIMIT 10");
    $stmt->execute();
    $response =  $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt = null;
    return $response;
  }
}
