<?php

require_once "../controlador/controlador.rol.php";
require_once "../modelo/modelo.rol.php";

class AjaxRoles
{
  public $id;
  public $name;
  public $option;

  public function __construct($data)
  {
    $this->id = $data['id'] ?? null;
    $this->name = $data['name'] ?? null;
    $this->option = $data['option'] ?? null;
  }

  public function loadTableRoles()
  {
    $respuesta = ControladorRoles::ctrMostrarRoles();
    echo json_encode($respuesta);
  }

  public function updateRole()
  {
    $data = [
      "name" => $this->name,
      "id" => $this->id
    ];

    $respuesta = ControladorRoles::ctrEditarRol($data);
    echo json_encode($respuesta);
  }
  public function insertRole()
  {
    $name = $this->name;

    $respuesta = ControladorRoles::ctrCrearRol($name);
    echo json_encode($respuesta);
  }
  public function deleteRole()
  {
    $id = $this->id;

    $respuesta = ControladorRoles::ctrBorrarRol($id);
    echo json_encode($respuesta);
  }
}

$ajaxRoles = (isset($_POST['option']))
  ? new AjaxRoles($_POST)
  : null;

switch ($ajaxRoles->option) {
  case 'loadRoles':
    $ajaxRoles->loadTableRoles();
    break;
  case 'updateRole':
    $ajaxRoles->updateRole();
    break;
  case 'insertRole':
    $ajaxRoles->insertRole();
    break;
  case 'deleteRole':
    $ajaxRoles->deleteRole();
    break;
}
