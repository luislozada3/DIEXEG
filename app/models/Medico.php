<?php
	/**
	 * Creado por Francis Dona 08/04/2018
	 * Modificado por Francis Dona 08/04/2018
	 * Modelo Login, contiene todo los metodos para obtener los datos referente a los usuarios que se logean
	 */
	
	class Medico
	{
		private $db;

		public function __construct()
		{
			$this->db = new Database();
		}

		/**
		 * [all devuelve todos los medicos de la db]
		 * @return [object] [devuelve un objeto con todos los usuarios de la db]
		 */
		public function all(){
			$this->db->query("SELECT * FROM medicos");
			return $this->db->fetchAll();
		}

		/**
		 * [getById metodo para obtener los registros de un medico en especifico 
		 * buscandolo por su id]
		 * @param  [int] $id [id del medico]
		 * @return [object] [object con la informacion de un medico]
		 */
		public function getById($id){
			$this->db->query("SELECT * FROM medicos WHERE id = :id");
			$this->db->bind(":id", $id);
			$row = $this->db->fetch();
			return $row;
		}

		/**
		 * [getBy metodo para obtener los registros de un medico en especifico 
		 * buscandolo por su una columna en espefico]
		 * @param  [string] $column [column de la db]
		 * @param  [any] $value  [valor de la column de la db]
		 * @return [object] [object con la informacion de un usuario]
		 */
		public function getBy($column,$value){
			$this->db->query("SELECT * FROM medicos WHERE ".$column." = '".$value."' ");
			return $this->db->fetchAll();
		}

		/**
		 * [save metodo que permite registrar un medico en la db]
		 * @param  [any] $data [datos ingresado por el usuario]
		 * @return [boolean] [devuelven true si se registra y false si falla el registro]
		 */
		public function save($data){
			$this->db->query("INSERT INTO medicos (nombre, apellido, Profesion, estatus) VALUES (:name, :lastName, :job, :status)");

			$this->db->bind(':name',  $data['name']);
			$this->db->bind(':lastName', $data['lastName']);
			$this->db->bind(':job', $data['job']);
			$this->db->bind(':status', $data['status']);

			if ( $this->db->execute() ) {
				return true;
			}else{
				return false;
			}
		}

		/**
		 * [delete metodo para eliminardo fisico de un medico]
		 * @param  [int] $id [id del usuario]
		 * @return [boolean] [devuelven true si se borra al usuario y false si falla]
		 */
		public function delete($id){
			$this->db->query("DELETE FROM medicos WHERE id = :id");
			$this->db->bind(":id", $id);
			$delete = $this->db->execute();
			return $delete;
		}

		/**
		 * [update medico para actualizar los datos de un medico]
		 * @param  [int] $id [id del usuario]
		 * @return [boolean] [devuelven true si se borra al usuario y false si falla]
		 */
		public function update($data){
			$this->db->query("UPDATE medicos SET nombre = :name, apellido = :lastName, Profesion = :job, estatus = :status WHERE id = :id");
			$this->db->bind(":id", $data["id"]);
			$this->db->bind(":name", $data["name"]);
			$this->db->bind(":lastName", $data["lastName"]);
			$this->db->bind(":job", $data["job"]);
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