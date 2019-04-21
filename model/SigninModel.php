<?php
require_once "model/Conexion.php";

class SigninModel{

	//Obtanis email and password from $table
	public function signinUserModel($dataModel, $table){
		$statement = Conexion::conectar()->prepare("SELECT email, password FROM $table WHERE email=:email");		
		$statement->bindParam(":email",$dataModel["email"],PDO::PARAM_STR);		
		$statement->execute();
		return $statement->fetch();
		// cierra las consultas
		$statement->close();
	}

}