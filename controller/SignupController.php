<?php 
	// include "view/links/head_sweetalert.php";
	// include "view/links/footer_sweetalert.php";

require "view/phpmailer/class.phpmailer.php";



class SignupController{
# =========================================
# =           ADDING A NEW USER           =
# =========================================

public function newUserSignupController(){


		if(isset($_POST["name"])){

			//Verifying existing email
			$userEmailDataController=array("email"=>$_POST["email"]);
			$emailExists=UserModel::emailExists($userEmailDataController,"user");

			if($emailExists["email"]!=$_POST["email"]){
				// crypting password here
			$password = crypt($_POST['password'], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');     
				//Generating ramndom code

	            $code = "";
	            $characters = "abcdefghijklmnopqrstuvwxyz";
	            $lenght_character = strlen($characters);
	            $lenght_code = 6;
	            for($i = 0; $i < $lenght_code; $i++){
	                $num = rand(0,$lenght_character-1);
	                $letra = substr($characters, $num, 1);
	                $code = $code.$letra;
	            }
	            //
	            $hashed_code= sha1(md5($code));
	            // echo $code;
	            // echo $hashed_code;
				//Data for db
				$userDataController=array(
				// "dbfields"=>$_POST["variables"]
					"code"=>$hashed_code,
					"name"=>$_POST["name"],
					"lastname"=>$_POST["lastname"],
					"phone"=>$_POST["phone"],
					"email"=>$_POST["email"],
					"password"=>$password,
					"state"=>$_POST["state"],
					"town"=>$_POST["town"],				
					"age"=>$fecha = $_POST["year"]."-".$_POST["month"]."-".$_POST["day"],
					"grade"=>$_POST["grade"],								
					"personality"=>$_POST["personality"],
					"ability"=>$_POST["ability"],
					"is_admin"=>0,
					"is_active"=>0,
					// "picture"=>"ruta"			
				);
			
			

			// First Insert
			 $userinsert = SignupModel::newUserSignupModel($userDataController,"user");


					if($userinsert=="success"){											
						$lastIdUser = UserController::lastIdUser("id","user");
						if(isset($_POST['language'])){
							$language=$_POST['language'];
							  foreach ($language as $index => $value) {
        							$languageinsert = LanguageModel::addUserLanguage("user_language", $lastIdUser, $value);
      						}


					  }

					//Data to send email
			 		$email=$_POST["email"];
			 		$name=$_POST["name"];
			 		$lastname=$_POST["lastname"];	
					  
					    $mail = new PHPMailer();

					    $mail->From     = "ceo@guids.mx";    // Correo Electronico para SMTP
					    $mail->FromName = "CEO Guids.mx"; 
					    $mail->AddAddress($email); // DirecciÃ³n a la que llegaran los mensajes.

					// AquÃ­ van los datos que apareceran en el correo que reciba

					    $mail->WordWrap = 50; 
					    $mail->CharSet = 'UTF-8';
					    $mail->IsHTML(true);     
					    $mail->Subject  =  "Bienvenid@";
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
																	<b>Bienvenid@</b>
																</td>
															</tr>
															<tr>
																<td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
																	Hola '.$name.' '.$lastname.' , el equipo de Guids.mx te da las gracias y la bienvenida por registrarte al sitio y formar parte de nuestros mejores Guías. Como primer paso, estaremos revisando la información proporcionada, dentro de las siguientes 24 hrs, esto para que recibas consejos o sugerencias de cómo modifificar y mejorar tu información de perfil. Por el momento no podrás acceder a Guids.mx hasta que tu información sea verificada, pero no te preocupes, cuando todo esté listo, te enviaremos un email de usuario confirmado y podrás acceder a Guids.mx, crear tours y ser uno de los mejores guías.
																		
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
					    	print "<script>alert(\"Gracias por registrarte, tu cuenta será verificada para poder acceder Guids.mx\");window.location='index';</script>";
					    }					    
					    else{
					    	print "<script>alert(\"Error\");window.location='signup';</script>";
					  }					    
          			 
				 }	

					 // print "<script>alert(\"Registro exitoso, tu cuenta será verificada para acceder al sitio\");window.location='index';</script>";

			  }

			  print "<script>alert(\"Lo sientimos este correo ha sido registrado anteriormente\");window.location='signup';</script>";

			
		}

	}


# ======  End of ADDING A NEW USER  =======
	
}

