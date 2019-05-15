<?php
/**
* Creado por Francis Dona 28/06/2018
* Ultima modificacion por Francis Dona 28/06/2018
* Controlador del bitacora, contiene todos las funcionalidad de la bitacora de historial
*/

	class bitacoraController extends Controller{

		private $bitacoraModel = "Bitacora";

		public function __construct(){
			$this->bitacoraModel = $this->model($this->bitacoraModel);
		}

		/**
		 * [index se encarga de mostrar la vista de historial de bitacora]
		 * @return [html] []
		 */
		public function index(){
			$this->view("historial/index");
		}

		/**
		 * [listar obtiene todos los datos de la bitocara]
		 * @return [json] [envia un objeto en formato json para mostrarse en la tabla (dataTable)]
		 */
		public function listar () {
			$history = $this->bitacoraModel->query("SELECT usuarios.usuario, bitacora.descripcion FROM usuarios INNER JOIN bitacora ON bitacora.usuario_id=usuarios.id");
			$history = [ "data" => $history];
			$dataJSON = json_encode($history);
			echo $dataJSON;
		}
	}