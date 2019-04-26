<?php  
error_reporting(0);
 session_start();
    if(!$_SESSION['validar']){      
      print "<script>window.location='index';</script>";      
      exit();      
    }
    
# ===========================================
# =           Language validation           =
# ===========================================

   //Watching changes on post variable
if(isset($_POST["lang"])){
  $lang = $_POST["lang"];
  if(!empty($lang)){
    $_SESSION["lang"] = $lang;
  }
}
// If is created
if(isset($_SESSION['lang'])){  
  $lang = $_SESSION["lang"];
  include "view/languages/".$lang.".php";
// Else take spanish default
}else{
  include "view/languages/es.php";
}


# ======  End of Language validation  =======
?>

<!DOCTYPE html>
<html lang="en">
    <!--=================================
  =            Head common            =
  ==================================-->
  <title>Settings </title>
  <?php include 'view/links/head_common.php'; ?>
  
  <!--====  End of Head common  ====-->
  
  <body>
  

  <!--============================
  =            HEADER            =
  =============================-->
  <?php include 'view/modules/header/header.php'; ?>     
  <!--====  End of HEADER  ====-->
 
<!--==========================
=            SETTINGS FORM            =
===========================-->

  <div class="site-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary">Configuración de información de perfil</h2>
            <p class="color-black-opacity-5"><?php echo $_SESSION['email']; ?></p>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-md-8">
              

                                
              <?php 
                 $getById=UserModel::getByCode($url[2],"user");                 
               ?>
              <p>Puedes modificar tu información de perfil siempre que así lo desasdees</p>                            
              <?php 
            
            // $contra = "";
            // $cadena = "abcdefghijklmnopqrstuvwxyz";

            // $long_cad = strlen($cadena);

            // $long_contra = 6;

            // for($i = 0; $i < $long_contra; $i++){
            //     $num = rand(0,$long_cad-1);
            //     $letra = substr($cadena, $num, 1);
            //     $contra = $contra.$letra;
            // }
            // //$contra_cifrada = md5($contra);
            // $contra_cifrada= sha1(md5($contra));
            // echo $contra;
            // echo $contra_cifrada;

               ?>
              <div class="custom-control custom-checkbox form-check">
                  <input type="checkbox" class="custom-control-input spanish" id="profilesetting" name="profilesetting">
                  <label class="custom-control-label" for="profilesetting">Cambiar imagen de perfil</label>
              </div>
              <hr>
              <form method="post" enctype="multipart/form-data">
                <input type="hidden" value="<?php echo $url[2]; ?>" name="code">                 
               <div class="">
                    <center>
                      <a>                      
                           <?php if(is_null($getById["src"]) || is_null($getById["picture"])){?>
                              <img src="http://localhost/guids/view/images/profile/default.jpg" name="aboutme" width="200" height="200px" class="rounded-circle">
                            <?php } else{ ?>                              
                              <img src="http://localhost/guids/<?php echo $getById["src"]. $getById["picture"];?>" name="aboutme" width="200" height="200" class="rounded-circle">
                            <?php } ?>
                      </a>
                      <br>
                      <br>
                      <p class="color-black-opacity-5"><?php echo $getById["email"]; ?></p>                                
                      <div class="form-group">
                        <input type="file" class="form-control" id="src" name="src" accept="image/*" disabled="disabled">
                      </div>
                  </center>
                  </div>
                    <?php 
                      $updatePicure= new UserController();
                      $updatePicure->updatePicure();
                    ?>                     
                  <div class="row form-group">
                  <div class="col-md-12">
                      <input type="submit" value="Cambiar" id="btnupdatepicture" class="btn btn-primary py-2 px-4 text-white" disabled="disabled" >
                    </div>
                  </div>  
                 
              </form>          

               
                
            <br>
            <form method="post">      
              <!-- id value from the get url -->              
              <input type="hidden" value="<?php echo $url[2]; ?>" name="code"> 
              <input type="hidden" value="<?php echo $_SESSION["email"]; ?>" name="sessionemail"> 
                <div class="custom-control custom-checkbox form-check">
                  <input type="checkbox" class="custom-control-input spanish" id="personalsetting" name="personalsetting">
                  <label class="custom-control-label" for="personalsetting">Modificar información personal</label>
                </div>                
                <hr>
                <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">                  
                  <p class="mb-2 font-weight-bold">Nombre</p>
                  <input type="text" id="name" name="name" class="form-control" disabled="disabled" value="<?php echo $getById["name"]?>">
                </div>
                <div class="col-md-6">
                  <p class="mb-2 font-weight-bold">Apellidos</p>
                  <input type="text" id="lastname" name="lastname" class="form-control" disabled="disabled" value="<?php echo $getById["lastname"] ?>">
                </div>
              </div>

              <div class="row form-group">                
                <div class="col-md-12">
                  <p class="mb-2 font-weight-bold">Teléfono</p>
                  <input type="text" id="phone" name="phone" class="form-control" disabled="disabled" value="<?php echo $getById["phone"] ?>">
                </div>
              </div> 

             <p class="mb-2 font-weight-bold">Describe tu personalidad</p>
              <div class="form-group">
                 <textarea class="form-control" disabled="disabled"  rows="3" id="personality" name="personality" required><?php echo $getById["personality"]; ?></textarea>
              </div>

            <p class="mb-2 font-weight-bold">Habilidades</p>
              <div class="form-group">
                 <textarea class="form-control" disabled="disabled"  rows="3" id="ability" name="ability" required><?php echo $getById["ability"]; ?></textarea>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Actualizar" id="btnupdate" class="btn btn-primary py-2 px-4 text-white" disabled="disabled" >
                </div>
              </div>
                
                <?php 
                  $updateUser= new UserController();
                  $updateUser->updatePersonalData();
                 ?>
         

            </form>
          </div>
          
        </div>
        
      </div>
    </div>

