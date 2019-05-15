<?php
    /**
    * Creado por Francis Dona 08/04/2018
    * Ultima modificacion por Francis Dona 08/04/2018
    * Controlador Base, incluye el modelo y la vista del controlador que se este usando
    * este controlador sirve de base para instanciar los distintos modelos y poder utilizarlos
    * dentro de los controladores, asi como tambien poder aplicar una vista desde el controlador
    */
	class Controller{

		/**
		 * [model: Obtiene el modelo y lo instancia]
		 * @return [object] [objeto del modelo ingresado]
		 */
		public function model($model){
			require_once "../app/models/".$model.".php";
			return new $model();
		}

		/**
		 *[view: Obtiene la vista y la muestra, si la vista no existe devuelve un error 404]
		 * @param  [string] $view   [vista que se ha llamado]
		 * @param  array  $params [parametros de las vistas]
		 * @return [html] [codigo html de la vista]
		 */
		public function view($view, $data = []){
			if (file_exists("../app/views/".$view.".php")) {
				require_once "../app/views/".$view.".php";
			}else{
				// si el archivo de vista llamado no existe manda un error 404
				die("error 404, Pagina buscado no existe");
			}
		}

	}
   