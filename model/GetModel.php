<?php
// ***********************************************************************
// FUNCION PARA PROCESAR LOS LINKS O ENLACES CON LOS CUALES EL USUARIO NAVEGA DENTRO DEL SISTEMA
// ***********************************************************************
class GetModel{

	public function Get($url){
		// SI en la url hay estos valores
		if( 
			//Si en hrefs o url se encuentra el signup 
			$url[0]=="signup"||	
			$url[0]=="signin" ||
			$url[0]=="profile" ||
			$url[0]=="mytours" ||
			$url[0]=="mytours-setting" ||
			$url[0]=="mytours-delete" ||
			$url[0]=="bookings" ||
			$url[0]=="addtour" ||
			$url[0]=="generateinsurance" ||
			$url[0]=="settings" ||			
			$url[0]=="guideinfo" ||			
			$url[0]=="test" ||								
			$url[0]=="aboutus" ||		
			$url[0]=="terms-and-conditions" ||
			$url[0]=="privacy-policy" ||
			//Logout
			$url[0]=="logout"

			)
		{
		// entonces mandalo al que esté solicitando con la posición [0] como primer nivel de url
			$module="view/modules/".$url[0].".php";

		// pero si es igual al index o bien un url vacío mandalo a index
		}else if($url[0]=="index"){
			// ingresar
			$module="view/modules/home.php";

		}elseif($url[0]=="access-admin"){
			// Solo para usuarios admin
			$module="access-admin/index.php";

		}else{
			// si ninguna de las opciones o pone otra cosa, mandalo a 404error
			$module="view/modules/404notfound/404notfound.php";
		}

		// devuelveme la variable y envialo al controlador
		return $module;
	}
}
