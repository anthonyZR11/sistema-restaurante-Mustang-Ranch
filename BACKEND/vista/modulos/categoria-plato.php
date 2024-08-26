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
  
        <button class="btn btn-primary btn-flat" data-toggle="modal" data-target="#modalAgregarCatPlato"> <i class="fa fa-plus"></i>
          
          Nuevo

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
          <thead>
           
           <tr>
             
             <th style="width:10px">#</th>
             <th>Nombre de Rol</th>
             <th>Acciones</th>
           </tr> 

          </thead>

          <tbody>

            <?php

            $item = null;
            $valor = null;

            $catPlatos = ControladorCatPlatos::ctrMostrarCatPlatos($item, $valor);

            foreach ($catPlatos as $key => $value) {
             
              echo ' <tr>

                      <td>'.($key+1).'</td>

                      <td class="text-uppercase">'.$value["nomCatPlato"].'</td>

                      <td>

                        <div class="btn-group">';

                        if($_SESSION["rol"] == "ADMINISTRADOR" || $_SESSION["rol"] == "EDITOR"){

                        echo '<button class="btn btn-warning  btn-flat btnEditarCatPlato" idCatPlato="'.$value["idCatPlato"].'" data-toggle="modal" data-target="#modalEditarCatPlato"><i class="fa fa-edit"></i> Editar</button>';
                        }else{
                          echo 'Este rol no tiene privilegios';
                        }

                          if($_SESSION["rol"] == "ADMINISTRADOR"){

                            echo '<button class="btn btn-danger   btn-flat btnEliminarCatPlato" idCatPlato="'.$value["idCatPlato"].'"><i class="fa fa-times"></i> Eliminar</button>';

                          }

                        echo '</div>  

                      </td>

                    </tr>';
            }

          ?>

          </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR USUARIO
======================================-->

<div id="modalAgregarCatPlato" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Categoria de plato</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoCatPlato" placeholder="Ingresar nombre de categoria del plato" required>

              </div>

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Categoria Plato</button>

        </div>

         <?php

          $crearCatPlatos = new ControladorCatPlatos();
          $crearCatPlatos -> ctrCrearCatPlato();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR rol
======================================-->

<div id="modalEditarCatPlato" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar categoria del Plato</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="editarCatPlato" id="editarCatPlato" required>

                 <input type="hidden"  name="idCatPlato" id="idCatPlato" required>

              </div>

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

      <?php

          $editarCatPlatos = new ControladorCatPlatos();
          $editarCatPlatos -> ctrEditarCatPlato();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

   $borrarCatPlatos = new ControladorCatPlatos();
   $borrarCatPlatos -> ctrBorrarCatPlato();

?>



