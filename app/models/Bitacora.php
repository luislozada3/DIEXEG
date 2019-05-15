<?php
	/**
	 * Creado por Francis Dona 28/06/2018
	 * Modificado por Maria 28/06/2018
	 * Modelo Bitacoraa, contiene todo los metodos para obtener los datos referente a la Bitacora
	 */
	
	class Bitacora
	{
		private $db;

		public function __construct()
		{
			$this->db = new Database();
		}

		/**
		 * [all devuelve todas los registros contenidos en bitacora
		 * @return [object] [devuelve un objeto con todos los registros de la bitacora]
		 */
		public function all(){
			$this->db->query("SELECT * FROM bitacora");
			return $this->db->fetchAll();
		}

		/**
		 * [getById metodo para obtener un registro de la bitacora en especifico 
		 * buscandolo por su id]
		 * @param  [int] $id [id de la bitacora]
		 * @return [object] [object con la informacion de la bitacora]
		 */
		public function getById($id){
			$this->db->query("SELECT * FROM bitacora WHERE id = :id");
			$this->db->bind(":id", $id);
			$row = $this->db->fetch();
			return $row;
		}

		/**
		 * [getBy metodo para obtener los registros de bitacora buscandolas por una columna en espefico]
		 * @param  [string] $column [column de la db]
		 * @param  [any] $value  [valor de la column de la db]
		 * @return [object] [object con la informacion de la bitacora]
		 */
		public function getBy($column,$value){
			$this->db->query("SELECT * FROM bitacora WHERE ".$column." = '".$value."' ");
			return $this->db->fetchAll();
		}

		/**
		 * [save metodo que permite registrar una bitocora en la db]
		 * @param  [any] $data [datos ingresado por el usuario]
		 * @return [boolean] [devuelven true si se registra y false si falla el registro]
		 */
		public function save($data){
			$this->db->query("INSERT INTO bitacora (usuario_id, descripcion) VALUES (:user, :description)");

			$this->db->bind(':user', $data['user_id']);
			$this->db->bind(':description', $data['description']);

			if ( $this->db->execute() ) {
				return true;
			}else{
				return false;
			}
		}

		/**
		 * [delete metodo para eliminado fisico de una bitacora]
		 * @param  [int] $id [id de la bitacora]
		 * @return [boolean] [devuelven true si se borra y false si falla]
		 */
		public function delete($id){
			$this->db->query("DELETE FROM bitacora WHERE id = :id");
			$this->db->bind(":id", $id);
			$delete = $this->db->execute();
			return $delete;
		}

		/**
		 * [update actualiza los datos de una bitacora]
		 * @param  [int] $id [id de la bitacora]
		 * @return [boolean] [devuelven true si se actualiza y false si falla]
		 */
		public function update($data){
			$this->db->query("UPDATE bitacora SET descripcion = :description, usuario_id = :user WHERE id = :id");
			$this->db->bind(":id", $data["id"]);
			$this->db->bind(":description", $data["description"]);
			$this->db->bind(":user", $data["user"]);
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