<?php
session_start();
?>
<html>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>SISTEMA RESTAURANTE</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="vista/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="vista/dist/css/AdminLTE.css">
  <link rel="stylesheet" href="vista/css/style.system.css">
  <link rel="stylesheet" href="vista/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="vista/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="vista/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="vista/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">

  <script src="vista/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="vista/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="vista/dist/js/adminlte.min.js"></script>
  <script src="https://use.fontawesome.com/de6cd31800.js"></script>
  <script src="vista/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="vista/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="vista/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
  <script src="vista/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></Script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<!--=====================================
CUERPO DOCUMENTO
======================================-->

<body class="hold-transition skin-black sidebar-mini">
  <?php if (isset($_SESSION["sigin"]) && $_SESSION["sigin"] == "ok"): ?>

    <div class="wrapper">

      <?php
      include "modulos/cabecera.php";
      include "modulos/menu.php";

      $_GET["rutaTemporal"] = null;

      if (isset($_GET["ruta"])) {
        if (
          $_GET["ruta"] == "principal" ||
          $_GET["ruta"] == "usuario" ||
          $_GET["ruta"] == "rol" ||
          $_GET["ruta"] == "plato" ||
          $_GET["ruta"] == "salir" ||
          $_GET["ruta"] == "categoria-plato"
        ) {
          include "modulos/" . $_GET["ruta"] . ".php";
        } else {
          include "modulos/404.php";
        }
      } else {
        include "modulos/principal.php";
      }
      ?>
    </div>
  <?php
  else:
    $_GET["rutaTemporal"] = "login";
    include "modulos/login.php";
  endif;

  $route = Utils::getScripts($_GET["ruta"], $_GET["rutaTemporal"]);
  ?>
  <script type="module" src="vista/js/<?= $route ?>.js"></script>
</body>

</html>