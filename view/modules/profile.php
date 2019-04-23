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
  include "view/languageslang/es.php";
}


# ======  End of Language validation  =======
?>


<!DOCTYPE html>
<html lang="en">
  <title>Profile</title>
  <!--=================================
  =            Head common            =
  ==================================-->
  
  <?php include 'view/links/head_common.php'; ?>
  
  <!--====  End of Head common  ====-->
  
  <body>
  

  <!--============================
  =            HEADER            =
  =============================-->
  <?php include 'view/modules/header/header.php'; ?>     
  <!--====  End of HEADER  ====-->
  

  

  <!--=================================
  =            MY TOURS            =
  ==================================-->
    <div class="site-section" data-aos="fade">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary">Tours en mi perfil</h2>
            <p class="color-black-opacity-5">Lorem Ipsum Dolor Sit Amet</p>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 mb-4 mb-lg-0 col-lg-4 pt-3">
            
            <div class="listing-item">
              <div class="listing-image">
                <img src="view/assets/images/img_1.jpg" alt="Image" class="img-fluid">
              </div>
              <div class="listing-item-content">
                <h2 class="mb-1"><a href="#">Sticky Band</a></h2>
                <span class="address">West Orange, New York</span>
                   <p>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-secondary"></span>
                  <span>(3 Reviews)</span>
                </p>                
                <a class="px-3 mb-3 category" href="#">Editar</a>
                <a class="px-3 mb-3 category" href="#">Eliminar</a>
              </div>
            </div>

          </div>


                  <div class="col-md-6 mb-4 mb-lg-0 col-lg-4 pt-3">
            
            <div class="listing-item">
              <div class="listing-image">
                <img src="view/assets/images/img_1.jpg" alt="Image" class="img-fluid">
              </div>
              <div class="listing-item-content">
                <h2 class="mb-1"><a href="#">Sticky Band</a></h2>
                <span class="address">West Orange, New York</span>
                   <p>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-secondary"></span>
                  <span>(3 Reviews)</span>
                </p>                
                <a class="px-3 mb-3 category" href="#">Editar</a>
                <a class="px-3 mb-3 category" href="#">Eliminar</a>
              </div>
            </div>

          </div>


                  <div class="col-md-6 mb-4 mb-lg-0 col-lg-4 pt-3">
            
            <div class="listing-item">
              <div class="listing-image">
                <img src="view/assets/images/img_1.jpg" alt="Image" class="img-fluid">
              </div>
              <div class="listing-item-content">
                <h2 class="mb-1"><a href="#">Sticky Band</a></h2>
                <span class="address">West Orange, New York</span>
                   <p>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-secondary"></span>
                  <span>(3 Reviews)</span>
                </p>                
                <a class="px-3 mb-3 category" href="#">Editar</a>
                <a class="px-3 mb-3 category" href="#">Eliminar</a>
              </div>
            </div>

          </div>



                  <div class="col-md-6 mb-4 mb-lg-0 col-lg-4 pt-3">
            
            <div class="listing-item">
              <div class="listing-image">
                <img src="view/assets/images/img_1.jpg" alt="Image" class="img-fluid">
              </div>
              <div class="listing-item-content">
                <h2 class="mb-1"><a href="#">Sticky Band</a></h2>
                <span class="address">West Orange, New York</span>
                   <p>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-secondary"></span>
                  <span>(3 Reviews)</span>
                </p>                
                 <a class="px-3 mb-3 category" href="#">Editar</a>
                 <a class="px-3 mb-3 category" href="#">Eliminar</a>
              </div>
            </div>

          </div>


        </div>
      </div>
    </div>
  <!--====  End of MY TOURS  ====-->
  



<!--==========================
=            FAQS            =
===========================-->

  <div class="site-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary">Preguntas frecuentes</h2>
            <p class="color-black-opacity-5">Lorem Ipsum Dolor Sit Amet</p>
          </div>
        </div>


        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="border p-3 rounded mb-2">
              <a data-toggle="collapse" href="#collapse-1" role="button" aria-expanded="false" aria-controls="collapse-1" class="accordion-item h5 d-block mb-0">How to list my item?</a>

              <div class="collapse" id="collapse-1">
                <div class="pt-2">
                  <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti esse voluptates deleniti, ratione, suscipit quam cumque beatae, enim mollitia voluptatum velit excepturi possimus odio dolore molestiae officiis aspernatur provident praesentium.</p>
                </div>
              </div>
            </div>

            <div class="border p-3 rounded mb-2">
              <a data-toggle="collapse" href="#collapse-4" role="button" aria-expanded="false" aria-controls="collapse-4" class="accordion-item h5 d-block mb-0">Is this available in my country?</a>

              <div class="collapse" id="collapse-4">
                <div class="pt-2">
                  <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti esse voluptates deleniti, ratione, suscipit quam cumque beatae, enim mollitia voluptatum velit excepturi possimus odio dolore molestiae officiis aspernatur provident praesentium.</p>
                </div>
              </div>
            </div>

            <div class="border p-3 rounded mb-2">
              <a data-toggle="collapse" href="#collapse-2" role="button" aria-expanded="false" aria-controls="collapse-2" class="accordion-item h5 d-block mb-0">Is it free?</a>

              <div class="collapse" id="collapse-2">
                <div class="pt-2">
                  <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti esse voluptates deleniti, ratione, suscipit quam cumque beatae, enim mollitia voluptatum velit excepturi possimus odio dolore molestiae officiis aspernatur provident praesentium.</p>
                </div>
              </div>
            </div>

            <div class="border p-3 rounded mb-2">
              <a data-toggle="collapse" href="#collapse-3" role="button" aria-expanded="false" aria-controls="collapse-3" class="accordion-item h5 d-block mb-0">How the system works?</a>

              <div class="collapse" id="collapse-3">
                <div class="pt-2">
                  <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti esse voluptates deleniti, ratione, suscipit quam cumque beatae, enim mollitia voluptatum velit excepturi possimus odio dolore molestiae officiis aspernatur provident praesentium.</p>
                </div>
              </div>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>

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