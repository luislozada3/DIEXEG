function deleteCita(id, that) {
	$.ajax({
		url: URL+"/citas/delete",
		data: {id: id},
		type: "GET",
		beforeSend: function (){

		}
	}).done( function ( response ) {

		if (response == 1) {
			
			toastr.success('Se ha eliminado la cita de manera correcta', 'Eliminacion exitosa!', {timeOut: 3000});
			var containerCita = that.parentNode;
			containerCita.remove();

		}else{
			toastr.error('Es posible que no se haya realizado de manera correcta', 'ha ocurrido un error al eliminar la cita!', {timeOut: 3000});
		}

	}).fail( function () {
			toastr.error('Es posible que no se haya realizado de manera correcta', 'ha ocurrido un error al eliminar la cita!', {timeOut: 3000});
	});
};