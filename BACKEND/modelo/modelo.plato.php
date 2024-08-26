<?php
require_once 'conexion.php';
class modeloPlatos
{
  /*=============================================
				MOSTRAR PLATO
		=============================================*/
  static public function mdlMostrarPlatos($tabla, $item, $valor)
  {

    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla as p INNER JOIN dish_items as cp ON p.dish_item_id = cp.id WHERE  $item = :$item");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    } else {
      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla as p INNER JOIN dish_items as cp ON p.dish_item_id = cp.id");
      $stmt->execute();
      return $stmt->fetchAll();
    }
  }

  /*=============================================
		REGISTRO DE USUARIO
		=============================================*/

  static public function mdlIngresarPlato($tabla, $datos)
  {

    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nomPlato, idCatPlato, fotoPlato, descPlato, precPlatoBase) VALUES (:plato, :categoria, :foto, :descripcion, :precio)");

    $stmt->bindParam(":plato", $datos["plato"], PDO::PARAM_STR);
    $stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
    $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
    $stmt->bindParam(":categoria", $datos["categoria"], PDO::PARAM_INT);
    $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);


    if ($stmt->execute()) {

      return "ok";
    } else {

      return "error";
    }

    $stmt->close();

    $stmt = null;
  }

  /*=============================================
		EDITAR USUARIO
		=============================================*/

  static public function mdlEditarPlato($tabla, $datos)
  {

    $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nomPlato = :plato, idCatPlato = :cat, fotoPlato = :foto, descPlato = :descripcion, precPlatoBase = :precio WHERE idPlato = :id");

    $stmt->bindParam(":plato", $datos["plato"], PDO::PARAM_STR);
    $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
    $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
    $stmt->bindParam(":cat", $datos["cat"], PDO::PARAM_INT);
    $stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
    $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);



    if ($stmt->execute()) {

      return "ok";
    } else {

      return "error";
    }

    $stmt->close();

    $stmt = null;
  }

  /*=============================================
		BORRAR USUARIO
		=============================================*/

  static public function mdlBorrarPlato($tabla, $datos)
  {

    $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idPlato = :idPlato");

    $stmt->bindParam(":idPlato", $datos, PDO::PARAM_INT);

    if ($stmt->execute()) {

      return "ok";
    } else {

      return "error";
    }

    $stmt->close();

    $stmt = null;
  }
}
