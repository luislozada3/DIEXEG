<?php
	/**
	 * Creado por Francis Dona 08/04/2018
	 * Modificado por Francis Dona 08/04/2018
	 * Modelo Login, contiene todo los metodos para obtener los datos referente a los usuarios que se logean
	 */
	
	class User
	{
		private $db;

		public function __construct()
		{
			$this->db = new Database();
		}

		/**
		 * [all devuelve todos los usuarios de la db]
		 * @return [object] [devuelve un objeto con todos los usuarios de la db]
		 */
		public function all(){
			$this->db->query("SELECT * FROM usuarios");
			return $this->db->fetchAll();
		}

		/**
		 * [getById metodo para obtener los registros de un usuario en especifico 
		 * buscandolo por su id]
		 * @param  [int] $id [id del usuario]
		 * @return [object] [object con la informacion de un usuario]
		 */
		public function getById($id){
			$this->db->query("SELECT * FROM usuarios WHERE id = :id");
			$this->db->bind(":id", $id);
			$row = $this->db->fetch();
			return $row;
		}

		/**
		 * [getBy metodo para obtener los registros de un usuario en especifico 
		 * buscandolo por su una columna en espefico]
		 * @param  [string] $column [column de la db]
		 * @param  [any] $value  [valor de la column de la db]
		 * @return [object] [object con la informacion de un usuario]
		 */
		public function getBy($column,$value){
			$this->db->query("SELECT * FROM usuarios WHERE ".$column." = '".$value."' ");
			return $this->db->fetchAll();
		}

		/**
		 * [save metodo que permite registrar un usuario en la db]
		 * @param  [any] $data [datos ingresado por el usuario]
		 * @return [boolean] [devuelven true si se registra y false si falla el registro]
		 */
		public function save($data){
			$this->db->query("INSERT INTO usuarios (usuario, password, nivel, imagen, estatus, pregunta1, respuesta1, pregunta2, respuesta2 ) VALUES (:user, :password, :role, :image, :status, :pregunta1, :respuesta1, :pregunta2, :respuesta2 )");

			$this->db->bind(':user',  $data['user']);
			$this->db->bind(':password', $data['password']);
			$this->db->bind(':role', $data['role']);
			$this->db->bind(':image', $data['image']);
			$this->db->bind(':status', $data['status']);
			$this->db->bind(':pregunta1', $data['pregunta1']);
			$this->db->bind(':pregunta2', $data['pregunta2']);
			$this->db->bind(':respuesta1', $data['respuesta1']);
			$this->db->bind(':respuesta2', $data['respuesta2']);

			if ( $this->db->execute() ) {
				return true;
			}else{
				return false;
			}
		}

		/**
		 * [delete metodo para eliminardo fisico de un usuario]
		 * @param  [int] $id [id del usuario]
		 * @return [boolean] [devuelven true si se borra al usuario y false si falla]
		 */
		public function delete($id){
			$this->db->query("DELETE FROM usuarios WHERE id = :id");
			$this->db->bind(":id", $id);
			$delete = $this->db->execute();
			return $delete;
		}

		/**
		 * [delete metodo para eliminardo fisico de un usuario]
		 * @param  [int] $id [id del usuario]
		 * @return [boolean] [devuelven true si se borra al usuario y false si falla]
		 */
		public function update($data){
			$this->db->query("UPDATE usuarios SET usuario = :user, password = : password, nivel = :role, imagen = :image, estatus = :status WHERE id = :id");
			$this->db->bind(":id", $data["id"]);
			$this->db->bind(":user", $data["user"]);
			$this->db->bind(":password", $data["password"]);
			$this->db->bind(":role", $data["role"]);
			$this->db->bind(":image", $data["image"]);
			$this->db->bind(":status", $data["status"]);
			$update = $this->db->execute();
			return $update;
		}

		/**
		 * [query metodo que sirve para contruir una consulta personalizada]
		 * @param  [string] $sql [consulta sql]
		 * @return [object] [devuelve el objecto de la consulta construida]
		 */
		public function query($sql){
			$this->db->query($sql);
			return $this->db->fetchAll();
		}

		/**
		 * [queryExecute metodo que sirve para contruir una consulta personalizada]
		 * @param  [string] $sql [consulta sql]
		 * @return [booleam] [devuelve true si se ejecuta la consulta o false si da un error]
		 */
		public function queryExecute($sql){
			$this->db->query($sql);
			return $this->db->execute();
		}
	}