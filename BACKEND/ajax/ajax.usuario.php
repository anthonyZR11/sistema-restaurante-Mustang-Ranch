<?php

require_once "../controlador/controlador.usuario.php";
require_once "../modelo/modelo.usuario.php";

class AjaxUsuarios
{

  public $idUsuario;
  public $nombreUsuario;
  public $emailUsuario;
  public $passwordUsuario;
  public $rolUsuario;
  public $estadoUsuario;
  public $option;

  public function __construct($data)
  {
    $this->idUsuario = $data['id'] ?? null;
    $this->nombreUsuario = $data['name'] ?? null;
    $this->emailUsuario = $data['email'] ?? null;
    $this->passwordUsuario = $data['password'] ?? null;
    $this->rolUsuario = $data['role'] ?? null;
    $this->estadoUsuario = $data['status'] ?? null;
    $this->option = $data['option'] ?? null;
  }

  public function ajaxAgregarUsuario()
  {
    $data = [
      "name" => $this->nombreUsuario,
      "email" => $this->emailUsuario,
      "password" => $this->passwordUsuario,
      "role" => $this->rolUsuario
    ];

    $respuesta = ControladorUsuarios::ctrCrearUsuario($data);
    echo json_encode($respuesta);
  }

  public function ajaxEditarUsuario()
  {
    $data = [
      "id" => $this->idUsuario,
      "name" => $this->nombreUsuario,
      "email" => $this->emailUsuario,
      "password" => $this->passwordUsuario,
      "role" => $this->rolUsuario
    ];

    $respuesta = ControladorUsuarios::ctrEditarUsuario($data);
    echo json_encode($respuesta);
  }

  public function ajaxActivarUsuario()
  {
    $data = [
      "id" => $this->idUsuario,
      "status" => $this->estadoUsuario
    ];

    $respuesta = controladorUsuarios::ctrActualizarUsuario($data);
    echo json_encode($respuesta);
  }

  public function ajaxLoginUsuario()
  {
    $data = [
      "email" => $this->emailUsuario,
      "password" => $this->passwordUsuario
    ];

    $respuesta = ControladorUsuarios::ctrIngresoUsuario($data);
    echo json_encode($respuesta);
  }

  public function loadTableUser()
  {
    $item = null;
    $valor = null;

    $respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
    echo json_encode($respuesta);
  }
}

$ajaxUsuario = (isset($_POST['option']))
  ? new AjaxUsuarios($_POST)
  : null;

switch ($ajaxUsuario->option) {
  case 'loadUsers':
    $ajaxUsuario->loadTableUser();
    break;

  case 'insertUser':
    $ajaxUsuario->ajaxAgregarUsuario();
    break;

  case 'updateUser':
    $ajaxUsuario->ajaxEditarUsuario();
    break;
  case 'validateLogin':
    $ajaxUsuario->ajaxLoginUsuario();
    break;
  case 'changeStatusUser':
    $ajaxUsuario->ajaxActivarUsuario();
    break;
}
