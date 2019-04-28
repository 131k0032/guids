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
    if(isset($_POST["lang"]) && !empty($_POST["lang"])){//Watching changes on POST
      $_SESSION["lang"] = $_POST["lang"];
    }elseif (!isset($_SESSION["lang"])) {
      $_SESSION["lang"] = "es";
    }
    require_once "view/languages/".$_SESSION["lang"].".php";//include lang
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
