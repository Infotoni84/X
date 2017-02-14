<?php

	/**
	*	Aqui definimos por ejemplo variables que las haremos globales para nuestro framework
	*
	*
	**/
	namespace X;

	require_once __DIR__.'/sys/autoload.php';

		
	define('DS', DIRECTORY_SEPARATOR);
	define('ROOT', realpath(__DIR__).DS);
		//para acceder al sistema de ficheros
	define('APP', ROOT.'app'.DS);
	define('APP_W',dirname($_SERVER['PHP_SELF']).DS); //directorio raiz
