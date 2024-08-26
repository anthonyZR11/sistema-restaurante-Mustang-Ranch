/*!
=========================================================
* Pigga Landing page
=========================================================

* Copyright: 2019 DevCRUD (https://devcrud.com)
* Licensed: (https://devcrud.com/licenses)
* Coded by www.devcrud.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
*/

// smooth scroll
$(document).ready(function(){
    $(".navbar .nav-link").on('click', function(event) {

        if (this.hash !== "") {

            event.preventDefault();

            var hash = this.hash;

            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 700, function(){
                window.location.hash = hash;
            });
        } 
    });
}); 


/*=============================================
EDITAR CATEGORIA
=============================================*/
$(".tablas").on("click", ".btnEditarRol", function(){


    var idRol = $(this).attr("idRol");

    console.log("idRol",idRol);

    var datos = new FormData();
    datos.append("idRol", idRol);

    $.ajax({
        url: "ajax/ajax.rol.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"json",
        success: function(respuesta){
console.log(respuesta);
            $("#editarRol").val(respuesta["nomRol"]);
            $("#idRol").val(respuesta["idRol"]);

        }

    })


})
