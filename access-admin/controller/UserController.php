<?php  


  Class UserController{



# =====================================
 # =           UPDATING USER           =
 # =====================================
  # -----------  GET LAST ID USER  -----------
	
	public function lastIdUser(){		
		$lastIdUser=UserModel::lastIdUser("id","user");		
		return $lastIdUser;
		// var_dump($respuesta);
		// var_dump($respuesta[2][3]);		
		}	


 # -----------  EMAIL EXISTENT ON THE TABLE   -----------
		public function emailExists(){
		// clase del crud Datos y su parámetro tabla usuario
		$emailExists=UserModel::emailExists("email","user");		
		return $emailExists;
		// var_dump($respuesta);
		// var_dump($respuesta[2][3]);		
		}	


 # -----------  OBTAINS ID BY EMAIL WHIT THE LOG EMAIL  -----------
		public function getIdByEmailUser(){
			if(isset($_SESSION["email"])){

				$email=$_SESSION["email"];
				$emailById=array("email"=>$_SESSION["email"]);				
				$getIdByEmail = UserModel::getIdByEmailUser($emailById,"user");
				// var_dump($getIdByEmail["id"]);
				// var_dump($emailById["email"]);																				
				// var_dump($getIdByEmail);
				return $getByIdEmail;
				
			}
			
		}


# -----------  UPDATING BY EMAIL  -----------
		public function update(){
			
			if(isset($_POST["name"])){

				$userDataController=array(				
					"id"=>$_POST["id"],
					"name"=>$_POST["name"],
					"lastname"=>$_POST["lastname"],																			
					"phone"=>$_POST["phone"],												
					"personality"=>$_POST["personality"],
					"ability"=>$_POST["ability"]
					);

				$updateById=UserModel::updateById($userDataController,"user");
				var_dump($updateById);

					if($updateById=="success"){
						print "<script>alert(\"Información actualizada.\");window.location='http://localhost/guids/index';</script>";
						// echo $_POST["phone"];
				
					}else{
						print "<script>alert(\"Datos no ctualizados.\");window.location='http://localhost/guids/index';</script>";

				}

			}	
		}

# -----------  CHANGING STATUS USER FOR ACCES TO SITE -----------
// For new users template
 	public function confirm(){			
			if(isset($_POST["id"])){
				$userDataController=array(				
					"id"=>$_POST["id"],
					"is_active"=>1
					);
				$confirmUser=UserModel::confirm($userDataController,"user");
				var_dump($confirmUser);
					if($confirmUser=="success"){
						print "<script>alert(\"Usuario confirmado.\");window.location='http://localhost/guids/access-admin/confirmatedusers';</script>";										
					}else{
						print "<script>alert(\"Error en la confirmación de datos.\");window.location='http://localhost/guids/access-admin/newusers';</script>";

				}

			}	
		}

// For confirmatedusers template
  	public function disable(){			
			if(isset($_POST["id"])){
				$userDataController=array(				
					"id"=>$_POST["id"],
					"is_active"=>0
					);
				$disableUser=UserModel::confirm($userDataController,"user");
				var_dump($disableUser);
					if($disableUser=="success"){
						print "<script>alert(\"Usuario inhabilitado.\");window.location='http://localhost/guids/access-admin/confirmatedusers';</script>";										
					}else{
						print "<script>alert(\"Error al deshabilitar usuario.\");window.location='http://localhost/guids/access-admin/confirmatedusers';</script>";

				}

			}	
		}
 # ======  End of UPDATING USER  =======
  



}