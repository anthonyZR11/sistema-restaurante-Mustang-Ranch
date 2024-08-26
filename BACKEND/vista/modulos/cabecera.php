<header class="main-header">
  <!-- Logo -->
  <a href="principal" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>M</b> Ra</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>MUSTANG</b> Ranch</span>
  </a>

  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">

        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <!-- <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
            <span class="hidden-xs"><?php echo $_SESSION['name'] ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="vista/img/img-plantilla/logo.jpg.jpg" class="img-circle" alt="User Image">

              <p>
                <?php echo $_SESSION['name'] . ' - ' . $_SESSION['role_id'];
                $ano = $_SESSION['created_at'];
                $mes = $_SESSION['created_at'];
                ?>
                <small>usuario desde
                  <?php echo date('M', strtotime($mes)) . '. ' . date('Y', strtotime($ano)); ?></small>
              </p>
            </li>
            <!-- Menu Body -->
            <li class="user-body">
              <div class="row">
                <div class="col-xs-4 text-center">
                  <a href="#">Followers</a>
                </div>
                <div class="col-xs-4 text-center">
                  <a href="#">Sales</a>
                </div>
                <div class="col-xs-4 text-center">
                  <a href="#">Friends</a>
                </div>
              </div>
              <!-- /.row -->
            </li>
            <!-- Menu Footer-->
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
        <!-- Control Sidebar Toggle Button -->
        <li>
          <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
        </li>
      </ul>
    </div>
  </nav>
</header>