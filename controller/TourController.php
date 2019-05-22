<?php

require "view/classupload/class.upload.php";
require_once "view/phpmailer/class.phpmailer.php";

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
    $id=$getIdByEmail["id"];//User id
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
                      // Third insert on tour_image
                      $tourImageInsert = TourModel::addTourImage("tour_image", $src, $file_name, $lastIdTour);
                      if($tourScheduleInsert=="success"){
                          // Data for insert on review
                          $rating=0;
                          $comment=NULL;
                          $created_at=$date;
                          $tour_id=$lastIdTour;
                          $user_id=$id;
                          // Fourth insert
                          $reviewInsert = ReviewModel::add("review", $rating, $comment, $created_at, $tour_id, $user_id);
                         // var_dump($tourScheduleInsert);
                         // For sendmail to user (hidden vars on addtour.php)
                          $user_name=$_POST["user_name"];
                          $user_lastname=$_POST["user_lastname"];
                          $user_email=$_POST["user_email"];

                          //Sending mail
                            $mail = new PHPMailer();
                            $mail->From     = "ceo@guids.mx";    // Correo Electronico para SMTP
                            $mail->FromName = "CEO Guids.mx";
                            $mail->AddAddress($user_email); // DirecciÃƒÂ³n a la que llegaran los mensajes.
                            // AquÃƒÂ­ van los datos que apareceran en el correo que reciba
                            $mail->WordWrap = 50;
                            $mail->CharSet = 'UTF-8';
                            $mail->IsHTML(true);
                            $mail->Subject  =  "Tour creado exitosamente";
                            $mail->addReplyTo('ceo@guids.mx', 'CEO Guids.mx');
                            $mail->Body    = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                            <html xmlns="http://www.w3.org/1999/xhtml">
                            <head>
                            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                            <title>Demystifying Email Design</title>
                            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
                            </head>
                            <body style="margin: 0; padding: 0;">
                              <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                  <td style="padding: 10px 0 30px 0;">
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
                                      <tr>
                                        <td align="center" bgcolor="#ee4c50" style="padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
                                          <img src="https://guids.mx/view/assets/images/email/header.png" alt="Creating Email Magic" width="300" height="230" style="display: block;" />
                                        </td>
                                      </tr>
                                      <tr>
                                        <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                                          <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tr>
                                              <td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;">
                                                <b>Hola '.$user_name.' '.$user_lastname.'</b>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                                 El equipo de Guids.mx te da las gracias por haber creado un tour en el sitio. De nuevo, nos
                                                 daremos la tarea de revisar detalladamente el tour que nos haz compartido en Guids.mx esto
                                                  para verificar que toda la información y sobre todo que los datos de ubicación del tour sean totalmente verídicos y que existan en la actualidad. Dentro de las próximas 24 hrs el tour no podrá ser visible en Guids.mx, pero sin embargo podrás observarlo en la sección <i>Mis tours</i> cuando inicies sesión. Te avisaremos cuando el tour haya sido verificado en su totalidad.                                                  
                                                  <br>
                                                  <br>
                                                  <strong>Saludos cordiales</strong>
                                                  <br>
                                                  <em>Lic. Yazzir Adan Vazquez Sarabia</em>
                                                  <br>                                      
                                                  <em>CEO de Guids.mx</em>
                                              </td>
                                            </tr>
                           
                                          </table>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td bgcolor="#ee4c50" style="padding: 30px 30px 30px 30px;">
                                          <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tr>
                                              <td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" width="60%">
                                                El equipo de Guids.mx<br/>                                                
                                              </td>
                                              <td align="right" width="40%">
                                                <table border="0" cellpadding="0" cellspacing="0">
                                                  <tr>
                                                      <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
                                                        <a href="http://www.twitter.com/" style="color: #ffffff;">
                                                          <img src="https://guids.mx/view/assets/images/email/facebook.png" alt="Twitter" width="38" height="38" style="display: block;" border="0" />
                                                        </a>
                                                      </td>

                                                      <td style="font-size: 0; line-height: 0;" width="10">&nbsp;</td>
                                                      <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
                                                        <a href="http://www.twitter.com/" style="color: #ffffff;">
                                                          <img src="https://guids.mx/view/assets/images/email/twitter.png" alt="Facebook" width="38" height="38" style="display: block;" border="0" />
                                                        </a>
                                                      </td>

                                                      <td style="font-size: 0; line-height: 0;" width="10">&nbsp;</td>
                                                      <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
                                                        <a href="http://www.instagram.com/" style="color: #ffffff;">
                                                          <img src="https://guids.mx/view/assets/images/email/instagram.png" alt="Instagram" width="38" height="38" style="display: block;" border="0" />
                                                        </a>
                                                      </td>
                                                      
                                                      <td style="font-size: 0; line-height: 0;" width="10">&nbsp;</td>
                                                       <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
                                                        <a href="http://www.blogger.com/" style="color: #ffffff;">
                                                          <img src="https://guids.mx/view/assets/images/email/blogger.png" alt="Blogger" width="38" height="38" style="display: block;" border="0" />
                                                        </a>
                                                      </td>

                                                      <td style="font-size: 0; line-height: 0;" width="10">&nbsp;</td>
                                                      <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
                                                        <a href="http://www.youtube.com/" style="color: #ffffff;">
                                                          <img src="https://guids.mx/view/assets/images/email/youtube.png" alt="Youtube" width="38" height="38" style="display: block;" border="0" />
                                                        </a>
                                                      </td>
                                                  </tr>
                                                </table>
                                              </td>
                                            </tr>
                                          </table>
                                        </td>
                                      </tr>
                                    </table>
                                  </td>
                                </tr>
                              </table>
                            </body>
                            </html>';
                                       $mail->AltBody = 'Este es el mansaje en texto plano para clientes que no admitan HTML';
                           
                           // Datos del servidor SMTPs
                           
                            $mail->IsSMTP();
                            $mail->Host = "mail.guids.mx";  // mail. o solo dominio - Servidor de Salida.
                            $mail->SMTPAuth = true;
                            $mail->Username = "ceo@guids.mx";  // Correo ElectrÃƒÂ³nico para SMTP
                            $mail->Password = "Yazzirguids#2019"; // ContraseÃƒÂ±a para SMTP

                            if ($mail->Send()){
                              print "<script>alert(\"Gracias por registrar el tour, este será verificado para poder aparecer Guids.mx\");window.location='mytours';</script>";
                            }
                            else{
                              print "<script>alert(\"Error, mail no enviado\");window.location='addtour';</script>";
                          }
                          //End sending mail

                          // For localhost testing
                        // print "<script>alert(\"Tour agregado, tour en revisiÃ³n para aprobaciÃ³n\");window.location='mytours';</script>";
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
    $getAll = TourModel::getAll();
    return $getAll;
  }


 // For search engine template
  public function getSearchEngine($like, $start, $rang, $order){
    if (isset($like) && isset($start) && isset($rang)) { //require variables
      if (isset($order)) { //Validate $order
        if ($order == "ASC" or $order == "DESC") {
          $SearchEngine = TourModel::getSearchEngine($like, $start, $rang, $order);
        }else {
            return "Parametro $order, no es vÃ¡lido";
        }
      }else {
        $order = "DESC"; //set default
        $SearchEngine = TourModel::getSearchEngine($like, $start, $rang, $order);
      }
      return $SearchEngine;
    }else {
      return "Requiere parametros.";
    }
  }

  public function getAllSearchEngine($start, $rang, $order){
    $getAllSearchEngine = TourModel::getAllSearchEngine($start, $rang, $order);
    return $getAllSearchEngine;
  }


  // For guideinfo template
  public function getUserTourById(){
    $getUserTourById=TourModel::getUserTourById("tour", $id);
  }

  public function getTourById(){
    $getByTourId = TourModel::getAllById("tour", $id);
    return $getByTourId;
  }

  // For MyTours template
  public function getAllToursByUser($user){
    $getAllToursByUser = TourModel::getAllToursByUser($user);
    return $getAllToursByUser;
  }

  public function getTourSchedule($idTour){
    $getTourSchedule = TourModel::getAllTourSchedule($idTour);
    return $getTourSchedule;
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

/* For mytours-settings*/
public function getById($idTour){
  if ($idTour>0) {
    $getById = TourModel::getById($idTour, "tour");
    return $getById;
  }else {
    return null;
  }
}


/* For mytours-settings*/
public function update(){
  if (isset($_POST["id"]) && isset($_POST["toursetting"]) && isset($_POST["name"]) && isset($_POST["location"]) && isset($_POST["description"])
  && isset($_POST["start_in"]) && isset($_POST["find_guide"]) && isset($_POST["duration"]) && isset($_POST["capacity"])) {
    $date = date("Y-m-d");
    $id=(INT)$_POST["id"];
    $updateData = array('name' =>  $_POST["name"],'description' =>  $_POST["description"], 'find_guide' => $_POST["find_guide"], 'start_in' =>  $_POST["start_in"], 'location' =>  $_POST["location"],
  'duration' => $_POST["duration"],'capacity' =>  $_POST["capacity"], 'updated_at' => $date);
  $update = TourModel::updateById($updateData, $id, "tour");
    if ($update) {
      // echo "<script>
      //  window.location.href='//guids.mx/mytours'
      // </script>";
      print "<script>alert(\"Tour modificado.\");window.location='http://localhost/guids/mytours';</script>";
    }else {
      // echo "<script>
      //  alert('Ups algo salio mal. Contacta con los administradores.');
      // </script>";
      print "<script>alert(\"Error al modificar tour, intente de nuevo\");window.location='http://localhost/guids/mytours';</script>";
    }
  }

}

# ======  End of Updating tour  =======


# ====================================
# =           Deeting tour           =
# ====================================
public function dropAllTour(){
  if (isset($_POST["id"])) {
    $respuesta= TourModel::dropAllTour($_POST["id"]);
    if ($respuesta==true) {
      print "<script>alert(\"Tour eliminado.\");window.location='http://localhost/guids/mytours';</script>";
    }else {
      print "<script>alert(\"Error al borrar.\");window.location='http://localhost/guids/mytours';</script>";
    }
  }
}


// public function del(){
//   if(isset($_POST["id"])){

//         $deleteId=$_POST["id"];

//         $respuesta=TourModel::del($deleteId,"tour");
//         if ($respuesta=="success") {
//           print "<script>alert(\"ORRADO.\");window.location='http://localhost/guids/index';</script>";

//         }else{
//           print "<script>alert(\"ASDASD.\");window.location='http://localhost/guids/index';</script>";
//         }
//       }

// }
# ======  End of Deeting tour  =======


}
