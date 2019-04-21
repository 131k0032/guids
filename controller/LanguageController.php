<?php 

class LanguageController{

	# -----------  GET ALL LANGUAGES  -----------
	
	public function getAllLanguageController(){
		// clase del crud Datos y su parámetro tabla usuario
		$respuesta=LanguageModel::getAllLanguageModel("language");
		//Muestrame los datos en usuarios en el archivo usuarios.php
		return $respuesta;
		// var_dump($respuesta);
		// var_dump($respuesta[2][3]);		
		}	
	}

