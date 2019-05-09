<?php 
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
  <title><?php echo $lang["404 Sitio no encontrado"]; ?></title>
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
            <h2 class="font-weight-light text-primary"><?php echo $lang["¡Error 404 Sitio no encontrado! Nos alegra mucho que llegues hasta aquí buscando incansablemente un tour, pero la página"]; ?> <?php echo $url[0];?> <?php echo $lang["no existe, pero espera :D , mejor sigue buscando"]; ?> <a href="http://localhost/guids/index"><?php echo $lang["aquí"]; ?></a> <?php echo $lang["y encuentra los mejores tours"]; ?></h2>
            
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