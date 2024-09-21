document.addEventListener('DOMContentLoaded', e => {
  const lastDish = document.getElementById('lastDish')
  const topDish = document.getElementById('topDish')
  const url = 'ajax/ajax.plato.php'

  function loadDishesPersonalized (option, selector, text) {
    ajaxData(option, selector, text)
  }

  function ajaxData (option, selector, text) {
    console.log(selector)
    $.ajax({
      url,
      method: 'POST',
      dataType: 'json',
      data: {
        option
      },
      success: function (dishes) {
        if (dishes.lenght === 0) {
          return
        }

        selector.innerHTML = ''

        dishes.forEach((dish) => {
          const li = document.createElement('li')
          li.className = 'list-group-item d-flex justify-content-between align-items-center'
          const span = document.createElement('span')
          span.className = 'badge badge-primary badge-pill'

          li.textContent = dish.name
          span.textContent = text

          li.appendChild(span)
          selector.appendChild(li)
        })
      }

    })
  }

  loadDishesPersonalized('loadLastDish', lastDish, 'Reciente')
  loadDishesPersonalized('loadTopDish', topDish, 'Lo mejor')
})
