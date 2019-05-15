	/**
	 * Creado por Francis Dona 28/06/2018
	 * Modificado por Francis Dona 28/06/2018
	 * Sirve para traer se los datos de la bitacora y mostrarlos dentro de una tabla (DataTable.js)
	 */

	/**
	 * [show inicializa el dataTable de bitacora con un llamado a ajax]
	 * @return {[type]} [description]
	 */
	function show () {

		var tableHistory = $("#tableHistory").DataTable({

			"destroy": true,
			"searching": true,
	    	"ordering":  true,
			"deferRender": true,
			"language": languageSpanish,
			"ajax": {
				"method": "POST",
				"url": URL+"/bitacora/listar"
			},
			"columns": [
				{"data": "usuario"},
				{"data": "descripcion"}
			]
		});

		
		$(".dataTables_length").remove();

		$("#tableHistory_filter").find("input[type='search']").attr("id","searchTableUsers");
		$("#tableHistory_filter").find("input[type='search']").attr("placeholder","Buscar...");
		$("#tableHistory_filter").find("input[type='search']").addClass("searchTables");
		$("#tableHistory_filter").prepend("<label for='searchTableUsers' class='iconSearch'> <i class='fa fa-search' aria-hidden='true'></i> </label>");

		$(".content-table").prepend("<div class='col-md-12' id='headerOptions'></div>");

		$("#headerOptions").append($(".dataTables_filter"));

		
	}
