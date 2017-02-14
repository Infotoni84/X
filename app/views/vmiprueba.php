<?php
	namespace X\App\Views;

	use \X\Sys\View;

	class vMiprueba extends View{

		public function __construct($data=null){
			parent::__construct($data);
			$this->template='tmiprueba.php';
			//$this->name='toni';

			//llamo al metodo que e creado llamado miRender dentro de la clase view
			$html = $this->miRender($this->template);
			echo $html;
		}
	}