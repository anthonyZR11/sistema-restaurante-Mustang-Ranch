<?php 
require_once("controlador/controlador.plantilla.php");
require_once("controlador/controlador.usuario.php");
require_once("controlador/controlador.rol.php");
require_once("controlador/controlador.categoriaPlato.php");
require_once("controlador/controlador.plato.php");

require_once("modelo/modelo.usuario.php");
require_once("modelo/modelo.rol.php");
require_once("modelo/modelo.categoriaPlato.php");
require_once("modelo/modelo.plato.php");

$plantilla = new controladorPlantilla();
$plantilla -> ctrPlantilla();