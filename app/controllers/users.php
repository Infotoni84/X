<?php

	/*Sin actualizar*/
	namespace X\App\Controllers;

	use X\Sys\Controller;

	class Users extends Controller{
		protected $model;
		protected $view;
		protected $params;

		public function __construct($params){
			parent::__construct($params);
			$data=array('name'=>'Toni estando en users.php'); //la array que le pasamos pa que se peudan cargar las variables de tpl/home.php
			$this->model=new \X\App\Models\mUsers();
			$this->view=new \X\App\Views\vUsers($data);
		}

		function home(){
			
		}
	}