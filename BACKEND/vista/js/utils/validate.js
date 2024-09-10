const validationRules = {
  text: {
    required: true,
    pattern: /^[a-zA-Z]+$/,
    emptyMessage: 'Este campo no puede estar vacío.',
    patternMessage: 'Por favor, introduce solo letras.'
  }
}

export const validateField = (field) => {
  const tagName = field.prop('tagName').toLowerCase() ?? null
  const type = field.attr('type').toLowerCase() ?? null

  switch (tagName) {
    case 'input':
      if (type && validationRules[type]) {
        return validationTypeField({ field, type })
      }
      break

    default:
      break
  }
}

function validationTypeField ({ field, type }) {
  switch (type) {
    case 'text':
    {
      const { required, emptyMessage, patternMessage, pattern } = validationRules[type]
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
  }
}
