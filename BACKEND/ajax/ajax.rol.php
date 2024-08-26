<?php

require_once "../controlador/controlador.rol.php";
require_once "../modelo/modelo.rol.php";

class AjaxPlatos
{

  /*=============================================
	EDITAR CATEGORÍA
	=============================================*/

  public $idPlato;

  public function ajaxEditarPlato()
  {
    $item = "idPlato";
    $valor = $this->idPlato;

    $respuesta = controladorPlatos::ctrMostrarPlatos($item, $valor);
    echo json_encode($respuesta);
  }

  public function ajaxLoadRol()
  {
    $item = null;
    $valor = null;

    $respuesta = ControladorRoles::ctrMostrarRoles($item, $valor);
    echo json_encode($respuesta);
  }
}

/*=============================================
EDITAR CATEGORÍA
=============================================*/

if (isset($_POST["idPlato"])) {

  $plato = new AjaxPlatos();
  $plato->idPlato = $_POST["idPlato"];
  $plato->ajaxEditarPlato();
}

if (isset($_POST["option"]) && $_POST['option'] === 'loadRoles') {
  $plato = new AjaxPlatos();
  $plato->ajaxLoadRol();
}
