export const validateForm = (elements) => {
  if (elements instanceof Object) {
    const elementsArray = Object.values(elements)

    elementsArray.forEach((element) => {
      switch (element.tagName) {
        case 'INPUT':
          if (element.value === '') {
            console.log('vacio')
          } else {
            console.log(element.value)
          }
          break
        case 'SELECT':
          if (element.value === '') {
            console.log('vacio')
          } else {
            console.log(element.value)
          }
          break
      }
    })
  } else {
    console.log('no es objeto')
  }
}

export const handleStatusChange = (data) => {
  const { row, classButton, attribute } = data

  let status = 'Inactivo'
  let color = 'danger'

  if (+row.status === 1) {
    status = 'Activo'
    color = 'success'
  }

  return `<button class="btn btn-${color} btn-flat ${classButton}" ${attribute}="${row.id}">
    ${status}
  </button>`
}

export const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 2000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer
    toast.onmouseleave = Swal.resumeTimer
  }
})

export const rowDataInDifferentScreen = (table, selector) => {
  let row
  if ($(selector).hasClass('child')) {
    row = table.row(selector.prev())
  } else {
    row = table.row(selector)
  }
  return row.data()
}
