/**
 * Creado por Maria 10/06/2018
 * Modificado por Maria 10/06/2018
 * Sirve para traer los datos de los pacientes y mostrarlos dentro de una tabla (DataTable.js)
 */

/**
 * [show inicializa el dataTable de los pacientes con un llamado a ajax]
 * @return {[type]} [json]
 */
function show () {

	var tablePacientes = $("#tablePacientes").DataTable({

		"destroy": true,
		"searching": true,
    	"ordering":  true,
		"deferRender": true,
		"language": languageSpanish,
		"ajax": {
			"method": "POST",
			"url": URL+"/pacientes/listar"
		},
		"columns": [
			{"data": "cedula"},
			{
				"data": "nombre",
                "render": function ( data, type, row ) {
                	var fullName = row.nombre + " " + row.apellido;
                	var link = "<span class='showLink showPaciente' data-toggle='modal' data-target='.bd-example-modal-lg'>"+ fullName +"<span>";
                	return link;
                }
			},
			{
				"data": null,
				defaultContent: "<i class='fa fa-edit editPaciente iconPrimaryColor iconOptions' data-toggle='modal' data-target='#modelUpdatePaciente' data-whatever='@mdo' title='Actualizar'></i>"+
								// "<i class='fa fa-trash deletePaciente iconDangerColor iconOptions' aria-hidden='true' data-toggle='tooltip' title='Eliminar'></i>"+
								"<i class='fa fa-calendar addCitaPaciente iconOptions' aria-hidden='true' title='asignar cita'></i>"
			}
		]
	});

	$("#tablePacientes tbody").on("click", "i.deletePaciente", function () {

		var data = getData(tablePacientes, $(this));


		alertify.confirm('Se eliminara el paciente', "¿Desea continuar?", 
			function(){ 
				deletePaciente(data.id);
			},
			function(){ 
				console.log("No se eleimino el paciente");
			}
		);

	});

	$("#tablePacientes tbody").on("click", "i.editPaciente", function () {

		var data = getData(tablePacientes, $(this));
		var formEditar = $("#formEditPaciente");
		formEditar.find("#cedula").val(data.cedula);
		formEditar.find("#nombre").val(data.nombre);
		formEditar.find("#apellido").val(data.apellido);
		formEditar.find("#fn").val(data.fecha_nacimiento);
		formEditar.find("#peso").val(data.peso);
		formEditar.find("#altura").val(data.talla);
		formEditar.find("#direccion").val(data.direccion);
		formEditar.find("#descripcion").val(data.descripcion);
		formEditar.find("#id").val(data.id);
		formEditar.find("#sexo").val(data.sexo);


	});

	$("#tablePacientes tbody").on("click", "span.showPaciente", function () {

		var data = getData(tablePacientes, $(this));
		showCitas(data.id);
		showHistory(data.id);
		$(".showLink").removeClass('selectedShowLink');
		$(this).addClass('selectedShowLink');

	});

	$("#tablePacientes tbody").on("click", "i.addCitaPaciente", function () {
		$("#modalcitaPaciente").find(".textHelp").text("");
		var data = getData(tablePacientes, $(this));
		var formEditar = $("#modalcitaPaciente");
		formEditar.find("#idPacienteCita").val(data.id);
		$("#modalcitaPaciente").modal("show");

	});
	
	$(".dataTables_length").remove();

	$("#tablePacientes_filter").find("input[type='search']").attr("id","searchTablePacientes");
	$("#tablePacientes_filter").find("input[type='search']").attr("placeholder","Buscar...");
	$("#tablePacientes_filter").find("input[type='search']").addClass("searchTables");
	$("#tablePacientes_filter").prepend("<label for='searchTablePacientes' class='iconSearch'> <i class='fa fa-search' aria-hidden='true'></i> </label>");

	$(".content-table").prepend("<div class='col-md-12' id='headerOptions'></div>");

	$("#headerOptions").append($(".dataTables_filter"));

	
}

function getData (table, button) {

	var data = table.row( button.parents("tr") ).data();
	return data;

}
