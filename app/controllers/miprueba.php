<?php

	namespace X\App\Controllers;

	use X\Sys\Controller;

	class Miprueba extends Controller{

		public function __construct($params){
			parent::__construct($params);
			$this->dataView=array('title'=>'miTitle',
									'name'=>'miPrueba'); //la array que le pasamos pa que se puedan cargar las variables de tpl/thome.php
			$this->model=new \X\App\Models\mMiprueba();
			$this->view=new \X\App\Views\vMiprueba($this->dataView);
		}

		function home(){
			
		}
	}