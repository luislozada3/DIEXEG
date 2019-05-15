function blockAndUnlock(id, access){
	

	$.ajax({

		url: URL+"/usuarios/acceso",
		type: "POST",
		data: "id="+id+"&access="+access,


	}).done( function (response) {
		var response = JSON.parse(response);

		if (response.response) {


			if ( response.access == -1 ) {

				toastr.success('Usuario bloqueado', 'Acceso denegado!', {timeOut: 3000});
			
			}else{

				toastr.success('Usuario desbloqueado', 'Acceso habilitado!', {timeOut: 3000});

			}
			var table = $("#tableUsers").DataTable();			
			table.clear();
			table.ajax.reload();

		}else{

			toastr.error('ocurrio un error durante la eliminacion del usuario', 'Error en la eliminacion!', {timeOut: 3000});

		}

	}).fail( function () {

			toastr.error('Es posible que no se haya podido completar la accion', 'Error!', {timeOut: 3000});

	});

}
