	/**
	 * Creado por Francis Dona 19/04/2018
	 * Modificado por Francis Dona 19/04/2018
	 * Sirve para traer se los datos de los usuarios y mostrarlos dentro de una tabla (DataTable.js)
	 */

	/**
	 * [show inicializa el dataTable de usuarios con un llamado a ajax]
	 * @return {[type]} [description]
	 */
	function show () {

		var tableUser = $("#tableUsers").DataTable({

			"destroy": true,
			"searching": true,
	    	"ordering":  true,
			"deferRender": true,
			"language": languageSpanish,
			"ajax": {
				"method": "POST",
				"url": URL+"/usuarios/listar"
			},
			"columns": [
				{
					"data": "nivel",
	                "render": function ( data, type, row ) {
	                	if (data == "Administrador") {
	                		var status = "<i class='fa fa-star iconRol iconRolDanger' aria-hidden='true' data-toggle='tooltip' title='Administrador'></i> Administrador";
	                	}else{
	                		var status = "<i class='fa fa-archive iconRol iconRolSuccess' aria-hidden='true' data-toggle='tooltip' title='Secretaria'></i> Secretaria";
	                	}
	                	return status;
	                }
	            },
				{
					"data": "usuario",
	                "render": function ( data, type, row ) {
	                	var link = "<span class='showLink showUser' data-toggle='modal' data-target='.bd-example-modal-lg'>"+ data +"<span>";
	                	return link;
	                }
				},
				{
					"data": "estatus",
	                "render": function ( data, type, row ) {
	                	if (data == 1) {
	                		var status = "<span class='outLine outLine-success'> Activo </span>"
	                	}else{
	                		var status = "<span class='outLine outLine-warning'> Bloqueado </span>"
	                	}
	                	return status;
	                }
				},
				{
					"data": "estatus",
	                "render": function ( data, type, row ) {
	                	if (data == 1) {

	                		var buttons = /*"<i class='fa fa-edit editUser iconPrimaryColor iconOptions' aria-hidden='true' data-toggle='tooltip' title='Actualizar'></i>"+*/
	                					  // "<i class='fa fa-trash deleteUser iconDangerColor iconOptions' aria-hidden='true' data-toggle='tooltip' title='Eliminar'></i>"+
	                					  "<i class='fa fa-unlock-alt lockUser iconWarnningColor iconOptions' aria-hidden='true' data-lock='-1' data-toggle='tooltip' title='Deshabilitar usuario'></i>";

	                	}else{

	                		var buttons = /*"<i class='fa fa-edit editUser iconPrimaryColor iconOptions' data-toggle='tooltip' title='Actualizar'></i>"+*/
	                					  // "<i class='fa fa-trash deleteUser iconDangerColor iconOptions' aria-hidden='true' data-toggle='tooltip' title='Eliminar'></i>"+
	                					  "<i class='fa fa-lock lockUser iconWarnningColor iconOptions' aria-hidden='true' data-lock='1' data-toggle='tooltip' title='Habilitar usuario'></i>";



	                	}
	                	return buttons;
	                }
				}
			]
		});

		$("#tableUsers tbody").on("click", "i.deleteUser", function () {

			var data = getData(tableUser, $(this));
			alertify.confirm('Se eliminara el usuario seleccionado', "¿Desea continuar?", 
				function(){ 
					deleteUser(data.id);
				},
				function(){ 
					console.log("No se eleimino al usuario");
				}
			);


		});

		$("#tableUsers tbody").on("click", "span.showUser", function () {

			var data = getData(tableUser, $(this));
			$("#userName").text(data.usuario);
			$(".imgUserModal").attr("src",PUBLIC_IMG+"/usuarios/"+data.imagen);
			$(".fullName").text(data.nombre+" "+data.apellido);
			$(".job").text(data.oficio);

			if ( data.estatus == 1 ) {
				$(".showIconStatus").removeClass("fa fa-ban");
				$(".showIconStatus").addClass("fa fa-check");
				$(".status").text("Activo");
			}else{
				$(".showIconStatus").removeClass("fa fa-check");
				$(".showIconStatus").addClass("fa fa-ban");
				$(".status").text("Bloqueado");
			}
			$(".role").text(data.nivel);

		});

		$("#tableUsers tbody").on("click", "i.lockUser", function () {

			var data = getData(tableUser, $(this));
			var dataLock = $(this).data('lock');
			var message = (dataLock == -1) ? "Se bloqueara el usuario seleccionado" : "Se desbloqueara el usuario seleccionado";

			alertify.confirm(message, "¿Desea continuar?", 
				function(){ 
					blockAndUnlock(data.id, dataLock);
				},
				function(){ 
					console.log("No se realizo la accion de bloqueo o desbloqueo de usuario");
				}
			);
			
		});
		
		$(".dataTables_length").remove();

		$("#tableUsers_filter").find("input[type='search']").attr("id","searchTableUsers");
		$("#tableUsers_filter").find("input[type='search']").attr("placeholder","Buscar...");
		$("#tableUsers_filter").find("input[type='search']").addClass("searchTables");
		$("#tableUsers_filter").prepend("<label for='searchTableUsers' class='iconSearch'> <i class='fa fa-search' aria-hidden='true'></i> </label>");

		$(".content-table").prepend("<div class='col-md-12' id='headerOptions'></div>");

		$("#headerOptions").append($(".dataTables_filter"));

		
	}

	function getData (table, button) {

		var data = table.row( button.parents("tr") ).data();
		return data;

	}
