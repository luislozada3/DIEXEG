$("#formAddCita").submit( function () {

		var formValidate = [$("#fecha"), $("#hora"), $("#medico")];

		formValidate = validateEmpty(formValidate);

		if (formValidate) {

			var form = $(this).serialize();

			$.ajax({
			
				url: URL+"/citas/addCita",
				type: "post",
				data: form,
				beforeSend: function () {
					$("#waitAjaxCitas").css("display","inline-block");
					$("#btnAddCita").attr("disabled",true);
				}
			
			}).done( function (response) {

				if ( response == 1 ) {
					
					$("#waitAjaxCitas").css("display","none");
					$("#btnAddCita").attr("disabled",false);
					
					toastr.success('Se ha agregado una nueva cita', 'Registro exitos!', {timeOut: 3000});
					$('#modalcitaPaciente').modal('hide');

				}else {
					
					$("#waitAjaxAdd").css("display","none");
					$("#btnAgregar").attr("disabled",false);
					toastr.error('Es posible que no se haya realizado de manera correcta', 'ha ocurrido un error durante el registro!', {timeOut: 3000});
					$('#modalcitaPaciente').modal('hide');
				
				}

				$("#formAddCita")[0].reset();

			}).fail( function () {

				$('#modalcitaPaciente').modal('hide');
				$("#formAddCita")[0].reset();
				$("#waitAjaxCitas").css("display","none");
				$("#btnAddCita").attr("disabled",false);
				toastr.error('Es posible que no se haya realizado de manera correcta', 'ha ocurrido un error durante el registro!', {timeOut: 3000});
			
			});
		}
});