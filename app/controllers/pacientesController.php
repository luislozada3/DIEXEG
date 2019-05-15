<?php
/**
* Creado por Maria 10/06/2018
* Ultima modificacion por Maria 10/06/2018
Controlador de personal, aqui se encuentra toda la logica para gestionar personal en la aplicacion
*/

	class pacientesController extends Controller{

		private $pacienteModel = "Paciente";
		private $medicoModel = "Medico";
		private $bitacoraModel = "Bitacora";
		private $db;
		/**
		 * [__construct inicializa el model de los pacientes, medicos y bitacora]
		 */
		public function __construct(){
			$this->pacienteModel = $this->model($this->pacienteModel);
			$this->medicoModel = $this->model($this->medicoModel);
			$this->bitacoraModel = $this->model($this->bitacoraModel);
			$this->db = new dataBase();
		}

		/**
		 * [index muestra la pagina de incio de los pacientes]
		 * @return [html] [vista de los pacientes]
		 */
		public function index(){
			$medicos = $this->medicoModel->getBy("estatus",1);
			$this->view("pacientes/index",$medicos);
		}

		/**
		 * [listar datos que se mostraron en la tabla de los pacientes]
		 * @return [JSON] [obj JSON con los datos de los pacientes]
		 */
		public function listar () {
			@session_start();
			$pacientes = $this->pacienteModel->getBy("estatus",1);
			$pacientes = [ "data" => $pacientes];
			$dataJSON = json_encode($pacientes);
			echo $dataJSON;
		}

		/**
		 * [borrar borra de manera logica el registro del paciente seleccionado]
		 * @return [booleam] [true si se elimina, false si falla la consulta]
		 */
		public function borrar(){
			if($_POST){
				@session_start();
				$delete = $this->pacienteModel->queryExecute("UPDATE pacientes SET estatus = '0' WHERE id = '".$_POST['id']."'");
				$deleteCitas = $this->pacienteModel->queryExecute("UPDATE citas SET estatus = '0' WHERE paciente_id = '".$_POST['id']."'");

				$description = "Elimino una cita";
				$user = $_SESSION["user_id"];

				$bitacora = [
					"description" => $description,
					"user_id" =>  $user,
				];

				$save = $this->bitacoraModel->save($bitacora);

				if ($delete && $save && $deleteCitas) {
					echo $delete;
				}else 
					echo 0;
			}
		}

		/**
		 * [actualizar actualizar los campos del paciebte]
		 * @return [booleam] [true si se actualiza, false si falla la consulta]
		 */
		public function actualizar(){
			if($_POST){
				$data = [
					"id" => $_POST["id"],
					"dni" => $_POST["cedula"],
					"name" => $_POST["nombre"],
					"lastName" => $_POST["apellido"],
					"born" => $_POST["fn"],
					"sexo" => $_POST["sexo"],
					"peso" => $_POST["peso"],
					"height" => $_POST["altura"],
					"adress" => $_POST["direccion"],
					"description" => $_POST["descripcion"],
					"status" => 1,
				];

				$update = $this->pacienteModel->update($data);
				if ($update) {
					@session_start();
					$description = "Actualizo los datos de un paciente";
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
		 * [addPaciente registra un nuevo paciente]
		 * @return [booleam] [true si se regitra, false si falla la consulta]
		 */
		public function addPaciente(){
			if($_POST){
				$dni = $_POST["cedula"];
				$data = [
					"dni" => $dni,
					"name" => $_POST["nombre"],
					"lastName" => $_POST["apellido"],
					"born" => $_POST["fn"],
					"sexo" => $_POST["sexo"],
					"peso" => $_POST["peso"],
					"height" => $_POST["altura"],
					"adress" => $_POST["direccion"],
					"description" => $_POST["descripcion"],
					"status" => 1
				];

				$tlf = $_POST['tlf'];

				$query = $this->db->query("SELECT * FROM pacientes WHERE cedula = '{$dni}'");
				$verificarPaciente = $this->db->fetchAll();

				if (count($verificarPaciente) > 0) {
					echo 2;
				}else{
					$store = $this->pacienteModel->save($data);
					if ($store) {

						if (isset($tlf)) {
							$query = $this->db->query("SELECT MAX(id) as id FROM pacientes");
							$dataPaciente = $this->db->fetch();
							$query = $this->db->query("INSERT INTO telefonos (numero, paciente_id) VALUES ('{$tlf}', {$dataPaciente->id})");
							$this->db->execute();
						}
						@session_start();
						$description = "Registro ha un paciente nuevo";
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

	}