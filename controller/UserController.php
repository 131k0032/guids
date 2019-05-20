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
				// print "<script>alert(\"Nuevo password enviado al correo proporcionado.\");window.location='http://localhost/guids/index';</script>";	

				// SEND MAIL TO USER EMAIL HERE!!				
						//Data to send email
				 		$email_reset_pass=$_POST["email_reset_pass"];
				 					 
					    $mail = new PHPMailer();

					    $mail->From     = "ceo@guids.mx";    // Correo Electronico para SMTP
					    $mail->FromName = "CEO Guids.mx"; 
					    $mail->AddAddress($email_reset_pass); // DirecciÃ³n a la que llegaran los mensajes.

					// AquÃ­ van los datos que apareceran en el correo que reciba

					    $mail->WordWrap = 50; 
					    $mail->CharSet = 'UTF-8';
					    $mail->IsHTML(true);     
					    $mail->Subject  =  "Nueva contraseña";
					    $mail->addReplyTo('ceo@guids.mx', 'CEO Guids.mx');
					    $mail->Body    = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
							<html xmlns="http://www.w3.org/1999/xhtml">
							<head>
							<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
							<title>Demystifying Email Design</title>
							<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
							</head>
							<body style="margin: 0; padding: 0;">
								<table border="0" cellpadding="0" cellspacing="0" width="100%">	
									<tr>
										<td style="padding: 10px 0 30px 0;">
											<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
												<tr>
													<td align="center" bgcolor="#ee4c50" style="padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
			                                          <img src="https://guids.mx/view/assets/images/email/header.png" alt="Creating Email Magic" width="300" height="230" style="display: block;" />
			                                        </td>
												</tr>
												<tr>
													<td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
														<table border="0" cellpadding="0" cellspacing="0" width="100%">
															<tr>
																<td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;">
																	<b>Hola estimado usuario guía</b>
																</td>
															</tr>
															<tr>
																<td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
																	Tu nueva contraseña para acceder a Guids.mx es: <b> '.$contra.' </b>, el equipo de Guids.mx te da las gracias por acceder de nuevo al sitio y formar parte de nuestros mejores Guías.																		
																		<br>
																		<strong>Saludos cordiales</strong>
																		<br>
																		<em>Lic. Yazzir Adan Vazquez Sarabia - CEO de Guids.mx</em>
																		<br>																			
																		<em>CEO de Guids.mx</em>
																</td>
															</tr>
								
														</table>
													</td>
												</tr>
												<tr>
													<td bgcolor="#ee4c50" style="padding: 30px 30px 30px 30px;">
														<table border="0" cellpadding="0" cellspacing="0" width="100%">
															<tr>
																<td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" width="60%">
					                                                El equipo de Guids.mx<br/>                                                
					                                            </td>
																<td align="right" width="40%">
																	<table border="0" cellpadding="0" cellspacing="0">
					                                                  <tr>
					                                                      <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
					                                                        <a href="http://www.twitter.com/" style="color: #ffffff;">
					                                                          <img src="https://guids.mx/view/assets/images/email/facebook.png" alt="Twitter" width="38" height="38" style="display: block;" border="0" />
					                                                        </a>
					                                                      </td>

					                                                      <td style="font-size: 0; line-height: 0;" width="10">&nbsp;</td>
					                                                      <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
					                                                        <a href="http://www.twitter.com/" style="color: #ffffff;">
					                                                          <img src="https://guids.mx/view/assets/images/email/twitter.png" alt="Facebook" width="38" height="38" style="display: block;" border="0" />
					                                                        </a>
					                                                      </td>

					                                                      <td style="font-size: 0; line-height: 0;" width="10">&nbsp;</td>
					                                                      <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
					                                                        <a href="http://www.instagram.com/" style="color: #ffffff;">
					                                                          <img src="https://guids.mx/view/assets/images/email/instagram.png" alt="Instagram" width="38" height="38" style="display: block;" border="0" />
					                                                        </a>
					                                                      </td>

					                                                       <td style="font-size: 0; line-height: 0;" width="10">&nbsp;</td>
										                                      <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
									                                        <a href="http://www.blogger.com/" style="color: #ffffff;">
									                                          <img src="https://guids.mx/view/assets/images/email/blogger.png" alt="Blogger" width="38" height="38" style="display: block;" border="0" />
									                                        </a>
									                                      </td>

					                                                      <td style="font-size: 0; line-height: 0;" width="10">&nbsp;</td>
					                                                      <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
					                                                        <a href="http://www.youtube.com/" style="color: #ffffff;">
					                                                          <img src="https://guids.mx/view/assets/images/email/youtube.png" alt="Youtube" width="38" height="38" style="display: block;" border="0" />
					                                                        </a>
					                                                      </td>

					                                                  	</tr>
					                                                </table>
																</td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</body>
							</html>';
                         $mail->AltBody = 'Este es el mansaje en texto plano para clientes que no admitan HTML';

					   // Datos del servidor SMTPs

					    $mail->IsSMTP(); 
					    $mail->Host = "mail.guids.mx";  // mail. o solo dominio - Servidor de Salida.
					    $mail->SMTPAuth = true; 
					    $mail->Username = "ceo@guids.mx";  // Correo ElectrÃ³nico para SMTP
					    $mail->Password = "Yazzirguids#2019"; // ContraseÃ±a para SMTP

					    if ($mail->Send()){
					    	print "<script>alert(\"Se ha enviado una Contraseña en tu correo para poder acceder Guids.mx\");window.location='signin';</script>";
					    }					    
					    else{
					    	print "<script>alert(\"Password generado, mail no enviado\");window.location='signin';</script>";
					  }
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