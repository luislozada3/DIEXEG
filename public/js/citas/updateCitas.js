$("#formUpdateCita").submit( function () {


	var elements = [$("#pacienteUpdate"),$("#medicoUpdate"),$("#horaUpdate"),$("#fechaUpdate")];

	var empty = validateEmpty(elements);

	if (empty) {

		var form = $(this).serialize();
		
		$.ajax({
		
			url: URL+"/citas/actualizar",
			type: "post",
			data: form,
			beforeSend: function () {
				$(".waitAjax").css("display","inline-block");
				$("#btnEditar").attr("disabled",true);
			}
		
		}).done( function (response) {

			response = JSON.parse(response);
			if ( response.status == 1 ) {
				
				$(".waitAjax").css("display","none");
				$("#btnEditar").attr("disabled",false);
				
				toastr.success(response.message, '', {timeOut: 3000});
				var table = $("#tableCitas").DataTable();			
				table.clear();
				table.ajax.reload();
				$('#modalcitaUpdate').modal('hide');

			}else {
				
				$(".waitAjax").css("display","none");
				$("#btnEditar").attr("disabled",false);
				toastr.error(response.message, 'ha ocurrido un error durante la Actualizacion!', {timeOut: 3000});
				$('#modalcitaUpdate').modal('hide');

			}

		}).fail( function () {

				$(".waitAjax").css("display","none");
				$("#btnEditar").attr("disabled",false);
				toastr.error('Es posible que no se haya realizado de manera correcta', 'ha ocurrido un error durante la Actualizacion!', {timeOut: 3000});
				$('#modalcitaUpdate').modal('hide');
		});
	}
});