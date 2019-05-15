$("#formAddPersonal").submit( function () {
	
	var elements = [$("#nombreAdd"),$("#apellidoAdd"),$("#oficioAdd"),$("#tipoAdd")];

	var empty = validateEmpty(elements);

	if (empty) {
	
		var form = $(this).serialize();

		$.ajax({
		
			url: URL+"/personal/agregar",
			type: "post",
			data: form,
			beforeSend: function () {
				$("#waitAjaxAdd").css("display","inline-block");
				$("#btnAgregar").attr("disabled",true);
			}
		
		}).done( function (response) {

			if ( response == 1 ) {
				
				$("#waitAjaxAdd").css("display","none");
				$("#btnAgregar").attr("disabled",false);
				
				toastr.success('Se a agregado un nuevo personal', 'Registro exitos!', {timeOut: 3000});
				var table = $("#tablePersonal").DataTable();			
				table.clear();
				table.ajax.reload();
				$('#modelAddPersonal').modal('hide');

			}else {
				
				$("#waitAjaxAdd").css("display","none");
				$("#btnAgregar").attr("disabled",false);
				toastr.error('Es posible que no se haya realizado de manera correcta', 'ha ocurrido un error durante el registro!', {timeOut: 3000});
				$('#modelAddPersonal').modal('hide');
			
			}

			$("#formAddPersonal")[0].reset();

		}).fail( function () {
			$("#formAddPersonal")[0].reset();
			$("#waitAjaxAdd").css("display","none");
			$("#btnAgregar").attr("disabled",false);
			toastr.error('Es posible que no se haya realizado de manera correcta', 'ha ocurrido un error durante el registro!', {timeOut: 3000});
		
		});
	}
});