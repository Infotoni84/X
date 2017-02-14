<?php
	namespace X\Sys;
	/**
	*
	*	Request: Transelate URL,
	*	to contrller action and parameters
	*
	*	@package: sys
	*	@author Toni <infotoni84@gmail.com>
	*
	**/

	class Request{

		static private $query=array();

		static function exploding(){
			$array_query=explode('/',$_SERVER['REQUEST_URI']); //dividimos un string a trozos por la "/" y lo gurdamos como una array;, $_SERVER['REQUEST_URI'] es una variable del servidor
			
			array_shift($array_query); //borramos primer campo de la array
			if(end($array_query)==""){ //si el ultimo campo de la array esya "" vacio
				array_pop($array_query); //borramos el ultimo campo de la array
			}

			if(dirname($_SERVER['PHP_SELF'])=="/".$array_query[0]){ //quitamos el directorio principal del nuestra web si coincide con nuestro directorio actual
				array_shift($array_query);// quitamos promer campo del array
			}

			//var_dump($array_query);

			self::$query=$array_query;			

		}

		static function getVariable(){
			return array_shift(self::$query);
		}

		static function getParams(){
			if(count(self::$query)>0){
				if(count(self::$query)%2==0){
					for($i=0;$i<count(self::$query);$i++){
						if(($i%2)==0){
							$key[]=self::$query[$i]; //el array [] hace un push, se añade a la ultima
						}else {
							$value[]=self::$query[$i];
						}
					}

					$result=array_combine($key,$value);
					return $result;

				}
			}
		}

	}
