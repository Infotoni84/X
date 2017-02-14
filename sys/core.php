<?php
	namespace X\Sys;

	//Es importante hacer docblock al principio de cada clase, explicandola
	/**
	*	Core: Front controller
	*
	*	@author: toni
	*	@package: sys
	*
	*
	**/

	use X\Sys\Request;
	use X\Sys\Session;

	class Core{
		//un request siempre necesita 3 parametros
		static private $controller;
		static private $action;
		static private $params;

		public static function init(){

			//Iniciamos la session
			Session::init();

			Request::exploding();//llamamos la funcion exploding, de la clase Request
			//$arrayquery, preparado para extraer el controlador y el action

			self::$controller=Request::getVariable(); //extraemos primera variable
			//echo self::$controller.'<br>';
			self::$action=Request::getVariable(); //extraemos segunda variable
			//echo self::$action.'<br>';
			self::$params=Request::getParams(); //recogemos los paramatreos en pares de clave = valor
			//var_dump(self::$params);

			self::router();
		}

		static function router(){
				//si no hay controlador, buscamos el 'home' y si no hay action lo mismo
			self::$controller=(self::$controller!="")?self::$controller:'home';
			self::$action=(self::$action!="")?self::$action:'home';
				//Buscar controladores si los hay
			$filename=strtolower(self::$controller).'.php';
			$fileroute = APP.'controllers'.DS.$filename;
			if(is_readable($fileroute)){
				//llamamos a la instancia, osea la parte uno (controlador)
				$contr_class='\X\App\Controllers\\'.ucfirst(self::$controller);
				self::$controller=new $contr_class(self::$params);
				//Ahora la accion, comprobamos primero si existe el controlador, y luego la accion
				//los echo mas adelante los substituiremos por lo que queramos que hagan
				if(is_callable(array(self::$controller,self::$action))){
					call_user_func(array(self::$controller,self::$action));
				} else {
					echo self::$action.' :Esta accion no exite';
				}
			} else {
				echo self::$controller.' :Este controlador no existe';
			}
		}
	}