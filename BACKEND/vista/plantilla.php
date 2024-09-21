<?php
ob_start();
session_start();
$inactive = 60;
if (isset($_SESSION["sigin"]) && $_SESSION["sigin"] == "ok") {
  // if (isset($_SESSION['last_activity'])) {
  //   $session_lifetime = time() - $_SESSION['last_activity'];

  //   if ($session_lifetime > $inactive) {
  //     session_unset();
  //     session_destroy();
  //     setcookie(session_name(), '', time() - 3600, '/');
  //     echo '<script>
  //       alert("Tu sesión ha expirado. Serás redirigido al login.");
  //       window.location = "login";
  //     </script>';
  //     exit();
  //   }
  // }

  $_SESSION['last_activity'] = time();
}
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
  <link rel="stylesheet" href="vista/css/validate.css">
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
  <link rel="stylesheet" href="vista/dist/css/sweetalert2.css">
  <script src="vista/dist/js/sweetalert2.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
</head>

<!--=====================================
CUERPO DOCUMENTO
======================================-->

<body class="hold-transition skin-black sidebar-mini">
  <?php
  $_GET["rutaTemporal"] = null;
  $ruta = $_GET["ruta"] ?? null;

  if (isset($_SESSION["sigin"]) && $_SESSION["sigin"] == "ok"):

    if ($ruta === "login") {
      header('Location: principal');
    }


  ?>

    <div class="wrapper">
      <?php
      include "modulos/cabecera.php";
      include "modulos/menu.php";

      if ($ruta) {
        if (
          $ruta == "principal" ||
          $ruta == "usuario" ||
          $ruta == "rol" ||
          $ruta == "plato" ||
          $ruta == "salir" ||
          $ruta == "categoria-plato"
        ) {
          include "modulos/" . $ruta . ".php";
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
  $route = Utils::getScripts($ruta, $_GET["rutaTemporal"]);


  if ($route) {
    echo "<script type='module' src='vista/js/$route.js'></script>";
  }
  ob_end_flush();
  ?>
</body>

</html>