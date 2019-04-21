<?php

class GetController{
	public function Get(){

	// Variable url en foma de array
		$url =array();

	// Si recibe la palabra action en la url
		if(isset($_GET["page"])){
			// Divide el href en page/page2...
			$url= explode("/", $_GET["page"]);
			// $url=$_GET["page"];
		}
	// si no hay nada en url, mandalo que sea siempre al index
		else{
			$url[0]="index";
		}
	
	//Quiero que me ejecute la clase enlacesPaginasModel de la clase EnlacesModels con el parámetro recibido
		$respuesta=GetModel::Get($url);
		// var_dump($url);

	// Incluye la respuesta despues del retorno
		include $respuesta;


	}




}
