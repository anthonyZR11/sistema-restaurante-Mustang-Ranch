<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Roles de usuario
    </h1>
    <ol class="breadcrumb">
      <li><a href="principal"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active"> <?php echo $_GET['ruta'] ?></li>
    </ol>
  </section>
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <button class="btn btn-primary btn-flat btnNewrRol" data-toggle="modal">
          <i class="fa fa-plus"></i>
          Nuevo
        </button>
      </div>
      <div class="box-body">
        <table class="table table-bordered table-striped dt-responsive tablas" id="table-role" width="100%">
          <thead>
            <tr>
              <th style="width:10px">#</th>
              <th>Nombre de Rol</th>
              <th>Acciones</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </section>
</div>

<div id="modalAgregarRol" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form">
        <div class=" modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar rol</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                <input type="text" class="form-control input-lg" id="name" name="nuevoRol" placeholder="Ingresar rol"
                  required>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="button" class="btn btn-primary" id="btnSaveRol">Guardar rol</button>
        </div>
      </form>
    </div>
  </div>
</div>