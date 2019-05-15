function deletePersonal(id, type) {
	$.ajax({

		url: URL+"/personal/borrar",
		type: "POST",
		data: {"id": id, "type": type}

	}).done( function (response) {
		
		if (response) {

			toastr.success('Personal eliminado', 'Eliminacion exitosa!', {timeOut: 3000});
			var table = $("#tablePersonal").DataTable();			
			table.clear();
			table.ajax.reload();

		}else{

			toastr.error('ocurrio un error durante la eliminacion del usuario', 'Error en la eliminacion!', {timeOut: 3000});

		}
		
	}).fail( function () {

			toastr.error('Es posible que los datos no se hayan eliminado', 'Error!', {timeOut: 3000});

	});
};