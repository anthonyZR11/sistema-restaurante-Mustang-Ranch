<?php
require_once "conexion.php";
class modeloPlatos
{
  static public function mdlMostrarPlatos($tabla, $item, $valor)
  {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT d.id,
        d.name,
        d.url_image,
        d.description,
        d.price_base,
        d.price_discount,
        di.name AS itemName 
      FROM $tabla AS d 
      INNER JOIN dish_items AS di 
      ON d.dish_item_id = di.id 
      WHERE
        d.dish_item_id = :dishItem
        AND d.status = 1");
      $stmt->bindParam(':dishItem', $valor, PDO::PARAM_STR);
      $stmt->execute();
      $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $response;
    }
  }

  static public function mdlMostrarPlatos2($tabla, $item, $valor)
  {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetchAll();
    }
  }
}
