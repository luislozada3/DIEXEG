$(document).ready( function () {
	
	$(".content-table").append("<table id='tableHistory' class='table compact'>"+
                        							"<thead>"+
                            							"<tr>"+
							                                "<th> Responsable </th>"+
							                                "<th> Accion </th>"+
							                            "</tr>"+
                        							"</thead>"+
                        							"<tbody>"+
                        							"</tbody>"+
                        						"</table>");

	show();
});