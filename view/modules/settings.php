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

$lang = new LanguageController();
require_once "view/languages/".$lang->validate().".php";//include lang


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
            <h2 class="font-weight-light text-primary"><?php echo $lang["Configuración de información de perfil"]; ?></h2>
            <p class="color-black-opacity-5"><?php echo $_SESSION['email']; ?></p>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-md-8">
              

                                
              <?php 
                 $getById=UserModel::getByCode($url[2],"user");                 
               ?>
              <p><?php echo $lang["Puedes modificar tu información de perfil siempre que así lo desees"]; ?></p>                            
              <?php 
            

               ?>
              <div class="custom-control custom-checkbox form-check">
                  <input type="checkbox" class="custom-control-input spanish" id="profilesetting" name="profilesetting">
                  <label class="custom-control-label" for="profilesetting"><?php echo $lang["Cambiar imagen de perfil"]; ?></label>
              </div>
              <hr>
              <form method="post" enctype="multipart/form-data" id="picture">
                  <style>
                    form label.error {
                      float: right;
                      color: #f23a2e;
                      font-weight:bold;
                      font-size: 12px 
                      /*vertical-align: top;*/
                    }
                  </style>
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
                        <input type="file" class="form-control" id="src" name="src" accept="image/*" disabled="disabled" required>
                      </div>
                  </center>
                  </div>
                    <?php 
                      $updatePicure= new UserController();
                      $updatePicure->updatePicure();
                    ?>                     
                  <div class="row form-group">
                  <div class="col-md-12">
                      <input type="submit" value="<?php echo $lang["Cambiar"] ?>" id="btnupdatepicture" class="btn btn-primary py-2 px-4 text-white" disabled="disabled" >
                    </div>
                  </div>  
                 
              </form>          

               
                
            <br>
            <form method="post" id="profile">      
              <!-- id value from the get url -->              
              <input type="hidden" value="<?php echo $url[2]; ?>" name="code"> 
              <input type="hidden" value="<?php echo $_SESSION["email"]; ?>" name="sessionemail"> 
                <div class="custom-control custom-checkbox form-check">
                  <input type="checkbox" class="custom-control-input spanish" id="personalsetting" name="personalsetting">
                  <label class="custom-control-label" for="personalsetting"><?php echo $lang["Modificar información personal"]; ?></label>
                </div>                
                <hr>
                <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">                  
                  <p class="mb-2 font-weight-bold"><?php echo $lang["Nombre"]; ?></p>
                  <input type="text" id="name" name="name" class="form-control" disabled="disabled" value="<?php echo $getById["name"]?>" required>
                </div>
                <div class="col-md-6">
                  <p class="mb-2 font-weight-bold"><?php echo $lang["Apellidos"]; ?></p>
                  <input type="text" id="lastname" name="lastname" class="form-control" disabled="disabled" value="<?php echo $getById["lastname"] ?>">
                </div>
              </div>

              <div class="row form-group">                
                <div class="col-md-12">
                  <p class="mb-2 font-weight-bold"><?php echo $lang["Teléfono"]; ?></p>
                  <input type="text" id="phone" name="phone" class="form-control" disabled="disabled" value="<?php echo $getById["phone"] ?>" maxlength="10" number="true" pattern="[0-9]" required>
                </div>
              </div> 

             <p class="mb-2 font-weight-bold"><?php echo $lang["Personalidad"]; ?></p>
              <div class="form-group">
                 <textarea required class="form-control" disabled="disabled"  rows="3" id="personality" name="personality" required><?php echo $getById["personality"]; ?></textarea>
              </div>

            <p class="mb-2 font-weight-bold"><?php echo $lang["Habilidades"]; ?></p>
              <div class="form-group">
                 <textarea required class="form-control" disabled="disabled"  rows="3" id="ability" name="ability" required><?php echo $getById["ability"]; ?></textarea>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="<?php echo $lang["Actualizar"] ?>" id="btnupdate" class="btn btn-primary py-2 px-4 text-white" disabled="disabled" >
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
  

  <!-- validation -->
<script>
  $().ready(function() {
  $("#picture").validate({
  rules: {
    src: { 
      required:true,         
    },
    
  },
  messages: {    
    src: "<?php echo $lang["Imagen es requerida."] ?>",    
  }
  });
  });
</script>

<script>
  $().ready(function() {
  $("#profile").validate({
  rules: {
    name: { 
      required:true,         
    },    
    lastname: { 
        required:true, 
      },
    phone: { 
        required:true, 
        minlength: 10, 
        maxlength:10,
        digits: true,   

      },
    personality: { 
        required:true, 
      },
    ability: { 
        required:true, 
      },
  },
  messages: {    
    name: "<?php echo $lang["Nombre es requerido."] ?>",
    lastname: "<?php echo $lang["Apellidos son requeridos."] ?>",
    phone : "<?php echo $lang["El teléfono es requerido y solo números son aceptados."]; ?>",
    personality : "<?php echo $lang["Personalidad es requerida."]; ?>",
    ability : "<?php echo $lang["Habilidad es requerida."]; ?>",
  }
  });
  });
</script>
<!-- end validation -->


  <!--====  End of ENABLE OR DISABLE SETTING OPTIONS  ====-->
  



<!--====  End of SCRIPTS  ====-->
      

  </body>
</html>