<?php

	namespace X\App\Controllers;

	use X\Sys\Controller;

	class Home extends Controller{

		public function __construct($params){
			
			parent::__construct($params);
			$this->addData(array('page'=>'Home')); //la array que le pasamos pa que se puedan cargar las variables de tpl/thome.php
			$this->model=new \X\App\Models\mHome();
			$this->view=new \X\App\Views\vHome($this->dataView,$this->dataTable);


		}

		function home(){
			//echo 'Esta es la accion HOME!!!';

			$data=$this->model->getRoles();
       		$this->addData($data);
        	//hay que recargar el construct de view, que es el que usa vHome
        	$this->view->__construct($this->dataView,$this->dataTable); //,$this->dataTable lo he quitado para hacer pruebas
        	$this->view->show();
		}
	}