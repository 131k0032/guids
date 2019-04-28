<?php

require "view/classupload/class.upload.php";


 class TourController{

# ===================================
# =           Adding tour           =
# ===================================

   # -----------  GET LAST ID USER  -----------

  public function lastIdTour(){
    $lastIdTour=TourModel::lastIdTour("id","tour");
    return $lastIdTour;
    }


  # -----------  ADDING TOUR  -----------

  public function addTour(){

    $email=$_SESSION["email"];
    $emailById=array("email"=>$_SESSION["email"]);
    $getIdByEmail = UserModel::getIdByEmailUser($emailById,"user");
    $id=$getIdByEmail["id"];
    $date=date("Y-m-d");

    if(isset($_POST["name"])){

      $tourDataController=array(
        "name"=>$_POST["name"],
        "description"=>$_POST["description"],
        "find_guide"=>$_POST["find_guide"],
        "start_in"=>$_POST["start_in"],
        "location"=>$_POST["location"],
        "duration"=>$_POST["duration"],
        "capacity"=>$_POST["capacity"],
        "status"=>0,
        "created_at"=>$date,
        // "updadet_at"=>"1992-12-17",
        "user_id"=>$id


      );
      //First add on table tour
      $addTour=TourModel::addTour($tourDataController,"tour");
      var_dump($addTour);
      //If first insert was success
      if($addTour="success"){
        // Obtaing last tour id
        $lastIdTour = TourController::lastIdTour("id","tour");
          if(isset($_POST['start_at']) && isset($_POST['day']) && isset($_POST["language"])){
            $start_at=$_POST['start_at'];
            $day=$_POST['day'];
            $language=$_POST['language'];
                foreach ($day as $index => $value) {
                  //Second add on table tour_schedule
                      $tourScheduleInsert = TourModel::addTourSchedule("tour_schedule", $start_at[$index], $value, $lastIdTour, $language);
                      echo "<br>";
                      echo "start_at:" .$start_at[$index];
                      echo "<br>";
                      echo "day_id:" .$value;
                      echo "<br>";
                      echo "tour_id:".$lastIdTour;
                      echo "<br>";
                      echo "language_Id". $language;
                      echo "<br>";
                  }
                  // echo $start_at;
                    var_dump($tourScheduleInsert);
                    var_dump($lastIdTour);
              // print "<script>alert(\"Registro exitosoo\");window.location='addtour';</script>";
              // echo "Muy bien";
          //If second insert was success
              if($tourScheduleInsert=="success"){
                // Obtaing last tour id
                $lastIdTour = TourController::lastIdTour("id","tour");
                if(isset($_FILES["src"])){
                  echo "Hay imagen";
                  $handle = new Upload($_FILES['src']);

                  if($handle->uploaded){
                    // $src="view/images/tours/".$id;
                    $src="view/images/tours/";
                    $handle->Process($src);
                    if($handle->processed){
                      $file_name = $handle->file_dst_name;
                      // echo $file_name;
                      // Third insert on tour_image
                      $tourImageInsert = TourModel::addTourImage("tour_image", $src, $file_name, $lastIdTour);
                      if($tourScheduleInsert=="success"){
                        // var_dump($tourScheduleInsert);
                        print "<script>alert(\"Tour agregado\");window.location='mytours';</script>";
                      }else{
                        echo "Error al agregar datos";
                      }
                    }else{
                      echo "Error size";
                    }
                  }else{
                    echo "Cannot uplad image";
                  }
                }else{
                  echo "There is not image";
                }


            }
      }
    }
  }
 }


# ======  End of Adding tour  =======


# ===================================
# =           Getting all           =
# ===================================

  // For home template
  public function getAll(){
    $getAll = TourModel::getAll("tour");
    return $getAll;
  }


 // For search engine template
  public function getAllSearchEngine($like, $start, $end, $order){
    if (isset($like) && isset($start) && isset($end)) {//require variables
      if (isset($order)) { //Validate $order
        if ($order == "ASC" or $order == "DESC") {
          $SearchEngine = TourModel::getAllSearchEngine($like, $start, $end, $order);
        }else {
            return false;
        }
      }else {
        $order="ASC"; //set default
        $SearchEngine = TourModel::getAllSearchEngine($like, $start, $end, $order);
      }
      return $SearchEngine;
    }else {
      return null;
    }
  }


  // For guideinfo template
  public function getUserTourById(){
    $getUserTourById=TourModel::getUserTourById("tour", $id);
  }

  public function getTourById(){
    $getByTourId = TourModel::getAllById("tour", $id);
    return $getByTourId;
  }

  # Get rating by ID Tour
  // For home template
  public function getCountRatingByIdTour($id){
    $getRatingByIdTour=TourModel::getCountRatingByIdTour("review",$id);
    return $getRatingByIdTour[0];
  }

    // For home template
  public function getAvgRatingByIdTour($id){
    $getAvgRatingByIdTour=TourModel::getAvgRatingByIdTour("review",$id);
    return $getAvgRatingByIdTour[0];
  }


  // For guideinfo template
  public function getAvgRating(){
    $getAvgRating = TourModel::getAvgRating("review", $id);
    return $getAvgRating;
  }
  // For guideinfo template
   public function getCountRating(){
    $getCountRating = TourModel::getCountRating("review", $id);
    return $getCountRating;
  }

# ======  End of Getting all  =======


# =====================================
# =           Updating tour           =
# =====================================

public function getAllById($id){
    $getAllById = TourModel::getAllById("tour_schedule", $id);
    return $getAllById;
}



public function update(){

      if(isset($_POST["name"])){

        $tourDataController=array(
          "id"=>$_POST["id"],
          "name"=>$_POST["name"]
          );

        $updateById=TourModel::updateById($tourDataController,"tour");
        var_dump($updateById);

          if($updateById=="success"){
            print "<script>alert(\"Información actualizada.\");window.location='http://localhost/guids/index';</script>";
            // echo $_POST["phone"];

          }else{
            print "<script>alert(\"Datos no ctualizados.\");window.location='http://localhost/guids/index';</script>";

        }

      }
    }

# ======  End of Updating tour  =======


# ====================================
# =           Deeting tour           =
# ====================================
public function del(){
  if(isset($_POST["id"])){

        $deleteId=$_POST["id"];

        $respuesta=TourModel::del($deleteId,"tour");
        if ($respuesta=="success") {
          print "<script>alert(\"ORRADO.\");window.location='http://localhost/guids/index';</script>";

        }else{
          print "<script>alert(\"ASDASD.\");window.location='http://localhost/guids/index';</script>";
        }
      }

}


# ======  End of Deeting tour  =======




}
