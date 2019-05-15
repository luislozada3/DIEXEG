$(document).ready( function () {
	
	$(".content-table").append("<table id='tableUsers' class='table compact'>"+
                        							"<thead>"+
                            							"<tr>"+
							                                "<th> Rol del Usuario </th>"+
							                                "<th> Usuario </th>"+
							                                "<th> Estatus </th>"+
							                                "<th> Opciones </th>"+
							                            "</tr>"+
                        							"</thead>"+
                        							"<tbody>"+
                        							"</tbody>"+
                        						"</table>");

	show();

	$("#headerOptions").append("<a href='"+URL+"/usuarios/registrar' data-toggle='tooltip' title='Registrar usuario' class='btn btn-primary btn-blue' id='registerUser'>"+
				                	"<span class='fa fa-user-plus'></span> Registrar usuario"+
				                "</a>");


	$("#input-profile").change(function () {
		filePreview(this);
	});

	function filePreview(input) {

	    if (input.files && input.files[0]) {
			var extension = (/[.]/.exec(input.files[0]['name'])) ? /[^.]+$/.exec(input.files[0]['name']) : undefined;
			extension = String(extension).toUpperCase();
			if (extension == "JPG" || extension == "JPEG" || extension == "PNG"){
		        var reader = new FileReader();
		        reader.onload = function (e) {
		        	$('#uploadForm').find(".img-circle").fadeOut( function () {
			            $('#uploadForm').find(".img-circle").remove();
			            $('#uploadForm').find(".label-input-profile")
			            				.prepend('<img src="'+e.target.result+'" alt="usuario" class="img-circle" width="150" height="150"/>')
			            				.fadeIn();
		        	});
		        }
		        reader.readAsDataURL(input.files[0]);				
			}else{
				$("#input-profile").val("");
				$('#uploadForm').find(".img-circle").remove();
				$('#uploadForm').find(".label-input-profile")
								.prepend('<img src="'+PUBLIC_IMG+'/usuarios/emptyUser.png" alt="usuario" class="img-circle" width="150" height="150"/>')
								.fadeIn();
				toastr.error('Solo se permiten archivo .jpg .jpeg y .png', 'Error en el formato de la imagen', {timeOut: 3000});
			}

	    }
	}

	$("select#personal").change(function () {
		selectPersonal(this);
	});

	function selectPersonal (personal) {

			
		if ( personal.value == "medico") {

			if ( $("select#medico").find("option").length < 2){
			
				$("#texthelpPersonal").text("No posee personal medico disponibles para esta opcion");
				$("select#oficina").css("display","none").val("");
			
			}else{

				$("#texthelpPersonal").text("");
				$("select#oficina").css("display","none").val("");
				$("select#medico").css("display","block");
			
			}
		}

		if ( personal.value == "oficina") {

			if ( $("select#oficina").find("option").length < 2 ){
			
				$("#texthelpPersonal").text("No posee personal administrativo disponibles para esta opcion");
				$("select#medico").css("display","none").val("");
			
			}else{

				$("#texthelpPersonal").text("");
				$("select#medico").css("display","none").val("");
				$("select#oficina").css("display","block");

			}

		}


		if ( personal.value == "") {
			
			$("#texthelpPersonal").text("");
			$("select#oficina").css("display","none").val("");
			$("select#medico").css("display","none").val("");
		
		}

	}	
});