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

# -----------  CHANGING STATUS USER FOR ACCESS TO SITE -----------
// For new users template
 	public function confirm(){			
			if(isset($_POST["id_confirm"])){
				$userDataController=array(				
					"id"=>$_POST["id_confirm"],
					"is_active"=>1
					);
				    $confirmUser=UserModel::confirm($userDataController,"user");
				
					if($confirmUser=="success"){
						print "<script>alert(\"Usuario confirmado, se ha enviado un Email al usuario\");window.location='https://guids.mx/access-admin/newusers';</script>";						
					}else{
						print "<script>alert(\"Error en la confirmación de datos.\");window.location='http://localhost/guids/access-admin/newusers';</script>";
		}
	}	
}

# -----------  SENDIG MAIL AFTER CONFIRMATING USER  -----------
// For new users template
    public function sendConfirmMessage(){
	        if(isset($_POST["id_confirm"])){
				$id_confirm=$_POST["id_confirm"];
				$name_confirm=$_POST["name_confirm"];
				$lastname_confirm=$_POST["lastname_confirm"];
				$email_confirm=$_POST["email_confirm"];	

			    $mail = new PHPMailer();

			    $mail->From     = "ceo@guids.mx";    // Correo Electronico para SMTP
			    $mail->FromName = "CEO Guids.mx"; 
			    $mail->AddAddress($email_confirm); // DirecciÃ³n a la que llegaran los mensajes.

		     	// AquÃ­ van los datos que apareceran en el correo que reciba

			    $mail->WordWrap = 50; 
			    $mail->CharSet = 'UTF-8';
			    $mail->IsHTML(true);     
			    $mail->Subject  = "Usuario verificado";
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
											<td align="center" bgcolor="#70bbd9" style="padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
												<img src="https://guids.mx/access-admin/view/assets/images/email/h1.gif" alt="Creating Email Magic" width="300" height="230" style="display: block;" />
											</td>
										</tr>
										<tr>
											<td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
												<table border="0" cellpadding="0" cellspacing="0" width="100%">
													<tr>
														<td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;">
															<b>Hola '.$name_confirm.' '.$lastname_confirm.'</b>
														</td>
													</tr>
													<tr>
														<td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
															Nos hemos dado la tarea de verificar la información de perfil que nos has proporcionado en Guids.mx, te agradecemos mucho el haberte tomado tu tiempo de registrarte y sobre todo de esperar la verificación de tu cuenta. El equipo de Guids.mx ha determinado tu cuenta, sin duda se trata de información completamente real. En Guids.mx nos preocupamos mucho de que nuestros usuarios les sea de mucha utilidad el sitio, pero, sobre todo que les sea simple y sencillo el uso del mismo. Ahora a continuación se enlista las acciones que quedan pendientes a realizar:
															<ol>
																<li>Ir a <a href="https://guids.mx/signin">Iniciar sesión</a></li>
																<li>Inicia sesión con tu correo y contraseña que proporcionaste al crear tu cuenta</li>
																<li>En la sección <i>Agregar tour</i> podrás llenar todos los campos de formulario para crear un tour</li>
																<li>Por último da clic en <i>Crear tour</i></li>
																<li>De nuevo, nuestro equipo se tomará la información del tour que registres</li>
																<li>Si tienes alguna duda, puedes responder este correo con toda confianza escribiéndonos cualquier inquietud que tengas</li>
															</ol>
															<br>
															<strong>Saludos cordiales</strong>
															<br>
															<em>Lic. Yazzir Adan Vazquez Sarabia</em>
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
														<td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" width="75%">
															&reg; El equipo de Guids.mx<br/>
															<a href="#" style="color: #ffffff;"><font color="#ffffff">Unsubscribe</font></a> to this newsletter instantly
														</td>
														<td align="right" width="25%">
															<table border="0" cellpadding="0" cellspacing="0">
																<tr>
																	<td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
																		<a href="http://www.twitter.com/" style="color: #ffffff;">
																			<img src="https://guids.mx/access-admin/view/assets/images/email/tw.gif" alt="Twitter" width="38" height="38" style="display: block;" border="0" />
																		</a>
																	</td>
																	<td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
																	<td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
																		<a href="http://www.twitter.com/" style="color: #ffffff;">
																			<img src="https://guids.mx/access-admin/view/assets/images/email/fb.gif" alt="Facebook" width="38" height="38" style="display: block;" border="0" />
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
			    	print "<script>alert(\"Usuario confirmado, se ha enviado un Email al usuario\");window.location='https://guids.mx/access-admin/newusers';</script>";	
			    	// print "<script>alert(\"Mensaje enviado al usuario.\");window.location='http://localhost/guids/access-admin/newusers';</script>";
			    	echo "success: " . $mail->ErrorInfo;
			    }					    
			    else{
			    	print "<script>alert(\"Error al enviar Email de confirmación\");window.location='https://guids.mx/access-admin/newusers';</script>";	
			    	// print "<script>alert(\"Error al enviar correo.\");window.location='http://localhost/guids/access-admin/newusers';</script>";
			    	echo "Error: " . $mail->ErrorInfo;
	    }	
    }
}


