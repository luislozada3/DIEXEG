function showHistory (id) {
	var board =	$("#historial").find(".card-block")

	$.ajax({

		url: URL+"/citas/getHistory",
		type: "POST",
		data: {id: id},
		beforeSend: function(){
			board.empty();
			board.append("<div>"+
							"<center>"+
								"<img src='"+PUBLIC_IMG+"/loading.gif' alt='espere por favor...' class='waitAjax' id='waitAjaxCitasShow' style='display: block;'/>"+
							"</center>"+
						"</div>");
		}

	}).done( function (response) {		
		board.empty();
		response = JSON.parse(response);

		if (response.length > 0) {
			for(var i = 0; i < response.length; i++){

				board.append("<div class='containterListCitas'>"+
								"<ul id='list-"+i+"'>"+
									"<li> Fecha: "+response[i]["fecha"]+"</li>"+
									"<li> Hora: "+response[i]["hora"]+"</li>"+
									"<li> Enfermedad: "+response[i]["enfermedad"]+"</li>"+
									"<li> Sintomas: </li>"+
									"<li> * "+response[i]["sintomas"]+"</li>"+
								"</ul>"+
							 "</div>");

				for (var j = 0; j < response[i].otros.length; j++) {
					$("#list-"+i+"").append("<li> * "+response[i].otros[j]+" </li>");
				}
			}
		}else{
			board.append("<h4>No posee historial medico</h4>");
		}

	}).fail( function () {

			toastr.error('Ha ocurrido error inesperado, verifique su conexiona a internet', 'Error!', {timeOut: 3000});

	});
}