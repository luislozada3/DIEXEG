<?php
/**
* Creado por Francis Dona 12/05/2018
* Ultima modificacion por Francis Dona 12/05/2018
* Controlador del configuraciones, contiene todos las funcionalidad para configurar el usuario que esta en sesion
*/

	class configuracionesController extends Controller{

		private $userModel = "User";
		private $personalModel = "Personal";
		private $medicoModel = "Medico";

		/**
		 * [__construct inicializa el modelo del usuario]
		 */
		public function __construct(){
			$this->userModel = $this->model($this->userModel);
			$this->personalModel = $this->model($this->personalModel);
			$this->medicoModel = $this->model($this->medicoModel);
		}

		/**
		 * [index se encarga de mostrar la vista del configuraciones del usuario que esta en sesion]
		 * @return [html] []
		 */
		public function index(){

			@session_start();
			
			$user = $_SESSION["user"];

			$userLogin = $this->userModel->getBy("usuario",$user);
			$id = $userLogin[0]->id;
			$dataPersonal = null;
			$type = null;
			$idPersonal = $this->userModel->query("SELECT personal_id FROM personal_usuario WHERE usuario_id = ".$id."");

			if ( !empty($idPersonal[0]) ) {

				$personalId = $idPersonal[0]->personal_id;
				$dataPersonal = $this->userModel->query("SELECT nombre, apellido, oficio, id FROM personal WHERE id = ".$personalId."");
				$type = "personal";
			
			}else{
				
				$idMedico = $this->userModel->query("SELECT medico_id FROM medico_usuario WHERE usuario_id = ".$id."");

				if ( !empty($idMedico[0]) ) {
					$medicoId = $idMedico[0]->medico_id;
					$dataPersonal = $this->userModel->query("SELECT nombre, apellido, Profesion as oficio, id FROM medicos WHERE id = ".$medicoId."");
					$type = "medical";
			
				}

			}

			$data = array(
				'user' => $userLogin[0],
				'dataPersonal' => $dataPersonal[0],
				'type' => $type
			);


			$this->view("configuraciones/index",$data);
		
		}

		/**
		 * [cambiarClave cambia la clave del usuario logeado]
		 * @return [integer] [1 si cambia la clave, 0 se hay algun error o 2 si las claves ingresadas no coinciden]
		 */
		public function cambiarClave () {

			if ($_POST) {
				@session_start();
				$user = $_SESSION["user"];
				$password = $_POST["password"]; 
				$passwordAgain = $_POST["passwordAgain"]; 

				$response = $this->userModel->queryExecute("UPDATE usuarios SET password = '".passwordEncripterD($password)."' WHERE usuario = '".$user."'");

				if ($password == $passwordAgain) {
					
					if ($response) {
						echo 1;
					}else{
						echo 0;
					}

				}else{

					echo 2;
				
				}
			}
		}

		/**
		 * [actualizarPerfil actualiza los datos personales del usuario logeado]
		 * @return [integer] []
		 */
		public function actualizarPerfil () {
			
			if ($_POST) {

				$nombre = $_POST['nombre'];
				$apellido = $_POST['apellido'];
				$oficio = $_POST['oficio'];
				$personalId = $_POST['personalId'];
				$type = $_POST['type'];

				$data = [
					"id" => $personalId,
					"name" => ucwords($nombre),
					"lastName" => ucwords($apellido),
					"job" => ucwords($oficio),
					"status" => 1
				];

				if ($type == "medical") {
					$response = $this->medicoModel->update($data);
					if ( $response ) {
						echo 1;
					}else{
						echo 0;
					}
				}

				if ($type == "personal") {
					$response = $this->personalModel->update($data);
					if ( $response ) {
						echo 1;
					}else{
						echo 0;
					}
				}

			}else{
				echo 2;
			}
		}

		public function actualizarFotoPerfil () {

				sleep(1);
			
				$img = $_FILES['file'];


				if (empty($img)) {
					// no hacer nada
				}else{
					@session_start();
					$user = $_SESSION["user"];
					$dirImg = $_SERVER["DOCUMENT_ROOT"] . "/diexeg/public/img/usuarios/";
					$name = time();
					$ext = pathinfo($img["name"], PATHINFO_EXTENSION);
					$imgName = $name.".".$ext;

					$query = "UPDATE usuarios SET imagen = '".$imgName."' WHERE usuario = '".$user."'";

					$update = $this->userModel->queryExecute($query);


					if ($update) {
						
						$move = move_uploaded_file($img["tmp_name"], $dirImg.$imgName);
						if ($move) {
							if ($_SESSION['img'] != "emptyUser.png") {
								$destroyImg = unlink($dirImg.$_SESSION['img']);
							}

							$response = [
								"response" => 1,
								"massage" => "Se ha cambiar la imagen de perfil",
								'img' => $imgName
							];

							$response = json_encode($response);
							$_SESSION['img'] = $imgName;
							echo $response;

						}else{
							
							$response = [
								"response" => 2,
								"massage" => "Ha ocurrido un error al actualizar la imagen",
							];
							$response = json_encode($response);
							echo $response;
						}

					}else{
						$response = [
							"response" => 0,
							"massage" => "Es posible que no se haya realizado de manera correcta, revise su conexion a internet",
						];
						$response = json_encode($response);
						echo $response;
					}
				}
		}
	}