import { handleActions, rowDataInDifferentScreen, Toast } from './utils/util.js'
import { validateField } from './utils/validate.js'

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

    btnSaveDish.removeAttr('data-id')
    btnSaveDish.removeAttr('data-action')
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
          console.log(statusCode, status, message)
          if (+statusCode === 200) {
            $('#modalAgregarCatPlato').modal('hide')
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
  })

  $(document).on('click', '.btnEliminarCategoryDish', function () {
    const tr = $(this).closest('tr')
    const data = rowDataInDifferentScreen(tableCategoryDish, tr)
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
            option: 'deleteCategoryDish'
          },
          success: function (response) {
            const { status_code: statusCode, status, message } = response

            if (+statusCode === 200) {
              tableCategoryDish.ajax.reload()
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
