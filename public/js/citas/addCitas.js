$("#formAddCita").submit( function () {

		var formValidate = [$("#paciente"), $("#fecha"), $("#hora"), $("#medico")];

		formValidate = validateEmpty(formValidate);

		if (formValidate) {

			var form = $(this).serialize();

			$.ajax({
			
				url: URL+"/citas/store",
				type: "post",
				data: form,
				beforeSend: function () {
					$("#waitAjaxCitas").css("display","inline-block");
					$("#btnAddCita").attr("disabled",true);
				}
			
			}).done( function (response) {

				response = JSON.parse(response);
				
				if ( response.status == 1 ) {
					
					$("#waitAjaxCitas").css("display","none");
					$("#btnAddCita").attr("disabled",false);
					
					var table = $("#tableCitas").DataTable();			
					table.clear();
					table.ajax.reload();

					toastr.success('Se ha agregado una nueva cita', 'Registro exitos!', {timeOut: 3000});
					$('#modalcita').modal('hide');

				}else if (response.status == 2) {

					$("#waitAjaxAdd").css("display","none");
					$("#btnAgregar").attr("disabled",false);
					toastr.warning(response.message, '', {timeOut: 3000});
					$('#modalcita').modal('hide');

				}else {
					
					$("#waitAjaxAdd").css("display","none");
					$("#btnAgregar").attr("disabled",false);
					toastr.error('Es posible que no se haya realizado de manera correcta', 'ha ocurrido un error durante el registro!', {timeOut: 3000});
					$('#modalcita').modal('hide');
				
				}

				$("#formAddCita")[0].reset();

			}).fail( function () {

				$('#modalcita').modal('hide');
				$("#formAddCita")[0].reset();
				$("#waitAjaxCitas").css("display","none");
				$("#btnAddCita").attr("disabled",false);
				toastr.error('Es posible que no se haya realizado de manera correcta', 'ha ocurrido un error durante el registro!', {timeOut: 3000});
			
			});
		}
});