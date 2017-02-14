<?php 

	namespace X\Sys;

	//extiende de la rayz del php la clase PDO, por eso la contra barra
	class DB extends \PDO
	{

		static $instance;

		public function __construct(){

			//recuperar configuracion del fichero config.json
			$config = Registry::getInstance();
			//extraigo las cosasd e conf
			$dbconf = (array)$config->dbconf;

			//Recogemos los valores de nuestro fichero json, atraves de nuestra clase registry	
			$dsn=$dbconf['driver'].':host='.$dbconf['dbhost'].';dbname='.$dbconf['dbname'];	
			$usr=$dbconf['dbuser']; 		
			$pwd=$dbconf['dbpass'];

			/*var_dump($dsn.'  '.$usr.'   '.$pwd);
			die;*/



			try{

				parent::__construct($dsn,$usr,$pwd);
			}
			catch(PDOException $e){

				echo $e->getMessage();

			}

			/*var_dump($dbconf);
			die;*/


		}

		static function singleton(){

			if(!(self::$instance instanceof self)){

				self::$instance=new self();
			}

				return self::$instance;
			
		}
	}