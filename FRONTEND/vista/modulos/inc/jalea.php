<div class="row">                 
    <?php 
    $item = null;
    $valor = null;

    $platos = controladorPlatos::ctrMostrarPlatos($item, $valor);

    foreach ($platos as $key => $value) {
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