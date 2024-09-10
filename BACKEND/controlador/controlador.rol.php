<?php

class ControladorRoles
{

  static public function ctrCrearRol($name)
  {
    try {
      if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $name)) {
        $table = ModeloRoles::TABLE;
        $nameRole = strtoupper($name);

        $respuesta = ModeloRoles::mdlCrearRol($table, $nameRole);
        if ($respuesta) {
          return [
            "status_code" => 200,
            "status" => "success",
            "message" => "Rol insertado correctamente"
          ];
        } else {
          return [
            "status_code" => 409,
            "status" => "error",
            "message" => "El rol ya existe en la base de datos"
          ];
        }
      } else {
        return [
          "status_code" => 400,
          "status" => "error",
          "message" => "El nombre de rol no puede llevar caracteres especiales"
        ];
      }
    } catch (PDOException $e) {
      return [
        "status_code" => 500,
        "status" => "error",
        "message" => "Ocurrió un error al intentar crear el rol"
      ];
    }
  }

  static public function ctrMostrarRoles()
  {
    $table = ModeloRoles::TABLE;
    $respuesta = ModeloRoles::mdlMostrarRoles($table);
    return $respuesta;
  }

  static public function ctrEditarRol($data)
  {
    $table = ModeloRoles::TABLE;
    $data = [
      "name" => strtoupper($data['name']),
      "id" => $data['id']
    ];

    $respuesta = ModeloRoles::mdlEditarRol($table, $data);

    try {
      if ($respuesta) {
        return [
          "status_code" => 200,
          "status" => "success",
          "message" => "Rol actualizado correctamente"
        ];
      } else {
        return [
          "status_code" => 409,
          "status" => "warning",
          "message" => "No se realizó ningún cambio, el nombre ya existe"
        ];
      }
    } catch (Exception $e) {
      return [
        "status_code" => 500,
        "status" => "error",
        "message" => "Huvo un error interno del servidor",
        "message_error" => $e->getMessage()
      ];
    }
  }

  /*=============================================
	BORRAR CATEGORIA
	=============================================*/

  static public function ctrBorrarRol($id)
  {
    if (empty($id) && !is_numeric($id)) {
      return [
        "status_code" => 400,
        "status" => "error",
        "message" => "El id del rol no existe"
      ];
    }

    $table = ModeloRoles::TABLE;
    $respuesta = ModeloRoles::mdlBorrarRol($table, $id);

    if ($respuesta) {
      return [
        "status_code" => 200,
        "status" => "success",
        "message" => "Rol actualizado correctamente"
      ];
    } else {
      return [
        "status_code" => 400,
        "status" => "error",
        "message" => "No se realizaron cambios"
      ];
    }
  }
}
