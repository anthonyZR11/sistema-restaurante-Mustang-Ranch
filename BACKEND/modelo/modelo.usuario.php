<?php
require_once "conexion.php";

class modeloUsuarios
{
  const TABLE = "users";

  static public function mdlInsertarUsuario($table, $data)
  {
    $stmt = Conexion::conectar()->prepare("INSERT INTO $table 
        (name,
        email,
        pass,
        rol_id)
      VALUES 
        (:nombre,
        :nomUsuario,
        :conUsuario,
        :idRol)");

    $stmt->bindParam(":nombre", $data["name"], PDO::PARAM_STR);
    $stmt->bindParam(":nomUsuario", $data["email"], PDO::PARAM_STR);
    $stmt->bindParam(":conUsuario", $data["password"], PDO::PARAM_STR);
    $stmt->bindParam(":idRol", $data["role"], PDO::PARAM_INT);


    $response = ($stmt->execute()) ? true : false;
    $stmt = null;
    return $response;
  }

  static public function mdlEditarUsuario($table, $data)
  {

    $id = $data["id"] ?? null;
    $name = $data["name"] ?? null;
    $email = $data["email"] ?? null;
    $password = $data["password"] ?? null;
    $role = $data["role"] ?? null;

    $stmt = Conexion::conectar()->prepare("UPDATE $table 
      SET name = :name,
        email = :email,
        pass = :pass,
        rol_id = :role_id
      WHERE id = :id");

    $stmt->bindParam(":name", $name, PDO::PARAM_STR);
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->bindParam(":pass", $password, PDO::PARAM_STR);
    $stmt->bindParam(":role_id", $role, PDO::PARAM_INT);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
      $response = true;
    } else {
      $response = false;
    }

    $stmt = null;
    return $response;
  }

  static public function mdlMostrarUsuario($tabla, $item, $value)
  {
    $query = "SELECT
        u.id,
        u.name,
        u.email,
        u.status,
        u.pass,
        r.name AS role_name,
        r.id AS role_id
      FROM $tabla AS u
      INNER JOIN roles AS r
      ON u.rol_id = r.id
      WHERE u.$item = :$item
      AND u.status <> 11
      AND u.status IS NOT NULL";

    $stmt = Conexion::conectar()->prepare($query);
    $stmt->bindParam(":$item", $value, PDO::PARAM_STR);
    $stmt->execute();
    $response = $stmt->fetch(PDO::FETCH_ASSOC);

    $stmt = null;
    return $response;
  }

  static public function mdlMostrarUsuarios($table)
  {
    $query = "SELECT
        u.id,
        u.name,
        u.email,
        u.status,
        u.pass,
        r.name AS role_name,
        r.id AS role_id
      FROM $table AS u
      INNER JOIN roles AS r
      ON u.rol_id = r.id
      WHERE u.status <> 11
      AND u.status IS NOT NULL";

    $stmt = Conexion::conectar()->prepare($query);
    $stmt->execute();
    $response = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt = null;
    return $response;
  }

  static public function mdlActualizarUsuario($table, $data)
  {
    $id = $data["id"];
    $status = $data["status"];

    $stmt = Conexion::conectar()->prepare("UPDATE $table
      SET status = :status
      WHERE id = :id");

    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->bindParam(":status", $status, PDO::PARAM_INT);
    $stmt->execute();

    $response = ($stmt->rowCount() > 0) ? true : false;
    $stmt = null;
    return $response;
  }

  static public function mdlEliminarUsuario($table, $item, $value)
  {

    $date = new DateTime('now', new DateTimeZone('America/Lima'));
    $formattedDate = $date->format('Y-m-d H:i:s');
    $deleteStatus = intval(11);

    $text = "UPDATE $table
      SET status = $deleteStatus,
        deleted_at = $formattedDate
      WHERE id = $value";

    $stmt = Conexion::conectar()->prepare("UPDATE $table
      SET status = :status,
        deleted_at = :deleted_at
      WHERE id = :$item");
    $stmt->bindParam(":$item", $value, PDO::PARAM_INT);
    $stmt->bindParam(":deleted_at", $formattedDate, PDO::PARAM_STR);
    $stmt->bindParam(":status", $deleteStatus, PDO::PARAM_INT);
    $stmt->execute();

    $response = ($stmt->rowCount() > 0) ? true : false;
    $stmt = null;
    return $response;
  }
}
