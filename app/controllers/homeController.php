<?php
/**
* Creado por Francis Dona 08/04/2018
* Ultima modificacion por Francis Dona 08/04/2018
* Controlador del login, contiene todos las funcionalidad de las sesiones de los usuarios
*/

	class homeController extends Controller{

		private $loginModel = "Login";

		public function __construct(){
			$this->loginModel = $this->model($this->loginModel);
		}

		/**
		 * [index se encarga de mostrar la vista del inicio de sesion]
		 * @return [html] []
		 */
		public function index(){
			$this->view("home/index");
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
						@session_start();
						$_SESSION["user"] = $datos["user"];
						echo 1;
					}else{
						echo 0;
					}
				}else{
					echo 0;
				}
			}
		}
	}