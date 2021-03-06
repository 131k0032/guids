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
              

            <form method="post" class="p-5 bg-white">      
              <!-- id value from the get url -->              
              <input type="hidden" value="<?php echo $url[2]; ?>" name="id">                     
              <?php 
                 $getById=UserModel::getById($url[2],"user");                 
               ?>
              <p>Puedes modificar tu información de perfil siempre que así lo desasdees</p>                            
              
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

       <!--        <div class="row form-group">                
                <div class="col-md-12">
                  <p class="mb-2 font-weight-bold">Email</p>
                  <input type="email" id="email" name="emial" class="form-control" disabled="disabled">
                </div>
              </div> -->

<!--               <p class="mb-2 font-weight-bold">Estado</p>
                <div class="form-group">
                  <div class="select-wrap">
                      <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                      <select class="form-control" name="state" id="state" disabled="disabled">                        
                        <option value="Quintanaroo">Quintana Roo</option> -->                                        
                        <!-- <option value="yucatan">Yucatan</option> -->  
           <!--            </select>
                    </div>
                </div> -->

             <!--    <p class="mb-2 font-weight-bold">Municipio</p>
                <div class="form-group">
                  <div class="select-wrap">
                      <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                      <select class="form-control" name="town" id="town" disabled="disabled"> -->
                        <!-- <option value="">Elija municipio</option>
                        <option value="fcp">Felipe Carrillo Puerto</option> -->
                 <!--      </select>
                    </div>
                </div> -->

<!--               <p class="mb-2 font-weight-bold">Edad</p>
                <div class="form-group">
                  <div class="select-wrap">
                      <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                      <select class="form-control" name="age" id="age" disabled="disabled">
                        <option value="">Elija edad</option>
                                                  
                           <?php
                              //$edad=45; 
                              //for($i=18; $i<=$edad; $i++): 
                                //echo '<option value="'.$i.'">'.$i.'</option>';
                            ?> 
                                
                          <?php //endfor; ?>
                      </select>
                    </div>
                </div> -->

        <!--       <p class="mb-2 font-weight-bold">Nivel de estudios</p>
                <div class="form-group">
                  <div class="select-wrap">
                      <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                      <select class="form-control" name="grade" id="grade" disabled="disabled">                        
                        <option value="">Elija uno</option>                                        
                        <option value="">Básico</option>  
                        <option value="">Medio superior</option>  
                        <option value="">Superior</option>  
                        <option value="">Diplomados y cursos</option>                          
                      </select>
                    </div>
                </div> -->


             <!--  <p class="mb-2 font-weight-bold">Idioma(s) que más dominas</p>              
              <div class="row form-group">
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-3">
                       <div class="custom-control custom-checkbox form-check">
                          <input type="checkbox" class="custom-control-input spanish" id="spanish" name="spanish" disabled="disabled">
                            <label class="custom-control-label" for="spanish">Español</label>
                          </div>
                    </div>
                    <div class="col-md-3">
                       <div class="custom-control custom-checkbox form-check">
                          <input type="checkbox" class="custom-control-input mayan" id="mayan" disabled="disabled">
                            <label class="custom-control-label" for="mayan">Maya</label>
                          </div>
                    </div>
                    <div class="col-md-3">
                       <div class="custom-control custom-checkbox form-check">
                          <input type="checkbox" class="custom-control-input english" id="english" disabled="disabled">
                            <label class="custom-control-label" for="english">Inglés</label>
                          </div>
                    </div>
                    <div class="col-md-3">
                       <input type="text" id="otherlanguage" name="otherlanguage" class="form-control" placeholder="Otro idioma..." disabled="disabled">
                    </div>
                  </div>                                    
                </div>
              </div>    -->     


             <p class="mb-2 font-weight-bold">Describe tu personalidad</p>
              <div class="form-group">
                 <textarea class="form-control" disabled="disabled"  rows="3" id="personality" name="personality" required><?php echo $getById["personality"]; ?></textarea>
              </div>

            <p class="mb-2 font-weight-bold">Habilidades</p>
              <div class="form-group">
                 <textarea class="form-control" disabled="disabled"  rows="3" id="ability" name="ability" required><?php echo $getById["ability"]; ?></textarea>
              </div>

        <!--      <p class="mb-2 font-weight-bold">Agrega una foto de perfil</p>
              <div class="form-group">
                 <input type="file" class="form-control" id="picture" id="picture" name="picture" disabled="disabled">
              </div>
              <br> -->

        <!--       <div class="row form-group">                
                <div class="col-md-12">
                  <p class="mb-2 font-weight-bold">Nuevo password</p>
                  <input type="password" id="password" name="password" class="form-control" disabled="disabled">
                </div>
              </div> -->

              <!--  <div class="row form-group">                
                <div class="col-md-12">
                  <p class="mb-2 font-weight-bold">Confirmarasdsad password</p>
                  <input type="password" id="confirmpassword" name="confirmpassword" class="form-control" disabled="disabled">
                </div>
              </div> -->




              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Actualizar" id="btnupdate" class="btn btn-primary py-2 px-4 text-white" disabled="disabled" >
                </div>
              </div>
                
                <?php 
                  $updateUser= new UserController();
                  $updateUser->update();
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