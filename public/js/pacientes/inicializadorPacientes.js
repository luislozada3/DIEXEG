$(document).ready( function () {
	
	$(".content-table").append("<table id='tablePacientes' class='table compact'>"+
                        							"<thead>"+
                            							"<tr>"+
							                                "<th> Cedula </th>"+
							                                "<th> Paciente </th>"+
							                                "<th class='no-sort'> Opciones </th>"+
							                            "</tr>"+
                        							"</thead>"+
                        							"<tbody>"+
                        							"</tbody>"+
                        						"</table>");

	show();

	$("#headerOptions").append("<button type='button'  class='btn btn-primary btn-blue' id='registerPaciente'>"+
				                	"<span class='fa fa-male'></span> Registrar paciente"+
				                "</button>");

	$("#registerPaciente").click( function () {
		$("#modalAddPaciente").find(".textHelp").text("");
		$("#modalAddPaciente").find("#formAddPaciente")[0].reset();
		$("#modalAddPaciente").find("#formAddPaciente #sexo").val(null);
		$("#modalAddPaciente").modal("show");
	});
});