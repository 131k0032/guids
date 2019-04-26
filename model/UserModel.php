<?php 

class UserModel{


	# =====================================
	# =           UPDATING USER           =
	# =====================================
	
	 
	# -----------  LAST ID INSERTED  -----------
	
	public function lastIdUser($id, $table){
	    $stmt = Conexion::conectar()->prepare("SELECT MAX($id) AS users_id FROM $table");
		    if ($stmt->execute()) {
		      $result = $stmt->fetch();
		      return $result[0];
		    }
	    $stmt -> close();
	}

	# -----------  VERFIFY EMAILS EXISTS  -----------

	public function emailExists($email, $table){
		$statement = Conexion::conectar()->prepare("SELECT  email FROM $table WHERE email=:email");
		$statement->bindParam(":email",$email["email"],PDO::PARAM_STR);
		$statement->execute();
		return $statement->fetch();
		// cierra las consultas
		$statement->close();
	}

	# -----------  GET ID BY EMAIL  -----------
	
	public function getIdByEmailUser($email, $table){
		$statement = Conexion::conectar()->prepare("SELECT id, code, name, email FROM $table WHERE email=:email");
		$statement->bindParam(":email",$email["email"],PDO::PARAM_STR);
		$statement->execute();	
		return $statement->fetch();		
		$statement->close();
	}

	# -----------  GETTING USER BY ID  -----------
	public function getByCode($code, $tabla){
		$statement = Conexion::conectar()->prepare("SELECT id, code, name, email, lastname, phone, password, age,grade,personality,ability, src, picture FROM $tabla where code=:code");
		$statement->bindParam(":code",$code,PDO::PARAM_INT);
		$statement->execute();
		return $statement->fetch();		
		// cierra las consultas
			$statement->close();

		}

	# -----------  UPDATING BY ID  -----------
	public function updatePicure($userDataModel, $table){
			$statement = Conexion::conectar()->prepare("UPDATE $table SET src=:src, picture=:picture WHERE code=:code");							
			$statement->bindParam(":src",$userDataModel["src"],PDO::PARAM_STR);				
			$statement->bindParam(":picture",$userDataModel["picture"],PDO::PARAM_STR);				
			$statement->bindParam(":code",$userDataModel["code"],PDO::PARAM_INT);
			$statement->execute();
			
			if($statement->execute()){
				return "success";
			}else{
				return "error";
		}
 	}	
	
	# -----------  UPDATING BY ID  -----------
	public function updatePersonalData($userDataModel, $table){
			$statement = Conexion::conectar()->prepare("UPDATE $table SET name=:name, lastname=:lastname, phone=:phone, personality=:personality, ability=:ability WHERE code=:code");				

			$statement->bindParam(":name",$userDataModel["name"],PDO::PARAM_STR);
			$statement->bindParam(":lastname",$userDataModel["lastname"],PDO::PARAM_STR);							
			$statement->bindParam(":phone",$userDataModel["phone"],PDO::PARAM_INT);				
			$statement->bindParam(":personality",$userDataModel["personality"],PDO::PARAM_STR);				
			$statement->bindParam(":ability",$userDataModel["ability"],PDO::PARAM_STR);						
			$statement->bindParam(":code",$userDataModel["code"],PDO::PARAM_INT);
			$statement->execute();
			
			if($statement->execute()){
				return "success";
			}else{
				return "error";
		}
 	}

	# ======  End of UPDATING USER  =======
	




}
	



