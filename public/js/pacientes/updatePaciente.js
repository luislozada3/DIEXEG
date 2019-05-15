$("#formEditPaciente").submit( function () {

	// var elements = [$("#nombre"),$("#apellido"),$("#oficio")];

	// var empty = validateEmpty(elements);

	// if (empty) {

		var form = $(this).serialize();
		
		$.ajax({
		
			url: URL+"/pacientes/actualizar",
			type: "POST",
			data: form,
			beforeSend: function () {
				$("#waitAjaxUpdate").css("display","inline-block");
				$("#btnEditar").attr("disabled",true);
			}
		
		}).done( function (response) {

			if ( response == 1 ) {
				
				$("#waitAjaxUpdate").css("display","none");
				$("#btnEditar").attr("disabled",false);
				
				toastr.success('Datos del paciente actualizados', 'Actualizacion exitos!', {timeOut: 3000});
				var table = $("#tablePacientes").DataTable();
				table.clear();
				table.ajax.reload();
				$('#modelUpdatePaciente').modal('hide');

			}else {
				
				$("#waitAjaxUpdate").css("display","none");
				$("#btnEditar").attr("disabled",false);
				toastr.error('Es posible que no se haya realizado de manera correcta', 'ha ocurrido un error durante la Actualizacion!', {timeOut: 3000});
				$('#modelUpdatePaciente').modal('hide');
			
			}

		}).fail( function () {

				$("#waitAjaxUpdate").css("display","none");
				$("#btnEditar").attr("disabled",false);
				toastr.error('Es posible que no se haya realizado de manera correcta', 'ha ocurrido un error durante la Actualizacion!', {timeOut: 3000});
		
		});
	// }
});