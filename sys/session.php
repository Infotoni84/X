<?php

	namespace X\Sys;

	/*
	*
	*	clase para el control de sesiones
	*	y conseguir que no se repitan sesiones
	*	ni se sobre escriban si ya existen
	*/

	class Session{

		static function init(){
			session_start();
			self::set('id',session_id()); //por defecto guardamos el sesion id, en una variable de sesion con nuestro metodo set()
		}

		//recogemos valores para guardar nuestra sesion
		static function set($key,$value){
			$_SESSION[$key]=$value; 
		}

		//para devolver el valor de una key si existe
		static function get($key){
			if(self::exists($key)){
				return $_SESSION[$key];
			} else {
				return null;
			}
		}

		//metodo para saber si existe una key
		static function exists($key){
			if(array_key_exists($key, $_SESSION)){
				return true;
			} else {
				return false;
			}
		}

		//borramos la key
		static function del($key){
			if(self::exists($key)){
				unset($_SESSION[$key]);
			}
		}

		//booramos toda la sesion
		static function destroy(){
			session_destroy();
		}
	}