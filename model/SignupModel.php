<?php 

require_once "model/Conexion.php";


	class SignupModel {


		# ===================================
		# =           ADDING NEWUSER           =
		# ===================================
				
		// Add new User in $table
		public function newUserSignupModel($userDataModel, $table){
			$statement = Conexion::conectar()->prepare("
				INSERT INTO  
				$table (
						code,
						name, 
						lastname, 
						phone, 
						email, 
						password, 
						state, 
						town, 
						age,
						grade,						
						personality,
						ability,
						is_admin,
						is_active
						) 
				VALUES 
					   (:code, 
					   	:name, 
					    :lastname, 
					    :phone, 
					    :email, 
					    :password, 
					    :state, 
					    :town, 
					    :age,
						:grade,						
						:personality,
						:ability,
						:is_admin,
						:is_active)");
						$statement->bindParam(":code",$userDataModel["code"],PDO::PARAM_STR);
						$statement->bindParam(":name",$userDataModel["name"],PDO::PARAM_STR);
						$statement->bindParam(":lastname",$userDataModel["lastname"],PDO::PARAM_STR);			
						$statement->bindParam(":phone",$userDataModel["phone"],PDO::PARAM_STR);
						$statement->bindParam(":email",$userDataModel["email"],PDO::PARAM_STR);
						$statement->bindParam(":password",$userDataModel["password"],PDO::PARAM_STR);
						$statement->bindParam(":state",$userDataModel["state"],PDO::PARAM_STR);
						$statement->bindParam(":town",$userDataModel["town"],PDO::PARAM_STR);
						$statement->bindParam(":age",$userDataModel["age"],PDO::PARAM_STR);
						$statement->bindParam(":grade",$userDataModel["grade"],PDO::PARAM_STR);						
						$statement->bindParam(":personality",$userDataModel["personality"],PDO::PARAM_STR);
						$statement->bindParam(":ability",$userDataModel["ability"],PDO::PARAM_STR);
						// $statement->bindParam(":fotos",$userDataModel["fotos"],PDO::PARAM_STR);	
						$statement->bindParam(":is_admin",$userDataModel["is_admin"],PDO::PARAM_INT);		
						$statement->bindParam(":is_active",$userDataModel["is_active"],PDO::PARAM_INT);	

						if($statement->execute()){
							return "success";
						}else{
							return "error";
						}

			// cierra las consultas
			$statement->close();
		}
	// Add $src and picture on las user
    public function addPicture($table, $id, $src, $picture){
            $stmt = Conexion::conectar()->prepare("INSERT INTO $table (`id`, `src`,`picture`) VALUES (:id,:src,:picture)");
            $stmt->bindParam(":id", $id, PDO::PARAM_STR);
            $stmt->bindParam(":src", $src ,PDO::PARAM_STR);                      
            $stmt->bindParam(":picture", $picture ,PDO::PARAM_STR);    
            if($stmt->execute()){
              return "success";
            }else{
              return "error";
            }

            $stmt->close();
      }

		# ======  End of ADDING NEWUSER  =======
								
		

}