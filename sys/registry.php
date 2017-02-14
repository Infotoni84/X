<?php
	namespace X\Sys;

	/**
	*
	esta clase la usamos para registar, con el getInstance comprobamos si esta o no esta ya lainstancia para no crear nuevas, el __set() es un petodo magico, el cual lo usamos como array asociativo, clave valor.
	Con __get($key), cogemos el valor de la $key
	con la __unset le podemos pasar un valor para borrar ese kay/valor si no lodejamos en blanco borra la array
	*
	**/

	 class Registry{

	 	private $data=array();
	 	static $instance;

	 	function __construct(){
	 		$this->data=array();
	 		$this->loadConf();
	 	}

	 	static function getInstance(){
	 		if(!(self::$instance instanceof self)){
	 			self::$instance=new self(); //aqui indica que es el constructor de si mismo, usando el self() como metodo
	 			return self::$instance;
	 		} else {
	 			return self::$instance;
	 		}
	 	}

	 	function __set($key,$value){
	 		if(!array_key_exists($key, $this->data)){ //con array_key_exists, se mira su existe esa $key
	 			$this->data[$key]=$value; //si no hay esa key, la añadimos con su corespondiente valor
	 		}
	 	}

	 	function __get($key){
	 		if(array_key_exists($key, $this->data)){
	 			return $this->data[$key];
	 		} else {
	 			return null;
	 		}
	 	}

	 	function __unset($key=null){ //con este =null se peuden pasar valores vacios
	 		if($key!=null){
	 			if(array_key_exists($key, $this->data)){
	 			unset($this->data[$key]);
	 			}
	 		} else {
	 			unset($this->data);
	 		}
	 	}

	 	/**
		*	Con este metodo, cargaremos el archivo json con los datos de configuracion y se lo pasaremos a nuestra array data, el file_get_contents($archivoJason) lo pasa a string y el json_decode($strJson), convierte el string en array asociativa
	 	**/
	 	function loadConf(){
	 		$file=APP.'config.json';
	 		//extrae el contenido del fichero y lo guardamos un un string
	 		$jsonStr=file_get_contents($file);
	 		//decodificamos el array
	 		$arrayJson=json_decode($jsonStr);
	 		foreach ($arrayJson as $key => $value) {
	 			$this->data[$key]=$value;
	 		}
	 	}

	 }