# -----------  CHANGING STATUS USER FOR NON ACCESS TO SITE -----------
// For confirmatedusers template
  	public function disable(){			
			if(isset($_POST["id_disable"])){
				$userDataController=array(				
					"id"=>$_POST["id_disable"],
					"is_active"=>0
					);
				$disableUser=UserModel::confirm($userDataController,"user");
				// var_dump($disableUser);
					if($disableUser=="success"){
						// print "<script>alert(\"Usuario inhabilitado.\");window.location='http://localhost/guids/access-admin/confirmatedusers';</script>";
						print "<script>alert(\"Usuario inhabilitado, se ha enviado un Email al usuario\");window.location='https://guids.mx/access-admin/confirmatedusers';</script>";										
					}else{
						// print "<script>alert(\"Usuario no inhabilitado.\");window.location='http://localhost/guids/access-admin/confirmatedusers';</script>";
						print "<script>alert(\"Usuario no inhabilitado, Error al enviar Email al usuario\");window.location='https://guids.mx/access-admin/confirmatedusers';</script>";										
		}
	}	
}

# -----------  SENDIG MAIL AFTER DISABLING USER  -----------
// For confirmatedusers template
    public function sendDisableMessage(){
	        if(isset($_POST["id_disable"])){
				$id_disable=$_POST["id_disable"];
				$name_disable=$_POST["name_disable"];
				$lastname_disable=$_POST["lastname_disable"];
				$email_disable=$_POST["email_disable"];	

			    $mail = new PHPMailer();

			    $mail->From     = "ceo@guids.mx";    // Correo Electronico para SMTP
			    $mail->FromName = "CEO Guids.mx"; 
			    $mail->AddAddress($email_disable); // DirecciÃ³n a la que llegaran los mensajes.

		     	// AquÃ­ van los datos que apareceran en el correo que reciba

			    $mail->WordWrap = 50; 
			    $mail->CharSet = 'UTF-8';
			    $mail->IsHTML(true);     
			    $mail->Subject  = "Usuario inhabilitado";
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
											<td align="center" bgcolor="#70bbd9" style="padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
												<img src="https://guids.mx/access-admin/view/assets/images/email/h1.gif" alt="Creating Email Magic" width="300" height="230" style="display: block;" />
											</td>
										</tr>
										<tr>
											<td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
												<table border="0" cellpadding="0" cellspacing="0" width="100%">
													<tr>
														<td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;">
															<b>Hola '.$name_disable.' '.$lastname_disable.'</b>
														</td>
													</tr>
													<tr>
														<td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
															  Es un gusto como siempre que seas parte de Guids.mx, sin embargo en Guids.mx nos tomamos muy en serio las normativas de uso del sitio y condiciones del mismo. Hemos detectado acciones indebidas con esta cuenta de usuario, por tal motivo y desafortunadamente nos vemos en la desafortunada necesidad de inhabilitar tu cuenta por un lapso de tiempo indeterminado. Si tienes alguna duda de porque ha ocurrido esto puedes responder a este mensaje y nuestro equipo de Guids.mx te guiará en el proceso. 
															  <br>
							                                  <br>
							                                  <strong>Saludos cordiales</strong>
							                                  <br>
							                                  <em>Lic. Yazzir Adan Vazquez Sarabia</em>
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
														<td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" width="75%">
															&reg; El equipo de Guids.mx<br/>
															<a href="#" style="color: #ffffff;"><font color="#ffffff">Unsubscribe</font></a> to this newsletter instantly
														</td>
														<td align="right" width="25%">
															<table border="0" cellpadding="0" cellspacing="0">
																<tr>
																	<td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
																		<a href="http://www.twitter.com/" style="color: #ffffff;">
																			<img src="https://guids.mx/access-admin/view/assets/images/email/tw.gif" alt="Twitter" width="38" height="38" style="display: block;" border="0" />
																		</a>
																	</td>
																	<td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
																	<td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
																		<a href="http://www.twitter.com/" style="color: #ffffff;">
																			<img src="https://guids.mx/access-admin/view/assets/images/email/fb.gif" alt="Facebook" width="38" height="38" style="display: block;" border="0" />
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
			    	print "<script>alert(\"Usuario inhabilitado, se ha enviado un Email al usuario\");window.location='https://guids.mx/access-admin/confirmatedusers';</script>";											
			    	// print "<script>alert(\"Mensaje enviado al usuario.\");window.location='http://localhost/guids/access-admin/confirmatedusers';</script>";
			    	echo "success: " . $mail->ErrorInfo;
			    }					    
			    else{
			    	print "<script>alert(\"Usuario no inhabilitado, Error al enviar Email al usuario\");window.location='https://guids.mx/access-admin/confirmatedusers';</script>";	
			    	// print "<script>alert(\"Error al enviar correo.\");window.location='http://localhost/guids/access-admin/confirmatedusers';</script>";
			    	echo "Error: " . $mail->ErrorInfo;
	    }	
    }
}

 
 # ======  End of UPDATING USER  =======
  

