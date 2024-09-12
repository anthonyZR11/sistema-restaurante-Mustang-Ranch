<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Categoria Platos
    </h1>
    <ol class="breadcrumb">
      <li><a href="principal"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active"> <?php echo $_GET['ruta'] ?></li>
    </ol>
  </section>
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <button class="btn btn-primary btn-flat" data-toggle="modal" id="btnNewDish"> <i class="fa fa-plus"></i>
          Nuevo
        </button>
      </div>
      <div class="box-body">
        <table class="table table-bordered table-striped dt-responsive" id="tableCategoryDish" width="100%">
          <thead>
            <tr>
              <th style="width:10px">#</th>
              <th>Categoria menu</th>
              <th>Acciones</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </section>
</div>

<div id="modalAgregarCatPlato" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Categoria de plato</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                <input type="text" class="form-control input-lg" name="nuevoCatPlato" id="name" placeholder="Nueva categoria" required>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button id="btnSave" type="button" class="btn btn-primary">Guardar Categoria</button>
        </div>
      </form>
    </div>
  </div>
</div>