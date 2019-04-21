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

				$userDataController=array(
				// "dbfields"=>$_POST["variables"]
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
					"is_admin"=>0
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
					// $mail = new PHPMailer();

     //                /** Configurar SMTP **/
     //                $mail->isSMTP();                                      // Indicamos que use SMTP
     //                $mail->Host = 'smtp.gmail.com';  // Indicamos los servidores SMTP
     //                $mail->SMTPAuth = true;                               // Habilitamos la autenticación SMTP
     //                $mail->Username = 'mitnick117@gmail.com';                 // SMTP username
     //                $mail->Password = 'citukcaamal';                           // SMTP password
     //                $mail->SMTPSecure = 'tls';                            // Habilitar encriptación TLS o SSL
     //                $mail->Port = 587;                                    // TCP port

     //                /** Configurar cabeceras del mensaje **/
     //                // $mail->From = 'Guids.mx';                       // Correo del remitente
     //                $mail->FromName = 'Guids';           // Nombre del remitente
     //                $mail->Subject = 'Bienvenido a Guids.mx';                // Asunto

     //                /** Incluir destinatarios. El nombre es opcional **/
     //                $mail->addAddress($email);

     //                /** Con RE, CC, BCC **/
     //                // $mail->addReplyTo('do-notreply@guids.mx', 'Guids');
     //                // $mail->addCC('masterchief22010@hotmail.com');
     //                // $mail->addBCC('masterchief22010@hotmail.com');


     //                * Enviarlo en formato HTML *
     //                $mail->isHTML(true);          
                   

     //                /** Configurar cuerpo del mensaje **/
     //                $mail->Body    = '<h2>Hola '.$name.' '.$lastname.' el equipo de Guids.mx te agradece haberte registrado en el sitio y te da la Bienvenida al sitio, por favor prueba <a href="https://guids.mx/signin" target=blank>Iniciar sesión</a>   <br></h2>                                                        
     //                        <br>                                    
     //                            <hr>
     //                            <p><b>El equipo de Guids<b><br>                                                                                      
     //                            </p>';
     //                $mail->AltBody = 'Este es el mansaje en texto plano para clientes que no admitan HTML';

     //                /** Para que use el lenguaje español **/
     //                $mail->setLanguage('es');

     //                /** Enviar mensaje... **/
     //                if(!$mail->send()) {                                                
     //                    print "<script>alert(\"Error email\");window.location='index';</script>";
     //                    echo 'Mailer Error: ' . $mail->ErrorInfo;
     //                	} else {                        
     //                     print "<script>alert(\"Registro exitoso, se le enviará información por los administradores del sitio\");window.location='index';</script>";
     //                 }					
          			 
				 }	

					 print "<script>alert(\"Registro exitoso, se le enviará información por los administradores del sitio\");window.location='index';</script>";

			  }

			  print "<script>alert(\"Este correo ha sido registrado anteriormente\");window.location='signup';</script>";

			
		}

	}


# ======  End of ADDING A NEW USER  =======
	
}

