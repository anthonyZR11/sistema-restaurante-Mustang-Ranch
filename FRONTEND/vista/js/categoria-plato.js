$(".tablas").on("click", ".btnEditarCatPlato", function(){


	var idCatPlato = $(this).attr("idCatPlato");

	console.log("idCatPlato",idCatPlato);

	var datos = new FormData();
	datos.append("idCatPlato", idCatPlato);

	$.ajax({
		url: "ajax/ajax.categoria-plato.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false, 
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){ 
		console.log(respuesta);
     		$("#editarCatPlato").val(respuesta["nomCatPlato"]);
     		$("#idCatPlato").val(respuesta["idCatPlato"]);

     	}

	})

})

/*=============================================
ELIMINAR CATEGORIA
=============================================*/
$(".tablas").on("click", ".btnEliminarCatPlato", function(){

	 var idCatPlato = $(this).attr("idCatPlato");

	 swal({
	 	title: '¿Está seguro de borrar?',
	 	text: "¡Elimnar esta categoria de plato!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar categoria de plato!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=categoria-plato&idCatPlato="+idCatPlato;

	 	}

	 })

})

