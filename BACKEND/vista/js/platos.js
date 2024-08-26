$('.nuevaFoto').change(function () {
  const imagen = this.files[0]

  if (imagen.type != 'image/jpeg' && imagen.type != 'image/png') {
    $('.nuevaFoto').val('')

    swal({
      title: 'Error al subir la imagen',
      text: '¡La imagen debe estar en formato JPG o PNG!',
      type: 'error',
      confirmButtonText: '¡Cerrar!'
    })
  } else if (imagen.size > 2000000) {
    $('.nuevaFoto').val('')

    swal({
      title: 'Error al subir la imagen',
      text: '¡La imagen no debe pesar más de 2MB!',
      type: 'error',
      confirmButtonText: '¡Cerrar!'
    })
  } else {
    const datosImagen = new FileReader()
    datosImagen.readAsDataURL(imagen)

    $(datosImagen).on('load', function (event) {
      const rutaImagen = event.target.result
      $('.previsualizarEditar').attr('src', rutaImagen)
    })
  }
})

$('.tablas').on('click', '.btnEditarPlato', function () {
  const idPlato = $(this).attr('idPlato')
  const datos = new FormData()
  datos.append('idPlato', idPlato)

  $.ajax({
    url: 'ajax/ajax.plato.php',
    method: 'POST',
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: 'json',
    success: function (respuesta) {
      $('#editarNomPlato').val(respuesta.nomPlato)
      $('#idPlato').val(respuesta.idPlato)
      $('#editarCatPlato').val(respuesta.idCatPlato)
      $('#editarCatPlato').html(respuesta.nomCatPlato)
      $('#editarDescPlato').val(respuesta.descPlato)
      $('#editarPrecio').val(respuesta.precPlatoBase)
      $('#fotoActual').val(respuesta.fotoPlato)

      if (respuesta.fotoUsuario != '') {
        $('.previsualizarEditar').attr('src', respuesta.fotoPlato)
      } else {
        $('.previsualizarEditar').attr('src', 'vista/img/img-plantilla/plato.png')
      }
    }

  })
})

/* =============================================
ELIMINAR CATEGORIA
============================================= */
$('.tablas').on('click', '.btnEliminarPlato', function () {
  const idPlato = $(this).attr('idPlato')
  console.log('idPlato', idPlato)
  const fotoPlato = $(this).attr('fotoPlato')
  console.log('fotoPlato', fotoPlato)

  swal({
    title: '¿Está seguro de borrar?',
    text: '¡Elimnar este Plato!',
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Si, borrar Plato !'
  }).then(function (result) {
    if (result.value) {
      window.location = 'index.php?ruta=plato&idPlato=' + idPlato + '&fotoPlato=' + fotoPlato
    }
  })
})
