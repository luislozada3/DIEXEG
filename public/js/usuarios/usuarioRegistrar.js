/**
 * [Envio del formulario de registro de usuarios]
 * @param  {FromData} e) {	e.preventDefault();	var fromData [evento de submit del formulario de registro]
 * @return {[booleam]}      [true/false]
 */
$("#uploadForm").submit( function (e) {
	e.preventDefault();

	var elements = [$("#usuario"),$("#clave"),$("#rclave"),$("#rol"),$("#pregunta1"),$("#pregunta2"),$("#respuesta1"),$("#respuesta2")];
	var elements2 = [$("#personal").val(),$("#medico").val(),$("#oficina").val()];

	var empty = validateEmpty(elements);
	var empty2 = validateEmpty2(elements2);

	if (empty && empty2) {

		if ( $("#clave").val() != $("#rclave").val() ) {

			var clave = $("#clave");		
			$("#rclave").val("");	
			clave.val("");
			clave.focus();
			clave.next().text("Las contrasenas deben coincidir");

		}else{

			var formData = new FormData(this);
			formData.append("personal",$("#personal").val());
			formData.append("medico",$("#medico").val());
			formData.append("oficina",$("#oficina").val());
			formData.append("usuario",$("#usuario").val());
			formData.append("clave",$("#clave").val());
			formData.append("rclave",$("#rclave").val());
			formData.append("rol",$("#rol").val());
			formData.append("pregunta1",$("#pregunta1").val());
			formData.append("pregunta2",$("#pregunta2").val());
			formData.append("respuesta2",$("#respuesta2").val());
			formData.append("respuesta1",$("#respuesta1").val());

			$.ajax({
			
				url: URL+"/usuarios/guardar",
				type: "post",
				data: formData,
				cache: false,
				contentType: false,
				processData: false,
				beforeSend: function () {
					$(".waitAjax").css("display","inline-block");
					$("#btnRegistrar").attr("disabled",true);
				}
			
			}).done( function (response) {

				$(".textHelp").text("");

				if ( response == 1 ) {
					
					$("#uploadForm")[0].reset();		
					$("#personal").focus();
					$("#medico").css("display","none");
					$("#oficina").css("display","none");
			        $('#uploadForm').find(".img-circle").attr("src",PUBLIC_IMG+"/usuarios/emptyUser.png");
					toastr.success('usuario registrado', 'Registro exitoso!', {timeOut: 3000});
					setTimeout(function () {
						window.location = URL+"/usuarios/";
					},2000);
				
				}else if (response == 2) {
					
					$(".waitAjax").css("display","none");
					$("#btnRegistrar").attr("disabled",false);
					$("#usuario").val("").focus();
					$("#usuario").next().text("el usuario ingresado ya existe por favor ingrese otro");
					$("#clave").val("");
					$("#rclave").val("");

				}else if (response == 3) {
					$('#uploadForm').find("#input-profile").val("");
			        $('#uploadForm').find(".img-circle").attr("src",PUBLIC_IMG+"/usuarios/emptyUser.png");
					$(".waitAjax").css("display","none");
					$("#btnRegistrar").attr("disabled",false);
					toastr.error('Solo se permiten archivo .jpg .jpeg y .png', 'Error en el formato de la imagen', {timeOut: 3000});
				}else {

					$(".waitAjax").css("display","none");
					$("#btnRegistrar").attr("disabled",false);
					toastr.error('Es posible que no se haya realizado de manera correcta', 'ha ocurrido un error durante el registro!', {timeOut: 3000});
				
				}

			}).fail( function () {

				toastr.error('Es posible que no se haya realizado de manera correcta', 'ha ocurrido un error durante el registro!', {timeOut: 3000});
			
			});

		}
	}


});

/**
 * [validateEmpty validar si lo campos estan vacios]
 * @param  {[array]} element [campos del formulario]
 * @return {[booleam]} [true o false]
 */
function validateEmpty (element) {
	
	var empty = true;
	
	$.each(element, function (index, input) {
		if(input.val() == ""){
			input.next().text("Complete este campo");
			empty = false;
		}else{
			input.next().text("");
		}
	});

	return empty;

};

/**
 * [validateEmpty2 valida si el select de personal esta vacio]
 * @param  {[array]} element [campos del formulario]
 * @return {[array]} [true o false]
 */
function validateEmpty2 (element) {
	
	
	if( element[0] != "" && ( element[1] != "" || element[2] != "" ) ){

		var empty = true;
		$("#texthelpPersonal").text("");
	}else{

		$("#texthelpPersonal").text("Complete este campo");
		var empty = false;

	}

	return empty;

};

$("#changeImgProfile").hover( function() {
  	
  	var img = $(this).find("img");
	var src = img.attr("src");

	if (src == "http://localhost/diexeg/public/img/usuarios/emptyUser.png") {
  		img.attr("src","http://localhost/diexeg/public/img/usuarios/emptyUserBlue.png");
	}

}, function() {

  	var img = $(this).find('img');
	var src = img.attr('src');

	if (src == "http://localhost/diexeg/public/img/usuarios/emptyUserBlue.png") {
		img.attr("src","http://localhost/diexeg/public/img/usuarios/emptyUser.png");
	}

});

$("select#rol, select#personal").change( function () {

    if ( $(this).val() != null || $(this).val() != "") {
        var optionEmpty = $(this).find("option").first();
        optionEmpty.attr("disabled","disabled");
    }

});

function validateKeyStrength (input) {
	
	var value = input.value;
	var number = validateNumber(value);
	var capitalLetter = validateCapitalLetter(value);
	
	if(number == 1 && capitalLetter == 1 && value.length > 7){
		$("#validateKeyStrength").text("Contraseña Segura")
								.css("color","green");
	}else{
		$("#validateKeyStrength").text("Contraseña insegura")
								.css("color","red");

	}

}