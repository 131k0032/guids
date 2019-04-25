<?php 
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


 ?>
<!DOCTYPE html>
<html lang="en">
  
  <!--=================================
  =            Head common            =
  ==================================-->
  <title>404 Sitio no encontrado</title>
  <?php include 'view/links/head_common.php'; ?>
  
  <!--====  End of Head common  ====-->
  
  <body>
  

  <!--============================
  =            HEADER            =
  =============================-->
  <?php include 'view/modules/header/header.php'; ?>     
  <!--====  End of HEADER  ====-->
  

  
 
  <!--=================================
  =            BEST GUIDES            =
  ==================================-->
    <div class="site-section" data-aos="fade">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary">Error 404 not found! Parece que no hemos encontrado la página <?php echo $url[0];?> que buscabas, mejor busca y encuentra los tours haciendo clic <p class="color-black-opacity-5"><a href="http://localhost/guids/index">aquí</a></p></h2>
            
          </div>
        </div>
      </div>
    </div>
  <!--====  End of BEST GUIDES  ====-->
  




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