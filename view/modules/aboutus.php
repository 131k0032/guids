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
  <title>About us</title>
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
                <h1 data-aos="fade-up">Acerca de nosotros</h1>
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
          <div class="col-md-8" >
            <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure nobis officiis fugiat deserunt libero.</h3>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-4 mx-auto">
            <h3>Who We Are</h3>
          </div>
        </div>
        <div class="row mb-5">
          <div class="col-md-4 ml-auto">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam eveniet laudantium dignissimos atque labore excepturi perspiciatis ut fugit eius itaque iste quibusdam dolore consectetur reprehenderit. Illum molestiae nemo culpa optio.</p>
          </div>
          <div class="col-md-4">
            <p>Similique neque facere cum! Et esse natus qui fugiat temporibus voluptate debitis similique eos illum pariatur suscipit placeat omnis perferendis ab enim quis eligendi minima explicabo aperiam. Eaque minus itaque?</p>
          </div>
        </div>

        <div class="row mb-5">
          <div class="col-md-4 text-left border-primary">
            <h2 class="font-weight-light text-primary">Popular Categories</h2>
            <p class="color-black-opacity-5">Lorem Ipsum Dolor Sit Amet</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
            <img src="http://localhost/guids/view/assets/images/person_1.jpg" alt="Image" class="img-fluid mb-3">
            <h3 class="h4">Susan Horton</h3>
            <p class="caption text-primary">Founder</p>
          </div>
          <div class="col-md-6 col-lg-3 mb-4 mb-lg-0 mt-md-5">
            <img src="http://localhost/guids/view/assets/images/person_2.jpg" alt="Image" class="img-fluid mb-3">
            <h3 class="h4">Jonathan Kennedy</h3>
            <p class="caption text-primary">Founder</p>
          </div>
          <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
            <img src="http://localhost/guids/view/assets/images/person_3.jpg" alt="Image" class="img-fluid mb-3">
            <h3 class="h4">Gordon Meyer</h3>
            <p class="caption text-primary">Lead Developer</p>
          </div>
          <div class="col-md-6 col-lg-3 mb-4 mb-lg-0 mt-md-5">
            <img src="http://localhost/guids/view/assets/images/person_4.jpg" alt="Image" class="img-fluid mb-3">
            <h3 class="h4">Doug Hale Kennedy</h3>
            <p class="caption text-primary">ProjectManager</p>
          </div>
        </div>

      </div>
    </div>

<!--====  End of Who we are  ====-->


    



    
<!--     <div class="site-section">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <img src="http://localhost/guids/view/assets/images/img_1.jpg" alt="Image" class="img-fluid rounded">
          </div>
          <div class="col-md-5 ml-auto">
            <h2 class="text-primary mb-3">Why Us</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam voluptates a explicabo delectus sed labore dolor enim optio odio at!</p>
            <p class="mb-4">Adipisci dolore reprehenderit est et assumenda veritatis, ex voluptate odio consequuntur quo ipsa accusamus dicta laborum exercitationem aspernatur reiciendis perspiciatis!</p>

            <ul class="ul-check list-unstyled success">
              <li>Adipisci dolore reprehenderit</li>
              <li>Accusamus dicta laborum</li>
              <li>Delectus sed labore</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
     -->

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