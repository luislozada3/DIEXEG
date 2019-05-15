function deleteCitas(id) {
	$.ajax({

		url: URL+"/citas/delete",
		type: "GET",
		data: "id="+id

	}).done( function (response) {
		
		if (response) {

			toastr.success('Cita eliminada', 'Eliminacion exitosa!', {timeOut: 3000});
			var table = $("#tableCitas").DataTable();			
			table.clear();
			table.ajax.reload();

		}else{

			toastr.error('ocurrio un error durante la eliminacion de la cita', 'Error en la eliminacion!', {timeOut: 3000});

		}
		

	}).fail( function () {

			toastr.error('Es posible que los datos no se hayan eliminado', 'Error!', {timeOut: 3000});

	});
};