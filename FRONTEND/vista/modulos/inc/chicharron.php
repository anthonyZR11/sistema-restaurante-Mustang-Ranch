<div class="row">                 
    <?php 


    require_once("controlador/controlador.plato.php");
require_once("modelo/modelo.plato.php");
    $item = null;
    $valor = null;

    $platos2 = controladorPlatos::ctrMostrarPlatos($item, $valor);

    foreach ($platos2 as $key => $value) {
       echo '<div class="col-md-6 mb-4">
            <a href="javascrip:void(0)" class="custom-list">
                <div class="img-holder">
                    <img src="vista/img/img-platos/cevi-pes.webp" alt="imagen">
                </div>
                <div class="info">
                    <div class="head clearfix">
                        <h5 class="title float-left">'.$value["nomPlato"].'</h5>
                        <p class="float-right text-primary">S/. '.$value["precPlatoBase"].'</p>
                    </div>
                    <div class="body">
                        <p>'.$value["descPlato"].'</p>
                    </div>
                </div>
            </a>
        </div>';
     }
     ?>  
</div>  