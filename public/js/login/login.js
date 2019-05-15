/**
*Creado por Francis Dona 10/04/2018
*modificado por Francis Dona 10/04/2018
*funciones para el inicio de sesion
 */

function clearMessage(){
	$(".messageError").css("display","none");
	$(".textHelp").text("");				
}

$(document).ready(function(){
	
	/**
	 * cuando se envia el formulario de login aqui se verifica si hay algun campo vacio
	 * si asi se devuelve un mensaje para que completen los campos si no mandan los datos via ajax
	 * y verifica si los datos que introdujo el cliente son correctos o no
	 */
	$(".formLogin").submit(function(){
		var i = 0;
		$(this).find("input").each(function(index,li){
			if ( $(this).val() == "" ) {
				$(this).next().text("Complete los campos");
				i++;
			}
		});

		if (i == 0) {
			$(this).find("input").next().text("");			
			$(".modalLoading").fadeIn();
			$.ajax({
				url: URL+"/login/login",
				type: "POST",
				data: $(this).serialize(),
				success: function(response){
					response = parseInt(response);
					if (response == 1) {
						window.location = URL+"/home";
						localStorage.setItem("isLoggedIn", true);
					}else if (response == 2) {
						$(".modalLoading").fadeOut();					
						$(".messageError").css("display","block");
						$(".messageError").text("Acceso denegado, comuniquese con el administrador");
						$(".user").focus();														
						$(".password").val("");						
					}else{
						$(".modalLoading").fadeOut();					
						$(".messageError").css("display","block");
						$(".messageError").text("Credenciales invalidas por favor verifique sus datos");
						$(".user").focus();														
						$(".password").val("");
					}
				},
				error: function(){
					console.error("Error, fallo el envio de datos");
				}
			});
		}

	});

	$(".formRecover").submit( function () {
		$("#textResponse").text("");
		$("#textoResponseRecover").text("");
		$("#respuesta1").val("");
		$("#respuesta2").val("");
		var user = $("#inputUser").val();
		if( user ){
			$.ajax({
				url: URL+'/login/getRecoveryMethod',
				method: "get",
				data: {user: user},
				beforeSend: function () {
					$("#btnRecover").html('<i class="fa fa-circle-o-notch fa-spin fa-1x fa-fw"></i>');
				}
			}).done( function (response) {
				var data = JSON.parse(response);
				if (data) {
					$("#pregunta1, #pregunta2").css({
						"background-color": "rgba(0,0,0,0.2)",
						"color": "rgb(0,0,0)"
					});
					$("#pregunta1").val(data.pregunta1);
					$("#pregunta2").val(data.pregunta2);
					$("#userId").val(data.id);
					$("#modelRecover").modal('show');
					setTimeout( function () {
						$("#respuesta1").focus();
					}, 500);
				}else{
					$("#textoResponseRecover").text("usuario ingresado no existe").css({
						"color": "red",
						"font-size": "16px"						
					});
				}
				$("#btnRecover").html('Continuar');

			}).fail( function () {
				$("#btnRecover").html('Continuar');
				alert('se produjo un error durante la recuperacion de la contraseña intente nuevamente');
			});
		}else{
			$("#textoResponseRecover").text("Por favor indique un usuario").css({
				"color": "#F95B27",
				"font-size": "16px"						
			});
		}
	});

	// este evento verifica las respuesta que introdujo el usuario para recuperar la contrasena 
	// y recupera la contrasena y los datos que introdujo el usuario son correctos
	$("#formRecoverModal").submit( function () {
		var respuesta1 = $("#respuesta1").val();
		var respuesta2 = $("#respuesta2").val();

		if (respuesta1 == "" || respuesta2 == "") {
			$("#textResponse").text("Camplete todos los campos").css({
				"color": "red",
				"font-size": "16px"
			});
		}else{
			var form = $(this).serialize();
			$.ajax({
				url: URL+'/login/passwordRecover',
				method: "POST",
				data: form,
				beforeSend: function () {
					$("#waitAjaxAdd").css("display","inline-block");
				}
			}).done( function ( response ) {
				response = JSON.parse(response);
				if (response.status == 1) {

					$("#textResponse").text(response.message + " " + response.data).css({
						"color": "green",
						"font-size": "16px"
					});

				}else if (response.status == 2) {
					$("#textResponse").text(response.message).css({
						"color": "red",
						"font-size": "16px"
					});
				}else{
					$("#textResponse").text(response.message).css({
						"color": "red",
						"font-size": "16px"
					});
				}
				$("#waitAjaxAdd").css("display","none");
			}).fail( function (error) {
				$("#waitAjaxAdd").css("display","none");
				alert('Ha ocurrido un error durante la ejecucion por favor revise su conexion');
			});
		}

	});
});