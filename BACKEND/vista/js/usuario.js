import { handleStatusChange, validateForm, Toast, rowDataInDifferentScreen } from './utils/util.js'

$(document).ready(function () {
  const url = 'ajax/ajax.usuario.php'
  const tableUserId = $('#table-users')
  const btnSaveUser = $('#btnSaveUser')
  const name = document.getElementById('name')
  const email = document.getElementById('email')
  const password = document.getElementById('password')
  const role = document.getElementById('role')

  const tableUser = tableUserId.DataTable({
    ajax: {
      method: 'POST',
      url,
      data: {
        option: 'loadUsers'
      },
      dataSrc: ''
    },
    columns: [
      { data: 'id' },
      { data: 'name' },
      { data: 'email' },
      { data: 'role_name' },
      {
        data: 'status',
        render: function (_data, _display, row) {
          return handleStatusChange({
            row,
            classButton: 'btnCambioEstadoUsuario',
            attribute: 'idUsuario'
          })
        }
      },
      {
        data: null,
        render: function (data) {
          return `<button class="btn btn-warning btn-flat btnEditarUsuario" idUsuario="${data.id}">
              <i class="fa fa-pencil"></i>
            </button>
            <button class="btn btn-danger btn-flat btnEliminarUsuario" idUsuario="${data.id}">
              <i class="fa fa-trash"></i>
            </button>`
        }
      }
    ]
  })

  $(document).on('click', '.btnNewUser', function () {
    $('#modalAgregarUsuario').modal('show')

    name.value = ''
    email.value = ''
    password.value = ''
    role.value = ''

    btnSaveUser.removeAttr('data-id')
    btnSaveUser.removeAttr('data-action')
  })

  $.ajax({
    url: 'ajax/ajax.rol.php',
    method: 'POST',
    dataType: 'json',
    data: {
      option: 'loadRoles'
    },
    success: function (respuesta) {
      respuesta.forEach(option => {
        const opt = document.createElement('option')
        opt.value = option.id
        opt.textContent = option.name
        role.appendChild(opt)
      })
    }
  })

  btnSaveUser.on('click', function (e) {
    const id = $(this).attr('data-id') ?? 0
    const option = $(this).attr('data-action') ?? 'insertUser'

    const name = $('#name').val()
    const email = $('#email').val()
    const password = $('#password').val()
    const role = $('#role').val()

    const elements = {
      name,
      email,
      password,
      role
    }

    validateForm(elements)

    $.ajax({
      url: 'ajax/ajax.usuario.php',
      method: 'POST',
      dataType: 'json',
      data: {
        ...(id ? { id } : {}),
        name,
        email,
        password,
        role,
        option
      },
      success: function (respuesta) {
        const { status_code: statusCode, status, message } = respuesta

        if (statusCode === 200) {
          Toast.fire({
            icon: status,
            title: message
          })
          $('#modalAgregarUsuario').modal('hide')
          tableUser.ajax.reload()
        } else {
          Toast.fire({
            icon: status,
            title: message
          })
        }
      }
    })
  })

  $(document).on('click', '.btnEditarUsuario', function () {
    $('#modalAgregarUsuario').modal('show')

    const tr = $(this).closest('tr')
    const data = rowDataInDifferentScreen(tableUser, tr)
    btnSaveUser.attr('data-id', data.id)
    btnSaveUser.attr('data-action', 'updateUser')

    $('#name').val(data.name)
    $('#email').val(data.email)
    $('#password').val()
    $('#role').val(data.role_id)
  })

  $(document).on('click', '.btnCambioEstadoUsuario', function () {
    const tr = $(this).closest('tr')
    const data = rowDataInDifferentScreen(tableUser, tr)
    const id = data.id
    const status = (+data.status === 1) ? 0 : 1

    $.ajax({
      url: 'ajax/ajax.usuario.php',
      method: 'POST',
      dataType: 'json',
      data: {
        id,
        status,
        option: 'changeStatusUser'
      },

      success: function (respuesta) {
        const { status_code: statusCode, status, message } = respuesta
        if (statusCode === 200) {
          Toast.fire({
            icon: status,
            title: message
          })
          tableUser.ajax.reload()
        } else {
          Toast.fire({
            icon: status,
            title: message
          })
        }
      }

    })
  })

  /* =============================================
  REVISAR SI EL USUARIO YA ESTÁ REGISTRADO
  ============================================= */

  $('#nuevoNomUsuario').change(function () {
    $('.alert').remove()

    const nomUsuario = $(this).val()

    const datos = new FormData()
    datos.append('validarUsuario', nomUsuario)

    $.ajax({
      url: 'ajax/ajax.usuario.php',
      method: 'POST',
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: 'json',
      success: function (respuesta) {
        if (respuesta) {
          $('#nuevoNomUsuario').parent().after('<div class="alert alert-warning">Este usuario ya existe en la base de datos</div>')

          $('#nuevoNomUsuario').val('')
        }
      }

    })
  })

  $(document).on('click', '.btnEliminarUsuario', function () {
    const idUsuario = $(this).attr('idUsuario')
    const fotoUsuario = $(this).attr('fotoUsuario')
    const nomUsuario = $(this).attr('nomUsuario')

    Swal.fire({
      title: '¿Está seguro de borrar el usuario?',
      text: '¡Si no lo está puede cancelar la accíón!',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar usuario!'
    }).then(function (result) {
      if (result.value) {
        window.location = 'index.php?ruta=usuario&idUsuario=' + idUsuario + '&nomUsuario=' + nomUsuario + '&fotoUsuario=' + fotoUsuario
      }
    })
  })
})
