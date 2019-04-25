<?php  

require_once "model/Conexion.php";


  //CRUDVistaCasetasModel permite ver todas las casetas registradas (Configuracion de datos de Sian Kaan)
  // public function CRUDVistaCasetasModel($tabla){
  //   $stmt = Conexion::conectar()->prepare("SELECT `idcasetas`, `estacion`, `nombre` FROM $tabla ORDER BY $tabla.`estacion` ASC");
  //   $stmt -> execute();
  //   return $stmt->fetchAll();
  //   $stmt -> close();
  // }

  Class LanguageModel{
  		//Get All languages
  		public function getAllLanguageModel($table){
  			$stmt = Conexion::conectar()->prepare("SELECT id, name FROM $table");
    		$stmt -> execute();
    		return $stmt->fetchAll();
    		$stmt -> close();			
  		}

      public function addUserLanguage($table, $user_id, $language_id){
            $stmt = Conexion::conectar()->prepare("INSERT INTO $table (`user_id`, `language_id`) VALUES (:user_id,:language_id)");
            $stmt->bindParam(":user_id", $user_id, PDO::PARAM_STR);
            $stmt->bindParam(":language_id", $language_id ,PDO::PARAM_STR);                      
            if($stmt->execute()){
              return "success";
            }else{
              return "error";
            }

            $stmt->close();
      }



  }


