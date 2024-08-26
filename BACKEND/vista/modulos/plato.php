<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar plato
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="principal"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active"> <?php echo $_GET['ruta'] ?></li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary btn-flat" data-toggle="modal" data-target="#modalAgregarPlato"> <i class="fa fa-plus"></i>
          
          Nuevo

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
          <thead>
           
           <tr>
             
             <th style="width:10px">#</th>
             <th>Nombre Plato</th>
             <th>Categoria</th>
             <th style="width: 40px;">Foto</th>
             <th>Descripcion</th>
             <th>Precio</th>
             <th style="width: 170px;">Acciones</th>
            <?php //  if($_SESSION["rol"] == "ADMINISTRADOR" || $_SESSION["rol"] == "EDITOR"){ 
             echo '';
           // }
              ?>
           </tr> 

          </thead>

          <tbody>

            <?php

            $item = null;
            $valor = null;

            $platos = controladorPlatos::ctrMostrarPlatos($item, $valor);

            foreach ($platos as $key => $value) {
             
              echo ' <tr>

                      <td>'.($key+1).'</td>

                      <td class="text-uppercase">'.$value["nomPlato"].'</td>
                      <td class="text-uppercase">'.$value["nomCatPlato"].'</td>';

                  if($value["fotoPlato"] != ""){

                    echo '<td><img src="'.$value["fotoPlato"].'" class="img-thumbnail" width="50px"></td>';

                  }else{

                    echo '<td><img src="vista/img/img-plantilla/plato.png" class="img-thumbnail" width="50px"></td>';

                  }
                    echo' <td class="text-uppercase descPlato">'.$value["descPlato"].'</td>
                      <td class="text-uppercase">S/. '.number_format($value["precPlatoBase"], 2, ',', '.').'</td>
                      <td style="text-align: center;">

                        <div class="btn-group">';

                        if($_SESSION["rol"] == "ADMINISTRADOR" || $_SESSION["rol"] == "EDITOR"){

                        echo '<button class="btn btn-warning  btn-flat btnEditarPlato" idPlato="'.$value["idPlato"].'" data-toggle="modal" data-target="#modalEditarPlato"><i class="fa fa-edit"></i> Editar</button>';
                        }else{
                          echo 'Este rol no tiene privilegios';
                        }

                          if($_SESSION["rol"] == "ADMINISTRADOR"){

                            echo '<button class="btn btn-danger   btn-flat btnEliminarPlato" fotoPlato="'.$value["fotoPlato"].'" idPlato="'.$value["idPlato"].'"><i class="fa fa-times"></i> Eliminar</button>';

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

<div id="modalAgregarPlato" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Plato</h4>

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

                <input type="text" class="form-control input-lg" name="nuevoNomPlato" placeholder="Ingresar nombre del plato..." required>

              </div>

            </div>

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="nuevoCatPlato">
                  
                  <option value="">Selecionar Rol</option>

                   <?php

                       $item = null;
                       $valor = null;

                         $catPlatos = ControladorCatPlatos::ctrMostrarCatPlatos($item, $valor);

                         foreach ($catPlatos as $key => $value) {
                        
                        echo '<option value="'.$value["idCatPlato"].'">'.$value["nomCatPlato"].'</option>';
                      }

                     ?>

                </select>

              </div>

            </div>

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoDescPlato" placeholder="Ingresar descripcion..." required>

              </div>

            </div>

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="number" class="form-control input-lg" step="any" name="nuevoPrecio" placeholder="0.00" required>

              </div>

            </div>

            <div class="form-group">
              
              <div class="panel">SUBIR FOTO</div>

              <input type="file" class="nuevaFoto" name="fotito">

              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="vista/img/img-plantilla/plato.png" class="img-thumbnail previsualizarEditar" width="100px">

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Plato</button>

        </div>

         <?php

          $crearPlatos = new controladorPlatos();
           $crearPlatos -> ctrIngresoPlato();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR rol
======================================-->

<div id="modalEditarPlato" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Plato</h4>

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

                <input type="text" class="form-control input-lg" name="editarNomPlato" id="editarNomPlato" required>
                <input type="text" class="form-control input-lg" name="idPlato" id="idPlato" readonly>

              </div>

            </div>

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="cat">
                  
                  <option value="" id="editarCatPlato" disabled></option>

                   <?php

                       $item = null;
                       $valor = null;

                         $catPlatos = ControladorCatPlatos::ctrMostrarCatPlatos($item, $valor);

                         foreach ($catPlatos as $key => $value) {
                        
                        echo '<option value="'.$value["idCatPlato"].'">'.$value["nomCatPlato"].'</option>';
                      }

                     ?>

                </select>

              </div>

            </div>

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="editarDescPlato" id="editarDescPlato" required>

              </div>

            </div>

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="number" class="form-control input-lg" step="any" name="editarPrecio" id="editarPrecio"  required>

              </div>

            </div>

            <div class="form-group">
              
              <div class="panel">SUBIR FOTO</div>

              <input type="file" class="nuevaFoto" name="editarFotoPlato">

              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="vista/img/img-plantilla/plato.png" class="img-thumbnail previsualizarEditar" width="100px">
              <input type="text" name="fotoActual" id="fotoActual">

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

          $editarPlatos = new controladorPlatos();
          $editarPlatos -> ctrEditarPlato();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

   $borrarRoles = new controladorPlatos();
   $borrarRoles -> ctrBorrarPlato();

?>



