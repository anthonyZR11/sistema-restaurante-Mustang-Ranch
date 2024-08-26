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
  </section>
</div>