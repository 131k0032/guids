<?php  

require_once "model/Conexion.php";


  Class ReviewModel{


    // Inserting review infor
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

    // Getting all reviews data
      public function getAllComment($table,$id){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $table where tour_id=$id && rating!=0 order by id desc;
        ");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
    }

    // Getting all count commets
      public function getCountComment($table, $id){
        $stmt = Conexion::conectar()->prepare("SELECT
          review.id as review_id,
          count(review.comment) as review_comment,

          tour.id as tour_id,
          tour.name as tour_name,

          user.id as user_id,
          user.name as user_name

          FROM
          $table

          inner join tour
          on review.tour_id=tour.id
          inner join user
          on review.user_id=user.id
          where tour.id=$id && review.rating!=0");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();

      }




  }

