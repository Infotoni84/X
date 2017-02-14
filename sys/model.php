db<?php
	namespace X\Sys;

	class Model 
	{

		protected $db;
		protected $stmt;

		public function __construct()
		{
			$this->db=DB::singleton();
		}


		/*Usamos el metodo preapre de PDO, para preparar la sentencia sql*/
		public function query($sql)
		{
			$this->stmt=$this->db->prepare($sql);
		}

		/*Usamos un switch para saver que tipo de dato es y luego lo hacemos un 
		bindValue para poder usar nuestra sentencia con el sistema PDO*/
		public function bind($param,$value)
		{	
			

			
				switch (true) {
					case is_int($value):
						$type= \PDO::PARAM_INT;
						break;

					case is_null($value):
						$type= \PDO::PARAM_NULL;
						break;

					case is_bool($value):
						$type= \PDO::PARAM_BOOL;
						break;

					default:
						$type= \PDO::PARAM_STR;
						break;
				}
			

			$this->stmt->bindValue($param,$value,$type);
			//$this->stmt->bindParam($param,$value,$type); 

		}
		
		/*Ejecutamos la sentencia preparada con PDO*/
		public function execute(){

			return $this->stmt->execute();
		}

		/*Recogemos el resultado de la la consulta multiple*/
		public function resultSet(){

			return $this->stmt->fetchAll(\PDO::FETCH_ASSOC);
		}

		/*Recogemos el resultado de la la consulta cuando es unica*/
		public function single(){

			return $this->stmt->fetch(\PDO::FETCH_ASSOC);
		}

		/*Contamos las filas que han sido afectadas despues de un INSERT,UPDATE o DELETE*/
		public function rowCount(){

			return $this->stmt->rowCount();
		}

		/*Retornamos la ultima ID insertada*/
		public function lastInsertId(){
			
			return $this->db->lastInsertId();
		}

		/*Para comenzar una transicion*/
		public function beginTransaction(){

			return $this->db->beginTransaction(); 
		}

		/*Para finalizar con exito una transacion*/
		public function endTransaction(){

			return $this->db->commit();
		}

		/*Para cancelar y hacer rollback en una transicion*/
		public function cancelTransaction(){

			return $this->db->rollback(); 
		}

		/*Sirve para ayudarnos a depurar la sentencia*/
		public function debugDumpParams(){

			return $this->stmt->debugDumpParams(); 
		}
	}