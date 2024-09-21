<?php

class controladorUsuarios
{
  static public function ctrIngresoUsuario($data = [])
  {

    $email =  $data['email'] ?? '';
    $password = $data['password'] ?? '';

    if (isset($email) && isset($password)) {
      if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $encriptar = crypt($password, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

        $item = 'email';
        $value = $email;
        $table = modeloUsuarios::TABLE;
        $respuesta = ModeloUsuarios::mdlMostrarUsuario($table, $item, $value);

        if (is_array($respuesta)) {

          if ($respuesta["email"] == $email && $respuesta["pass"] == $encriptar) {
            if ($respuesta["status"] == 1) {

              session_start();
              $_SESSION["sigin"] = "ok";
              $_SESSION["user_id"] = $respuesta["id"];
              $_SESSION["name"] = $respuesta["name"];
              $_SESSION["email"] = $respuesta["email"];
              $_SESSION["role_id"] = $respuesta["role_id"];
              $_SESSION["role_name"] = $respuesta["role_name"];

              return [
                "status_code" => "200",
                "status" => "success"
              ];
            } else {
              return [
                "status_code" => "403",
                "status" => "warning",
                "message" => "El usuario no se encuentra activo"
              ];
            }
          } else {
            return [
              "status_code" => "401",
              "status" => "error",
              "message" => "Las credenciales son incorrectas"
            ];
          }
        } else {
          return [
            "status_code" => "404",
            "status" => "error",
            "message" => "No se encontro el usuario en el sistema"
          ];
        }
      }
    }
  }

  static public function ctrCrearUsuario($data)
  {

    $name = $data['name'];
    $email = $data['email'];
    $password = $data['password'];
    $role = $data['role'];

    if (!$name || !$email || !$password || !$role) {
      return [
        "status_code" => 400,
        "status" => "error",
        "message" => "Los datos ingresados son incorrectos"
      ];
    }

    $encriptar = crypt($password, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

    $insertData = [
      "name" => $name,
      "email" => $email,
      "password" => $encriptar,
      "role" => $role
    ];

    $table = modeloUsuarios::TABLE;
    $respuesta = modeloUsuarios::mdlInsertarUsuario($table, $insertData);


    if ($respuesta) {
      return [
        "status_code" => 200,
        "status" => "success",
        "message" => "Usuario creado correctamente!."
      ];
    } else {
      return [
        "status_code" => 400,
        "status" => "error",
        "message" => "No se creo el usuario!"
      ];
    }
  }

  static public function ctrEditarUsuario($data)
  {
    $id = $data["id"] ?? null;
    $name = $data["name"] ?? null;
    $email = $data["email"] ?? null;
    $newPassword = $data["password"] ?? null;
    $newPassword = crypt($newPassword, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
    $role = $data["role"] ?? null;

    if (!$id || !$name || !$email || !$role) {
      return [
        "status_code" => 400,
        "status" => "error",
        "message" => "Faltan campos requeridos"
      ];
    }

    $item = 'id';
    $value = $id;
    $table = modeloUsuarios::TABLE;
    $dataUser =  modeloUsuarios::mdlMostrarUsuario($table, $item, $value);
    $password = $dataUser['pass'];

    if ($newPassword === $password) {
      return [
        "status_code" => 400,
        "status" => "error",
        "message" => "La contraseña ya existe en la base de datos"
      ];
    } else {

      $updateData = [
        "id" => $id,
        "name" => $name,
        "email" => $email,
        "password" => $newPassword,
        "role" => $role,
      ];

      $user = modeloUsuarios::mdlEditarUsuario($table, $updateData);

      if ($user) {
        return [
          "status_code" => 200,
          "status" => "success",
          "message" => "Usuario actualizado correctamente!."
        ];
      } else {
        return [
          "status_code" => 400,
          "status" => "error",
          "message" => "No se actualizo el usuario!"
        ];
      }
    }
  }

  static public function ctrMostrarUsuarios($item, $valor)
  {
    $tabla = "users";
    $respuesta = modeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);
    return $respuesta;
  }
  static public function ctrActualizarUsuario($data)
  {
    $table = modeloUsuarios::TABLE;
    $respuesta = modeloUsuarios::mdlActualizarUsuario($table, $data);

    if ($respuesta) {
      return [
        "status_code" => 200,
        "status" => "success",
        "message" => "Estado actualizado"
      ];
    } else {
      return [
        "status_code" => 304,
        "status" => "warning",
        "message" => "No se realizaron cambios"
      ];
    }
  }

  static public function ctrEliminarUsuario($item, $value)
  {

    $table = modeloUsuarios::TABLE;
    $respuesta = modeloUsuarios::mdlEliminarUsuario($table, $item, $value);

    if ($respuesta) {
      return [
        "status_code" => 200,
        "status" => "success",
        "message" => "Usuario Eliminado correctamente"
      ];
    } else {
      return [
        "status_code" => 404,
        "status" => "warrning",
        "message" => "No se realizo la eliminacion del usuario"
      ];
    }
  }
}
