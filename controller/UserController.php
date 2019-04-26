<?php  
require_once "view/phpmailer/class.phpmailer.php";

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
	public function updatePicure(){
	 if(isset($_FILES["src"])){                  
                  $handle = new Upload($_FILES['src']);
                  if($handle->uploaded){
                    // $src="view/images/tours/".$id;
                    $src="view/images/profile/";
                    $handle->Process($src);
                    if($handle->processed){
                      $file_name = $handle->file_dst_name;
		                 $userDataController=array(				
							"code"=>$_POST["code"],
							"src"=>$src,
							"picture"=>$file_name,
							);

						$updateById=UserModel::updatePicure($userDataController,"user");
						// var_dump($updateById);

							if($updateById=="success"){
								print "<script>alert(\"Imagen de perfil actualizada.\");window.location='http://localhost/guids/index';</script>";
								// echo $_POST["phone"];
						
							}else{
								print "<script>alert(\"Imagen no actualizada.\");window.location='http://localhost/guids/index';</script>";

						}
                    }else{
                      echo "Error size";
                    }
                  }else{
                    echo "Ninguna imagen seleccionada";
                  }
                }


			

		
	  }

 
 
 public function updatePersonalData(){
	if(isset($_POST["name"]) && isset($_POST["sessionemail"])){
			$userDataController=array(				
			"code"=>$_POST["code"],
			"name"=>$_POST["name"],
			"lastname"=>$_POST["lastname"],																			
			"phone"=>$_POST["phone"],												
			"personality"=>$_POST["personality"],
			"ability"=>$_POST["ability"]
			);

		$updateById=UserModel::updatePersonalData($userDataController,"user");
		// var_dump($updateById);

			if($updateById=="success"){
				print "<script>alert(\"Información actualizada.\");window.location='http://localhost/guids/index';</script>";
				// echo $_POST["phone"];
		
			}else{
				print "<script>alert(\"Datos no ctualizados.\");window.location='http://localhost/guids/index';</script>";

			}
		
		}
 }
 # ======  End of UPDATING USER  =======
  



}