<?php

require_once "../controlador/controlador.plato.php";
require_once "../modelo/modelo.plato.php";

class AjaxCatPlatos
{
  public $option;
  private $id;
  private $name;
  private $dishItem;
  private $urlPhoto;
  private $description;
  private $priceBase;
  private $priceDiscount;
  private $userId;

  public function __construct($data)
  {
    $this->option = $data['option'] ?? null;
    $this->id = $data['id'] ?? null;
    $this->name = $data['name'] ?? null;
    $this->dishItem = $data['dishItem'] ?? null;
    $this->urlPhoto = $data['urlPhoto'] ?? null;
    $this->description = $data['description'] ?? null;
    $this->priceBase = $data['priceBase'] ?? null;
    $this->priceDiscount = $data['priceDiscount'] ?? null;
    $this->userId = $data['userId'] ?? null;
  }

  public function loadDishes()
  {
    $respuesta = controladorPlatos::ctrMostrarPlatos();
    echo json_encode($respuesta);
  }
  public function createDish()
  {
    $data = [
      "name" => $this->name,
      "dishItem" => $this->dishItem,
      "urlPhoto" => $this->urlPhoto,
      "description" => $this->description,
      "priceBase" => $this->priceBase,
      "priceDiscount" => $this->priceDiscount,
      "userId" => $this->userId
    ];

    $respuesta = controladorPlatos::ctrCrearCatPlato($data);
    echo json_encode($respuesta);
  }
  public function updateDish()
  {
    $data = [
      "id" => $this->id,
      "name" => $this->name,
      "dishItem" => $this->dishItem,
      "urlPhoto" => $this->urlPhoto,
      "description" => $this->description,
      "priceBase" => $this->priceBase,
      "priceDiscount" => $this->priceDiscount,
      "userId" => $this->userId
    ];

    $respuesta = controladorPlatos::ctrEditarPlato($data);
    echo json_encode($respuesta);
  }
  public function deleteDish()
  {
    $id = $this->id;
    $respuesta = controladorPlatos::ctrBorrarCatPlato($id);
    echo json_encode($respuesta);
  }
  public function loadLastDish()
  {
    $respuesta = controladorPlatos::ctrLoadLastDish();
    echo json_encode($respuesta);
  }
  public function loadTopDish()
  {
    $respuesta = controladorPlatos::ctrLoadTopDish();
    echo json_encode($respuesta);
  }
}

$ajaxDish = (isset($_POST['option']))
  ? new AjaxCatPlatos($_POST)
  : null;

switch ($ajaxDish->option) {
  case 'loadDishes':
    $ajaxDish->loadDishes();
    break;
  case 'createDish':
    $ajaxDish->createDish();
    break;
  case 'updateDish':
    $ajaxDish->updateDish();
    break;
  case 'deleteDish':
    $ajaxDish->deleteDish();
    break;
  case 'loadLastDish':
    $ajaxDish->loadLastDish();
    break;
  case 'loadTopDish':
    $ajaxDish->loadTopDish();
    break;
}
