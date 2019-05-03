<?php   
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
  <title>Sign in</title>
  <?php include 'view/links/head_common.php'; ?>
  
  <!--====  End of Head common  ====-->


  <body>
  <!--============================
  =            HEADER            =
  =============================-->
  <?php include 'view/modules/header/header.php'; ?>     
  <!--====  End of HEADER  ====-->
  

  

  <!--================================
  =            INFO IMAGE            =
  =================================-->
  
      <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(http://localhost/guids/view/assets/images/Cancun.jpg);" data-aos="fade" data-stellar-background-ratio="1">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-10">
            
            
            <div class="row justify-content-center">
              <div class="col-md-8 text-center">
                <h1 data-aos="fade-up">Inicia sesión y crea tus tours en lugares que estén a tu alcance</h1>
                <p class="mb-0" data-aos="fade-up" data-aos-delay="100">¿Aún no tienes una cuenta? Adelante prueba <a href="http://localhost/guids/signup" style="color: white">registrarte</a></p>
              </div>
            </div>

            
          </div>
        </div>
      </div>
    </div>  
  
  <!--====  End of INFO IMAGE  ====-->
  
  


<!--===================================
=            REGISTER FORM            =
====================================-->
   <div class="site-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary">Inciar sesión</h2>
            <p class="color-black-opacity-5">LLena los campos</p>
          </div>
        </div>


        <div class="row justify-content-center">
          <div class="col-md-9">
              

            <form method="post" class="p-5 bg-white" id="signin">             
              <p>Podrás inciar sesión después de que tu información de registro haya sido verifica por los adinistradores del sitio</p>
              <style>
                form label.error {
                  float: right;
                  color: #f23a2e;
                  font-weight:bold;
                  font-size: 12px 
                  /*vertical-align: top;*/
                }
              </style>
              <div class="row form-group">
                
                <div class="col-md-12">                  
                  <p class="mb-2 font-weight-bold">Email</p>
                  <input type="email" id="email" name="email" class="form-control" placeholder="Email registrado en el sitio" required>
                </div>
              </div>

              <div class="row form-group">
                
                <div class="col-md-12">
                  <p class="mb-2 font-weight-bold">Contraseña</p>
                  <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña registrada en el sitio" required>
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

<!-- Validations -->
<script>
  $().ready(function() {
  $("#signin").validate({
    rules: {
    
      email: { 
        required:true, 
        email: true
      },
      password: { 
        required:true,         
      },

    },
    messages: {
      email : "Email es requerido y debe tener formato de email correcto.",    
      password : "Password es requerido.",
    }
  });
});
</script>
<!-- End Validations -->


<!--====  End of SCRIPTS  ====-->

        

    
  </body>
</html>