<!--====  End of SETTINGS FORM  ====-->


<!--==========================
=            FAQS            =
===========================-->
<?php include 'view/links/faqs.php'; ?>

<!--====  End of FAQS  ====-->


<!--============================
=            FOOTER            =
=============================-->
<?php include "view/modules/footer/footer.php" ?>
<!--====  End of FOOTER  ====-->



<!--=============================
=            SCRIPTS            =
==============================-->
<?php include 'view/links/footer_common.php'; ?>
<script src="http://localhost/guids/view/assets/js/jquery-3.3.1.min.js"></script>
<!--====  End of SCRIPTS  ====-->
      
  
  <!--=======================================================
  =            ENABLE OR DISABLE SETTING OPTIONS            =
  ========================================================-->
  
    <script>
    // profile Settings
  $(function(){
          $('#profilesetting').change(function(){
              if($(this).prop('checked')){
                $('#src').prop("disabled", false);
                $('#btnupdatepicture').prop("disabled", false);
              }else{
                $('#src').prop("disabled", true);                
                $('#btnupdatepicture').prop("disabled", true);  
              }          
        })
    })

    //Dat settings
    $(function(){
          $('#personalsetting').change(function(){
              if($(this).prop('checked')){                
                $('#name').prop("disabled", false);
                $('#lastname').prop("disabled", false);
                $('#phone').prop("disabled", false);
                $('#email').prop("disabled", false);                
                $('#state').prop("disabled", false);
                $('#town').prop("disabled", false);
                $('#age').prop("disabled", false);
                $('#grade').prop("disabled", false);
                $('#spanish').prop("disabled", false);
                $('#mayan').prop("disabled", false);
                $('#english').prop("disabled", false);
                $('#otherlanguage').prop("disabled", false);
                $('#personality').prop("disabled", false);
                $('#ability').prop("disabled", false);
                $('#picture').prop("disabled", false);
                $('#password').prop("disabled", false);
                $('#confirmpassword').prop("disabled", false);
                $('#btnupdate').prop("disabled", false);
              }else{                
                $('#name').prop("disabled", true);
                $('#lastname').prop("disabled", true);
                $('#phone').prop("disabled", true);
                $('#email').prop("disabled", true);                
                $('#state').prop("disabled", true);
                $('#town').prop("disabled", true);
                $('#age').prop("disabled", true);
                $('#grade').prop("disabled", true);
                $('#spanish').prop("disabled", true);
                $('#mayan').prop("disabled", true);
                $('#english').prop("disabled", true);
                $('#otherlanguage').prop("disabled", true);
                $('#personality').prop("disabled", true);
                $('#ability').prop("disabled", true);
                $('#picture').prop("disabled", true); 
                $('#password').prop("disabled", true);
                $('#confirmpassword').prop("disabled", true);               
                $('#btnupdate').prop("disabled", true);  
              }          
        })



    })

  </script>
  
  <!--====  End of ENABLE OR DISABLE SETTING OPTIONS  ====-->
  



<!--====  End of SCRIPTS  ====-->
      

  </body>
</html>