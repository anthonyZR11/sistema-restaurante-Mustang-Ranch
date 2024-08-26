<?php

require_once "../controlador/controlador.plato.php";
require_once "../modelo/modelo.plato.php";

class AjaxPlatos{

	/*=============================================
	EDITAR CATEGORÍA
	=============================================*/	

	public $idPlato;

	public function ajaxEditarPlato(){

		$item = "idPlato";
		$valor = $this->idPlato;

		$respuesta = controladorPlatos::ctrMostrarPlatos($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR CATEGORÍA
=============================================*/	

if(isset($_POST["idPlato"])){

	$plato = new AjaxPlatos();
	$plato -> idPlato = $_POST["idPlato"];
	$plato -> ajaxEditarPlato();
}
