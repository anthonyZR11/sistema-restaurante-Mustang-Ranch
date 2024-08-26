<?php 
	
class controladorUsuarios{

	static public function ctrIngresoUsuario(){

		if(isset($_POST["ingUsuario"])){

			if(preg_match("/^(([A-Za-z0-9]+_+)|([A-Za-z0-9]+\-+)|([A-Za-z0-9]+\.+)|([A-Za-z0-9]+\++))*[A-Za-z0-9]+@((\w+\-+)|(\w+\.))*\w{1,63}\.[a-zA-Z]{2,6}$/", $_POST["ingUsuario"])){

			   	$encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$tabla = "usuario";

				$item = "correoUsuario";
				
				$valor = $_POST["ingUsuario"];

				$tipo = true;
				if ($tipo) {
					$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);
				}else{
					$respuesta= false;
				}

				if (is_array($respuesta)) {

				if($respuesta["correoUsuario"] == $_POST["ingUsuario"] && $respuesta["passUsuario"] == $encriptar){

					if($respuesta["estadoUsuario"] == 1){

						$_SESSION["iniciarSesion"] = "ok";
						$_SESSION["id"] = $respuesta["idUsuario"];
						$_SESSION["nombre"] = $respuesta["nomUsuario"];
						$_SESSION["correo"] = $respuesta["correoUsuario"];
						$_SESSION["rol"] = $respuesta["nomRol"];
						$_SESSION["fecUsuario"] = $respuesta["fecRegUsuario"];

							echo '<script>

								window.location = "principal";

							</script>';

					}else{

						echo '<br>
							<div class="alert alert-danger">El usuario aún no está activado</div>';

					}		

				}

			}else{

					echo '<br><div class="alert alert-danger">Error: Usuario no encontrado en el sistema</div>';

				}

			}	

		}

	}


	/*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	static public function ctrCrearUsuario(){

		if(isset($_POST["nuevoNomUsuario"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
			   preg_match("/^(([A-Za-z0-9]+_+)|([A-Za-z0-9]+\-+)|([A-Za-z0-9]+\.+)|([A-Za-z0-9]+\++))*[A-Za-z0-9]+@((\w+\-+)|(\w+\.))*\w{1,63}\.[a-zA-Z]{2,6}$/", $_POST["nuevoNomUsuario"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoConUsuario"])){

				$tabla = "usuario";

				$encriptar = crypt($_POST["nuevoConUsuario"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$datos = array("nombre" => $_POST["nuevoNombre"],
					           "nomUsuario" => $_POST["nuevoNomUsuario"],
					           "conUsuario" => $encriptar,
					           "idRol" => $_POST["nuevoRol"]);

				$respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);

				if($respuesta == "ok"){
					echo '<script>
					swal({
						type: "success",
						title: "¡El usuario ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
					}).then(function(result){

						if(result.value){
						
							window.location = "usuario";

						}

					});
				

					</script>';
				}	
			}else{
				echo '<script>
					swal({
						type: "error",
						title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "usuarios";

						}

					});
				</script>';
			}
		}
	}

	/*=============================================
	EDITAR USUARIO
	=============================================*/

	static public function ctrEditarUsuario(){

		if(isset($_POST["editarNomUsuario"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){

				$tabla = "usuario";

				if($_POST["editarConUsuario"] != ""){

					if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarConUsuario"])){

						$encriptar = crypt($_POST["editarConUsuario"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

					}else{

						echo'<script>

								swal({
									  type: "error",
									  title: "¡La contraseña no puede ir vacía o llevar caracteres especiales!",
									  showConfirmButton: true,
									  confirmButtonText: "Cerrar"
									  }).then(function(result) {
										if (result.value) {

										window.location = "usuario";

										}
									})

						  	</script>';
					}

				}else{

					$encriptar = $_POST["passwordActual"];

				}

				$datos = array("nombre" => $_POST["editarNombre"],
							   "nomUsuario" => $_POST["editarNomUsuario"],
							   "conUsuario" => $encriptar,
							   "idRol" => $_POST["editarRol"]);

				$respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El usuario ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
									if (result.value) {

									window.location = "usuario";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
							if (result.value) {

							window.location = "usuario";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR USUARIO
	=============================================*/
	static public function ctrMostrarUsuarios($item, $valor){

		$tabla = "usuario";

		$respuesta = modeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	BORRAR USUARIO
	=============================================*/

	static public function ctrBorrarUsuario(){

		if(isset($_GET["idUsuario"])){

			$tabla ="usuario";
			$datos = $_GET["idUsuario"];

			if($_GET["fotoUsuario"] != ""){

				unlink($_GET["fotoUsuario"]);
				rmdir('vista/img/usuarios/'.$_GET["nomUsuario"]);

			}

			$respuesta = ModeloUsuarios::mdlBorrarUsuario($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El usuario ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "usuario";

								}
							})

				</script>';

			}		

		}

	}
}