<?php 

class UserModel{
# ==============================================
# =           GETTING ALL DATA USERS           =
# ==============================================

# -----------  GETING ALL INACTIVE   -----------      	
public function getAllInactive($table){
		$stmt = Conexion::conectar()->prepare("
			SELECT * from user where is_active=0
			");
		$stmt->execute();				
		return $stmt->fetchAll();						
		$stmt->close();

}


# -----------  GETING ALL ACTIVE   -----------      	
public function getAllActive($table){
		$stmt = Conexion::conectar()->prepare("
			SELECT * from user where is_active=1 && is_admin=0
			");
		$stmt->execute();				
		return $stmt->fetchAll();						
		$stmt->close();

}

	

# ======  End of GETTING ALL DATA USERS  =======



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
		$statement = Conexion::conectar()->prepare("SELECT id, name, email FROM $table WHERE email=:email");
		$statement->bindParam(":email",$email["email"],PDO::PARAM_STR);
		$statement->execute();	
		return $statement->fetch();		
		$statement->close();
	}

	# -----------  GETTING USER BY ID  -----------
	public function getById($id, $tabla){
		$statement = Conexion::conectar()->prepare("SELECT id, name, lastname, phone, password, age,grade,personality,ability, picture FROM $tabla where id=:id");
		$statement->bindParam(":id",$id,PDO::PARAM_INT);
		$statement->execute();
		return $statement->fetch();		
		// cierra las consultas
			$statement->close();

		}

	# -----------  UPDATING BY ID  -----------
	public function updateById($userDataModel, $table){
			$statement = Conexion::conectar()->prepare("UPDATE $table SET name=:name, lastname=:lastname, phone=:phone, personality=:personality, ability=:ability WHERE id=:id");				

			$statement->bindParam(":name",$userDataModel["name"],PDO::PARAM_STR);
			$statement->bindParam(":lastname",$userDataModel["lastname"],PDO::PARAM_STR);							
			$statement->bindParam(":phone",$userDataModel["phone"],PDO::PARAM_INT);				
			$statement->bindParam(":personality",$userDataModel["personality"],PDO::PARAM_STR);				
			$statement->bindParam(":ability",$userDataModel["ability"],PDO::PARAM_STR);				
			$statement->bindParam(":id",$userDataModel["id"],PDO::PARAM_INT);
			$statement->execute();
			
			if($statement->execute()){
				return "success";
			}else{
				return "error";
		}
 	}	

# -----------  CHANGING STATUS USER FOR ACCES TO SITE -----------
// For new users template
	public function confirm($userDataModel, $table){
			$statement = Conexion::conectar()->prepare("UPDATE $table SET is_active=:is_active WHERE id=:id");										
			$statement->bindParam(":is_active",$userDataModel["is_active"],PDO::PARAM_INT);										
			$statement->bindParam(":id",$userDataModel["id"],PDO::PARAM_INT);
			$statement->execute();
			
			if($statement->execute()){
				return "success";
			}else{
				return "error";
		}
 	}	

// For confirmatedusers template
	public function disable($userDataModel, $table){
			$statement = Conexion::conectar()->prepare("UPDATE $table SET is_active=:is_active WHERE id=:id");										
			$statement->bindParam(":is_active",$userDataModel["is_active"],PDO::PARAM_INT);										
			$statement->bindParam(":id",$userDataModel["id"],PDO::PARAM_INT);
			$statement->execute();
			
			if($statement->execute()){
				return "success";
			}else{
				return "error";
		} 	
	}	
	# ======  End of UPDATING USER  =======
	




}
	



