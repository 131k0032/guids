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
    $id=$getIdByEmail["id"];    
    $date=date("Y-m-d");

    if(isset($_POST["name"])){

      $tourDataController=array(
        "name"=>$_POST["name"],
        "description"=>$_POST["description"],
        "find_guide"=>$_POST["find_guide"],
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
    $getAll= TourController::getAll("tour");
    return $getAll;
}

// For guideinfo template
    public function getUserTourById(){
    $getUserTourById=TourModel::getUserTourById("tour", $id);
}

    public function getTourById(){
    $getByTourId = TourModel::getAllById("tour", $id);
    return $getByTourId;
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


# -----------  CHANGING STATUS TOUR FOR SET VISIBLE ON THE SITE -----------
// For new newtours template
  public function confirm(){      
      if(isset($_POST["id_confirm"])){
        $tourDataController=array(        
          "id"=>$_POST["id_confirm"],
          "is_active"=>1
          );
        $confirmTour=TourModel::confirm($tourDataController,"tour");
        var_dump($confirmTour);
          if($confirmTour=="success"){
            // print "<script>alert(\"Tour confirmado.\");window.location='http://localhost/guids/access-admin/newtours';</script>";
            print "<script>alert(\"Tour confirmado, se ha enviado un Email al usuario\");window.location='https://guids.mx/access-admin/newtours';</script>";                                          
          }else{
            // print "<script>alert(\"Error en la confirmación de datos.\");window.location='http://localhost/guids/access-admin/newtours';</script>";
            print "<script>alert(\"Error al enviar Email de confirmación\");window.location='https://guids.mx/access-admin/newtours';</script>";
    }
  } 
}

# -----------  SENDIG MAIL AFTER CONFIRMATING SETTIGN A VISIBLE TOUR  -----------
// For new newtours template
 public function sendConfirmMessage(){
        if(isset($_POST["id_confirm"])){
        $id_confirm=$_POST["id_confirm"];
        $name_confirm=$_POST["name_confirm"];
        $lastname_confirm=$_POST["lastname_confirm"];
        $email_confirm=$_POST["email_confirm"]; 

          $mail = new PHPMailer();

          $mail->From     = "ceo@guids.mx";    // Correo Electronico para SMTP
          $mail->FromName = "CEO Guids.mx"; 
          $mail->AddAddress($email_confirm); // DirecciÃ³n a la que llegaran los mensajes.

          // AquÃ­ van los datos que apareceran en el correo que reciba

          $mail->WordWrap = 50; 
          $mail->CharSet = 'UTF-8';
          $mail->IsHTML(true);     
          $mail->Subject  = "Tour verificado";
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
                      <td align="center" bgcolor="#70bbd9" style="padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
                        <img src="https://guids.mx/access-admin/view/assets/images/email/h1.gif" alt="Creating Email Magic" width="300" height="230" style="display: block;" />
                      </td>
                    </tr>
                    <tr>
                      <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                          <tr>
                            <td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;">
                              <b>Hola '.$name_confirm.' '.$lastname_confirm.'</b>
                            </td>
                          </tr>
                          <tr>
                            <td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                              Nos hemos dado la tarea de verificar la información del tour que nos has proporcionado en Guids.mx, te agradecemos mucho el haberte tomado tu tiempo de llenar la información de este tour. El equipo de Guids.mx ha determinado que el tour, sin duda se trata de uno completamente real, asombroso y sobre todo muy interesante, por lo tanto a partir de ahora se encontrará visible para todo el mundo. En Guids.mx nos preocupamos mucho de que nuestros usuarios les sea de mucha utilidad el sitio, pero, sobre todo que les sea simple y sencillo el uso del mismo. Ahora a continuación se enlista algunas normas para mantener un tour activo:
                              <ol>
                                <li>A partir de ahora puedes recibir solicitudes (reservaciones para este tour) </li>
                                <li>Mientas más tours realices, mayores beneficios obtendrás</li>                                
                                <li>Cuando los turistas/viajeros te soliciten una reserva a cualquiera de los tours que tengas activos, se te enviará información de mucha relevancia que tendrás que seguir minuciosamente, de lo contrario, el equipo de Guids.mx deshabilitará los tours que hayas publicado</li>
                                <li>Si tienes alguna duda, puedes responder este correo con toda confianza escribiéndonos cualquier inquietud que tengas</li>
                              </ol>
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
                            <td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" width="75%">
                              &reg; El equipo de Guids.mx<br/>
                              <a href="#" style="color: #ffffff;"><font color="#ffffff">Unsubscribe</font></a> to this newsletter instantly
                            </td>
                            <td align="right" width="25%">
                              <table border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
                                    <a href="http://www.twitter.com/" style="color: #ffffff;">
                                      <img src="https://guids.mx/access-admin/view/assets/images/email/tw.gif" alt="Twitter" width="38" height="38" style="display: block;" border="0" />
                                    </a>
                                  </td>
                                  <td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
                                  <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
                                    <a href="http://www.twitter.com/" style="color: #ffffff;">
                                      <img src="https://guids.mx/access-admin/view/assets/images/email/fb.gif" alt="Facebook" width="38" height="38" style="display: block;" border="0" />
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
          $mail->Username = "ceo@guids.mx";  // Correo ElectrÃ³nico para SMTP
          $mail->Password = "Yazzirguids#2019"; // ContraseÃ±a para SMTP

          if ($mail->Send()){       
            print "<script>alert(\"Tour confirmado, se ha enviado un Email al usuario\");window.location='https://guids.mx/access-admin/newtours';</script>";  
            // print "<script>alert(\"Mensaje enviado al usuario.\");window.location='http://localhost/guids/access-admin/newusers';</script>";
            echo "success: " . $mail->ErrorInfo;
          }             
          else{
            print "<script>alert(\"Error al enviar Email de confirmación\");window.location='https://guids.mx/access-admin/newtours';</script>";  
            // print "<script>alert(\"Error al enviar correo.\");window.location='http://localhost/guids/access-admin/newusers';</script>";
            echo "Error: " . $mail->ErrorInfo;
      } 
    }
}


# -----------  CHANGING STATUS TOUR FOR BE INACTIVE TO SITE -----------
// For new confirmatedtours template
    public function disable(){      
      if(isset($_POST["id_disable"])){
        $tourDataController=array(        
          "id"=>$_POST["id_disable"],
          "is_active"=>0
          );
        $disableTour=TourModel::confirm($tourDataController,"tour");
        var_dump($disableTour);
          if($disableTour=="success"){
            // print "<script>alert(\"Tour inhabilitado.\");window.location='http://localhost/guids/access-admin/confirmatedtours';</script>";
            print "<script>alert(\"Tour inhabilitado, se ha enviado un Email al usuario\");window.location='https://guids.mx/access-admin/confirmatedtours';</script>"; 
            }else{
            // print "<script>alert(\"Error al deshabilitar tour.\");window.location='http://localhost/guids/access-admin/confirmatedtours';</script>";
            print "<script>alert(\"Error al deshabilitar tour.\");window.location='https://guids.mx/access-admin/confirmatedtours';</script>"; 
    }
  } 
}

# -----------  SENDIG MAIL AFTER DISABLING TOUR  -----------
public function sendDisableMessage(){
          if(isset($_POST["id_disable"])){
          $id_disable=$_POST["id_disable"];
          $name_disable=$_POST["name_disable"];
          $lastname_disable=$_POST["lastname_disable"];
          $email_disable=$_POST["email_disable"]; 

          $mail = new PHPMailer();

          $mail->From     = "ceo@guids.mx";    // Correo Electronico para SMTP
          $mail->FromName = "CEO Guids.mx"; 
          $mail->AddAddress($email_disable); // DirecciÃ³n a la que llegaran los mensajes.

          // AquÃ­ van los datos que apareceran en el correo que reciba

          $mail->WordWrap = 50; 
          $mail->CharSet = 'UTF-8';
          $mail->IsHTML(true);     
          $mail->Subject  = "Tour inhabilitado";
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
                      <td align="center" bgcolor="#70bbd9" style="padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
                        <img src="https://guids.mx/access-admin/view/assets/images/email/h1.gif" alt="Creating Email Magic" width="300" height="230" style="display: block;" />
                      </td>
                    </tr>
                    <tr>
                      <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                          <tr>
                            <td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;">
                              <b>Hola '.$name_disable.' '.$lastname_disable.'</b>
                            </td>
                          </tr>
                          <tr>
                            <td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                Es un gusto como siempre que hayas creado tours maravillosos en Guids.mx, sin embargo en Guids.mx nos tomamos muy en serio las normativas de uso del sitio y condiciones del mismo. Hemos detectado ciertas anomalías e irregularidades que este tour no ha cumplido como normalmente se espera, o bien tu cuenta de usuario ha sido deshabilitado anteriormente por incumplimiento de normas de nuestra comunidad, por tal motivo nos vemos en la desafortunada necesidad de inhabilitar este tour por un lapso de tiempo indeterminado. Si tienes alguna duda de porque ha ocurrido esto puedes responder a este mensaje y nuestro equipo de Guids.mx te guiará en el proceso.
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
                            <td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" width="75%">
                              &reg; El equipo de Guids.mx<br/>
                              <a href="#" style="color: #ffffff;"><font color="#ffffff">Unsubscribe</font></a> to this newsletter instantly
                            </td>
                            <td align="right" width="25%">
                              <table border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
                                    <a href="http://www.twitter.com/" style="color: #ffffff;">
                                      <img src="https://guids.mx/access-admin/view/assets/images/email/tw.gif" alt="Twitter" width="38" height="38" style="display: block;" border="0" />
                                    </a>
                                  </td>
                                  <td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
                                  <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
                                    <a href="http://www.twitter.com/" style="color: #ffffff;">
                                      <img src="https://guids.mx/access-admin/view/assets/images/email/fb.gif" alt="Facebook" width="38" height="38" style="display: block;" border="0" />
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
          $mail->Username = "ceo@guids.mx";  // Correo ElectrÃ³nico para SMTP
          $mail->Password = "Yazzirguids#2019"; // ContraseÃ±a para SMTP

          if ($mail->Send()){       
            print "<script>alert(\"Tour inhabilitado, se ha enviado un Email al usuario\");window.location='https://guids.mx/access-admin/confirmatedtours';</script>"; 
            // print "<script>alert(\"Mensaje enviado al usuario.\");window.location='http://localhost/guids/access-admin/confirmatedusers';</script>";
            echo "success: " . $mail->ErrorInfo;
          }             
          else{
            print "<script>alert(\"Error al deshabilitar tour.\");window.location='https://guids.mx/access-admin/confirmatedtours';</script>"; 
            // print "<script>alert(\"Error al enviar correo.\");window.location='http://localhost/guids/access-admin/confirmatedusers';</script>";
            echo "Error: " . $mail->ErrorInfo;
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