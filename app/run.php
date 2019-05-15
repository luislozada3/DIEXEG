<?php
	/**
	 * Creado por Francis Dona 08/04/2018
	 * Modificado por Francis Dona 08/04/2018
	 * incluye todos los componentes necesarios para que funcione la app
	 */
	
    require_once "config/Config.php";
    require_once "helpers/helper.php";
    require_once "helpers/helper.php";
    require_once "libraries/fpdf181/fpdf.php";

	spl_autoload_register(function($nameClass){
		require_once "libraries/".$nameClass.".php";
	});