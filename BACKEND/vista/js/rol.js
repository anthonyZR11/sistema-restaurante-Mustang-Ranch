import { rowDataInDifferentScreen, handleActions, Toast } from './utils/util.js'
import { validateField } from './utils/validate.js'

$(document).ready(function (e) {
  const tableRoleId = $('#table-role')
  const url = 'ajax/ajax.rol.php'
  const btnSaveRol = $('#btnSaveRol')
  const nameRol = $('#name')

  const tableRole = tableRoleId.DataTable({
    ajax: {
      method: 'POST',
      url,
      data: {
        option: 'loadRoles'
      },
      dataSrc: ''
    },
    columns: [
      { data: 'id' },
      { data: 'name' },
      {
        data: null,
        render: function (data) {
          return handleActions({
            row: data,
            classButtonEdit: 'btnEditarRol',
            classButtonDelete: 'btnEliminarRol'
          })
        }
      }
    ]
  })

  $(document).on('click', '.btnNewrRol', function () {
    $('#modalAgregarRol').modal('show')

    nameRol.removeClass('input-error')
    $('.error-message').remove()

    nameRol.val('')
    btnSaveRol.removeAttr('data-id')
    btnSaveRol.removeAttr('data-action')
  })

  btnSaveRol.on('click', function () {
    let isValid = true
    const id = $(this).attr('data-id') ?? 0
    const option = $(this).attr('data-action') ?? 'insertRole'

    isValid = validateField(nameRol)

    if (isValid) {
      if (nameRol.val() !== '') {
        $.ajax({
          url,
          method: 'POST',
          data: {
            ...(id ? { id } : {}),
            option,
            name: nameRol.val()
          },
          dataType: 'json',
          success: function (respuesta) {
            const { status_code: statusCode, status, message } = respuesta

            if (statusCode === 200) {
              $('#modalAgregarRol').modal('hide')
              tableRole.ajax.reload()
            }

            Toast.fire({
              icon: status,
              title: message
            })
          }
        })
      }
    }
  })

  $(document).on('click', '.btnEditarRol', function () {
    nameRol.removeClass('input-error')
    $('.error-message').remove()

    $('#modalAgregarRol').modal('show')
    const tr = $(this).closest('tr')
    const data = rowDataInDifferentScreen(tableRole, tr)
    btnSaveRol.attr('data-id', data.id)
    btnSaveRol.attr('data-action', 'updateRole')
    nameRol.val(data.name)
  })

  $('.tablas').on('click', '.btnEliminarRol', function () {
    const tr = $(this).closest('tr')
    const data = rowDataInDifferentScreen(tableRole, tr)
    const id = data.id

    Swal.fire({
      title: '¿Está seguro?',
      text: '¡Esta acción no se podra revertir',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, eliminar'
    }).then(function (result) {
      console.log(result)
      if (result.isConfirmed) {
        $.ajax({
          url,
          method: 'POST',
          dataType: 'json',
          data: {
            id,
            option: 'deleteRole'
          },
          success: function (response) {
            const { status_code: statusCode, status, message } = response

            if (statusCode === 200) {
              $('#modalAgregarRol').modal('hide')
              tableRole.ajax.reload()
            }
            Toast.fire({
              icon: status,
              text: message
            })
          }
        })
      }
    })
  })
})
