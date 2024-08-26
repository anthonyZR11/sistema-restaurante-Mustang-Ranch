<?php

class ControladorCatPlatos
{

  /*=============================================
	CREAR ROLES
	=============================================*/

  static public function ctrCrearCatPlato()
  {

    if (isset($_POST["nuevoCatPlato"])) {

      if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoCatPlato"])) {

        $tabla = "categoria_plato";

        $datos = array("nomCatPlato" => strtoupper($_POST["nuevoCatPlato"]));

        $respuesta = ModeloCatPlatos::mdlIngresarCatPlato($tabla, $datos);

        if ($respuesta == "ok") {

          echo '<script>

					swal({
						  type: "success",
						  title: "La categoria del plato ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "categoria-plato";

									}
								})

					</script>';
        }
      } else {

        echo '<script>

					swal({
						  type: "error",
						  title: "¡El rol no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "categoria-plato";

							}
						})

			  	</script>';
      }
    }
  }

  /*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

  static public function ctrMostrarCatPlatos($item, $valor)
  {

    $tabla = "dish_items";

    $respuesta = ModeloCatPlatos::mdlMostrarCatPlatos($tabla, $item, $valor);

    return $respuesta;
  }

  /*=============================================
	EDITAR CATEGORIA
	=============================================*/

  static public function ctrEditarCatPlato()
  {

    if (isset($_POST["editarCatPlato"])) {

      // var_dump($_POST["editarRol"]);

      if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCatPlato"])) {

        $tabla = "categoria_plato";

        $datos = array(
          "nomCatPlato" => strtoupper($_POST["editarCatPlato"]),
          "idCatPlato" => $_POST["idCatPlato"]
        );

        $respuesta = ModeloCatPlatos::mdlEditarCatPlato($tabla, $datos);



        if ($respuesta == "ok") {

          echo '<script>

					swal({
						  type: "success",
						  title: "La categoria del plato ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "categoria-plato";

									}
								})

					</script>';
        }
      } else {

        echo '<script>

					swal({
						  type: "error",
						  title: "¡La categoria del plato no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "categoria-plato";

							}
						})

			  	</script>';
      }
    }
  }

  /*=============================================
	BORRAR CATEGORIA
	=============================================*/

  static public function ctrBorrarCatPlato()
  {

    if (isset($_GET["idCatPlato"])) {

      $respuesta = ModeloCatPlatos::mdlMostrarCatPlatos("plato", "idCatPlato", $_GET["idCatPlato"]);

      if (!$respuesta) {

        $tabla = "categoria_plato";
        $datos = $_GET["idCatPlato"];

        $respuesta = ModeloCatPlatos::mdlBorrarCatPlato($tabla, $datos);

        if ($respuesta == "ok") {

          echo '<script>

						swal({
							  type: "success",
							  title: "El Rol ha sido borrada correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "categoria-plato";

										}
									})

						</script>';
        }
      } else {
        echo '<script>

						swal({
							  type: "error",
							  title: "No se puede eliminar el Rol",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "categoria-plato";

										}
									})

						</script>';
      }
    }
  }
}
