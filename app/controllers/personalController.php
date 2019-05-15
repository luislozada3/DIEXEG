<?php
/**
* Creado por Maria 09/06/2018
* Ultima modificacion por Maria 09/06/2018
Controlador de personal, aqui se encuentra toda la logica para gestionar personal en la aplicacion
*/

	class personalController extends Controller{

		private $personalModel = "Personal";
		private $medicoModel = "Medico";
		private $bitacoraModel = "Bitacora";


		/**
		 * [__construct inicializa el model del personal, medico y bitacora]
		 */
		public function __construct(){
			$this->personalModel = $this->model($this->personalModel);
			$this->medicoModel = $this->model($this->medicoModel);
			$this->bitacoraModel = $this->model($this->bitacoraModel);
		}

		/**
		 * [index muestra la pagina de incio del personal]
		 * @return [html] [vista de personal]
		 */
		public function index(){
			$this->view("personal/index");
		}

		/**
		 * [listar datos que se mostraron en la tabla personal]
		 * @return [JSON] [obj JSON con los datos de los personal]
		 */
		public function listar () {
			@session_start();
			$personal = $this->personalModel->query("SELECT id, nombre, apellido, oficio, 'personal' as 'tipo', estatus from personal WHERE personal.estatus = 1 UNION SELECT id, nombre, apellido, medicos.Profesion, 'medico', estatus as 'tipo' from medicos WHERE medicos.estatus = 1");

			$personal = [ "data" => $personal];
			$dataJSON = json_encode($personal);
			echo $dataJSON;
		}

		/**
		 * [borrar borra de manera logica el registro del personal seleccionado]
		 * @return [booleam] [true si se elimina, false si falla la consulta]
		 */
		public function borrar(){
			if($_POST){

				if ($_POST["type"] == "medico") {
					$delete = $this->personalModel->queryExecute("UPDATE medicos SET estatus = '0' WHERE id = '".$_POST['id']."'");
				}else{
					$delete = $this->personalModel->queryExecute("UPDATE personal SET estatus = '0' WHERE id = '".$_POST['id']."'");
				}

				if ($delete) {
					@session_start();

					$description = "Elimino un personal";
					$user = $_SESSION["user_id"];

					$bitacora = [
					"description" => $description,
					"user_id" =>  $user,
					];


					$save = $this->bitacoraModel->save($bitacora);
					if ($save) {
						echo 1;
					}else 
						echo 0;

				}
			}
		}

		/**
		 * [actualizar Actualiza los datos de un personal seleccionado]
		 * @return [booleam] [1 si se actualiza, 0 si falla la consulta]
		 */
		public function actualizar(){
			if ($_POST) {
				$type = $_POST['tipo'];

				$data = [
					"id" => $_POST['id'],
					"name" => $_POST['nombre'],
					"lastName" => $_POST['apellido'],
					"job" => $_POST['oficio'],
					"status" => 1
				];

				if ($type == "personal") {
					$update = $this->personalModel->update($data);
				}else{
					$update = $this->medicoModel->update($data);
				}

				if ($update) {

					@session_start();

					$description = "Actualizo los datos de un personal";
					$user = $_SESSION["user_id"];

					$bitacora = [
					"description" => $description,
					"user_id" =>  $user,
					];


					$save = $this->bitacoraModel->save($bitacora);
					if ($save) {
						echo 1;
					}else
						echo 0;

				}else{
					echo 0;
				}
			}
		}

		/**
		 * [agregar inserta un nuevo registro de personal dependiendo si es medico o administrativo]
		 * @return [booleam] [1 si se inserta, 0 si falla la consulta]
		 */
		public function agregar () {
			if ($_POST) {
				$type = $_POST['tipo'];
				$data = [
					"name" => $_POST['nombre'],
					"lastName" => $_POST['apellido'],
					"job" => $_POST['oficio'],
					"status" => 1
				];
				
				if ($type == "personal") {
					$insert = $this->personalModel->save($data);
				}else{
					$insert = $this->medicoModel->save($data);
				}

				if ($insert) {
					@session_start();

					$description = "Registro un personal nuevo";
					$user = $_SESSION["user_id"];

					$bitacora = [
					"description" => $description,
					"user_id" =>  $user,
					];


					$save = $this->bitacoraModel->save($bitacora);

					if ($save) {
						echo 1;
					}else
						echo 0;

				}else{
					echo 0;
				}

			}
		}
	}