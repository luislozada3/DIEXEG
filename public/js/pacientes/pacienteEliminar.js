function deletePaciente(id) {
	$.ajax({

		url: URL+"/pacientes/borrar",
		type: "POST",
		data: "id="+id

	}).done( function (response) {
		
		if (response) {

			toastr.success('Paciente eliminado', 'Eliminacion exitosa!', {timeOut: 3000});
			var table = $("#tablePacientes").DataTable();			
			table.clear();
			table.ajax.reload();

		}else{

			toastr.error('ocurrio un error durante la eliminacion del paciente', 'Error en la eliminacion!', {timeOut: 3000});

		}
		

	}).fail( function () {

			toastr.error('Es posible que los datos no se hayan eliminado', 'Error!', {timeOut: 3000});

	});
};