/**
 * Creado por Francis Dona 02/08/2018
 * Modificado por Francis Dona 02/08/2018
 * Sirve para traer se los datos de las citas y mostrarlos dentro de una tabla (DataTable.js)
 */

var diagnosis;
function getDiagnosis () {
	$.ajax({
		"method": "GET",
		"url": URL+"/diagnosticos/listarEnfermedadSintomas"
	}).done( function ( response ) {
		diagnosis = JSON.parse(response);
		console.log(diagnosis);
	});	
}

getDiagnosis();

/**
 * [show inicializa el dataTable de personal con un llamado a ajax]
 * @return {[type]} [description]
 */
function show () {

	var tableDiagnosis = $("#tableDiagnosis").DataTable({

		"destroy": true,
		"searching": true,
    	"ordering":  true,
		"deferRender": true,
		"language": languageSpanish,
		"ajax": {
			"method": "POST",
			"url": URL+"/diagnosticos/listar"
		},
		"columns": [
			{
				"data": "paciente",
                "render": function ( data, type, row ) {
                	return data;
                }
			},
			{
				"data": "medico",
                "render": function ( data, type, row ) {
                	return data;
                }
			},
			{
				"data": "enfermedad",
                "render": function ( data, type, row ) {
                	return data;
                }
			},
			{
				"data": null,
				defaultContent: "<i class='fa fa-eye showMoreInfo iconSuccessColor iconOptions' data-toggle='modal' data-target='.modalDiagnosisToShow'></i> <i class='fa fa-file-o iconDangerColor reportShowMoreInfo iconOptions'></i>"
			}
		]
	});

	$("#tableDiagnosis tbody").on("click", "i.showMoreInfo", function () {

		var data = getData(tableDiagnosis, $(this));
		diagnosisToShow(data.id);

	});

	$("#tableDiagnosis tbody").on("click", "i.reportShowMoreInfo", function () {

		var data = getData(tableDiagnosis, $(this));
		var dataDiagnoticoPaciente = diagnosis[data.id];

		window.location = URL+'/reportes/diagnoticoPacientePdf?data='+JSON.stringify(dataDiagnoticoPaciente)+'';

	});
	
	$(".dataTables_length").remove();

	$(".content-table-diagnosis").find("input[type='search']").attr("id","searchTableUsers");
	$(".content-table-diagnosis").find("input[type='search']").attr("placeholder","Buscar...");
	$(".content-table-diagnosis").find("input[type='search']").addClass("searchTables");
	$(".content-table-diagnosis").find("#tableDiagnosis_filter").prepend("<label for='searchTableUsers' class='iconSearch'> <i class='fa fa-search' aria-hidden='true'></i> </label>");

	
}

function getData (table, button) {

	var data = table.row( button.parents("tr") ).data();
	return data;

}
