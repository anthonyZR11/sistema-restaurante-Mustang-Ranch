<?php

require_once "../controlador/controlador.categoriaPlato.php";
require_once "../modelo/modelo.categoriaPlato.php";

class AjaxCatPlatos{

	/*=============================================
	EDITAR CATEGORÍA
	=============================================*/	

	public $idCatPlato;

	public function ajaxEditarCatPlato(){

		$item = "idCatPlato";
		$valor = $this->idCatPlato;

		$respuesta = ControladorCatPlatos::ctrMostrarCatPlatos($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR CATEGORÍA
=============================================*/	

if(isset($_POST["idCatPlato"])){

	$rol = new AjaxCatPlatos();
	$rol -> idCatPlato = $_POST["idCatPlato"];
	$rol -> ajaxEditarCatPlato();
}
