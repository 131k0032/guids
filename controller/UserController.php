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


 public function resetPassword(){
 	if (isset($_POST["email_reset_pass"])){
 		$email_reset_pass=$_POST["email_reset_pass"];
 		$userEmailDataModel=array("email"=>$email_reset_pass); 		
 		$emailExists=UserModel::emailExists($userEmailDataModel,"user");
 			if($emailExists["email"]==$email_reset_pass){
 				// echo "Iguales you can change";
 				// Generating new password
 				 $contra = "";
	             $cadena = "abcdefghijklmnopqrstuvwxyz";
	             $long_cad = strlen($cadena);
	             $long_contra = 6;
	             for($i = 0; $i < $long_contra; $i++){
	                $num = rand(0,$long_cad-1);
	                $letra = substr($cadena, $num, 1);
	                $contra = $contra.$letra;
	             }	           
	            
	            $newPass = crypt($contra, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
	            //Updating pass
	            $userDataController=array(
	            	"password"=>$newPass,
			        "email"=>$_POST["email_reset_pass"]
	            );

	            $updatePass=UserModel::updatePass($userDataController,"user");
	            // echo($contra);

	            if($updatePass=="success"){
				print "<script>alert(\"Nuevo password enviado al correo proporcionado.\");window.location='http://localhost/guids/index';</script>";	

				// SEND MAIL TO USER EMAIL HERE!!				
					// CODE HERE!!
				// SEND MAIL TO USER EMAIL HERE!!
				}else{
					print "<script>alert(\"Error al cambiar password.\");window.location='http://localhost/guids/index';</script>";

				}


 			}else{
 				print "<script>alert(\"Este correo no existe en Guids.mx.\");window.location='http://localhost/guids/signin';</script>";
 		}
 		 		
 	}
 }
 # ======  End of UPDATING USER  =======
  



}