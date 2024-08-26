<?php

require_once "conexion.php";

class ModeloCatPlatos{

	/*=============================================
	CREAR ROL
	=============================================*/

	static public function mdlIngresarCatPlato($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nomCatPlato) VALUES (:nomCatPlato)");

		$stmt->bindParam(":nomCatPlato", $datos["nomCatPlato"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR ROL
	=============================================*/

	static public function mdlMostrarCatPlatos($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	static public function mdlEditarCatPlato($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nomCatPlato = :nomCatPlato WHERE idCatPlato = :idCatPlato");

		$stmt -> bindParam(":nomCatPlato", $datos["nomCatPlato"], PDO::PARAM_STR);
		$stmt -> bindParam(":idCatPlato", $datos["idCatPlato"], PDO::PARAM_INT);
		
		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	BORRAR CATEGORIA
	=============================================*/

	static public function mdlBorrarCatPlato($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idCatPlato = :idCatPlato");

		$stmt -> bindParam(":idCatPlato", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}

