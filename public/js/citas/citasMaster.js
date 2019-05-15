/**
 * Creado por Francis Dona 07/04/2019
 * Modificado por Francis Dona 07/04/2019
 * Sirve para traerse los datos de las citas y mostrarlos dentro de una tabla (DataTable.js)
 */

/**
 * [show inicializa el dataTable de citas con un llamado a ajax]
 * @return {[type]} [description]
 */
function show () {

	var tableCitas = $("#tableCitas").DataTable({

		"destroy": true,
		"searching": true,
    	"ordering":  true,
		"deferRender": true,
		"language": languageSpanish,
		"ajax": {
			"method": "POST",
			"url": URL+"/citas/listar"
		},
		"columns": [
			{"data": "cedula"},
			{"data": "paciente"},
			{
				"data": "fecha",
                "render": function ( data, type, row ) {
                	var dateTime = row.fecha + " / " + row.hora;
                	return dateTime;
                }
			},
			{
				"data": "estatus",
                "render": function ( data, type, row ) {
					var dateCita = new Date(row.fecha);
					var dateNow = new Date();
					dateNow.setHours(0,0,0,0);
					dateCita.setHours(0,0,0,0);
					dateCita.setDate(dateCita.getDate() + 1);

					if (dateCita < dateNow) {
	                	var status = "<span class='statusCitas statusDanger'> <i style='margin-right: 2px;' class='fa fa-times' aria-hidden='true'></i> Expiro </span>";
					}else if (parseInt(data) === 2) {
	                	var status = "<span class='statusCitas statusSuccess'> <i style='margin-right: 2px;' class='fa fa-check' aria-hidden='true'></i> Paciente diagnosticado </span>";
                	}else{
	                	var status = "<span class='statusCitas statusWait'> <i style='margin-right: 2px;' class='fa fa-hourglass-half' aria-hidden='true'></i> En espera </span>";                		
                	}

                	return status;
                }
			},
			{"data": "medico"},
			{
				"data": "estatus",
                "render": function ( data, type, row ) {
                	if (parseInt(data) === 2) {
	                	var buttons = "<i class='fa fa-edit editCitas iconPrimaryColor iconOptions' aria-hidden='true' data-toggle='tooltip' title='Actualizar'></i>";
                	}else{
	                	var buttons = "<i class='fa fa-edit editCitas iconPrimaryColor iconOptions' aria-hidden='true' data-toggle='tooltip' title='Actualizar'></i>"+
	                					  "<i class='fa fa-trash deleteCitas iconDangerColor iconOptions' aria-hidden='true' data-toggle='tooltip' title='Eliminar'></i>";                		
                	}

                	return buttons;
                }
			}
		]
	});


	$("#tableCitas tbody").on("click", "i.deleteCitas", function () {
		var data = getData(tableCitas, $(this));
		var id = data.id;

		alertify.confirm('Se eliminara la cita', "¿Desea continuar?", 
			function(){ 
				deleteCitas(id)
			},
			function(){ 
				console.log("No se elimino la cita");
			}
		);

	});

	$("#tableCitas tbody").on("click", "i.editCitas", function () {
		var data = getData(tableCitas, $(this));
		var id = data.id;
		$("#horaUpdate").val(data.hora);
		$("#fechaUpdate").val(data.fecha);
		$("#pacienteUpdate").val(data.pacienteId);
		$("#medicoUpdate").val(data.medicoId);
		$("#idCita").val(id);
		$("#modalcitaUpdate").modal("show");
	});

	$(".dataTables_length").remove();

	$("#tableCitas_filter").find("input[type='search']").attr("id","searchTableUsers");
	$("#tableCitas_filter").find("input[type='search']").attr("placeholder","Buscar...");
	$("#tableCitas_filter").find("input[type='search']").addClass("searchTables");
	$("#tableCitas_filter").prepend("<label for='searchTableUsers' class='iconSearch'> <i class='fa fa-search' aria-hidden='true'></i> </label>");

	$(".content-table").prepend("<div class='col-md-12' id='headerOptions'></div>");

	$("#headerOptions").append($(".dataTables_filter"));

	
}

function getData (table, button) {

	var data = table.row( button.parents("tr") ).data();
	return data;

}
