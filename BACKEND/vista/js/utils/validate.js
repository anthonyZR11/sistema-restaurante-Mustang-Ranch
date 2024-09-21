const validationRules = {
  input: {
    text: {
      required: true,
      pattern: /^[a-zA-Z ]+$/,
      emptyMessage: 'Este campo no puede estar vacío.',
      patternMessage: 'Ingresa solo letras'
    },
    number: {
      required: true,
      pattern: /^[0-9.]+$/,
      emptyMessage: 'Este campo no puede estar vacío.',
      patternMessage: 'Ingresa solo numeros'
    },
    url: {
      required: true,
      pattern: /^(https?:\/\/)?([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,}(\/[^\s]*)?$/,
      emptyMessage: 'Este campo no puede estar vacío',
      patternMessage: 'Ingresa una url válida'
    }
  }
}

export const validateField = (field) => {
  const tagName = field.prop('tagName').toLowerCase() ?? null
  const type = (field.attr('type')) ? field.attr('type').toLowerCase() : null

  switch (tagName) {
    case 'input':
      if (type && validationRules[tagName]) {
        return validationTypeField({ tagName, field, type })
      }
      break
    case 'select':
      if (type && validationRules[type]) {
        return validationTypeField({ tagName, field, type })
      }
      break
  }
}

function validationTypeField (paramas) {
  const { tagName, field, type } = paramas

  return showMessage({ tagName, type, field })
}

function showMessage (paramas) {
  const { tagName, field, type } = paramas

  const { required, emptyMessage, patternMessage, pattern } = validationRules[tagName][type]
  const fieldId = field.attr('id')
  const messageId = `message-${fieldId}`

  $(`#${messageId}`).remove()

  if (required && field.val().trim() === '') {
    field.parent().after(`<p id="${messageId}" class="error-message error">${emptyMessage}</p>`)
    field.addClass('input-error')
    return false
  }
  if (!pattern.test(field.val())) {
    console.log('no paso')
    field.parent().after(`<p id="${messageId}" class="error-message error">${patternMessage}</p>`)
    field.addClass('input-error')
    return false
  }

  field.removeClass('input-error')
  return true
}
