<?php 
error_reporting(0);
 session_start();
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
<title>Guids</title>
<?php include 'view/links/head_common.php'; ?>

<!--====  End of Head common  ====-->

<body>


<!--============================
=            HEADER            =
=============================-->
<?php include 'view/modules/header/header.php'; ?>     
<!--====  End of HEADER  ====-->



<!--===================================
=            REGISTER FORM            =
====================================-->
   <div class="site-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary">Inciar sesión</h2>
            <p class="color-black-opacity-5">Como administrador</p>
          </div>
        </div>


        <div class="row justify-content-center">
          <div class="col-md-9">
              

            <form method="post" class="p-5 bg-white">             
              <div class="row form-group">
                
                <div class="col-md-12">                  
                  <p class="mb-2 font-weight-bold">Email</p>
                  <input type="email" id="email" name="email" class="form-control">
                </div>
              </div>

              <div class="row form-group">
                
                <div class="col-md-12">
                  <p class="mb-2 font-weight-bold">Contraseña</p>
                  <input type="password" id="password" name="password" class="form-control">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Iniciar sesión" class="btn btn-primary py-2 px-4 text-white">
                </div>
              </div>
              <?php 
                $signin = new SigninController();
                $signin->signinUserController();
               ?>
  
            </form>
          </div>
          
        </div>
        
      </div>
    </div>



<!--====  End of REGISTER FORM  ====-->




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

    

    
  </body>
</html>