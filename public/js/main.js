function validateExtension (inputFile) {
	    
	var file = inputFile.val();
	var ext = file.substring(file.lastIndexOf(".")).toUpperCase();
	if (ext != ".JPG" && ext != ".JPEG" && ext != ".PNG") {
		return 0;
	}else{
		return 1;
	}
}

function validateNumber (value) {
	
	var numbers = "0123456789";
	
	for( i = 0; i < value.length; i++ ){

	  if (numbers.indexOf(value.charAt(i),0)!=-1){
	     return 1;
	  }

	}
	
	return 0;
}

function validateCapitalLetter(value){
	
	var CapitalLetter = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	
	for( i = 0; i < value.length; i++ ){

	  if (CapitalLetter.indexOf(value.charAt(i),0)!=-1){
	     return 1;
	  }

	}

	return 0;
}

function validateEmpty (element) {
	
	var empty = true;
	
	$.each(element, function (index, input) {

		if(input.val() == ""){
			input.next().text("Complete este campo");
			empty = false;
		}else{
			input.next().text("");
		}
		
	});

	return empty;

}

function filePreview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
        	$('#uploadForm').find(".img-circle").fadeOut( function () {
	            $('#uploadForm').find(".img-circle").remove();
	            $('#uploadForm').find(".label-input-profile")
	            				.prepend('<img src="'+e.target.result+'" alt="usuario" class="img-circle" width="150" height="150"/>')
	            				.fadeIn();
        	});
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$('.chip .close').click( function () {
	$(this).parent().fadeOut(400);

});

function selectDisabled (e) {
    if ( e.target.value != null || e.target.value != "") {
        var optionEmpty = e.target.firstChild.nextSibling;
        optionEmpty.setAttribute("disabled","disabled");
    }
}

function getPreparedData (data) {
  var dataLength = data.length;
  var dataProvider = [];
  var count = 0;
  for (var i = 0; i < dataLength; i++) {
    count += parseInt(data[i].cantidad);
    dataProvider.push({name: data[i].enfermedad});
  }
  
  for (var i = 0; i < dataLength; i++) {
    var percentage = parseInt(data[i].cantidad) * 100 / count;
    dataProvider[i].y = parseInt(percentage);
  }

  return dataProvider;
}

function getPreparedDataColumn (data) {
  var dataLength = data.length;
  var dataProvider = [];
  var count = 0;
  for (var i = 0; i < dataLength; i++) {
    count += parseInt(data[i].cantidad);
    dataProvider.push({name: data[i].enfermedad});
    dataProvider[i].data = [];
  }
  
  for (var i = 0; i < dataLength; i++) {
    var percentage = parseInt(data[i].cantidad) * 100 / count;
    percentage = parseFloat(percentage.toFixed(2));
    dataProvider[i].data.push( percentage );
  }

  return dataProvider;
}

function getPreparedDataLine (data) {
  var dataLength = data.length;
  var dataProvider = [];

  for (var i = 0; i < dataLength; i++) {
    dataProvider.push({name: data[i].enfermedad, data: new Array(1).fill(0)});
    dataProvider[i].data.push(parseInt(data[i].cantidad));
  }

  return dataProvider;
}

function justNumber(e) {
    var tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true; //Tecla de retroceso (para poder borrar)
    if (tecla==48) return true;
    if (tecla==49) return true;
    if (tecla==50) return true;
    if (tecla==51) return true;
    if (tecla==52) return true;
    if (tecla==53) return true;
    if (tecla==54) return true;
    if (tecla==55) return true;
    if (tecla==56) return true;
    var patron = /1/; //ver nota
    var te = String.fromCharCode(tecla);
    return patron.test(te); 
} 

function justNumberAndPoint(e) {
    var tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true; //Tecla de retroceso (para poder borrar)
    if (tecla==46) return true;
    if (tecla==48) return true;
    if (tecla==49) return true;
    if (tecla==50) return true;
    if (tecla==51) return true;
    if (tecla==52) return true;
    if (tecla==53) return true;
    if (tecla==54) return true;
    if (tecla==55) return true;
    if (tecla==56) return true;
    var patron = /1/; //ver nota
    var te = String.fromCharCode(tecla);
    return patron.test(te); 
} 

function justLetters(event) {
  var regex = new RegExp("^[a-zA-Z ]+$");
  var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
  if (!regex.test(key)) {
    event.preventDefault();
    return false;
  }
}

function alphaNumeric (event) {
  var regex = new RegExp("^[a-zA-Z0-9 ]+$");
  var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
  if (!regex.test(key)) {
    event.preventDefault();
    return false;
 }
}

function getDateNow() {
  var date = new Date(); //Fecha actual
  var month = date.getMonth()+1; //obteniendo month
  var day = date.getDate(); //obteniendo dia
  var year = date.getFullYear(); //obteniendo año
  
  if( day < 10 ) {
    day = '0' + day; //agrega cero si el menor de 10    
  }

  if( month < 10 ){
    month = '0' + month; //agrega cero si el menor de 10    
  }

  return year+"-"+month+"-"+day;
}

$("#formEditPaciente #fn").attr('max', getDateNow());
$("#formAddPaciente #fn").attr('max', getDateNow());
$("#formAddCita #fecha").attr('min', getDateNow());