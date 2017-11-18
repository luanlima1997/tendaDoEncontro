<?php

class Conexao {

public static $EMP_instance;


 public static function EMP_getInstance() {
	try{
 	    //$user = "root";
		$user = "u276131258_tenda";

        //$pass = ""; 
		$pass = "tenda";

        //$host = "localhost";
		$host = "localhost";

        //$base = "tendadoencontro";
		$base = "u276131258_tenda";

  	 if (!isset(self::$EMP_instance)) {

  		//Definimos a conexão com o banco no padrão URF-8
  	    $parametros = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"); 

        $file = "mysql:host=" . $host . ";dbname=" . $base;

     self::$EMP_instance = new PDO($file, $user, $pass, $parametros);
     self::$EMP_instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     self::$EMP_instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
  	 }
     	return self::$EMP_instance; 
     	
	}catch(PDOException $ex){

		echo "ERRO" . $ex->getMessage();

		}
 } 

}

?>
