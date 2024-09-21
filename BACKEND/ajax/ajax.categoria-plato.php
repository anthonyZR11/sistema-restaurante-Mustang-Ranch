<?php

require_once "../controlador/controlador.categoriaPlato.php";
require_once "../modelo/modelo.categoriaPlato.php";

class AjaxCatPlatos
{
  private $id;
  private $name;
  public $option;

  public function __construct($data)
  {
    $this->id = $data['id'] ?? null;
    $this->name = $data['name'] ?? null;
    $this->option = $data['option'] ?? null;
  }

  public function loadCategoryDishes()
  {
    $respuesta = ControladorCatPlatos::ctrMostrarCatPlatos();
    echo json_encode($respuesta);
  }
  public function createCategoryDish()
  {
    $name = $this->name;
    $respuesta = ControladorCatPlatos::ctrCrearCatPlato($name);
    echo json_encode($respuesta);
  }
  public function updateCategoryDish()
  {
    $data = [
      "id" => $this->id,
      "name" => $this->name,
    ];
    $respuesta = ControladorCatPlatos::ctrEditarCatPlato($data);
    echo json_encode($respuesta);
  }
  public function deleteCategoryDish()
  {
    $id = $this->id;
    $respuesta = ControladorCatPlatos::ctrBorrarCatPlato($id);
    echo json_encode($respuesta);
  }
}

$ajaxCategoryDish = (isset($_POST['option']))
  ? new AjaxCatPlatos($_POST)
  : null;

switch ($ajaxCategoryDish->option) {
  case 'loadCategoryDishes':
    $ajaxCategoryDish->loadCategoryDishes();
    break;
  case 'createCategoryDish':
    $ajaxCategoryDish->createCategoryDish();
    break;
  case 'updateCategoryDish':
    $ajaxCategoryDish->updateCategoryDish();
    break;
  case 'deleteCategoryDish':
    $ajaxCategoryDish->deleteCategoryDish();
    break;
}
