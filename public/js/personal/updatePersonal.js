$("#formEditPersonal").submit( function () {


	var elements = [$("#nombre"),$("#apellido"),$("#oficio")];
	// var elements = [$("#nombre"),$("#apellido"),$("#oficio"), $("#tipo")];

	var empty = validateEmpty(elements);

	if (empty) {

		var form = $(this).serialize();
		
		$.ajax({
		
			url: URL+"/personal/actualizar",
			type: "post",
			data: form,
			beforeSend: function () {
				$(".waitAjax").css("display","inline-block");
				$("#btnEditar").attr("disabled",true);
			}
		
		}).done( function (response) {


			if ( response == 1 ) {
				
				$(".waitAjax").css("display","none");
				$("#btnEditar").attr("disabled",false);
				
				toastr.success('Datos del personal actualizados', 'Actualizacion exitos!', {timeOut: 3000});
				var table = $("#tablePersonal").DataTable();			
				table.clear();
				table.ajax.reload();
				$('#modelUpdatePersonal').modal('hide');

			}else {
				
				$(".waitAjax").css("display","none");
				$("#btnEditar").attr("disabled",false);
				toastr.error('Es posible que no se haya realizado de manera correcta', 'ha ocurrido un error durante la Actualizacion!', {timeOut: 3000});
				$('#modelUpdatePersonal').modal('hide');
			
			}

		}).fail( function () {

				$(".waitAjax").css("display","none");
				$("#btnEditar").attr("disabled",false);
				toastr.error('Es posible que no se haya realizado de manera correcta', 'ha ocurrido un error durante la Actualizacion!', {timeOut: 3000});
				$('#modelUpdatePersonal').modal('hide');
		});
	}
});