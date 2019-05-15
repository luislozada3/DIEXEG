	/**
	 * Creado por Maria 09/06/2018
	 * Modificado por Maria 09/06/2018
	 * Sirve para traer se los datos del personal y mostrarlos dentro de una tabla (DataTable.js)
	 */

	/**
	 * [show inicializa el dataTable de personal con un llamado a ajax]
	 * @return {[type]} [description]
	 */
	function show () {

		var tablePersonal = $("#tablePersonal").DataTable({

			"destroy": true,
			"searching": true,
	    	"ordering":  true,
			"deferRender": true,
			"language": languageSpanish,
			"ajax": {
				"method": "POST",
				"url": URL+"/personal/listar"
			},
			"columns": [
				{
					"data": "nombre",
	                "render": function ( data, type, row ) {
	                	return row.nombre + " " + row.apellido;
	                }
				},
				{"data": "oficio"},
				{
					"data": "tipo",
	                "render": function ( data, type, row ) {
	                	if (data == "personal") {
	                		var status = "<span class='outLine outLine-info'> Administrativo </span>"
	                	}else{
	                		var status = "<span class='outLine outLine-success'> Medico </span>"
	                	}
	                	return status;
	                }
				},
				{
					"data": "estatus",
	                "render": function ( data, type, row ) {
	                		var buttons = "<i class='fa fa-edit editPersonal iconPrimaryColor iconOptions' aria-hidden='true' data-toggle='tooltip' title='Actualizar'></i>";
	                					  // "<i class='fa fa-trash deletePersonal iconDangerColor iconOptions' aria-hidden='true' data-toggle='tooltip' title='Eliminar'></i>";
	                	return buttons;
	                }
				}
			]
		});

		$("#tablePersonal tbody").on("click", "i.deletePersonal", function () {

			var data = getData(tablePersonal, $(this));

			alertify.confirm('Se eliminara la persona seleccionada', "¿Desea continuar?", 
				function(){ 
					deletePersonal(data.id, data.tipo);
				},
				function(){ 

				}
			);
		});

		$("#tablePersonal tbody").on("click", "i.editPersonal", function () {
			$("#modelUpdatePersonal").find(".textHelp").text("");
			var data = getData(tablePersonal, $(this));
			var name = data.nombre;
			var lastName = data.apellido;
			$("#nombre").val(name);
			$("#apellido").val(lastName);
			$("#oficio").val(data.oficio);
			$("#id").val(data.id);
			// $("#tipo").val(data.tipo);
			$("#type").val(data.tipo);
			$("#modelUpdatePersonal").modal("show");
		});
		
		$(".dataTables_length").remove();

		$("#tablePersonal_filter").find("input[type='search']").attr("id","searchTableUsers");
		$("#tablePersonal_filter").find("input[type='search']").attr("placeholder","Buscar...");
		$("#tablePersonal_filter").find("input[type='search']").addClass("searchTables");
		$("#tablePersonal_filter").prepend("<label for='searchTableUsers' class='iconSearch'> <i class='fa fa-search' aria-hidden='true'></i> </label>");

		$(".content-table").prepend("<div class='col-md-12' id='headerOptions'></div>");

		$("#headerOptions").append($(".dataTables_filter"));

		
	}

	function getData (table, button) {

		var data = table.row( button.parents("tr") ).data();
		return data;

	}
