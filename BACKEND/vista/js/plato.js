import { rowDataInDifferentScreen, handleActions, Toast } from './utils/util.js'
import { validateField } from './utils/validate.js'

$(document).ready(function (e) {
  const tableDishId = $('#tableDish')
  const url = 'ajax/ajax.plato.php'
  const name = $('#name')
  const dishItems = $('#dishItems')
  const description = $('#description')
  const urlPhoto = $('#urlPhoto')
  const priceBase = $('#priceBase')
  const priceDiscount = $('#priceDiscount')
  const userId = $('#userId')
  const btnSaveDish = $('#btnSaveDish')

  const tableDish = tableDishId.DataTable({
    ajax: {
      method: 'POST',
      url,
      data: {
        option: 'loadDishes'
      },
      dataSrc: ''
    },
    columns: [
      { data: 'id' },
      { data: 'name' },
      { data: 'itemName' },
      { data: 'description' },
      { data: 'url_image' },
      { data: 'price_base' },
      { data: 'price_discount' },
      {
        data: null,
        render: function (data) {
          return handleActions({
            row: data,
            classButtonEdit: 'btnEditarDish',
            classButtonDelete: 'btnEliminarDish'
          })
        }
      }
    ]
  })

  $(document).on('click', '#btnNewDish', function () {
    $('#modalAgregarPlato').modal('show')

    name.val('')
    dishItems.val('')
    urlPhoto.val('')
    description.val('')
    priceBase.val('')
    priceDiscount.val('')

    btnSaveDish.removeAttr('data-id')
    btnSaveDish.removeAttr('data-action')
  })

  btnSaveDish.on('click', function () {
    let isValid = true
    const id = $(this).attr('data-id') ?? 0
    const option = $(this).attr('data-action') ?? 'createDish'

    isValid = validateField(name)
    isValid = validateField(dishItems)
    isValid = validateField(urlPhoto)
    isValid = validateField(description)
    isValid = validateField(priceBase)
    isValid = validateField(priceDiscount)

    if (isValid) {
      $.ajax({
        url,
        method: 'POST',
        data: {
          ...(id ? { id } : {}),
          option,
          name: name.val(),
          dishItem: dishItems.val(),
          urlPhoto: urlPhoto.val(),
          description: description.val(),
          priceBase: priceBase.val(),
          priceDiscount: priceDiscount.val(),
          userId: userId.val()
        },
        dataType: 'json',
        success: function (respuesta) {
          const { status_code: statusCode, status, message } = respuesta

          if (statusCode === 200) {
            $('#modalAgregarRol').modal('hide')
            tableDish.ajax.reload()
          }

          Toast.fire({
            icon: status,
            title: message
          })
        }
      })
    }
  })

  $(document).on('click', '.btnEditarDish', function () {
    const tr = $(this).closest('tr')
    const data = rowDataInDifferentScreen(tableDish, tr)
    btnSaveDish.attr('data-id', data.id)
    btnSaveDish.attr('data-action', 'updateDish')

    name.val(data.name)
    dishItems.val(data.dish_item_id)
    description.val(data.description)
    urlPhoto.val(data.url_image)
    priceBase.val(data.price_base)
    priceDiscount.val(data.price_discount)

    $('#modalAgregarPlato').modal('show')
  })

  $('.tablas').on('click', '.btnEliminarDish', function () {
    const tr = $(this).closest('tr')
    const data = rowDataInDifferentScreen(tableDish, tr)
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
            option: 'deleteDish'
          },
          success: function (response) {
            const { status_code: statusCode, status, message } = response

            if (statusCode === 200) {
              $('#modalAgregarPlato').modal('hide')
              tableDish.ajax.reload()
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

  $.ajax({
    url: 'ajax/ajax.categoria-plato.php',
    method: 'POST',
    dataType: 'json',
    data: {
      option: 'loadCategoryDishes'
    },
    success: function (categoryDishes) {
      categoryDishes.forEach((categoryDish) => {
        const opt = document.createElement('option')
        opt.value = categoryDish.id
        opt.textContent = (categoryDish.name).toUpperCase()
        dishItems.append(opt)
      })
    }
  })
})
