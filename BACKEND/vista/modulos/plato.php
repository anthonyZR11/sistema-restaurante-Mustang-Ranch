<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Administrar plato
    </h1>
    <ol class="breadcrumb">
      <li><a href="principal"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active"> <?= $_GET['ruta'] ?></li>
    </ol>
  </section>
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <button id="btnNewDish" class="btn btn-primary btn-flat" data-toggle="modal"> <i class="fa fa-plus"></i>
          Nuevo
        </button>
      </div>
      <div class="box-body">
        <table id="tableDish" class="table table-bordered table-striped dt-responsive tablas" width="100%">
          <thead>
            <tr>
              <th style="width:10px">#</th>
              <th>Nombre Plato</th>
              <th>Categoria</th>
              <th>Descripcion</th>
              <th style="width: 40px;">Foto</th>
              <th>Precio base</th>
              <th>Precio descuento</th>
              <th style="width: 170px;">Acciones</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </section>
</div>
<div id="modalAgregarPlato" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Plato</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                <input id="name" type="text" class="form-control input-lg" name="nuevoNomPlato" placeholder="Ingresar nombre del plato..." required>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                <select class="form-control input-lg" id="dishItems">
                  <option value="" selected disabled>Selecionar Rol</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                <input type="text" class="form-control input-lg" name="nuevoDescPlato" id="description" placeholder="Ingresar descripcion..." required>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                <input type="url" class="form-control input-lg" name="urlPhoto" id="urlPhoto" placeholder="url de la foto" required>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                <input type="number" class="form-control input-lg" step="any" name="nuevoPrecio" id="priceBase" placeholder="0.00" required>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                <input type="number" class="form-control input-lg" step="any" name="nuevoPrecio" id="priceDiscount" placeholder="0.00" required>
              </div>
            </div>
            <input type="password" hidden readonly name="userId" id="userId" value="<?= $_SESSION['user_id'] ?>">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button id="btnSaveDish" type="button" class="btn btn-primary">Guardar Plato</button>
        </div>
      </form>
    </div>
  </div>
</div>