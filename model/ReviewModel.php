<?php  

require_once "model/Conexion.php";


  Class ReviewModel{



      public function add($table, $rating, $comment, $created_at, $tour_id, $user_id){
            $stmt = Conexion::conectar()->prepare("INSERT INTO $table (`rating`,`comment`,`created_at`, `tour_id`, `user_id`) VALUES (:rating,:comment,:created_at,:tour_id,:user_id)");
            $stmt->bindParam(":rating", $rating, PDO::PARAM_STR);
            $stmt->bindParam(":comment", $comment, PDO::PARAM_STR);
            $stmt->bindParam(":created_at", $created_at, PDO::PARAM_STR);
            $stmt->bindParam(":tour_id", $tour_id, PDO::PARAM_STR);
            $stmt->bindParam(":user_id", $user_id ,PDO::PARAM_STR);                      
            if($stmt->execute()){
              return "success";
            }else{
              return "error";
            }

            $stmt->close();
      }



  }

