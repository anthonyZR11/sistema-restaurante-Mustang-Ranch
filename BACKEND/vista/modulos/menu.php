<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <img src="vista/img/img-plantilla/logo.jpg.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?= (isset($_SESSION['name'])) ? $_SESSION['name'] : '' ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MENU DE NAVEGACION</li>
      <li class="active">
        <a href="principal">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      <li>
        <a href="usuario">
          <i class="fa fa-user"></i> <span>Usuario</span>
        </a>
      </li>
      <li>
        <a href="rol">
          <i class="fa fa-user"></i> <span>Rol</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-files-o"></i>
          <span>Carta de menu</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="categoria-plato"><i class="fa fa-circle-o"></i>Nuevo categoria</a></li>
          <li><a href="plato"><i class="fa fa-circle-o"></i>Nuevo Plato</a></li>
        </ul>
      </li>
    </ul>
  </section>
</aside>