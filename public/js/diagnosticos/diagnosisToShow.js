function diagnosisToShow ( idDiagnosis ) {
	var sintomas = diagnosis[idDiagnosis].sintomas;
	var tratamiento = diagnosis[idDiagnosis].tratamiento;
	var modalBodyLeft = $("#modalDiagnosisToShowBodyLeft");
	var modalBodyCenter = $("#modalDiagnosisToShowBodyCenter");
	var modalBodyRight = $("#modalDiagnosisToShowBodyRight");
	modalBodyLeft.empty();
	modalBodyCenter.empty();
	modalBodyRight.empty();
	$("#titleModalDiagnosis").html("Diagnostico <b> " + diagnosis[idDiagnosis].paciente + "</b>");
	modalBodyLeft.append("<p class='fontBold'> Cita: </p>");
	modalBodyLeft.append("<p> Fecha: " + diagnosis[idDiagnosis].fecha_cita + "</p>");
	modalBodyLeft.append("<p> Hora: " + diagnosis[idDiagnosis].hora_cita + "</p>");

	modalBodyCenter.append("<p class='fontBold'> Enfermedad: </p>");
	modalBodyCenter.append("<p>" + diagnosis[idDiagnosis].diagnostico + "</p>");
	
	modalBodyCenter.append("<p class='fontBold'> Sintomas: </p>");
	
	$.each( sintomas, function (index, value) {
		modalBodyCenter.append("<p>* " + value + " </p>");
	});

	modalBodyRight.append("<p class='fontBold'> Medico: </p>");
	modalBodyRight.append("<p>" + diagnosis[idDiagnosis].medico + "</p>");

	modalBodyRight.append("<p class='fontBold'> Tratamiento: </p>");

	$.each( tratamiento, function (index, value) {
		modalBodyRight.append("<p>* " + value + " </p>");
	});
}