$(document).ready( function () {
	
	$("#buttomChangeImg").click( function () {

		var inputFile = $("#input-profile");

		// validando que el archivo subido sea una imagen jpg/png/jpeg
		var validateExt = validateExtension(inputFile);

		if (inputFile.val() != "") {

			if (validateExt) {
				var LoadChangeImage = $(".LoadChangeImage");
				var formData = new FormData();
				formData.append( 'file', inputFile[0].files[0] );
				var buttomChangeImg = $("#buttomChangeImg");
				$.ajax({
					url: URL+"/configuraciones/actualizarFotoPerfil",
					method: "post",
					data: formData,
					cache: false,
					contentType: false,
					processData: false,
					beforeSend: function () {
						LoadChangeImage.css("display","block");
						buttomChangeImg.prop("disabled",true);
					}
						
				}).done( function (response) {
					response = JSON.parse(response);

					if (response.response == 1) {

						toastr.success('Se ha cambiado la imagen de perfil', 'Actualizacion exitosa!', {timeOut: 3000});
						var imgNav = $("#img-profile-nav").find('img');
						LoadChangeImage.css("display","none");
						imgNav.fadeOut( function () {
							imgNav.fadeIn().attr("src","http://localhost/diexeg/public/img/usuarios/"+response.img);
						});
						inputFile.val("");
						buttomChangeImg.prop("disabled",false);

					}else if (response.response == 2) {
					
						toastr.warning('Es posible que no se haya actualizado el perfil de manera correcta, intente de nuevo',"Error de imagen al subir la imgen", {timeOut: 3000});
						LoadChangeImage.css("display","none");
						buttomChangeImg.prop("disabled",false);
					}else{
					
						toastr.error('Es posible que no se haya realizado de manera correcta, revise su conexion a internet', 'ha ocurrido un error durante la actualizacion del perfil!', {timeOut: 5000});
						LoadChangeImage.css("display","none");
						buttomChangeImg.prop("disabled",false);
					}

				}).fail( function () {
				
					toastr.error('Es posible que no se haya realizado de manera correcta, revise su conexion a internet', 'ha ocurrido un error durante la actualizacion del perfil!', {timeOut: 5000});
					LoadChangeImage.css("display","none");
					buttomChangeImg.attr("disabled",false);
				});

			}else{

				toastr.warning('Solo se debe subir imagenes de tipo jpeg/jpg/png',"Error de formato", {timeOut: 3000});
			
			}

		}else{
			toastr.info('Debe seleccionar una imagen nueva',"", {timeOut: 3000});
		}

	});

	$("#input-profile").change(function () {
		filePreview(this);
	});

});