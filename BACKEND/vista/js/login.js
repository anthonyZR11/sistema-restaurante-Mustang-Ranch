$(document).ready(function (e) {
  const formLogin = document.getElementById('form-login')
  const email = document.getElementById('email')
  const password = document.getElementById('password')

  formLogin.addEventListener('submit', function (e) {
    e.preventDefault()

    if (email.val !== '' && password.val !== '') {
      $.ajax({
        url: 'ajax/ajax.usuario.php',
        method: 'POST',
        dataType: 'json',
        data: {
          option: 'validateLogin',
          email: email.value,
          password: password.value
        },
        xhrFields: {
          withCredentials: true // Esto asegura que las cookies se envíen y mantengan
        },
        success: function (response) {
          const { status_code: statusCode, status, message } = response

          switch (parseInt(statusCode)) {
            case 200:

              window.location = 'principal'
              break
            case 401:
              Swal.fire({
                icon: status,
                title: message
              })
              break
            case 403:
              Swal.fire({
                icon: status,
                title: message
              })
              break
            case 404:
              Swal.fire({
                icon: status,
                title: message
              })
              break
          }
        }
      })
    }
  })
})
