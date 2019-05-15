var patientSymptomsData = [];
var patientSymptomsIdData = [];
var newSymptoms = [];

$("#btnAddCita").click( function () {
	
	var listPatientSymptoms = $("#sintomasPacienteModal");
	var patientSymptoms = listPatientSymptoms.find('.itemSistomasCliente');
	if (patientSymptoms.length == 0) {
		$("#diagnosisResponse").text("Ingrese los sintomas");
	}else{


		patientSymptomsData = [];
		patientSymptomsIdData = [];
		newSymptoms = [];

		$.each( patientSymptoms, function ( index, sintoma ) {
			if (sintoma.getAttribute("data-sintomas")) {
				patientSymptomsData.push(sintoma.innerText);
				patientSymptomsIdData.push(sintoma.getAttribute("data-sintomas"));
			}else{
				newSymptoms.push(sintoma.innerText);
			}
		});

		$.ajax({
			url: URL+'/experto/motorInferencia',
			method: 'POST',
			data: {"patientSymptomsData":  JSON.stringify(patientSymptomsData), "newSymptoms": JSON.stringify(newSymptoms)}
		}).done( function (response) {
			var diagnosis = JSON.parse( response );
			if ( diagnosis.status == 0) {
				$("#formAddCita").css("display","none");
				$("#cancelform").css("display","none");
				$("#formAddDiagnosisPersonalizado").css("display","block");
			
			}else if (diagnosis.status == 2) {
				// si cae aqui es por que solo ingresaron sintomas de manera manual y no hay ninguno de los que ya el sistema tenia
				$("#formAddCita").css("display","none");
				$("#cancelform").css("display","none");
				$("#formAddDiagnosisPersonalizado").css("display","block");

			}else if ( diagnosis.status == 1 ) {


				diagnosis = diagnosis.diagnosis;
				var diagnosisArray = {}; 
				diagnosis.forEach( function (diagnosi, index) {
					if (index == 0) {
						diagnosisArray = diagnosi;
					}else{
						if (parseFloat(diagnosisArray.percentage) < parseFloat(diagnosi.percentage)) {
							diagnosisArray = diagnosi;
						}
						
					}
				});

				if (diagnosisArray.percentage > 70) {
					var idCita = $("#modal_cita_id").val();
					var idPathologies =  diagnosisArray.idPathologies;

					$.ajax({
						url: URL+'/diagnosticos/guardar',
						method: 'POST',
						data: {idCita: idCita, idPathologies: idPathologies, patientSymptomsData: patientSymptomsIdData, newSymptoms: newSymptoms},
						cache: false,

					}).done( function ( response ) {

						if ( response ) {
							$("#diagnosisResponse").text("El paciente Tiene: " + diagnosisArray.pathologies);

								var tableDiagnosisQuotes = $("#tableDiagnosisQuotes").DataTable();
								tableDiagnosisQuotes.clear();
								tableDiagnosisQuotes.ajax.reload();

								var tableDiagnosis = $("#tableDiagnosis").DataTable();
								tableDiagnosis.clear();
								tableDiagnosis.ajax.reload();
								getDiagnosis();			
						}else{
						
							$("#diagnosisResponse").text("Ha ocurrido un problema durante el diagnostico por favor intente nuevamente...");
						
						}

					}).fail( function ( response ) {
						$("#diagnosisResponse").text("Ha ocurrido un problema durante el diagnostico por favor intente nuevamente...");
					});
				}else{
					// si cae aqui es porque las posibilidades de tener la enfermedad que dio el sistema esta por 
					// debajo del 70%
					$("#formAddCita").css("display","none");
					$("#cancelform").css("display","none");
					$("#formAddDiagnosisPersonalizado").css("display","block");
				}
			}
			addSintomasModal(true);
			$("#btnAddCita").css('display','none');

		}).fail( function () {
			alert('error en el envio de datos, por favor revise sin conexion a internet');
		});
	}

	$("#formAddDiagnosisPersonalizado").submit( function () {
		var sintomas = patientSymptomsIdData.slice();
		var nuevosSintomas = newSymptoms.slice();
		var diagnostico = $("#formAddDiagnosisPersonalizado #diagnostico").val();
		var idCita = $("#modal_cita_id").val();

		if (diagnostico != "" && diagnostico != null) {
			$.ajax({
				url: URL+'/diagnosticos/diagnosticoNuevo',
				data: {idCita: idCita, sintomas: JSON.stringify(sintomas), nuevosSintomas: JSON.stringify(nuevosSintomas), enfermedad: diagnostico},
				method: "POST"
			}).done( function (response) {
				response = JSON.parse(response);

				if (response.status == 1) {

					var tableDiagnosisQuotes = $("#tableDiagnosisQuotes").DataTable();
					tableDiagnosisQuotes.clear();
					tableDiagnosisQuotes.ajax.reload();

					var tableDiagnosis = $("#tableDiagnosis").DataTable();
					tableDiagnosis.clear();
					tableDiagnosis.ajax.reload();

					toastr.success(response.message, 'Diagnostico exitoso!', {timeOut: 3000});
					$("#modalDiagnosisQuotesToShow").modal('hide');
					getDiagnosis();
				}else{
					toastr.error(response.message, '', {timeOut: 3000});
				}
			}).fail( function (error) {
				$("#textHelpNew").text("ha ocurrido un error durante la ejecucion por favor verifique su conexion");
			});
		}else{
			alert('complete los campos');
		}
	});
});