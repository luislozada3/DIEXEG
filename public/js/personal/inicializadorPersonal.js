$(document).ready( function () {
	
	$(".content-table").append("<table id='tablePersonal' class='table compact'>"+
                        							"<thead>"+
                            							"<tr>"+
							                                "<th> Nombre </th>"+
							                                "<th> Oficio </th>"+
							                                "<th> Personal </th>"+
							                                "<th> Opciones </th>"+
							                            "</tr>"+
                        							"</thead>"+
                        							"<tbody>"+
                        							"</tbody>"+
                        						"</table>");

	show();

	$("#headerOptions").append("<button type='button' data-toggle='modal' class='btn btn-primary btn-blue' id='registerPersonal'>"+
				                	"<span class='fa fa-user-md'></span> Registrar personal"+
				                "</button>");

	$("#registerPersonal").click( function () {
		$("#modelAddPersonal").find(".textHelp").text("");
		$("#modelAddPersonal").find("#formAddPersonal")[0].reset();
		$("#modelAddPersonal").modal("show");
	});
});