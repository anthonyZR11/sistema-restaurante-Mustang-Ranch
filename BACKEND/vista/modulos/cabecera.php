<header class="main-header">
  <a href="principal" class="logo">
    <span class="logo-mini"><b>M</b> Ra</span>
    <span class="logo-lg"><b>MUSTANG</b> Ranch</span>
  </a>

  <nav class="navbar navbar-static-top">
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="vista/img/img-plantilla/logo.jpg.jpg" class="user-image" alt="User Image">
            <span class="hidden-xs"><?php echo $_SESSION['name'] ?></span>
          </a>
          <ul class="dropdown-menu">
            <li class="user-header">
              <img src="vista/img/img-plantilla/logo.jpg.jpg" class="img-circle" alt="User Image">
              <p><?= $_SESSION['name'] ?></p>
            </li>
            <li class="user-footer">
              <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="pull-right">
                <a href="salir" class="btn btn-default btn-flat">Cerrar sesion</a>
              </div>
            </li>
          </ul>
        </li>
        <li>
          <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
        </li>
      </ul>
    </div>
  </nav>
</header>