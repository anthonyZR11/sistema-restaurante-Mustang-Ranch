<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SISTEMA RESTAURANTE</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="vista/css/style.system.css">
  <link rel="stylesheet" type="text/css" href="vista/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="vista/css/styles.css">
  <script src="vista/bower_components/jquery/dist/jquery2.js"></script>

</head>

<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

  <?php
  include_once "modulos/cabecera.php";

  $item = null;
  $valor = null;
  $categorias = ControladorCatPlatos::ctrMostrarCatPlatos($item, $valor);
  $rutasCategorias = [];

  if (is_array($categorias) && count($categorias) > 0) {
    $rutasCategorias = array_column($categorias, 'slug');
  }

  if (isset($_GET["ruta"])) {
    switch (true) {
      case $_GET["ruta"] === 'principal':
        include_once "modulos/principal.php";
        break;
      case in_array($_GET['ruta'], $rutasCategorias):
        include_once "modulos/carta-menu.php";
        break;
      default:
        include_once "modulos/404.php";
        break;
    }
  } else {
    include_once "modulos/principal.php";
  }
  ?>

  <script src="vista/js/plantilla.js"></script>
  <script src="vista/vendors/bootstrap/bootstrap.bundle.js"></script>
  <script src="vista/vendors/bootstrap/bootstrap.affix.js"></script>
</body>

</html>