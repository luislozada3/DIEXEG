<?php
/**
* Creado por Yohana 29/07/2018
* Ultima modificacion por Yohana 29/07/2018
* Controlador de diagnosticos, este controlador se encargade gestion el mudulo de diagnostico,
* Nota: no contiene la logica del sistema experto
* La logica experta se encuenta en expertoController.php
*/

	class diagnosticosController extends Controller{

		private $diagnosticoModel = "Diagnostico";
		private $db;

		/**
		 * [__construct inicializa el modelo del diagnostico]
		 */
		public function __construct(){
			$this->diagnosticoModel = $this->model($this->diagnosticoModel);
			$this->db = new Database();
		}


		/**
		 * [index muestra la pagina de inicio de diagnosticos]
		 * @return [html] [vista de diagnosticos]
		 */
		public function index(){
			$this->view("diagnosticos/index");
		}

		/**
		 * [listar muestra los datos de los diagnosticos realizados]
		 * @return [html] [vista de diagnosticos]
		 */
		public function listar(){
			$diagnosis = $this->diagnosticoModel->query("SELECT diagnosticos.id, CONCAT(pacientes.nombre, ' ', pacientes.apellido) as paciente, CONCAT(medicos.nombre, ' ', medicos.apellido) as medico, enfermedades.nombre as enfermedad FROM diagnosticos INNER JOIN enfermedades ON enfermedades.id=diagnosticos.enfermedad_id INNER JOIN citas ON citas.id=diagnosticos.cita_id INNER JOIN pacientes ON pacientes.id = citas.paciente_id INNER JOIN medicos ON medicos.id=citas.medico_id WHERE citas.estatus = 2");
			$diagnosis = [ "data" => $diagnosis];
			$dataJSON = json_encode($diagnosis);
			echo $dataJSON;
		}

		/**
		 * [ listarEnfermedadSintomas muestra todas los enfermedades de los pacientes con cada uno de los sintomas que este presento ]
		 * @return [object] [object json con todas la informacion]
		 */
		public function listarEnfermedadSintomas(){
			$diagnosisPatient = $this->diagnosticoModel->query("SELECT enfermedades.id as enfermedadId, enfermedades.nombre as enfermedad, citas.fecha, citas.hora, citas.id as cita, pacientes.id as paciente_id, CONCAT(pacientes.nombre, ' ', pacientes.apellido) as paciente, diagnosticos.id as diagnostico_id, CONCAT(medicos.nombre, ' ', medicos.apellido) as medico FROM pacientes INNER JOIN citas ON citas.paciente_id = pacientes.id INNER JOIN medicos ON medicos.id = citas.medico_id INNER JOIN diagnosticos ON diagnosticos.cita_id = citas.id INNER JOIN enfermedades ON enfermedades.id = diagnosticos.enfermedad_id");
			$diagnosis = [];

			if (isset($diagnosisPatient)) {
				

				for ($i=0; $i < count($diagnosisPatient); $i++) { 

					$diagnosis[$diagnosisPatient[$i]->diagnostico_id]['idEnfermedad'] = $diagnosisPatient[$i]->enfermedadId;
					$diagnosis[$diagnosisPatient[$i]->diagnostico_id]['id'] = $diagnosisPatient[$i]->diagnostico_id;
					$diagnosis[$diagnosisPatient[$i]->diagnostico_id]['medico'] = $diagnosisPatient[$i]->medico;
					$diagnosis[$diagnosisPatient[$i]->diagnostico_id]['paciente'] = $diagnosisPatient[$i]->paciente;
					$diagnosis[$diagnosisPatient[$i]->diagnostico_id]['paciente_id'] = $diagnosisPatient[$i]->paciente_id;
					$diagnosis[$diagnosisPatient[$i]->diagnostico_id]['diagnostico'] = $diagnosisPatient[$i]->enfermedad;
					$diagnosis[$diagnosisPatient[$i]->diagnostico_id]['fecha_cita'] = $diagnosisPatient[$i]->fecha;
					$diagnosis[$diagnosisPatient[$i]->diagnostico_id]['hora_cita'] = $diagnosisPatient[$i]->hora;
					$diagnosis[$diagnosisPatient[$i]->diagnostico_id]['cita_id'] = $diagnosisPatient[$i]->cita;
					$diagnosis[$diagnosisPatient[$i]->diagnostico_id]['sintomas'] = [];
					$diagnosis[$diagnosisPatient[$i]->diagnostico_id]['tratamiento'] = [];
				}

				$tratamientos = $this->db->query("SELECT * FROM tratamientos");
				$tratamientos = $this->db->fetchAll();

				$cita_sintoma = $this->diagnosticoModel->query("SELECT citas.id as cita_id, sintomas.nombre FROM cita_sintoma INNER JOIN sintomas ON cita_sintoma.sintoma_id = sintomas.id INNER JOIN citas ON citas.id = cita_sintoma.cita_id");

				foreach ($diagnosis as $index => $value) {
					for ($j = 0; $j < count($cita_sintoma); $j++) {
						if ($cita_sintoma[$j]->cita_id == $value['cita_id']) {
							array_push($diagnosis[$index]['sintomas'], $cita_sintoma[$j]->nombre);
						}
					}

					for ($k = 0; $k < count($tratamientos); $k++) {
						if ($tratamientos[$k]->enfermedad_id == $value['idEnfermedad']) {
							array_push($diagnosis[$index]['tratamiento'], $tratamientos[$k]->descripcion);
						}
					}
				}

				$jsonReponse = json_encode($diagnosis);
				echo $jsonReponse;

			}else{
				$jsonReponse = json_encode($diagnosis);
				echo $jsonReponse;
			}

		}

		/**
		 * [sintomas muestra todos los sintomas]
		 * @return [json] [devuelve todos los sintomas]
		 */
		public function sintomas(){
			$sintomas = $this->diagnosticoModel->query("SELECT * FROM sintomas");
			$dataJSON = json_encode($sintomas);
			echo $dataJSON;
		}

		/**
		 * [guardar Guarda un diagnostico de un paciente]
		 * @return [json] [devuelve un estatus de ok o error]
		 */
		public function guardar () {

			if ($_POST) {
				$idCita = $_POST['idCita'];
				$idPathologies = $_POST['idPathologies'];
				$patientSymptomsData = $_POST['patientSymptomsData'];
				$newSymptoms = $_POST['newSymptoms'];

				$data = [
					'enfermedad_id' => $idPathologies, 
					'cita_id' => $idCita
				];
				
				$response = $this->diagnosticoModel->save($data);

				for ($i = 0; $i < count($patientSymptomsData); $i++) {
					$data = [
						"sintoma_id" => $patientSymptomsData[$i],
						"cita_id" => $idCita
					];

					$this->diagnosticoModel->saveSintoma($data);

				}

				if (count($newSymptoms) > 0) {
					for ($j = 0; $j < count($newSymptoms); $j++) {
						$query = $this->db->query("INSERT INTO sintomas (nombre) VALUES ('{$newSymptoms[$j]}')");
						$save = $this->db->execute();

						$querySintoma = $this->db->query("SELECT MAX(id) as idSintoma FROM sintomas");
						$sintoma = $this->db->fetch();

						$query = $this->db->query("INSERT INTO enfermedad_sintoma (sintoma_id, enfermedad_id) VALUES ({valint($sintoma->idSintoma)}, {valint($idPathologies)})");
						$save = $this->db->execute();

						$query = $this->db->query("INSERT INTO cita_sintoma (cita_id, sintoma_id) VALUES ({valint($idCita)}, {valint($sintoma->idSintoma)})");
						$save = $this->db->execute();
					}
				}

				$update = $this->diagnosticoModel->queryExecute("UPDATE citas SET estatus = '2' WHERE id = ".$idCita."");

				$response = json_encode($response);
				echo $response;
			}
		}

		public function diagnosticoNuevo () {
			if ($_POST) {
				$sintomas = json_decode($_POST["sintomas"]); 
				$nuevosSintomas = json_decode($_POST["nuevosSintomas"]);
				$enfermedad = $_POST["enfermedad"];
				$idCita = $_POST['idCita'];

				$query = $this->db->query("INSERT INTO enfermedades (nombre) VALUES ('{$enfermedad}')");
				$saveEnfermedad = $this->db->execute(); 

				if ($saveEnfermedad) {
					$query = $this->db->query("SELECT MAX(id) as id FROM enfermedades");
					$enfermedades = $this->db->fetch();

					$query = $this->db->query("INSERT INTO diagnosticos (enfermedad_id, cita_id) VALUES ({$enfermedades->id}, {$idCita})");
					$saveDiagostico = $this->db->execute();

					if ($saveDiagostico) {

						$cantidadDeSintomas = count($sintomas);

						if ($cantidadDeSintomas > 0) {
							for ($i = 0; $i < $cantidadDeSintomas; $i++) {
								$query = $this->db->query("INSERT INTO enfermedad_sintoma (sintoma_id, enfermedad_id) VALUES ({$sintomas[$i]}, {$enfermedades->id})");
								$saveEnfermedadSintoma = $this->db->execute();

								$query = $this->db->query("INSERT INTO cita_sintoma (sintoma_id, cita_id) VALUES ({$sintomas[$i]}, {$idCita})");
								$saveCitaSintoma = $this->db->execute();

							}
						}

						$cantidadDeSintomasNuevos = count($nuevosSintomas);

						if ($cantidadDeSintomasNuevos > 0) {
							for ($i = 0; $i < $cantidadDeSintomasNuevos; $i++) {

								$query = $this->db->query("INSERT INTO sintomas (nombre) VALUES ('{$nuevosSintomas[$i]}')");
								$saveSintomaNuevo = $this->db->execute();

								$query = $this->db->query("SELECT MAX(id) as id FROM sintomas");
								$sintomaNew = $this->db->fetch();

								$query = $this->db->query("INSERT INTO enfermedad_sintoma (sintoma_id, enfermedad_id) VALUES ({$sintomaNew->id}, {$enfermedades->id})");
								$saveEnfermedadSintomaNuevo = $this->db->execute();

								$query = $this->db->query("INSERT INTO cita_sintoma (sintoma_id, cita_id) VALUES ({$sintomaNew->id}, {$idCita})");
								$saveCitaSintomaNuevo = $this->db->execute();

							}
						}

						$this->db->query("UPDATE citas SET estatus = 2 WHERE id = {$idCita}");
						$this->db->execute();

						$response = [
							"status" => 1,
							"message" => "se guardo el diagnostico"
						];
					}else{
						$response = [
							"status" => 0,
							"message" => "Error al intentar guardar el diagnostico"
						];
					}

				}else{
					$response = [
						"status" => 0,
						"message" => "Error al intentar guardar la enfermedad"
					];
				}

				echo json_encode($response);
			}
		}
	}