$("#formAddPaciente").submit( function () {

		var form = $(this).serialize();

		var cedula = $(this).find("#cedula");
		var nombre = $(this).find("#nombre");
		var apellido = $(this).find("#apellido");
		var sexo = $(this).find("#sexo");
		var fn = $(this).find("#fn");
		var peso = $(this).find("#peso");
		var altura = $(this).find("#altura");
		var direccion = $(this).find("#direccion");
		var descripcion = $(this).find("#descripcion");
		var tlf = $(this).find("#tlf");

		var formValidate = [cedula, nombre, apellido, sexo, fn, peso, altura, direccion, descripcion];

		formValidate = validateEmpty(formValidate);

		if (formValidate) {

			$.ajax({
			
				url: URL+"/pacientes/addPaciente",
				type: "post",
				data: form,
				beforeSend: function () {
					$("#waitAjaxAdd").css("display","inline-block");
					$("#btnAddPaciente").attr("disabled",true);
				}
			
			}).done( function (response) {

				if ( response == 1 ) {
					
					var table = $("#tablePacientes").DataTable();			
					table.clear();
					table.ajax.reload();
					$("#waitAjaxAdd").css("display","none");
					$("#btnAddPaciente").attr("disabled",false);
					
					toastr.success('Se ha agregado un nuevo paciente', 'Registro exitos!', {timeOut: 3000});
					$('#modalAddPaciente').modal('hide');

				}else if (response == 2) {
					$("#waitAjaxAdd").css("display","none");
					$("#btnAddPaciente").attr("disabled",false);
					toastr.warning('La cedula ingresada ya existe por favor verifique sus datos', '', {timeOut: 3000});					
				}else {
					
					$("#waitAjaxAdd").css("display","none");
					$("#btnAddPaciente").attr("disabled",false);
					toastr.error('Es posible que no se haya realizado de manera correcta', 'ha ocurrido un error durante el registro!', {timeOut: 3000});
					$('#modalAddPaciente').modal('hide');
				
				}

				$("#formAddPaciente")[0].reset();

			}).fail( function () {

				$('#modalAddPaciente').modal('hide');
				$("#formAddPaciente")[0].reset();
				$("#waitAjaxAdd").css("display","none");
				$("#btnAddPaciente").attr("disabled",false);
				toastr.error('Es posible que no se haydsddaa realizado de manera correcta', 'ha ocurrido un error durante el registro!', {timeOut: 3000});
			});

		}
});