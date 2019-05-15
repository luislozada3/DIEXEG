var sintomas;

function addSintomasModal (diagnosticado) {
	diagnosticado = diagnosticado || false;
	$("#sintomasModal").empty();
	$('#sintomasPacienteModal').empty();
	$("#formAddCita").css("display","block");
	if (!diagnosticado) {
		$("#contentSintomasModal").css("display","block");
		$.ajax({
			"method": "GET",
			"url": URL+"/diagnosticos/sintomas"
		}).done( function ( response ) {
			sintomas = JSON.parse(response);
			$("#sintomasModal").prepend("<input type='text' id='searchBarSintomas' placeholder='Buscar por sintomas...' onkeyup='seachSintomas(event)'>");
			$.each(sintomas, function (index, value) {
				var style = '';
				if (index === 0) {
					style = 'style="margin-top: 35px;"';
				}
				$("#sintomasModal").append('<div data-sintomas="'+value.id+'" '+style+' class="itemSistomas">' + 
											value.nombre + 
										'</div>');
			});

			$('#sintomasModal .itemSistomas').click( function () {
				var that = $(this);
				$(this).fadeOut(function() {
					var length = $("#sintomasModal .itemSistomas").length;
					var firstElement = that.prev().hasClass('itemSistomas');
					if (!firstElement && length > 1) {
						var sintomasModal = document.getElementById('sintomasModal');
						var item = sintomasModal.getElementsByClassName('itemSistomas')[1];
						item.style.marginTop = "35px";
					}
					that.attr("style","");
					that.append("<span data-item='old' class='fa fa-times removeSintomaNew' onclick='removeItemSistomasCliente(event)'></span>");
					that.removeClass('itemSistomas');
					that.remove();
					that.addClass('itemSistomasCliente');
		   			that.appendTo( $('#sintomasPacienteModal') ).fadeIn();
				});



			});
		});

	}else{
		$("#contentSintomasModal").css("display","none");
	}
}

addSintomasModal();

function seachSintomas (e) {
	var sintomasPacienteModal = [];
	$.each($("#sintomasPacienteModal .itemSistomasCliente"), function (index, sintoma) {
		sintomasPacienteModal.push(sintoma.textContent);
	});

	var searchSintomasValue = e.target.value;
	var sintomasArray = sintomas.slice();
	if (sintomasPacienteModal.length > 0) {
		sintomasArray = sintomasArray.filter( function (sintoma) {
			return sintomasPacienteModal.indexOf(sintoma.nombre) == -1
		});
	}


	$(".itemSistomas").remove();
	if (searchSintomasValue) {
		var newArray = sintomasArray.filter( function (sintoma) {
			return sintoma.nombre.indexOf(searchSintomasValue) != -1
		});

		if (newArray.length > 0) {

			newArray.forEach( function (sintoma, index) {
				var style = "style=''";
				if ( index == 0 ) {
					style = "style='margin-top: 35px;'";
				}
				$("#sintomasModal").append('<div '+style+' data-sintomas="'+sintoma.id+'" class="itemSistomas">' + 
											sintoma.nombre + 
										'</div>');
			});			
		}

	}else{
		sintomasArray.forEach( function (sintoma, index) {
			style = 'style=""';
			if (index == 0) {
				var style = 'style="margin-top: 35px;';
			}
			$("#sintomasModal").append('<div '+style+' data-sintomas="'+sintoma.id+'" class="itemSistomas">' + 
										sintoma.nombre + 
									'</div>');
		});					
	}

	$('#sintomasModal .itemSistomas').click( function () {
		var that = $(this);
		$(this).fadeOut(function() {
			var length = $("#sintomasModal .itemSistomas").length;
			var firstElement = that.prev().hasClass('itemSistomas');
			if (!firstElement && length > 1) {
				var sintomasModal = document.getElementById('sintomasModal');
				var item = sintomasModal.getElementsByClassName('itemSistomas')[1];
				item.style.marginTop = "35px";
			}
			that.attr("style","");
			that.append("<span data-item='old' class='fa fa-times removeSintomaNew' onclick='removeItemSistomasCliente(event)'></span>");
			that.removeClass('itemSistomas');
			that.remove();
			that.addClass('itemSistomasCliente');
   			that.appendTo( $('#sintomasPacienteModal') ).fadeIn();
		});
	});
}


function showQuotes () {

	var tableDiagnosisQuotes = $("#tableDiagnosisQuotes").DataTable({

		"destroy": true,
		"searching": true,
    	"ordering":  true,
		"deferRender": true,
		"language": languageSpanish,
		"ajax": {
			"method": "POST",
			url: URL+"/citas/showPendingAppointments",
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
                	var medico = row.medico + " ( " + row.profesion + " )";
                	return medico;
                }
			},
			{
				"data": "hora",
                "render": function ( data, type, row ) {
                	var dateTime = row.hora + " - " + row.fecha;
                	return dateTime;
                }
			},
			{
				"data": null,
				defaultContent: "<i class='fa fa-stethoscope btnDiagnosis iconOptions' data-toggle='modal' data-target='.modalDiagnosisQuotesToShow' title='diagnosticar'></i> "
			}
		]
	});

	$("#tableDiagnosisQuotes tbody").on("click", "i.btnDiagnosis", function () {
		$("#formAddDiagnosisPersonalizado").css("display","none");
		$("#btnAddCita").css('display','inline-block');
		var data = getData(tableDiagnosisQuotes, $(this));
		$("#modal_cita_id").val(data.cita_id);
		$("#diagnosisResponse").empty();
		addSintomasModal(false);
	});

	
	$(".dataTables_length").remove();

	$(".content-table-diagnosis-quotes").find("input[type='search']").attr("id","searchTableDiagnosisQuotes");
	$(".content-table-diagnosis-quotes").find("input[type='search']").attr("placeholder","Buscar...");
	$(".content-table-diagnosis-quotes").find("input[type='search']").addClass("searchTables");
	$("#tableDiagnosisQuotes_filter").prepend("<label for='searchTableDiagnosisQuotes' class='iconSearch'> <i class='fa fa-search' aria-hidden='true'></i> </label>");
	$("#tableDiagnosisQuotes").css("width","100%");	
}

function getData (table, button) {
	var data = table.row( button.parents("tr") ).data();
	return data;

}

