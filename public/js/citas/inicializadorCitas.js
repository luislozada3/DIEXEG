$(document).ready( function () {
	
	$(".content-table").append("<table id='tableCitas' class='table compact'>"+
                        							"<thead>"+
                            							"<tr>"+
							                                "<th> Cedula </th>"+
							                                "<th> Paciente </th>"+
							                                "<th> Fecha/hora </th>"+
							                                "<th> Estatus de la cita </th>"+
							                                "<th> Medico </th>"+
							                                "<th> Opciones </th>"+
							                            "</tr>"+
                        							"</thead>"+
                        							"<tbody>"+
                        							"</tbody>"+
                        						"</table>");

	show();

	$("#headerOptions").append("<button type='button' data-toggle='modal' class='btn btn-primary btn-blue' id='registerCita'>"+
				                	"<span class='fa fa-calendar-plus-o'></span> Registrar cita"+
				                "</button>");

	$("#registerCita").click( function () {
		$("#modalcita").find(".textHelp").text("");
		$("#modalcita").find("#formAddCita")[0].reset();
		$("#modalcita").modal("show");
	});
});