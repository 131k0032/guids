<?php 
	
	class SigninController{

	public function signinUserController(){

		if(isset($_POST["email"])){
			    
      		
      		$encriptar = crypt($_POST['password'], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');      		
     
			$dataController=array(
			"email"=>$_POST["email"],
			"password"=>$encriptar
			// "is_active"=>1
			);
			$respuesta = SigninModel::signinUserModel($dataController,"user");
		 	 // var_dump($respuesta);		
			if($respuesta["email"]==$_POST["email"] && $respuesta["password"]==$encriptar && $respuesta["is_admin"]==1){
				// echo "Hola perro".$respuesta["usuario"];

					// inicia la sesion de nombre "validar" con valor verdadero
					// session_start(); Se inicia sesion en el home antes que todo html siempre al menos en php 7 en adelante
					$_SESSION["validar"]=true;							
					$_SESSION["email"] = $respuesta["email"];			
					print "<script>window.location='http://localhost/guids/access-admin/newusers';</script>";
					// print "<script>window.location='https://guids.mx/access-admin/newusers';</script>";
					// var_dump($respuesta);
				}elseif($respuesta["email"]==$_POST["email"] && $respuesta["password"]!=$encriptar){

					  print "<script>alert(\"Email o contraseña incocorrectos\");window.location='http://localhost/guids/access-admin/index';</script>";
					  // print "<script>alert(\"Email o contraseña incocorrectos\");window.location='http://guids.mx/access-admin/index';</script>";
					

				}elseif ($respuesta["email"]==$_POST["email"] && $respuesta["password"]==$encriptar && $respuesta["is_admin"]==0) {
					print "<script>alert(\"No tienes acceso a este sition\");window.location='http://localhost/guids/access-admin/index';</script>";
					// print "<script>alert(\"No tienes acceso a este sition\");window.location='http://guids.mx/access-admin/index';</script>";
				}
			}
		
		}
	
	}