/*===================================
=            SENDING MSJ            =
===================================*/
# -----------  Otaining a user_id -----------
	public function userId(){	
		    if (isset($_POST["user_id"])){	
	}
}

# -----------  Using the user_id for break foreach bucle on newusers  -----------
public function sendMessage(){
 	        if (isset($_POST["user_id"])) {
 		
				$name=$_POST["name"];
				$lastname=$_POST["lastname"];
				$email=$_POST["email"];
				$message=$_POST["message"];

			    $mail = new PHPMailer();

			    $mail->From     = "ceo@guids.mx";    // Correo Electronico para SMTP
			    $mail->FromName = "CEO Guids.mx"; 
			    $mail->AddAddress($email); // DirecciÃ³n a la que llegaran los mensajes.

			// AquÃ­ van los datos que apareceran en el correo que reciba

			    $mail->WordWrap = 50; 
			    $mail->CharSet = 'UTF-8';
			    $mail->IsHTML(true);     
			    $mail->Subject  = "Sugerencia a los datos de tu perfil";
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
											<td align="center" bgcolor="#70bbd9" style="padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
												<img src="https://guids.mx/access-admin/view/assets/images/email/h1.gif" alt="Creating Email Magic" width="300" height="230" style="display: block;" />
											</td>
										</tr>
										<tr>
											<td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
												<table border="0" cellpadding="0" cellspacing="0" width="100%">
													<tr>
														<td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;">
															<b>Hola '.$name.' '.$lastname.'</b>
														</td>
													</tr>
													<tr>
														<td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
															 '.$message.'.
															 <br>
							                                <br>
							                                <strong>Saludos cordiales</strong>
							                                <br>
							                                <em>Lic. Yazzir Adan Vazquez Sarabia</em>
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
														<td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" width="75%">
															&reg; El equipo de Guids.mx<br/>
															<a href="#" style="color: #ffffff;"><font color="#ffffff">Unsubscribe</font></a> to this newsletter instantly
														</td>
														<td align="right" width="25%">
															<table border="0" cellpadding="0" cellspacing="0">
																<tr>
																	<td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
																		<a href="http://www.twitter.com/" style="color: #ffffff;">
																			<img src="https://guids.mx/access-admin/view/assets/images/email/tw.gif" alt="Twitter" width="38" height="38" style="display: block;" border="0" />
																		</a>
																	</td>
																	<td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
																	<td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
																		<a href="http://www.twitter.com/" style="color: #ffffff;">
																			<img src="https://guids.mx/access-admin/view/assets/images/email/fb.gif" alt="Facebook" width="38" height="38" style="display: block;" border="0" />
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
			    	print "<script>alert(\"Email enviado al usuario\");window.location='https://guids.mx/access-admin/newusers';</script>";	
			    	// print "<script>alert(\"Mensaje enviado al usuario.\");window.location='http://localhost/guids/access-admin/newusers';</script>";
			    	echo "success: " . $mail->ErrorInfo;
			    }					    
			    else{
			    	print "<script>alert(\"Error al enviar Email\");window.location='https://guids.mx/access-admin/newusers';</script>";	
			    	// print "<script>alert(\"Error al enviar correo.\");window.location='http://localhost/guids/access-admin/newusers';</script>";
			    	echo "Error: " . $mail->ErrorInfo;
		}
	}
}

/*=====  End of SENDING MSJ  ======*/


}