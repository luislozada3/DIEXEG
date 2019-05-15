<?php
/**
* Creado por Francis Dona 29/06/2018
* Ultima modificacion por Francis Dona 29/06/2018
* Controlador de los reportes, contiene todas las funcionalidades logicas de los reportes
*/

	class reportesController extends Controller{

		private $db;
		private $pdf;
		/**
		 * [__construct inicializa el modelo del usuario]
		 */
		public function __construct(){
			$this->db = new Database();
			$this->pdf = new FPDF();
		}

		/**
		 * [index se encarga de mostrar la vista del configuraciones del usuario que esta en sesion]
		 * @return [html] []
		 */
		public function index(){

			$this->view("reportes/index");
		
		}

		public function enfermedades () {
			sleep(1);
			$this->db->query("SELECT COUNT(diagnosticos.enfermedad_id) as cantidad, enfermedades.nombre as enfermedad FROM diagnosticos INNER JOIN enfermedades ON enfermedades.id=diagnosticos.enfermedad_id GROUP BY diagnosticos.enfermedad_id");
			$respose = $this->db->fetchAll();
			echo json_encode($respose);
		}

		public function citas () {
			sleep(1);
			$query = $this->db->query("SELECT Month(citas.fecha) as enfermedad, COUNT(citas.id) as cantidad FROM citas WHERE YEAR(citas.fecha) = 2019 GROUP BY enfermedad");
			$nCitas = $this->db->fetchAll();
			for ($i = 0; $i < count($nCitas); $i++) {
				$mes = $nCitas[$i]->enfermedad;
				switch ($mes) {
					case 1:
						$nCitas[$i]->enfermedad = 'Enero';
						break;
					case 2:
						$nCitas[$i]->enfermedad = 'Febrero';
						break;
					case 3:
						$nCitas[$i]->enfermedad = 'Marzo';
						break;
					case 4:
						$nCitas[$i]->enfermedad = 'Abril';
						break;
					case 5:
						$nCitas[$i]->enfermedad = 'Mayo';
						break;
					case 6:
						$nCitas[$i]->enfermedad = 'Junio';
						break;
					case 7:
						$nCitas[$i]->enfermedad = 'Julio';
						break;
					case 8:
						$nCitas[$i]->enfermedad = 'Agosto';
						break;
					case 9:
						$nCitas[$i]->enfermedad = 'Septiembre';
						break;
					case 10:
						$nCitas[$i]->enfermedad = 'Octubre';
						break;
					case 11:
						$nCitas[$i]->enfermedad = 'Noviembre';
						break;
					case 12:
						$nCitas[$i]->enfermedad = 'Diciembre';
						break;
					default:
						$nCitas[$i]->enfermedad = 'Enero';
						break;
				}
			}

			$respose = $nCitas;
			echo json_encode($respose);
		}

		public function pdf () {
			if ($_GET) {
				$type = $_GET['type'];
				$this->pdf->AddPage('LANDSCAPE', 'LETTER');
				$this->pdf->SetFont('Arial', 'I', 20);
				$this->pdf->Write(5, "DIEXEG");
				$this->pdf->Ln(10);
				$this->pdf->SetFont('Arial', '', 12);
				switch ($type) {
					case 'enfermedades':
						self::enfermedadesPdf($type);
						break;
					case 'citas':
						self::citasPdf($type);
						break;
					default:
						self::enfermedadesPdf($type);
						break;
				}
				$this->pdf->OutPut();		
			}

		}

		public function enfermedadesPdf ($type) {
			$this->pdf->SetFont('Arial', 'I', 16);
			$this->pdf->Ln(1);
			$this->pdf->Write(1,"Enfermedades diagnosticadas en los pacientes");
			$this->db->query("SELECT COUNT(diagnosticos.enfermedad_id) as cantidad, enfermedades.nombre as enfermedad FROM diagnosticos INNER JOIN enfermedades ON enfermedades.id=diagnosticos.enfermedad_id GROUP BY diagnosticos.enfermedad_id");
			$enfermedades = $this->db->fetchAll();
			$this->pdf->SetFont('Arial', '', 15);
			$this->pdf->Ln(10);
			$this->pdf->Cell(160, 5, "Enfermedad", 0, 0, '', false);
			$this->pdf->Cell(100, 5, "Cantidad", 0, 0, '', false);
			$this->pdf->Ln(6);
			$this->pdf->SetFont('Arial', '', 12);
			$this->pdf->SetFillColor(220, 220, 220);
			for ($i = 0; $i < count($enfermedades); $i++) { 
				$fill = true;
				if ($i % 2 == 1) {
					$fill = false;
				}
				$this->pdf->Cell(160, 10, utf8_decode($enfermedades[$i]->enfermedad), 0, 0, '', $fill);
				$this->pdf->Cell(100, 10, utf8_decode($enfermedades[$i]->cantidad), 0, 0, '', $fill);
				$this->pdf->Ln(10);
			}
		}

		public function citasPdf ($type) {
			$this->pdf->SetFont('Arial', 'I', 16);
			$this->pdf->Ln(1);
			$this->pdf->Write(1,utf8_decode("Numero de citas por mes en el año actual"));
			$query = $this->db->query("SELECT Month(citas.fecha) as mes, COUNT(citas.id) as cantidad FROM citas WHERE YEAR(citas.fecha) = 2019 GROUP BY mes");
			$nCitas = $this->db->fetchAll();
			for ($i = 0; $i < count($nCitas); $i++) {
				$mes = $nCitas[$i]->mes;
				switch ($mes) {
					case 1:
						$nCitas[$i]->mes = 'Enero';
						break;
					case 2:
						$nCitas[$i]->mes = 'Febrero';
						break;
					case 3:
						$nCitas[$i]->mes = 'Marzo';
						break;
					case 4:
						$nCitas[$i]->mes = 'Abril';
						break;
					case 5:
						$nCitas[$i]->mes = 'Mayo';
						break;
					case 6:
						$nCitas[$i]->mes = 'Junio';
						break;
					case 7:
						$nCitas[$i]->mes = 'Julio';
						break;
					case 8:
						$nCitas[$i]->mes = 'Agosto';
						break;
					case 9:
						$nCitas[$i]->mes = 'Septiembre';
						break;
					case 10:
						$nCitas[$i]->mes = 'Octubre';
						break;
					case 11:
						$nCitas[$i]->mes = 'Noviembre';
						break;
					case 12:
						$nCitas[$i]->mes = 'Diciembre';
						break;
					default:
						$nCitas[$i]->mes = 'Enero';
						break;
				}
			}
			$this->pdf->SetFont('Arial', '', 15);
			$this->pdf->Ln(10);
			$this->pdf->Cell(160, 5, "Mes", 0, 0, '', false);
			$this->pdf->Cell(100, 5, "Cantidad", 0, 0, '', false);
			$this->pdf->Ln(6);
			$this->pdf->SetFont('Arial', '', 12);
			$this->pdf->SetFillColor(220, 220, 220);
			for ($i = 0; $i < count($nCitas); $i++) { 
				$fill = true;
				if ($i % 2 == 1) {
					$fill = false;
				}
				$this->pdf->Cell(160, 10, utf8_decode($nCitas[$i]->mes), 0, 0, '', $fill);
				$this->pdf->Cell(100, 10, utf8_decode($nCitas[$i]->cantidad), 0, 0, '', $fill);
				$this->pdf->Ln(10);
			}
		}

		public function diagnoticoPacientePdf () {
			$data = json_decode($_GET['data']);
			$medico = utf8_decode($data->medico);
			$paciente = utf8_decode($data->paciente);
			$diagnostico = utf8_decode($data->diagnostico);
			$fecha_cita = $data->fecha_cita;
			$hora_cita = $data->hora_cita;
			$sintomas = $data->sintomas;
			$tratamiento = $data->tratamiento;

			$this->pdf->AddPage('LANDSCAPE', 'LETTER');
			$this->pdf->SetFont('Arial', 'I', 20);
			$this->pdf->Cell(200, 10, "DIEXEG", 0, 0, '', false);
			$this->pdf->SetFont('Arial', 'I', 14);
			$this->pdf->Cell(60, 10, "Cita: " . $fecha_cita . " " . $hora_cita, 0, 0, '', false);
			$this->pdf->Ln(14);

			$this->pdf->SetFont('Arial', 'I', 15);
			$this->pdf->Write(1,"Paciente: ".ucwords($paciente));
			$this->pdf->Ln(8);
			$this->pdf->Write(1,"Medico: ".ucwords($medico));
			$this->pdf->Ln(8);
			$this->pdf->Write(1,"Enfermedad Diagnosticada: " . $diagnostico);
			$this->pdf->Ln(8);

			$this->pdf->Write(1,"Sintomas: ");
			$this->pdf->Ln(6);
			$this->pdf->SetFont('Arial', '', 12);
			for ($i = 0; $i < count($sintomas); $i++) { 
				$this->pdf->Write(1, $i+1 . "- ". utf8_decode($sintomas[$i]));
				$this->pdf->Ln(6);
			}


			$this->pdf->Ln(2);
			$this->pdf->SetFont('Arial', 'I', 15);
			$this->pdf->Write(1,"tratamiento: ");
			$this->pdf->Ln(6);
			$this->pdf->SetFont('Arial', '', 12);
			for ($i = 0; $i < count($tratamiento); $i++) { 
				$this->pdf->Write(1, $i+1 . "- ". utf8_decode($tratamiento[$i]));
				$this->pdf->Ln(6);
			}
			$this->pdf->OutPut();		
		}
	}