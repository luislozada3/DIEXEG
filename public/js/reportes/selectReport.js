function selectReport () {
	var selectDataGraphic = document.getElementById("selectDataGraphic");
	var selectedGraph = $("#selectedGraph");

	var conteiner = "selectedGraph";

	selectDataGraphic.addEventListener("change", function () {
		var titleText = this.options[this.selectedIndex].text;
		var type = this.value;
		var url = URL+"/reportes/"+type;
		$("#btnReportPdf").attr("href",URL+"/reportes/pdf?type="+type);
		var listGraphicsToShow = $(".listGraphicsToShow");
		var typeGraphic = listGraphicsToShow.find("li.selected").data().typegraphic;

		$.ajax({
			url: url,
			type: "GET",
			beforeSend: function () {
				selectedGraph.empty();
				selectedGraph.append("<img src='"+PUBLIC_IMG+"/loading.gif' class='imgLoadingGraphic'/>");
			}
		}).done( function (response) {
			data = JSON.parse(response);

			selectedGraph.empty();
			switch (typeGraphic) {
				case 'pieChart':
					//funcion para grafico de torta en el visor principal
					pieChart(conteiner, titleText, data);
				break;
				case 'barChart':
					//funcion para grafico de barras en el visor principal
					barChart(conteiner, titleText, data);
				break;
				case 'donutChart':
					//funcion para grafico de dona en el visor principal
					donutChart(conteiner, titleText, data);
				break;
				case 'lineChart':
					//funcion para grafico de lineas en el visor principal
					lineChart(conteiner, titleText, data);
				break;
				case 'areaChart':
					//funcion para grafico de piramide en el visor principal
					areaChart(conteiner, titleText, data);
				break;
				case 'columnsChart':
					//funcion para grafico de columnas en el visor principal
					columnChart(conteiner, titleText, data);
				break;
				default:
					pieChart(conteiner, titleText, data);
			}
		}).fail( function (error) {
			console.log(error);
		});
	});
}