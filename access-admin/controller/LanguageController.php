<?php 

class LanguageController{


	public $langSelected = "es"; //set Default


	public function validate(){
		if (isset($_POST["lang"]) && !empty($_POST["lang"])) {
			$_SESSION["lang"] = $_POST["lang"];
		}elseif (!isset($_SESSION["lang"])) {
			$_SESSION["lang"]=$this->langSelected;
		}
		return $_SESSION["lang"];
	}

	
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

