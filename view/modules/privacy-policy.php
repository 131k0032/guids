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
  <title>Política de privacidad</title>
  <?php include 'view/links/head_common.php'; ?>
  
  <!--====  End of Head common  ====-->
  <body>
  <!--============================
  =            HEADER            =
  =============================-->
  <?php include 'view/modules/header/header.php'; ?>     
  <!--====  End of HEADER  ====-->
  

<!--======================================
=            BACKGROUDN IMAGE            =
=======================================-->

   <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(http://localhost/guids/view/assets/images/Cancun.jpg);" data-aos="fade" data-stellar-background-ratio="1">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-10">
            
            
            <div class="row justify-content-center">
              <div class="col-md-8 text-center">
                <h1 data-aos="fade-up">Políticas de privacidad</h1>
                <p class="mb-0" data-aos="fade-up" data-aos-delay="100">Conoce más de Guids.mx</p>
              </div>
            </div>

            
          </div>
        </div>
      </div>
    </div>    
<!--====  End of BACKGROUDN IMAGE  ====-->


<!--================================
=            Who we are            =
=================================-->

    <div class="site-section "  data-aos="fade">
      <div class="container">

        <div class="row mb-5">
          <div class="col-md-12 border-primary">
            <h2 class="font-weight-light text-primary">Políticas de privacidad de Guids.mx</h2>
            <p class="color-black-opacity-5 font-weight-bold">1. La compañía</p>          
          </div>
          <div class="col-md-12">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos consequatur, alias deserunt nulla dolore officia pariatur saepe repudiandae officiis at accusantium illo tempora ducimus dolores dolor sit a! In, ut.</p>
          </div>

          <div class="col-md-12 border-primary">            
            <p class="color-black-opacity-5 font-weight-bold">2. La plataforma</p>          
          </div>
          <div class="col-md-12">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos consequatur, alias deserunt nulla dolore officia pariatur saepe repudiandae officiis at accusantium illo tempora ducimus dolores dolor sit a! In, ut.</p>
          </div>
          
          

        </div>

      </div>
    </div>

<!--====  End of Who we are  ====-->


    




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

        

  </body>
</html>