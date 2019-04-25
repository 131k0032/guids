<?php
require_once "model/Conexion.php";

class SigninModel{

	//Obtanis email and password from $table
	public function signinUserModel($dataModel, $table){
		$statement = Conexion::conectar()->prepare("SELECT email, password FROM $table WHERE email=:email && is_admin=:is_admin");		
		$statement->bindParam(":email",$dataModel["email"],PDO::PARAM_STR);		
		$statement->bindParam(":is_admin",$dataModel["is_admin"],PDO::PARAM_INT);
		$statement->execute();
		return $statement->fetch();
		// cierra las consultas
		$statement->close();
	}

}