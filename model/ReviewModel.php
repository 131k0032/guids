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

    // Counting Ratings with 5 stars, for guide info   
     public function getCountRatingFive($table, $id){
      $stmt = Conexion::conectar()->prepare("SELECT
        review.id as review_id,
        count(review.rating) as review_rating_five,

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
        where tour.id=$id && review.rating=5");
      $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
     }


     // Counting Ratings with 4 stars, for guide info   
     public function getCountRatingFour($table, $id){
      $stmt = Conexion::conectar()->prepare("SELECT
        review.id as review_id,
        count(review.rating) as review_rating_four,

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
        where tour.id=$id && review.rating=4");
      $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
     }


     // Counting Ratings with 3 stars, for guide info   
     public function getCountRatingThree($table, $id){
      $stmt = Conexion::conectar()->prepare("SELECT
        review.id as review_id,
        count(review.rating) as review_rating_three,

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
        where tour.id=$id && review.rating=3");
      $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
     }


     // Counting Ratings with 2 stars, for guide info   
     public function getCountRatingTwo($table, $id){
      $stmt = Conexion::conectar()->prepare("SELECT
        review.id as review_id,
        count(review.rating) as review_rating_two,

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
        where tour.id=$id && review.rating=2");
      $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
     }


     // Counting Ratings with 1 stars, for guide info   
     public function getCountRatingOne($table, $id){
      $stmt = Conexion::conectar()->prepare("SELECT
        review.id as review_id,
        count(review.rating) as review_rating_one,

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
        where tour.id=$id && review.rating=1");
      $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
     }



  }

