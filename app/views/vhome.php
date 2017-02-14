<?php
	namespace X\App\Views;

	use \X\Sys\View;

	class vHome extends View{

		public function __construct($dataView,$dataTable=null){
			parent::__construct($dataView,$dataTable);
			//$this->template='thome.php';
			//$this->name='toni';
			$this->output= $this->render('thome.php');
		}
	}