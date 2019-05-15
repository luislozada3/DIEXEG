$(document).ready( function () {

	$("#formUpdateDataPersonal").submit( function () {
		
		var form = $(this).serialize();
		var arrayInput = [$('#nombre'),$('#apellido'),$('#oficio')];
		var empty = validateEmpty(arrayInput);

		if (empty) {

			$.ajax({
				
				url: URL+"/configuraciones/actualizarPerfil",
				type: "POST",
				data: form,
				beforeSend: function () {
					$("#btnUpdateDataPersonal").attr("disabled",true);
					$(".waitAjax").css("display","inline-block");
				}

			}).done( function ( response ) {
			
				if (response == 1) {
					toastr.success('Los datos se han actualizado correctamente', 'Actualizacion exitosa!', {timeOut: 3000});
					$("#btnUpdateDataPersonal").attr("disabled",false);
					$(".waitAjax").css("display","none");
				}else if (response == 0){
					toastr.error('Es posible que no se haya realizado de manera correcta', 'ha ocurrido un error durante la actualizacion datos!', {timeOut: 3000});
					$("#btnUpdateDataPersonal").attr("disabled",false);
					$(".waitAjax").css("display","none");
				}else{
					toastr.warning('Es posible que la actualizacion no se haya realizado de manera correcta', 'ha ocurrido un error durante el envio datos!', {timeOut: 3000});
					$("#btnUpdateDataPersonal").attr("disabled",false);
					$(".waitAjax").css("display","none");
				}
			
			}).fail( function () {

				$("#btnUpdateDataPersonal").attr("disabled",false);
				$(".waitAjax").css("display","none");
				toastr.error('Es posible que no se haya realizado de manera correcta, revise su conexion a internet', 'ha ocurrido un error durante la actualizacion datos!', {timeOut: 3000});

			});

		}

	});
	
});