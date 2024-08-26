<?php
if ($_SESSION["role_name"] == "INVITADO") {
  echo '<script>

    window.location = "principal";

  </script>';

  return;
}
?>
<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Usuarios
    </h1>

    <ol class="breadcrumb">
      <li><a href="principal"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active"><?php echo $_GET['ruta'] ?></li>
    </ol>
  </section>

  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <button class="btn btn-primary btn-flat btnNewUser" data-toggle="modal" data-target="#modalAgregarUsuario"><i
            class="fa fa-plus"></i>
          Nuevo
        </button>
      </div>
      <div class="box-body">
        <table id="table-users" class="table table-bordered table-striped dt-responsive tablas" width="100%">
          <thead>
            <tr>
              <th style="width:10px">#</th>
              <th>Nombre</th>
              <th>Usuario</th>
              <th>Perfil</th>
              <th>Estado</th>
              <th>Acciones</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </section>
</div>

<div id="modalAgregarUsuario" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header" style="background:#3c8dbc; color:white">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar usuario</h4>
      </div>
      <div class="modal-body">
        <div class="box-body">
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="text" class="form-control input-lg" name="nuevoNombre" id="name"
                placeholder="Ingresar nombre">
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-key"></i></span>
              <input type="text" class="form-control input-lg" name="nuevoNomUsuario" id="email"
                placeholder="Ingresar usuario" id="nuevoNomUsuario">
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-lock"></i></span>
              <input type="password" class="form-control input-lg" name="nuevoConUsuario" id="password"
                placeholder="Ingresar contraseña">
            </div>
          </div>

          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-users"></i></span>
              <select class="form-control input-lg" id="role" name="nuevoRol">
                <option value="" selected disabled>Selecionar Rol</option>
              </select>
            </div>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
        <button id="btnSaveUser" type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!-- <div id="modalEditarUsuario" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background:#3c8dbc; color:white">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar usuario</h4>
      </div>
      <div class="modal-body">
        <div class="box-body">
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>
            </div>
          </div>

          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-key"></i></span>
              <input type="text" class="form-control input-lg" id="editarNomUsuario" name="editarNomUsuario" value=""
                readonly>
            </div>
          </div>

          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-lock"></i></span>
              <input type="password" class="form-control input-lg" id="editarConUsuario" name="editarConUsuario"
                placeholder="Escriba la nueva contraseña">
            </div>
          </div>

          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-users"></i></span>
              <select class="form-control input-lg" id="editarRol" name="editarRol">
              </select>
            </div>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
        <button type="submit" id="btnEditarUsuario" class="btn btn-primary">Modificar usuario</button>
      </div>
      <?php
      // $editarUsuario = new controladorUsuarios();
      // $editarUsuario->ctrEditarUsuario();
      ?>
    </div>
  </div>
</div> -->

<?php
// $borrarUsuario = new controladorUsuarios();
// $borrarUsuario->ctrBorrarUsuario();
?>