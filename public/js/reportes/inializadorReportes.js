$(document).ready(function() {

	$(".content-report").append("<div class='row'>"+
										"<div class='col-md-4 previewGraphi'>"+
										"</div>"+
										"<div class='col-md-8 containerGraphi'>"+
											"<div id='selectedGraph'></div>"+
										"</div>"+
								"</div>");


	var contentPreviewGraphi = $(".previewGraphi");

	contentPreviewGraphi.append("<ul class='listGraphicsToShow'>"+
									"<li data-typeGraphic='pieChart' class='selected'>"+
										"<img src='"+PUBLIC_IMG+"/miniGraphics/pieChart.png' class='imgGraphicList'>"+
									"</li>"+
									"<li data-typeGraphic='barChart'>"+
										"<img src='"+PUBLIC_IMG+"/miniGraphics/barChart.png' class='imgGraphicList'>"+
									"</li>"+
									"<li data-typeGraphic='donutChart'>"+
										"<img src='"+PUBLIC_IMG+"/miniGraphics/donutChart.png' class='imgGraphicList'>"+
									"</li>"+
									"<li data-typeGraphic='lineChart'>"+
										"<img src='"+PUBLIC_IMG+"/miniGraphics/lineChart.png' class='imgGraphicList'>"+
									"</li>"+
									"<li data-typeGraphic='areaChart'>"+
										"<img src='"+PUBLIC_IMG+"/miniGraphics/areaChart.png' class='imgGraphicList'>"+
									"</li>"+
									"<li data-typeGraphic='columnsChart'>"+
										"<img src='"+PUBLIC_IMG+"/miniGraphics/columnChart.png' class='imgGraphicList'>"+
									"</li>"+
								"</ul>");

	widthContentPreviewGraphi = contentPreviewGraphi.width();

	widthElementContentGraphi = ( widthContentPreviewGraphi / 2 ) - 28;

	var $listGraphicsToShow = $(".listGraphicsToShow");
	var elementContentGraphi = $listGraphicsToShow.find('li');

	/**Aplicando estilos de ancho y alto a los elemtos contenedores de los graficos  */
	elementContentGraphi.css({
		width: widthElementContentGraphi+"px", 
		height: widthElementContentGraphi+"px"
	});
	
	// inicializando la data y la grafica principal
	initializeData();
});