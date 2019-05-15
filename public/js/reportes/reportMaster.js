var data = [];
function initializeData () {
	var selectedGraph = $("#selectedGraph");
	$.ajax({
		url: URL+"/reportes/enfermedades",
		type: "GET",
		beforeSend: function () {
			selectedGraph.empty();
			selectedGraph.append("<img src='"+PUBLIC_IMG+"/loading.gif' class='imgLoadingGraphic'/>");
		}
	}).done( function (response) {
		
		data = JSON.parse(response);

		$(".containerSelect").append("Seleccionar Reporte: "+
									"<select id='selectDataGraphic' name='selectDataGraphic' class='selectGraph'>"+
										"<option value='enfermedades'> Enfermedades en pacientes </option>"+
										"<option value='citas'> Citas por mes en el año actual </option>"+
									"</select>"+
									"<a target='_blank'style='margin-left: 15px;' id='btnReportPdf' href='"+URL+"/reportes/pdf?type=enfermedades' class='btn btn-danger'> <span class='fa fa-file-pdf-o'></span> Generar PDF </a>");
		selectedGraph.empty();
		var titleText = $("#selectDataGraphic option:selected").text();
		var conteiner = "selectedGraph";
		pieChart(conteiner, titleText, data);

		selectReport();
		changeGraphic();
	}).fail( function (error) {
		console.log(error);
	});
}