<?php
/**
 * creado por Francis Dona 08/04/2018
 * modificado por Francis Dona 08/04/2018
 * funciones ayudante para la aplicacion
 * los helpers son pequeñas funciones que ayudan en determinados cosas,
	 * por ejemplo el helper redirecTo que ayuda a redireccionar a otra direccion
 */

/**
 * [redirectTo ayudante para redireccionar]
 * @param  [string] $page [ruta donde se va a ridireccionar]
 * @return [html] []
 */
function redirectTo($page){
	header("Location:".URL.$page);
}

/**
 * [passwordEncripterD encriptacion de contraseñas con hash]
 * @param  [string] $password [contraseña del usuario]
 * @return [string] [contraseña encriptada]
 */
function passwordEncripterD($password){
	$password = base64_encode($password);
	$password = password_hash($password, PASSWORD_DEFAULT);
	return $password;
}

/**
 * [passwordDecryptD verifica si la contraseña introducida por el usuario 
 * el la misma que esta en la base de datos]
 * @param  [string] $password [contraseña que tipio el usuario]
 * @param  [string] $hash [contraseña encriptada del usuario (DB)]  
 * @return [boolean] [true o false dependiendo si coinciden las contraseñas]
 */
function passwordVerifyD($password, $hash){
	$password = base64_encode($password);
	return password_verify($password, $hash);
}