<?php
	namespace X\Sys;

	use X\Sys\Registry;
	/**
	*
	*	Controller: the base controles in MVC system
	*
	*
	**/
	class Controller{
		protected $model;
		protected $view;
		protected $params;
		protected $dataView=array();// Lo usaremos para pasar datos
		protected $dataTable=array();
		protected $conf;
		protected $app; //Lo usaremos para la version y ponerlo en el footer

		function __construct($params=null,$dataView=null){
			$this->params=$params;
			//aqui hacemos un acceso tipo SINGELTON
			$this->conf=Registry::getInstance();

			$this->app=(array)$this->conf->app;
			$this->addData($this->app);
			
		}

		function ajax($output){
			ob_clean(); //limpiamos el bufer, para hcer solo una salidia limpia por echo solo de json
			if(is_array($output)){
				echo json_encode($output);
			}
		}


		protected function addData($array){
			
			if (is_array($array)){
				
				if ($this->is_single($array)&& is_array($this->dataView)){
					
					$this->dataView=array_merge($this->dataView,$array);

				} else {

					$this->dataTable=$array;
				}
			}

			else {

				$this->dataView=$array;
			}
		}


		protected function is_single($data){

				foreach ($data as  $value) {

					if (is_array($value)){

						return false;

					} else {

						return true;
					}

				}
			}
				
		
		function error(){

            $this->msg='Error. Action not defined';
            
         }
	}