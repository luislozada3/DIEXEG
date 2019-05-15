$(document).ready( function () {

	$("#formChangePassword").submit( function () {
		var form = $(this).serialize();
		var password = $("#password");
		var passwordAgain = $("#passwordAgain");

		var i = 0;
		if (password.val() == "" || password.val() == null) {

			password.next().text("Complete los campos");
		}else{
			password.next().empty();
			i++;
		}

		if ( passwordAgain.val() == "" || passwordAgain.val() == null) {
			passwordAgain.next().text("Complete los campos");
		}else{
			passwordAgain.next().empty();
			i++;
		}

		if (i > 1) {
			if (password.val() == passwordAgain.val()) {
				
				$.ajax({

					url: URL+"/configuraciones/cambiarClave",
					type: "POST",
					data: form,
					beforeSend: function () {
						$(".waitAjax").css("display","inline-block");
						$("#btnChangePassoword").attr("disabled",true);
					}

				}).done( function (response) {
					
					if (response == 2) {
					
						$(".waitAjax").css("display","none");
						$("#btnChangePassoword").attr("disabled",false);
						$(this).find(".textHelp").empty();
						password.focus();
						password.next().text("Las contraseñas no coinciden");				
					
					}else if(response == 1){

						$(this).find(".textHelp").empty();
						password.val("");
						passwordAgain.val("");
						$("#btnChangePassoword").attr("disabled",false);
						$(".waitAjax").css("display","none");
						$('#modalChangePassword').modal('hide');
						toastr.success('Ha cambiado la contraseña', 'contraseña actualizada!', {timeOut: 3000});

					}else{

						$('#modalChangePassword').modal('hide');
						$("#btnChangePassoword").attr("disabled",false);
						toastr.error('No se ha podido actualizar la contraseña', 'Error!', {timeOut: 3000});	
					}

				}).fail( function () {
					$("#btnChangePassoword").attr("disabled",false);
					toastr.error('Es posible que no se haya realizado de manera correcta', 'ha ocurrido un error durante el cambio de contraseña!', {timeOut: 3000});
				});

			}else{

				$(".waitAjax").css("display","none");
				$(this).find(".textHelp").empty();
				password.focus();
				password.next().text("Las contraseñas no coinciden");

			}
		}
			

	});
	
});