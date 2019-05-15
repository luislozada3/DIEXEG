<?php
/**
* Creado por Francis Dona 08/04/2018
* Ultima modificacion por Francis Dona 08/04/2018W
* Clase Database, contiene los metodos de conexion de db hecho con PDO
*/

	class Database
	{

		private $host = DB_HOST;
		private $user = DB_USER;
		private $password = DB_PASSWORD;
		private $dbName = DB_NAME;
		private $dbDriver = DB_DRIVER;
		private $dbCharset = DB_CHARSET;
		
		private $dbh;
		private $error;
		private $stmt;

		/**
		 * [__contruct Instacia la conexion de la base de datos]
		 * @return [object] [class de la db PDO]
		 */
		public function __construct()
		{
			//configuracion de la conexion de la db
			$dsn = $this->dbDriver.":host=".$this->host.";dbname=".$this->dbName;
			$options = array(
								PDO::ATTR_PERSISTENT => true,
								PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
							);

			try{

				$this->dbh = new PDO($dsn, $this->user, $this->password, $options);
				$this->dbh->exec("set names ".$this->dbCharset);
			
			}catch(PDOException $e){
				$this->error = $e->getMessage();
				echo $this->error;
			}
		}

		/**
		 * [query prepara la consulta sql que va ajecutar]
		 * @param  [string] $sql [cadena con la consulta a preparar]
		 * @return [void] []
		 */
		public function query($sql){
			$this->stmt = $this->dbh->prepare($sql);
		}

		/**
		 * [bind Vincula la consulta con bind]
		 * @param  [any] $param [description]
		 * @param  [any] $value [valor de la variable]
		 * @param  [any] $type  [tipo de valor que recibe la variable]
		 * @return [void] []
		 */
		public function bind($param, $value, $type = null){
			if (is_null($type)) {
				switch(true){
					case is_int($value):
						$type = PDO::PARAM_INT;
					break; 
					case is_bool($value):
						$type = PDO::PARAM_BOOL;
					break; 
					case is_null($value):
						$type = PDO::PARAM_NULL;
					break; 
					default:
						$type = PDO::PARAM_STR;
					break; 
				}
			}
			$this->stmt->bindValue($param, $value, $type);
		}

		/**
		 * [execute ejecuta la consulta sql]
		 * @return [obj] [los datos de la consulta ejecutada]
		 */
		public function execute(){
			return $this->stmt->execute();
		}

		/**
		 * [fetchAll retorna todos los registros de la consulta]
		 * @return [obj] []
		 */
		public function fetchAll(){
			$this->execute();
			return $this->stmt->fetchAll(PDO::FETCH_OBJ);	
		}

		/**
		 * [fetch retorna el primer registro de la consulta]
		 * @return [obj] [description]
		 */
		public function fetch(){
			$this->execute();
			return $this->stmt->fetch(PDO::FETCH_OBJ);	
		}

		/**
		 * [rowCount retorna el numero de filas de devolvio la consulta]
		 * @return [int] []
		 */
		public function rowCount(){
			return $this->stmt->rowCount();
		}


	}