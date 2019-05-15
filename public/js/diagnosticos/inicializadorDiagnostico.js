$(document).ready( function () {
	
	$(".content-table-diagnosis").append("<table id='tableDiagnosis' class='table compact'>"+
                        							"<thead>"+
                            							"<tr>"+
							                                "<th> Paciente </th>"+
							                                "<th> Medico </th>"+
							                                "<th> Diagnostico </th>"+
							                                "<th class='no-sort'> Opciones </th>"+
							                            "</tr>"+
                        							"</thead>"+
                        							"<tbody>"+
                        							"</tbody>"+
                        						"</table>");

	$('.content-table-diagnosis-quotes').append("<table id='tableDiagnosisQuotes' class='table compact'>"+
                        							"<thead>"+
                            							"<tr>"+
							                                "<th> Paciente </th>"+
							                                "<th> Medico </th>"+
							                                "<th> horario </th>"+
							                                "<th class='no-sort'> Opciones </th>"+
							                            "</tr>"+
                        							"</thead>"+
                        							"<tbody>"+
                        							"</tbody>"+
                        						"</table>");

	show();
	showQuotes();

	var displayAddSintoma = false;
	$("#btnAddSintoma").click( function () {
		displayAddSintoma = !displayAddSintoma;
		if (displayAddSintoma) {
			$("#contentInputAddSintoma").css("display","block");
		}else{
			$("#contentInputAddSintoma").css("display","none");
		}
		$("#inputAddSintoma").val("");
		$("#inputAddSintoma").focus();
	});

	$("#btnInputAddSintoma").click( function () {
		var value = $("#inputAddSintoma").val();
		if ( value.length > 0 ) {
			$("#sintomasPacienteModal").prepend("<div class='itemSistomasCliente'> " + 
													value +
													"<span data-item='new' class='fa fa-times removeSintomaNew' onclick='removeItemSistomasCliente(event)'></span>"+
												"</div>");
			$("#inputAddSintoma").val("");
		}
		$("#inputAddSintoma").focus();
	});

});

function removeItemSistomasCliente (e) {
	var container = e.target.parentNode;
	var textSintoma = container.textContent;
	var data = e.target.getAttribute('data-item');
	if (data === 'new') {
		container.remove();
	}else{
		var maginTop = "style='";
		if ($("#sintomasModal .itemSistomas").length == 0) {
			maginTop = "style='margin-top: 35px;'";
		}
		var id = container.getAttribute('data-sintomas');
		// eliminar y mandar de nuevo a la columa de sintomas
		$("#sintomasModal").append("<div "+maginTop+"data-sintomas='"+id+"' class='itemSistomas'> " + 
										textSintoma +
									"</div>");
		container.remove();
	}

	$('#sintomasModal .itemSistomas').click( function () {
		var that = $(this);
		$(this).fadeOut(function() {
			that.append("<span data-item='old' class='fa fa-times removeSintomaNew' onclick='removeItemSistomasCliente(event)'></span>");
			that.removeClass('itemSistomas');
			that.remove();
			that.addClass('itemSistomasCliente');
				that.appendTo( $('#sintomasPacienteModal') ).fadeIn();
		});
	});
}