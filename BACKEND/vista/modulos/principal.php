<?php

$item = null;
$valor = null;

$usuarios = controladorUsuarios::ctrMostrarUsuarios($item, $valor);
$usuarios = count($usuarios);

$roles = controladorRoles::ctrMostrarRoles($item, $valor);
$roles = count($roles);

$catPlatos = ControladorCatPlatos::ctrMostrarCatPlatos($item, $valor);
$catPlatos = count($catPlatos);

$platos = controladorPlatos::ctrMostrarPlatos($item, $valor);
$platos = count($platos);


?>
<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-lg-3">
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3><?php echo number_format($usuarios); ?></h3>
            <p>Usuarios</p>
          </div>
          <div class="icon">
            <i class="ion-android-people"></i>
          </div>
          <a href="usuario" class="small-box-footer">
            Más info <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <div class="col-lg-3">
        <div class="small-box bg-orange-active">
          <div class="inner">
            <h3><?php echo number_format($roles); ?></h3>
            <p>Roles</p>
          </div>
          <div class="icon">
            <i class="ion ion-ios-cog"></i>
          </div>
          <a href="rol" class="small-box-footer">
            Más info <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <div class="col-lg-3">
        <div class="small-box bg-teal">
          <div class="inner">
            <h3><?php echo number_format($catPlatos); ?></h3>
            <p>Categoria Platos</p>
          </div>
          <div class="icon">
            <i class="ion ion-ios-cog"></i>
          </div>
          <a href="rol" class="small-box-footer">
            Más info <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <div class="col-lg-3">
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3><?php echo number_format($platos); ?></h3>
            <p>Platos</p>
          </div>
          <div class="icon">
            <i class="fa fa-cutlery" aria-hidden="true"></i>
          </div>
          <a href="rol" class="small-box-footer">
            Más info <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="mt-5 col-lg-6">
        <div class="card">
          <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0" style="padding: .8rem;">Platos Agregados Recientemente</h5>
          </div>
          <div class="card-body">
            <ul class="list-group" id="lastDish">
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Sin datos
              </li>
            </ul>
          </div>
          <div class="card-footer text-muted text-right">
            Últimos 10 platos
          </div>
        </div>
      </div>
      <div class="mt-5 col-lg-6">
        <div class="card">
          <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0" style="padding: .8rem;">Platos bandera</h5>
          </div>
          <div class="card-body">
            <ul class="list-group" id="topDish">
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Sin datos
              </li>
            </ul>
          </div>
          <div class="card-footer text-muted text-right">
            Top 10 platos bandera
          </div>
        </div>
      </div>
    </div>
  </section>
</div>