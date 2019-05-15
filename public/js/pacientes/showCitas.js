function showCitas(id) {
	$.ajax({

		url: URL+"/citas/show",
		type: "POST",
		data: "id="+id,
		beforeSend: function(){
			$("#contentTabCitas").empty();
			$("#contentTabCitas").append("<div>"+
											"<center>"+
												"<img src='"+PUBLIC_IMG+"/loading.gif' alt='espere por favor...' class='waitAjax' id='waitAjaxCitasShow' style='display: block;'/>"+
											"</center>"+
										"</div>");
		}

	}).done( function (response) {

		$("#contentTabCitas").empty();
		response = JSON.parse(response);

		if (response.length > 0) {

			$.each( response, function ( index, cita ) {
				var date = cita.fecha.split('-');
				var day = date[2];
				var month = date[1];
				var year = date[0];
				var status = parseInt(cita.status);
				date = day + "-" + month + "-" + year;
				if (status === 2) {
					var estado = "<li> Estatus: <span class='statusCitas statusSuccess'> <i style='margin-right: 2px;' class='fa fa-check' aria-hidden='true'></i> Paciente diagnosticado </span> </li>";
					var btnDelete = "";
				}else{
					var estado = "<li> Estatus: <span class='statusCitas statusWait'> <i style='margin-right: 2px;' class='fa fa-hourglass-half' aria-hidden='true'></i> En espera </span> </li>";
					var btnDelete = "<span class='fa fa-times deleteCita' onClick='deleteCita("+cita.cita_id+", this)' data-toggle='tooltip' title='Borrar cita'></span>";
				}
				$("#contentTabCitas").append("<div class='containterListCitas'>"+
												btnDelete+
												"<ul>"+
													"<li> Fecha: "+date+"</li>"+
													"<li> Hora: "+cita.hora+"</li>"+
													"<li> Medico: "+cita.medico+"("+cita.Profesion+")</li>"+
													estado+
												"</ul>"+
											"</div>");
			});

		}else{
			$("#contentTabCitas").append("<div><h4>No posee citas previas</h4></div>");
		}
		

	}).fail( function () {

			toastr.error('Ha ocurrido error inesperado, verifique su conexiona a internet', 'Error!', {timeOut: 3000});

	});
};