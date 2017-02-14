<?php
	namespace X\App\Views;

	use \X\Sys\View;

	use \X\Sys\Session;

	class vUsers extends View{

		public function __construct($data=null){
			parent::__construct($data);
			$this->template='tusers.php';
			//$this->name='toni';
			$html = $this->render($this->template);
			//echo $html;


			echo '<br>Key por defecto cargada en el core con el Value:<br>';
			
			//recogo la sesion con el metodo get()
			$pruebaSession=Session::get('id');

			var_dump($pruebaSession);

			echo '<br><br>Intentando mirar una Key que no existe<br>';

			//Borro la session 'id' con el metodo del()
			Session::del('id');

			$pruebaSession=Session::get('id');

			var_dump($pruebaSession);

			echo '<br><br>Creamos una Key nueva y le asignamos un value:<br>';

			//con el metodo set() creamos una sesion nueva
			Session::set('miId','XXXXXXXXXXXXXXXXXXXXXXXX');

			$pruebaSession=Session::get('miId');

			var_dump($pruebaSession);

			echo '<br><br>Modificamos el value de la Key que creamos justo en el paso anterior:<br>';

			//Modificamos la Key miId con el nuevo value
			Session::set('miId','ZZZZZZZZZZZZZZZZZZZZZZZ');

			$pruebaSession=Session::get('miId');

			var_dump($pruebaSession);


			

		}
	}
