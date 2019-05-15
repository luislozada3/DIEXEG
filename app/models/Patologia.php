<?php
	/**
	 * Creado por Maria 29/07/2018
	 * Modificado por Maria 29/07/2018
	 * Modelo Patologia, contiene todo los metodos para obtener los datos referentes a las enfermedades que existen en la
	 * base de conocimento del sistema experto
	 */
	
	class Patologia
	{
		private $db;

		public function __construct()
		{
			$this->db = new Database();
		}

		/**
		 * [all devuelve todas las enfermedades
		 * @return [object] [devuelve un objeto con todos las enfermedades]
		 */
		public function all(){
			$this->db->query("SELECT * FROM enfermedades");
			return $this->db->fetchAll();
		}

		/**
		 * [getById metodo para obtener el registro de una enfermedad en especifico 
		 * buscandolo por su id]
		 * @param  [int] $id [id de la cita]
		 * @return [object] [object con la informacion de una cita]
		 */
		public function getById($id){
			$this->db->query("SELECT * FROM enfermedades WHERE id = :id");
			$this->db->bind(":id", $id);
			$row = $this->db->fetch();
			return $row;
		}

		/**
		 * [getBy metodo para obtener los registros de enfermedades buscandolas por una columna en espefico]
		 * @param  [string] $column [column de la db]
		 * @param  [any] $value  [valor de la column de la db]
		 * @return [object] [object con la informacion de las citas]
		 */
		public function getBy($column,$value){
			$this->db->query("SELECT * FROM enfermedades WHERE ".$column." = '".$value."' ");
			return $this->db->fetchAll();
		}

		/**
		 * [save metodo que permite registrar una enfermedad en la db]
		 * @param  [any] $data [datos ingresado por el usuario]
		 * @return [boolean] [devuelven true si se registra y false si falla el registro]
		 */
		public function save($data){
			$this->db->query("INSERT INTO citas (nombre) VALUES (:name)");

			$this->db->bind(':name',  $data['name']);

			if ( $this->db->execute() ) {
				return true;
			}else{
				return false;
			}
		}

		/**
		 * [delete metodo para eliminado fisico de una enfermedad]
		 * @param  [int] $id [id de la enfermedad]
		 * @return [boolean] [devuelven true si se borra la enfermedad y false si falla]
		 */
		public function delete($id){
			$this->db->query("DELETE FROM enfermedades WHERE id = :id");
			$this->db->bind(":id", $id);
			$delete = $this->db->execute();
			return $delete;
		}

		/**
		 * [update actualiza los datos de una enfermedad]
		 * @param  [int] $id [id de la enfermedad]
		 * @return [boolean] [devuelven true si se actualiza y false si falla]
		 */
		public function update($data){
			$this->db->query("UPDATE enfermedades SET nombre = :name WHERE id = :id");
			$this->db->bind(":id", $data["id"]);
			$this->db->bind(":name", $data["name"]);
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