<?php
/**
* Creado por Maria 10/06/2018
* Ultima modificacion por Maria 10/06/2018
* Controlador de citas, aqui se encuentra toda la logica para gestionar las citas de los pacientes
*/

	class citasController extends Controller{

		private $citaModel = "Cita";
		private $bitacoraModel = "Bitacora";
		private $medicoModel = "Medico";
		private $pacienteModel = "Paciente";
		private $db;

		/**
		 * [__construct inicializa el modelo del cita]
		 */
		public function __construct(){
			$this->citaModel = $this->model($this->citaModel);
			$this->medicoModel = $this->model($this->medicoModel);
			$this->pacienteModel = $this->model($this->pacienteModel);
			$this->bitacoraModel = $this->model($this->bitacoraModel);
			$this->db = new Database();
		}


		/**
		 * [index muestra la pagina de incio de las citas]
		 * @return [html] [vista de las citas]
		 */
		public function index(){
			$medicos = $this->medicoModel->getBy("estatus", 1);
			$pacientes = $this->pacienteModel->getBy("estatus", 1);
			$data = [
				"medicos" => $medicos,
				"pacientes" => $pacientes
			];
			$this->view("citas/index", $data);
		}


		/**
		 * [listar datos que se mostraron en la tabla de las citas]
		 * @return [JSON] [obj JSON con los datos de las citas]
		 */
		public function listar () {
			$citas = $this->db->query("SELECT citas.estatus as estatus, citas.fecha, citas.hora, CONCAT(pacientes.nombre, ' ', pacientes.apellido) as paciente, pacientes.cedula, medicos.id as medicoId, pacientes.id as pacienteId, CONCAT(medicos.nombre, ' ', medicos.apellido) as medico, citas.id FROM citas INNER JOIN pacientes ON pacientes.id=citas.paciente_id INNER JOIN medicos ON medicos.id=citas.medico_id WHERE citas.estatus != 0 ORDER BY citas.fecha, citas.hora DESC");
			$citas = $this->db->fetchAll();
			$citas = [ "data" => $citas];
			$dataJSON = json_encode($citas);
			echo $dataJSON;
		}

		public function actualizar () {
			if ($_POST) {
				$paciente = $_POST["paciente"];
				$medico = $_POST["medico"];
				$fecha = $_POST["fecha"];
				$hora = $_POST["hora"];
				$idCita = $_POST["idCita"];

				$update = $this->db->query("UPDATE citas SET fecha = '{$fecha}', hora = '{$hora}', paciente_id = {$paciente}, medico_id = {$medico} WHERE id = {$idCita}");

				$update = $this->db->execute();

				if ($update) {
					$response = [
						"status" => 1,
						"message" => "Cita actualizada"
					];
				}else{
					$response = [
						"status" => 0,
						"message" => "Error, al trata de actualizar la cita"
					];
				}

				echo json_encode($response);
				exit();
			}
		}

		/**
		 * [addCita registra las citas nuevas de los pacientes]
		 * @return [booleam] [true si se registra, false si falla la consulta]
		 */
		public function addCita() {
			if($_POST){

				if(isset($_POST['estatus'])){
					$estatus = $_POST['estatus'];
				}else{
					$estatus = 1;
				}
				
				$data = [
					"fecha" => $_POST["fecha"],
					"hora" => $_POST["hora"],
					"medico_id" => $_POST["medico"],
					"paciente_id" => $_POST["idPaciente"],
					"estatus" => $estatus
				];

				$store = $this->citaModel->save($data);

				if ($store) {
					@session_start();
					$description = "Registro de una nueva cita";
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

				}else
					echo 0;

			
			}
		}

		public function show() {
			if ($_POST) {

				$id = $_POST['id'];

				$citas = $this->citaModel->query("SELECT citas.estatus as status, citas.id as cita_id, citas.fecha, citas.hora, CONCAT(medicos.nombre, ' ', medicos.apellido) as medico, medicos.Profesion FROM citas INNER JOIN medicos ON citas.medico_id=medicos.id WHERE citas.paciente_id=".$id." AND citas.estatus != 0 ORDER BY citas.fecha DESC");

				$citaJson = json_encode($citas);
				echo $citaJson;

			}
		}

		public function delete () {
			if ($_GET) {
				$id = $_GET['id'];
				$delete = $this->db->query("UPDATE citas SET estatus = 0 WHERE id = {$id}");
				$delete = $this->db->execute();
				if ($delete) {
					echo 1;
				}else
					echo 0; 
			}
		}

		public function showPendingAppointments() {

			$citas = $this->citaModel->query("SELECT CONCAT(pacientes.nombre, ' ', pacientes.apellido) as paciente, citas.id as cita_id, citas.fecha, citas.hora, CONCAT(medicos.nombre, ' ', medicos.apellido) as medico, medicos.Profesion as profesion  FROM citas INNER JOIN medicos ON citas.medico_id=medicos.id INNER JOIN pacientes ON pacientes.id = citas.paciente_id WHERE citas.estatus = 1 ORDER BY citas.fecha DESC");

			$data = ["data" => $citas ];
			
			$citaJson = json_encode($data );
			echo $citaJson;
		}

		public function getHistory () {

			if ($_POST) {

				$id = $_POST["id"];
				$this->db->query("SELECT citas.id as citaId, citas.fecha, citas.hora, enfermedades.nombre as enfermedad, sintomas.nombre as sintomas FROM pacientes INNER JOIN citas ON citas.paciente_id = pacientes.id INNER JOIN diagnosticos ON diagnosticos.cita_id = citas.id INNER JOIN enfermedades ON enfermedades.id = diagnosticos.enfermedad_id INNER JOIN cita_sintoma ON cita_sintoma.cita_id = citas.id INNER JOIN sintomas ON sintomas.id = cita_sintoma.sintoma_id WHERE pacientes.id = {$id}");
				$history = $this->db->fetchAll();

				$dataHistory = [];
				$exists = false;
				$k = 0;
				$exists = 0;

				for ($i = 0; $i < count($history); $i++) {
					if ($i == 0) {
						array_push($dataHistory, $history[$i]);
						$dataHistory[$k]->otros = [];
						$k++;
					}else{
						for ($j = 0; $j < count($dataHistory); $j++) {
							if ($dataHistory[$j]->citaId == $history[$i]->citaId) {
								array_push($dataHistory[$j]->otros, $history[$i]->sintomas);
 								$exists++;
							}
						}

						if ($exists == 0) {
							array_push($dataHistory, $history[$i]);
							$dataHistory[$k]->otros = [];
							$k++;
						}
						$exists = 0;
					}					
				}

				echo json_encode($dataHistory);

			}
		}

		/**
		 * [store agrega una cita desde el modulo de citas]
		 * @return [json] [objecto json con la respuesta del metodo]
		 */
		public function store () {
			if ($_POST) {
				$client = $_POST["paciente"];
				$medical = $_POST["medico"];
				$date = $_POST["fecha"];
				$time = $_POST["hora"];
				$status = 1;

				// se verifica que los datos que se enviaron no esten vacios
				// de lo contrario enviara un mensaje de complete los campos
				if ( isset($client) && isset($medical) && isset($date) && isset($time) ) {
				
					// se realiza la consulta para agregar el usuario y se verifica que todo salga bien en su ejecucion
					$insertCita = $this->db->query("INSERT INTO citas (paciente_id, medico_id, fecha, hora, estatus) VALUES ( {$client}, {$medical}, '{$date}', '{$time}', {$status})");
					$insertCita = $this->db->execute();

					if ($insertCita) {
						$response = [
							"status" => 1,
							"message" => "Cita tomada"
						];
					}else{
						$response = [
							"status" => 0,
							"message" => "Error, no se pudo tomar la cita, revise su conexion a internet"
						];
					}

					echo json_encode($response);					
				}else{
					
					$response = [
						"status" => 2,
						"message" => "complete todos los campos"
					];

					echo json_encode($response);
				}

			}
		}
	}