<?php
/**
* Creado por Francis Dona 08/04/2018
* Ultima modificacion por Francis Dona 08/04/2018
* Controlador del login, contiene todos las funcionalidad de las sesiones de los usuarios
*/

	class loginController extends Controller{

		private $loginModel = "Login";
		private $db;

		public function __construct(){
			$this->loginModel = $this->model($this->loginModel);
			$this->db = new dataBase();
		}

		/**
		 * [index se encarga de mostrar la vista del inicio de sesion]
		 * @return [html] []
		 */
		public function index(){
			$this->view("login/index");
		}

		/**
		 * [index se encarga de mostrar la vista del inicio de sesion]
		 * @return [html] []
		 */
		public function recover(){
			$this->view("login/recoverPassword");
		}

		/**
		 * [login se encarga del inicio de sesion de la aplicacion]
		 * @return [boolean] [true si entra en la aplicacion, false si los datos son invalidos]
		 */
		public function login(){
			
			if ($_POST) {

				$datos = [
					"user" => $_POST["user"],
					"password" => $_POST["password"]
				];

				$usuario = $this->loginModel->getBy("usuario", $datos["user"]);
				if ( !empty($usuario) ) {
					if( passwordVerifyD( $datos["password"], $usuario[0]->password ) ){
						if ($usuario[0]->estatus == -1) {
							echo 2;
						}else{
							@session_start();
							$_SESSION["user_id"] = $usuario[0]->id;
							$_SESSION["user"] = $datos["user"];
							$_SESSION["img"] = $usuario[0]->imagen;
							$_SESSION["role"] = $usuario[0]->nivel;
							echo 1;
						}
					}else{
						echo 0;
					}
				}else{
					echo 0;
				}
			}
		}

		/**
		 * [logout se encarga de cerrar la sesion del usuario]
		 * @return [html] [vista del login]
		 */
		public function logout(){
			@session_start();			
			@session_destroy();
			redirectTo("login");
		}

		/**
		 * [getRecoveryMethod permite obtener los datos de la preguntas y respuesta secreata de un usuario]
		 * @return [array] [data user]
		 */
		public function getRecoveryMethod() {
			if ($_GET) {
				$user = $_GET['user'];
				$query = $this->db->query("SELECT id, pregunta1, respuesta1, pregunta2, respuesta2 FROM usuarios WHERE usuario = '{$user}'");
				$user = $this->db->fetch();
				$response = json_encode($user);
				echo $response;
			}

		}

		public function passwordRecover () {
			if ($_POST) {
				$respuesta1 = $_POST["respuesta1"];
				$respuesta2 = $_POST["respuesta2"];
				$userId = $_POST["userId"];
				$query = $this->db->query("SELECT * FROM usuarios WHERE id = {$userId}");
				$dataUser = $this->db->fetch();
				if (strtoupper($dataUser->respuesta1) == strtoupper($respuesta1) && strtoupper($dataUser->respuesta2) == strtoupper($respuesta2) ) {

					$passwordToShow = "di".time()."ex";
					$password = passwordEncripterD($passwordToShow);

					$query = $this->db->query("UPDATE usuarios SET password = '{$password}' WHERE id = {$userId}");
					$passwordRecover = $this->db->execute();

					if ($passwordRecover) {
						$response = [
							"status" => 1,
							"message" => "contraseña recuperada: ",
							"data" => $passwordToShow
						];						
					}else{
						$response = [
							"status" => 0,
							"message" => "Ha ocurrido un error inesperado dutante la recuperacion del usuario"
						];
					}

				}else{
					$response = [
						"status" => 0,
						"message" => "Datos invalidos por favor verifique"
					];
				}
			}else{
				$response = [
					"status" => 2,
					"message" => "Datos enviados de manera erronea por favor verifique"
				];
			}

			echo json_encode($response);
			exit();
		}
	}