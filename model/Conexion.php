<?php 
 class Conexion{
 	public function conectar(){
 		$link = new PDO("mysql:host=localhost;dbname=guidsfour","root","");
 		// $link = new PDO("mysql:host=localhost;dbname=guidsfour;charset=UTF8","root","");
 		 return $link;
 		//var_dump($link);

 		 mysqli_set_charset($link, 'utf8');
 	}
 }

$a=new conexion();
$a->conectar();

// Base de datos:	guidsmx_guids
// Host:	localhost
// Nombre de usuario:	guidsmx_root
// Contraseña:	U.u|0Rxb7t
?>

