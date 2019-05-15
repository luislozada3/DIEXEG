<?php
/**
* Creado por Francis Dona 08/04/2018
* Ultima modificacion por Francis Dona 21/04/2018
* Controlador del login, contiene todos las funcionalidad de las sesiones de los usuarios
*/

	class usuariosController extends Controller{

		private $userModel = "User";
		private $bitacoraModel = "Bitacora";


		/**
		 * [__construct inicializa el model del usuario y de bitacora]
		 */
		public function __construct(){
			$this->userModel = $this->model($this->userModel);
			$this->bitacoraModel = $this->model($this->bitacoraModel);

		}

		/**
		 * [index muestra la pagina de incio de usuarios]
		 * @return [html] [vista de usuarios]
		 */
		public function index(){
			$this->view("usuarios/index");
		}

		/**
		 * [listar datos que se mostraron en la tabla de usuarios]
		 * @return [JSON] [obj JSON con los datos de los usuarios]
		 */
		public function listar () {
			@session_start();
			$users = $this->userModel->query("SELECT usuarios.*, personal.nombre, personal.apellido, personal.oficio From personal 
												LEFT OUTER JOIN personal_usuario ON personal.id = personal_usuario.personal_id 
												INNER JOIN usuarios ON usuarios.id=personal_usuario.usuario_id 
												WHERE usuarios.estatus != 0 AND usuarios.usuario != '".$_SESSION['user']."' 
												UNION SELECT usuarios.*, medicos.nombre, medicos.apellido, medicos.Profesion 
												From medicos LEFT OUTER JOIN medico_usuario ON medicos.id = medico_usuario.medico_id 
												INNER JOIN usuarios ON usuarios.id=medico_usuario.usuario_id 
												WHERE usuarios.estatus != 0 AND usuarios.usuario != '".$_SESSION['user']."' ORDER BY id DESC");
			$users = [ "data" => $users];
			$dataJSON = json_encode($users);
			echo $dataJSON;
		}

		/**
		 * [registrar funcion para mostrar el formulario de registro de usuarios]
		 * @return [html] [seccion de registro de usuario]
		 */
		public function registrar(){
			
			$oficina = $this->userModel->query("SELECT personal.* From personal LEFT OUTER JOIN
												personal_usuario ON personal.id = personal_usuario.personal_id 
												WHERE personal_usuario.personal_id IS null AND personal.estatus != 0");

			$medico = $this->userModel->query("SELECT medicos.* From medicos LEFT OUTER JOIN medico_usuario ON 
												medicos.id = medico_usuario.medico_id 
												WHERE medico_usuario.medico_id IS null AND medicos.estatus != 0");
			$personal = [
					"medico" => $medico,
					"oficina" => $oficina
			];
			
			$this->view("usuarios/registrar",$personal);
			
		}

		/**
		 * [guardar registro los datos de los nuevos usuarios]
		 * @return [integer] [retorna distintos valores entero dependiendo si las condiciones se cumplen o no]
		 */
		public function guardar(){
			
			if ($_POST) {

				$img = $_FILES['imagen'];
				$user = $_POST["usuario"];
				$personal = $_POST["personal"];
				$doctor = $_POST["medico"];
				$office = $_POST["oficina"];
				$password = $_POST["clave"];
				$passwordAgain = $_POST["rclave"];
				$role = $_POST["rol"];
				$pregunta1 = $_POST["pregunta1"];
				$pregunta2 = $_POST["pregunta2"];
				$respuesta1 = $_POST["respuesta1"];
				$respuesta2 = $_POST["respuesta2"];

				$dirImg = $_SERVER["DOCUMENT_ROOT"] . "/diexeg/public/img/usuarios/";

				if ( empty($img["name"]) ) {
					
					$moveFile = false;
					$imgName = "emptyUser.png";
				
				}else{

					$moveFile = true;
					$name = time();
					$ext = pathinfo($img["name"], PATHINFO_EXTENSION);

					if (strtoupper($ext) == "JPG" || strtoupper($ext) == "JPEG" || strtoupper($ext) == "PNG") {
						$imgName = $name.".".$ext;
					}else{
						echo "3";
						exit();
					}
				}

				if ($personal == "medico") {
					
					$type = "doctor";
					$personal = $doctor;
				
				}else {

					$type = "office";
					$personal = $office;

				}

				$dataUser = [
					"user" => strtolower($user),
					"password" => passwordEncripterD($password),
					"role" => ucfirst($role),
					"image" => $imgName,
					"pregunta1" => $pregunta1,
					"pregunta2" => $pregunta2,
					"respuesta1" => $respuesta1,
					"respuesta2" => $respuesta2,
					"status" => 1
				];

				$verifyUser = $this->userModel->getBy("usuario",$dataUser["user"]);
				
				if ( empty($verifyUser) ) {


					if( $this->userModel->save($dataUser) ){

						if ($moveFile) {

							move_uploaded_file($img["tmp_name"], $dirImg.$imgName);
						
						}

						$lastUser = $this->userModel->query("SELECT max(id) as id FROM usuarios");
						$lastUser = $lastUser[0]->id;

						if ($type == "doctor") {

							$doctorUser = $this->userModel->queryExecute("INSERT INTO medico_usuario (medico_id, usuario_id) VALUES (".$personal.", ".$lastUser.")");

							if ($doctorUser) {

								@session_start();
								$description = "Registro a un usuario nuevo";
								$user = $_SESSION["user_id"];

								$bitacora = [
									"description" => $description,
									"user_id" =>  $user,
								];

								$save = $this->bitacoraModel->save($bitacora);

								echo 1;
							}else{
								echo 0;
							}						

						}else{

							$personalUser = $this->userModel->queryExecute("INSERT INTO personal_usuario (personal_id, usuario_id) VALUES (".$personal.", ".$lastUser.")");

							if ($personalUser) {

								@session_start();
								$description = "Registro a un usuario nuevo";
								$user = $_SESSION["user_id"];

								$bitacora = [
									"description" => $description,
									"user_id" =>  $user,
								];

								$save = $this->bitacoraModel->save($bitacora);
								
								echo 1;
							}else{
								echo 0;
							}
						
						}

					}

				}else {
					echo 2;
				}
			}
		}

		/**
		 * [borrar borra de manera logica el registro del usuario seleccionado]
		 * @return [booleam] [true si se elimina, false si falla la consulta]
		 */
		public function borrar(){
			if($_POST){
				$delete = $this->userModel->queryExecute("UPDATE usuarios SET estatus = '0' WHERE id = '".$_POST['id']."'");

				if ($delete) {
					@session_start();

					$description = "Elimino un usuario";
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
		 * [acceso se encarga de bloquear o desbloquear un usuario que ha sido seccionado]
		 * @return [array] [informacion para saber si la consulta fue exitosa y que accion se realizo (bloquear o desbloquear)]
		 */
		public function acceso(){
			
			if ($_POST) {

				$access = $_POST['access'];
				$id = $_POST['id'];

				$blockAndUnlock = $this->userModel->queryExecute("UPDATE usuarios SET estatus = '".$access."' WHERE id = '".$_POST['id']."'");

				if ($blockAndUnlock) {
					@session_start();
					$description = "Modifico el acceso de un usuario";
					$user = $_SESSION["user_id"];

					$bitacora = [
						"description" => $description,
						"user_id" =>  $user,
					];

					$save = $this->bitacoraModel->save($bitacora);

					$response = [
						"response" => $blockAndUnlock,
						"access" => $access
					];

					$response = json_encode($response);
					echo $response;
					
				}

			}

		}

		public function editar($id){

				$usuario = $this->userModel->getById($id);
				$datos = [
					"usuario" => $usuario->usuario,
					"clave" => $usuario->password,
					"nivel" => $usuario->nivel
				];
				$this->view("page/editar",$datos);

		}
	}