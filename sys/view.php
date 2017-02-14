<?php
	namespace X\Sys;

	/**
	*
	*	aqui lo que hacemos es recoger un array asociativo para poder usar sus valores
	*
	**/

	class View extends \ArrayObject{ //para usar las librerias de PHP hay que poner la contrabarra si estamos trabajando con namespaces

		protected $output;
		protected $dataTable;

		public function __construct($dataView, $dataTable=null){ // $data=null
			parent::__construct($dataView,\ArrayObject::ARRAY_AS_PROPS); 

			if($dataTable!=null){
				$this->dataTable = $dataTable;
			}

			// array()
			/*if($data!=null){	
				foreach ($data as $key => $value) {
					$this->$key=$value;
				}
			}*/
		}

		//aqui cogemos del directorio templates, para poder renderizarlos, por eso lo  de 'tp' que es nuestro directorio de los templates
		//el return hace un echo de lo que hay dentro del ob_start(), que dentro tendremos el include con la ruta y con el ob_get_clean() mostramos el include
		public function render($template){
			ob_start();
			include APP.'tpl'.DS.$template;
			return ob_get_clean();
		}

		//Genero una funcion que usare por ahora para la parte de mis pruebas de mi framework por partes, es un intento que no me a dado tiempo a acabar porque se me esta complicando lo que tengo pensado hacer y no queria estropear por ahora lo que ya funciona


		//es un render para que coja el mismo head y footer para todo y solo cambie el contenido central de la web
		public function miRender($miTemplate){
			ob_start();
			include APP.'tpl'.DS.'tgeneralhead.php';
			include APP.'tpl'.DS.$miTemplate;
			include APP.'tpl'.DS.'tgeneralfooter.php';
			return ob_get_clean();
		}

		function show(){
			echo $this->output;
		}
	}