<?php
/**
* Creado por Yohana 29/07/2018
* Ultima modificacion por Yohana 29/07/2018
* Controlador de diagnosticos, este controlador posee la logica del modulo experto
* dentro de el se realizan todos los pasos, reglas y posibles eventos que pueden ocurrir para 
* determinar el diagnotico de una patologia de un paciente determinado por los sintomas que este pueda
* presentar, ademas gestiona todo las acciones que se realizan dentro del modulo diagnosticos
*/

	class expertoController extends Controller{

		private $patologiaModel = "Patologia";

		/**
		 * [__construct inicializa el modelo del diagnostico]
		 */
		public function __construct(){
			$this->patologiaModel = $this->model($this->patologiaModel);
		}


		/**
		 * [geyBaseConocimiento metodo que se utiliza para obtener los datos de las patologias y sintomas
		 * que se encuentran en la base del conocimiento del sistema experto]
		 * @return [array] [retorna un arreglo con la informacion de todas las enfermedades y sus distintos sintomas]
		 */
		public function getBaseConocimiento () {
			$pathologies = $this->patologiaModel->all();
			$pathologiesAndSymptoms = $this->patologiaModel->query("SELECT sintomas.id, sintomas.nombre, enfermedades.id as enfermedad FROM enfermedades INNER JOIN enfermedad_sintoma ON enfermedad_sintoma.enfermedad_id=enfermedades.id INNER JOIN sintomas ON sintomas.id=enfermedad_sintoma.sintoma_id");

			/* transformando los datos de las enfermedades con cada uno de sus 
			   sintomas en un arreglo para hacer mas facil su uso */
			$counterSymptoms = 0;
			for ($i=0; $i < count($pathologies); $i++) {
				$pathologies[$i]->symptoms = array();
				for ($j=0; $j < count($pathologiesAndSymptoms); $j++) { 
					if ($pathologiesAndSymptoms[$j]->enfermedad == $pathologies[$i]->id) {
						$pathologies[$i]->symptoms[$counterSymptoms] = $pathologiesAndSymptoms[$j]->nombre;
						$counterSymptoms++;
					}
				}
				$counterSymptoms = 0;
			}

			return compact('pathologies');

		}

		/**
		 * [motorInferencia este metodo base del modulo experto es cual dicta
		 * cuales son los pasos a seguir para obtener una respuesta del diagnotico de un paciente]
		 * @return [json] [los datos correspondientes al diagnostico]
		 */
		public function motorInferencia () {

			if ($_POST) {
				$patientSymptomsData = json_decode($_POST['patientSymptomsData']);
				$newSymptoms = json_decode($_POST['newSymptoms']);
			}else{
				return false;
			}

			if ( count($patientSymptomsData) == 0 && count($newSymptoms) > 0 ) {
				$response = ["status" => 2, 'diagnosis' => [] ];
				echo json_encode($response);
				exit();
			}
			

			// Obteniendo la base del conocimiento (enfermedades con cada uno de sus sintomas)
			$pathologiesAndSymptoms = self::getBaseConocimiento();
			$pathologiesAndSymptoms = $pathologiesAndSymptoms['pathologies'];

			
			/********************************************************************************************
			 *** Obteniendo las coincidencias entre los sintomas que ingreso el usuario y las que *******
			 ***************************  existen en la base de conocimiento ****************************
			 *******************************************************************************************/
			$coincidentSymptomsPathologies = [];
			$coincident = 0;

			for ($i=0; $i < count($pathologiesAndSymptoms); $i++) {

				$coincidentSymptomsPathologies[$i]['pathologies'] = $pathologiesAndSymptoms[$i]->nombre; 
				$coincidentSymptomsPathologies[$i]['idPathologies'] = $pathologiesAndSymptoms[$i]->id; 
				$coincidentSymptomsPathologies[$i]['coincidents'] = 0; 
				$coincidentSymptomsPathologies[$i]['symptoms'] = count($pathologiesAndSymptoms[$i]->symptoms);

				
				for ($j=0; $j < count($patientSymptomsData); $j++) {
					
					for ($k=0; $k < count($pathologiesAndSymptoms[$i]->symptoms); $k++) { 
						
						if ($patientSymptomsData[$j] == $pathologiesAndSymptoms[$i]->symptoms[$k]) {
							$coincident++;
							$coincidentSymptomsPathologies[$i]['coincidents'] = $coincident;
						}

					}

				}
				$coincident = 0;
			}			


			//obteniendo el pocentaje de patologias encontradas en el diagnostico
			$percentagePathologiesFound = self::calcularPromedioPatologias($coincidentSymptomsPathologies);
		
			/********************************************************************************************
			 *** Obteniendo las patologias con mayor probalidad de diagnostico para el usuario **********
			 ********************************************************************************************/
			$diagnosis = [];
			$index = 0;
			for ($i=0; $i < count($percentagePathologiesFound['percentagePathologies']); $i++) { 
				if ( $percentagePathologiesFound['percentagePathologies'][$i]['percentage'] >= 50) {
					$diagnosis[$index]['idPathologies'] = $percentagePathologiesFound['percentagePathologies'][$i]['idPathologies'];
					$diagnosis[$index]['pathologies'] = $percentagePathologiesFound['percentagePathologies'][$i]['pathologies'];
					$diagnosis[$index]['percentage'] = $percentagePathologiesFound['percentagePathologies'][$i]['percentage'];
					$index++;
				}
			}

			if (count($diagnosis) > 0) {
				$response = ["status" => 1, 'diagnosis' => $diagnosis];
			}else{
				$response = ["status" => 0, 'diagnosis' => []];
			}

			// Enviando el resultado del diagnostico en formato JSON para mostrarla al usuario 
			echo json_encode($response);

		}

		/**
		 * [calcularPromedioPatologias calcula cual es el promedio de cada una de la enfermedades
		 * que pueda tener el usuario dependiendo los sintomas que este posea]
		 * @param  [array] $coincidentSymptomsPathologies [datos ]
		 * @return [array] [array con los pocentaje de las distintas patologias que el usuario pueda tener]
		 */
		protected function calcularPromedioPatologias ($coincidentSymptomsPathologies) {

			$percentagePathologies = [];

			for ($i=0; $i < count($coincidentSymptomsPathologies); $i++) { 
				
				if ($coincidentSymptomsPathologies[$i]['symptoms'] == 0) {
					$percentage = 0;
				}else
					$percentage =  ($coincidentSymptomsPathologies[$i]['coincidents'] * 100) / $coincidentSymptomsPathologies[$i]['symptoms'];

				$percentagePathologies[$i]['pathologies'] = $coincidentSymptomsPathologies[$i]['pathologies'];		
				$percentagePathologies[$i]['percentage'] = floatval($percentage);
				$percentagePathologies[$i]['idPathologies'] =  $coincidentSymptomsPathologies[$i]['idPathologies'];
			}

			return compact('percentagePathologies');
		}

	}