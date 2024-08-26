<?php

class controladorPlatos
{

  /*=============================================
	REGISTRO DE USUARIO
	=============================================*/

  static public function ctrIngresoPlato()
  {

    if (isset($_POST["nuevoNomPlato"])) {

      if (
        preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNomPlato"]) &&
        preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoDescPlato"]) &&
        preg_match('/^[0-9]|([.][0-9]+)$/', $_POST["nuevoPrecio"])
      ) {

        /*=============================================
				VALIDAR IMAGEN
				=============================================*/
        $ruta = "";
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        // Output: 54esmdr0qf
        $nombreFoto =  'plato-' . substr(str_shuffle($permitted_chars), 0, 4);
        // AQUI SE VALIDA $_FILES["nuevaFotoUsuario"]["tmp_name"] SI ES VACION LA IMAGEN SE SALTA TODO LA VALIDADCION

        if ($_FILES["fotito"]["tmp_name"] == "") {
          var_dump($_FILES['fotito']);
        } else {

          if (isset($_FILES["fotito"]["tmp_name"])) {

            list($ancho, $alto) = getimagesize($_FILES["fotito"]["tmp_name"]);

            $nuevoAncho = 500;
            $nuevoAlto = 500;

            /*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

            $directorio = "vista/img/img-plato/" . $nombreFoto;

            mkdir($directorio, 0755);

            /*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

            if ($_FILES["fotito"]["type"] == "image/jpeg") {

              /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

              $aleatorio = mt_rand(100, 999);

              $ruta = "vista/img/img-plato/" . $nombreFoto . "/" . $aleatorio . ".jpg";

              $origen = imagecreatefromjpeg($_FILES["fotito"]["tmp_name"]);

              $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

              imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

              imagejpeg($destino, $ruta);
            }

            if ($_FILES["fotito"]["type"] == "image/png") {

              /*=============================================
							GUARDAMOS LA IMAGEN EN EL DIRECTORIO
							=============================================*/

              $aleatorio = mt_rand(100, 999);

              $ruta = "vista/img/img-plato/" . $nombreFoto . "/" . $aleatorio . ".png";

              $origen = imagecreatefrompng($_FILES["fotito"]["tmp_name"]);

              $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

              imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

              imagepng($destino, $ruta);
            }
          }
        }

        $tabla = "plato";

        $datos = array(
          "plato" => $_POST["nuevoNomPlato"],
          "descripcion" => $_POST["nuevoDescPlato"],
          "categoria" => $_POST["nuevoCatPlato"],
          "precio" => $_POST["nuevoPrecio"],
          "foto" => $ruta
        );
        var_dump($datos);

        $respuesta = modeloPlatos::mdlIngresarPlato($tabla, $datos);
        var_dump($datos);
        if ($respuesta == "ok") {

          echo '<script>

						swal({

							type: "success",
							title: "¡El usuario ha sido guardado correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"

						}).then(function(result){

							if(result.value){
							
								window.location = "plato";

							}

						});
					

						</script>';
        }
      } else {

        echo '<script>
						swal({
							type: "error",
							title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"

						}).then(function(result){

							if(result.value){
							
								window.location = "plato";

							}

						});
					</script>';
      }
    }
  }

  static public function ctrMostrarPlatos($item, $valor)
  {
    $tabla = 'dishes';
    $respuesta = modeloPlatos::mdlMostrarPlatos($tabla, $item, $valor);
    return $respuesta;
  }

  /*=============================================
	EDITAR USUARIO
	=============================================*/

  static public function ctrEditarPlato()
  {


    if (isset($_POST["editarNomPlato"])) {

      if (
        preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNomPlato"]) &&
        preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDescPlato"]) &&
        preg_match('/^[0-9]|([.][0-9]+)$/', $_POST["editarPrecio"])
      ) {

        /*=============================================
				VALIDAR IMAGEN
				=============================================*/

        $ruta = $_POST["fotoActual"];
        $link_sin_dominio = str_replace('vista/img/img-plato', '', $ruta);
        $grupos = explode('/', $link_sin_dominio);
        $carpeta = $grupos[count($grupos) - 2];

        if (isset($_FILES["editarFotoPlato"]["tmp_name"]) && !empty($_FILES["editarFotoPlato"]["tmp_name"])) {

          list($ancho, $alto) = getimagesize($_FILES["editarFotoPlato"]["tmp_name"]);

          $nuevoAncho = 500;
          $nuevoAlto = 500;

          /*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

          $directorio = "vista/img/img-plato/" . $carpeta;

          /*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/

          if (!empty($_POST["fotoActual"])) {

            unlink($_POST["fotoActual"]);
          } else {

            mkdir($directorio, 0755);
          }

          /*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

          if ($_FILES["editarFotoPlato"]["type"] == "image/jpeg") {

            /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

            $aleatorio = mt_rand(100, 999);

            $ruta = "vista/img/img-plato/" . $carpeta . "/" . $aleatorio . ".jpg";

            $origen = imagecreatefromjpeg($_FILES["editarFotoPlato"]["tmp_name"]);

            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

            imagejpeg($destino, $ruta);
          }

          if ($_FILES["editarFotoPlato"]["type"] == "image/png") {

            /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

            $aleatorio = mt_rand(100, 999);

            $ruta = "vista/img/img-plato/" . $carpeta . "/" . $aleatorio . ".png";

            $origen = imagecreatefrompng($_FILES["editarFotoPlato"]["tmp_name"]);

            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

            imagepng($destino, $ruta);
          }
        }

        $tabla = "plato";

        $datos = array(
          "plato" => $_POST["editarNomPlato"],
          "descripcion" => $_POST["editarDescPlato"],
          "cat" => $_POST["cat"],
          "precio" => $_POST["editarPrecio"],
          "id" => $_POST["idPlato"],
          "foto" => $ruta
        );

        $respuesta = modeloPlatos::mdlEditarPlato($tabla, $datos);

        if ($respuesta == "ok") {

          echo '<script>

					swal({
						  type: "success",
						  title: "El usuario ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
									if (result.value) {

									window.location = "plato";

									}
								})

					</script>';
        }
      } else {

        echo '<script>

					swal({
						  type: "error",
						  title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
							if (result.value) {

							window.location = "plato";

							}
						})

			  	</script>';
      }
    }
  }

  /*=============================================
	BORRAR USUARIO
	=============================================*/

  static public function ctrBorrarPlato()
  {

    if (isset($_GET["idPlato"])) {

      $tabla = "plato";
      $datos = $_GET["idPlato"];

      if ($_GET["fotoPlato"] != "") {

        unlink($_GET["fotoPlato"]);
        rmdir('vista/img/img-plato/' . $_GET["fotoPlato"]);
      }

      $respuesta = ModeloPlatos::mdlBorrarPlato($tabla, $datos);

      if ($respuesta == "ok") {

        echo '<script>

				swal({
					  type: "success",
					  title: "El usuario ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "plato";

								}
							})

				</script>';
      } else {
        echo 'ERRORRR!!!!!!!!!!!!';
      }
    }
  }
}
