function changeGraphic () {
	var $listGraphicsToShow = $(".listGraphicsToShow");
	var $li = $listGraphicsToShow.find('li');
	$li.click(function () {
		$li.removeClass('selected');
		$(this).addClass('selected');
		var typeGraphic = $(this).data().typegraphic;
		var selectedGraph = $("#selectedGraph");
		selectedGraph.empty();
		var titleText = $("#selectDataGraphic option:selected").text();
		var conteiner = "selectedGraph";
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
				//funcion para grafico de area en el visor principal
				areaChart(conteiner, titleText, data);
			break;
			case 'columnsChart':
				//funcion para grafico de columnas en el visor principal
				columnChart(conteiner, titleText, data);
			break;
			default:
				pieChart(conteiner, titleText, data);
		}

	});
}