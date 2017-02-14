<?php
	namespace X\App\Models;

	use \X\Sys\Model;

	class mHome extends Model{

		public function __construct(){
			parent::__construct();
			//aqui con el $this->query() o db o stmt, que tiene el padre, (Model), iremos recogiendo y utilizando sus metodos

		}

		public function getRoles(){
		   
		   $sql="SELECT * FROM alumnes";
		   
		   $this->query($sql);
		   
		   $stmt=$this->execute();
		   
		   if($stmt){

		     	$result=$this->resultSet();

		    } else {

		    	$result=null;
		    }

		   	return $result;
  		}
	}