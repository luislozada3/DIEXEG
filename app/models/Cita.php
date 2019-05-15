<?php
	/**
	 * Creado por Maria 27/06/2018
	 * Modificado por Maria 27/06/2018
	 * Modelo Cita, contiene todo los metodos para obtener los datos referente a las citas
	 */
	
	class Cita
	{
		private $db;

		public function __construct()
		{
			$this->db = new Database();
		}

		/**
		 * [all devuelve todas las cit]as
		 * @return [object] [devuelve un objeto con todos las citas]
		 */
		public function all(){
			$this->db->query("SELECT * FROM citas");
			return $this->db->fetchAll();
		}

		/**
		 * [getById metodo para obtener el registro de una cita en especifico 
		 * buscandolo por su id]
		 * @param  [int] $id [id de la cita]
		 * @return [object] [object con la informacion de una cita]
		 */
		public function getById($id){
			$this->db->query("SELECT * FROM citas WHERE id = :id");
			$this->db->bind(":id", $id);
			$row = $this->db->fetch();
			return $row;
		}

		/**
		 * [getBy metodo para obtener los registros de citas buscandolas por una columna en espefico]
		 * @param  [string] $column [column de la db]
		 * @param  [any] $value  [valor de la column de la db]
		 * @return [object] [object con la informacion de las citas]
		 */
		public function getBy($column,$value){
			$this->db->query("SELECT * FROM citas WHERE ".$column." = '".$value."' ");
			return $this->db->fetchAll();
		}

		/**
		 * [save metodo que permite registrar una cita en la db]
		 * @param  [any] $data [datos ingresado por el usuario]
		 * @return [boolean] [devuelven true si se registra y false si falla el registro]
		 */
		public function save($data){
			$this->db->query("INSERT INTO citas (fecha, hora, paciente_id, medico_id, estatus) VALUES (:fecha, :hora, :paciente_id, :medico_id, :estatus)");

			$this->db->bind(':fecha',  $data['fecha']);
			$this->db->bind(':hora', $data['hora']);
			$this->db->bind(':paciente_id', $data['paciente_id']);
			$this->db->bind(':medico_id', $data['medico_id']);
			$this->db->bind(':estatus', $data['estatus']);

			if ( $this->db->execute() ) {
				return true;
			}else{
				return false;
			}
		}

		/**
		 * [delete metodo para eliminado fisico de una cita]
		 * @param  [int] $id [id de la cita]
		 * @return [boolean] [devuelven true si se borra la cita y false si falla]
		 */
		public function delete($id){
			$this->db->query("DELETE FROM citas WHERE id = :id");
			$this->db->bind(":id", $id);
			$delete = $this->db->execute();
			return $delete;
		}

		/**
		 * [update actualiza los datos de una cita de un paciente]
		 * @param  [int] $id [id de la cita]
		 * @return [boolean] [devuelven true si se actualiza y false si falla]
		 */
		public function update($data){
			$this->db->query("UPDATE citas SET fecha = :fecha, hora = :hora, paciente_id = :paciente_id, medico_id = :medico_id WHERE id = :id");
			$this->db->bind(":id", $data["id"]);
			$this->db->bind(":fecha", $data["fecha"]);
			$this->db->bind(":hora", $data["hora"]);
			$this->db->bind(":medico_id", $data["medico_id"]);
			$this->db->bind(":paciente_id", $data["paciente_id"]);
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