<?php
$item = "slug";
$valor = $_GET['ruta'];
$categoria = ControladorCatPlatos::ctrMostrarCatPlatos($item, $valor);

$item = "dish_item_id";
$valor = $categoria['id'];
$platos = controladorPlatos::ctrMostrarPlatos($item, $valor);
?>

<section class="container-fluid">
  <div class="row">
    <?php
    if ($platos) {
      foreach ($platos as $key => $value):
    ?>
        <div class="col-12 col-md-4">
          <div class="menu-item">
            <div class="img-holder">
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRbR3IATt46jQws-6HXvDqSMFoGX9zmUagJGQ&s"
                alt="imagen">
              <!-- <img src="../BACKEND/ $value["image"] ?>" alt="imagen"> -->
            </div>
            <div class="info">
              <h5 class="title"><?= $value["name"] ?></h5>
              <div class="prices">
                <span class="price-base">S/. <?= $value["price_base"] ?></span>
                <span class="price-discount">S/. <?= $value["price_discount"] ?></span>
              </div>
            </div>
          </div>
        </div>
      <?php
      endforeach;
      ?>
  </div>
<?php
    } else {
      include_once __DIR__ . '/../components/sin_platos.php';
    }
?>
</section>