<?php
	/**
	 * Creado por Maria 10/06/2018
	 * Modificado por Maria 10/06/2018
	 * Modelo Paciente, contiene todo los metodos para obtener los datos referente a los Pacientes
	 */
	
	class Paciente
	{
		private $db;

		public function __construct()
		{
			$this->db = new Database();
		}

		/**
		 * [all devuelve todos los pacientes de la db]
		 * @return [object] [devuelve un objeto con todos los pacientes de la db]
		 */
		public function all(){
			$this->db->query("SELECT * FROM pacientes");
			return $this->db->fetchAll();
		}

		/**
		 * [getById metodo para obtener los registros de un paciente en especifico 
		 * buscandolo por su id]
		 * @param  [int] $id [id del paciente]
		 * @return [object] [object con la informacion de un paciente]
		 */
		public function getById($id){
			$this->db->query("SELECT * FROM pacientes WHERE id = :id");
			$this->db->bind(":id", $id);
			$row = $this->db->fetch();
			return $row;
		}

		/**
		 * [getBy metodo para obtener los registros de pacientes buscandolo por su una columna en espefico]
		 * @param  [string] $column [column de la db]
		 * @param  [any] $value  [valor de la column de la db]
		 * @return [object] [object con la informacion de pacientes]
		 */
		public function getBy($column,$value){
			$this->db->query("SELECT * FROM pacientes WHERE ".$column." = '".$value."' ");
			return $this->db->fetchAll();
		}

		/**
		 * [save metodo que permite registrar un paciente en la db]
		 * @param  [any] $data [datos ingresado por el usuario]
		 * @return [boolean] [devuelven true si se registra y false si falla el registro]
		 */
		public function save($data){
			$this->db->query("INSERT INTO pacientes (cedula, nombre, apellido, fecha_nacimiento, sexo, peso, talla, direccion, descripcion, estatus) 
							VALUES 
							(:dni, :name, :lastName, :born, :sexo, :peso, :height, :adress, :description, :status)");

			$this->db->bind(":dni", $data["dni"]);
			$this->db->bind(":name", $data["name"]);
			$this->db->bind(":lastName", $data["lastName"]);
			$this->db->bind(":born", $data["born"]);
			$this->db->bind(":sexo", $data["sexo"]);			
			$this->db->bind(":peso", $data["peso"]);			
			$this->db->bind(":height", $data["height"]);			
			$this->db->bind(":adress", $data["adress"]);			
			$this->db->bind(":description", $data["description"]);			
			$this->db->bind(":status", $data["status"]);

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
		 * [update medico para actualizar los datos de un pacientes]
		 * @param  [int] $id [id del paciente]
		 * @return [boolean] [devuelven true si se actualiza al paciente y false si falla]
		 */
		public function update($data){
			$this->db->query("UPDATE pacientes SET cedula = :dni, nombre = :name, apellido = :lastName, estatus = :status, 
								fecha_nacimiento = :born, sexo = :sexo, peso = :peso, talla = :height, direccion = :adress,
								descripcion = :description
								WHERE id = :id");
			$this->db->bind(":id", $data["id"]);
			$this->db->bind(":dni", $data["dni"]);
			$this->db->bind(":name", $data["name"]);
			$this->db->bind(":lastName", $data["lastName"]);
			$this->db->bind(":born", $data["born"]);
			$this->db->bind(":sexo", $data["sexo"]);			
			$this->db->bind(":peso", $data["peso"]);			
			$this->db->bind(":height", $data["height"]);			
			$this->db->bind(":adress", $data["adress"]);			
			$this->db->bind(":description", $data["description"]);			
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