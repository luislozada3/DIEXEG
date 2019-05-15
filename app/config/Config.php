<?php
/**
* Creado por Francis Dona 08/04/2018
* Ultima modificacion por Francis Dona 08/04/2018
* Contiene todas la constante que se necesitan en la aplicacion
* Estas constantes se utilizan para las diversas rutas que se utilizaran en la aplicacion
* asi como los datos de la conexion a la base de datos
*/

	// Contaste de configuracion de la base de datos
	define("DB_HOST","localhost");
	define("DB_USER","root");
	define("DB_PASSWORD","");
	define("DB_NAME","diexeg");
	define("DB_DRIVER","mysql");
	define("DB_CHARSET","utf8");

	//Constantes del PATH
	define("PATH_APP",dirname(dirname(__FILE__)));
	define("URL","http://localhost/diexeg/");
	define("PUBLIC_CSS","http://localhost/diexeg/public/css");
	define("PUBLIC_JS","http://localhost/diexeg/public/js");
	define("PUBLIC_FONTS","http://localhost/diexeg/public/fonts");
	define("PUBLIC_IMG","http://localhost/diexeg/public/img");	
	define("PUBLIC_PLUGINS","http://localhost/diexeg/public/plugins");	
	define("PATH_PUBLIC","http://localhost/diexeg/public");
	define("NAME_APP","Diexeg");