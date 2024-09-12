import { validateField } from './utils/validate.js'
import { handleActions, rowDataInDifferentScreen } from './utils/util.js'

$(document).ready(function (e) {
  const name = $('#name')
  const modalDish = $('#modalAgregarCatPlato')
  const btnSaveDish = $('#btnSave')
  const url = 'ajax/ajax.categoria-plato.php'
  const tableCategoryDishId = $('#tableCategoryDish')

  const tableCategoryDish = tableCategoryDishId.DataTable({
    ajax: {
      method: 'POST',
      url,
      data: {
        option: 'loadCategoryDishes'
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
            classButtonEdit: 'btnEditarCategoryDish',
            classButtonDelete: 'btnEliminarCategoryDish'
          })
        }
      }
    ]
  })

  $('#btnNewDish').on('click', function () {
    modalDish.modal('show')
    name.val('')
  })

  btnSaveDish.on('click', function () {
    let isValid = true
    const id = $(this).attr('data-id') ?? 0
    const option = $(this).attr('data-action') ?? 'createCategoryDish'

    isValid = validateField(name)

    if (isValid) {
      $.ajax({
        url,
        method: 'POST',
        data: {
          ...(id ? { id } : {}),
          option,
          name: name.val()
        },
        dataType: 'json',
        success: function (respuesta) {
          const { status_code: statusCode, status, message } = respuesta

          if (statusCode === 200) {
            $('#modalAgregarRol').modal('hide')
            tableCategoryDish.ajax.reload()
          }

          Toast.fire({
            icon: status,
            title: message
          })
        }
      })
    }
  })

  $(document).on('click', '.btnEditarCategoryDish', function () {
    modalDish.modal('show')

    const tr = $(this).closest('tr')
    const data = rowDataInDifferentScreen(tableCategoryDish, tr)
    const id = data.id

    name.val(data.name)
    btnSaveDish.attr('data-id', id)
    btnSaveDish.attr('data-action', 'updateCategoryDish')

    $.ajax({
      url,
      method: 'POST',
      data: {
        option: 'updateCategoryDish',
        id,
        name: name.val()
      },
      dataType: 'json',
      success: function (respuesta) {
        console.log(respuesta)
      }

    })
  })

  $('.btnEliminarCategoryDish').on('click', function () {
    const idCatPlato = $(this).attr('idCatPlato')

    Swal.fire({
      title: '¿Está seguro de borrar?',
      text: '¡Elimnar esta categoria de plato!',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar categoria de plato!'
    }).then(function (result) {
      if (result.value) {
        window.location = 'index.php?ruta=categoria-plato&idCatPlato=' + idCatPlato
      }
    })
  })
})
