<?php
error_reporting(0);
session_start();
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
<html lang="<?php echo $_SESSION["lang"]; ?>">
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
  <!--============================
  =            SEARCH            =
  =============================-->
  <div class="site-blocks-cover overlay" style="background-image: url(view/assets/images/Cancun.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row align-items-center justify-content-center text-center">
        <div class="col-md-10">
          <div class="row justify-content-center mb-4">
            <div class="col-md-8 text-center">
              <h1 data-aos="fade-up"><?php echo $lang["Encuentra"]; ?><span class="typed-words"></span></h1>
            </div>
          </div>
          <div class="form-search-wrap p-2" data-aos="fade-up" data-aos-delay="200">
            <form method="get" action="index.php">
              <div class="row align-items-center">
                <div class="col-lg-12 col-xl-10 no-sm-border text-center">
                  <input type="hidden" name="page" value="search">
                  <input type="hidden" name="n" value="9">
                  <input type="hidden" name="p" value="1">
                  <input type="text" class="form-control" name="key" placeholder="Pruebe con Cancún">
                </div>
                <div class="col-lg-12 col-xl-2 ml-auto text-right">
                  <input type="submit" class="btn btn-primary" value="Buscar">
                </div>
              </div>
            </form>
          </div>
          <div class="row justify-content-center mb-4">
            <div class="col-md-8 text-center">
              <p data-aos="fade-up" data-aos-delay="100" style="color:#fff "><?php echo $lang["Encuentra slogan"]; ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--====  End of SEARCH  ====-->
  <?php
 // getting all tors
  //$getAll = new TourController(); //Este ya no se requiere porque lo llamas desde el index de la carpeta raiz.
  $getAll = TourController::getAll();
  ?>
  <!--=================================
  =            BEST GUIDES            =
  ==================================-->
  <div class="site-section" data-aos="fade">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-7 text-center border-primary">
          <h2 class="font-weight-light text-primary"><?php echo $lang["Tours"]; ?></h2>
          <p class="color-black-opacity-5"><?php echo $lang["Mas solicitados"]; ?></p>
        </div>
      </div>
      <div class="row mb-5"> <?php foreach ($getAll as $row => $value) {
            $getAvgRatingByIdTour = TourController::getAvgRatingByIdTour($row+1);
            $getCountRatingByIdTour = TourController::getCountRatingByIdTour($row+1); ?>
        <div class="col-md-6 mb-4 mb-lg-0 col-lg-4 pt-3" id="besttour<?php echo $row; ?>" style="<?php if($row>8) echo "display:none;"; ?>">
          <div class="listing-item" style="max-width:500px; max-height: 200px;">
            <div class="listing-image">
              <img style="width: 100%;" src="<?php echo $value["tour_image_src"].$value["tour_image_file_name"] ?>" alt="Image" class="img-fluid ">
            </div>
            <div class="listing-item-content">
              <h2 class="mb-1"><a href="#"><?php echo $row." ".utf8_encode($value["tour_name"]); ?></a></h2>
              <span class="address"><?php echo utf8_encode($value["tour_location"]); ?></span>
              <p>
                <span class="icon-star <?php echo $getAvgRatingByIdTour["review_rating"]>=1 ? 'text-warning' : 'text-secondary' ?>"></span>
                <span class="icon-star <?php echo $getAvgRatingByIdTour["review_rating"]>=2 ? 'text-warning' : 'text-secondary' ?>"></span>
                <span class="icon-star <?php echo $getAvgRatingByIdTour["review_rating"]>=3 ? 'text-warning' : 'text-secondary' ?>"></span>
                <span class="icon-star <?php echo $getAvgRatingByIdTour["review_rating"]>=4 ? 'text-warning' : 'text-secondary' ?>"></span>
                <span class="icon-star <?php echo $getAvgRatingByIdTour["review_rating"]>=5 ? 'text-warning' : 'text-secondary' ?>"></span>
                <span>(<?php echo $getCountRatingByIdTour["review_rating"]; ?> Valoraciones)</span>
              </p>
              <a class="px-3 mb-3 category" href="http://localhost/guids/guideinfo/tour/<?php echo $value["tour_id"]; ?>"><?php echo $lang["Ver mas"] ?>...</a>
            </div>
          </div>
        </div>
      <?php }
        if ($getAll==null) {
          echo "No se encontraron tours activos";
        } ?> </div>
      <div class="row justify-content-center mb-5">
        <a href="javascript:addBestTours();" id="btnAddBestTour"><?php echo $lang["Ver mas"]; ?></a>
        <a href="?page=all" id="btnAllTours" style="display:none;"><?php echo $lang["Ver todos"] ?></a>
      </div>
    </div>
  </div>
  <!--====  End of BEST GUIDES  ====-->
  <!--=================================
  =            BEST VIDEOS            =
  ==================================-->
  <div class="site-section" data-aos="fade">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-7 text-center border-primary">
          <h2 class="font-weight-light text-primary">Algunos videos</h2>
          <p class="color-black-opacity-5">Los mas emocionantes</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-4 mb-lg-0 col-lg-4 pt-3">
          <div class="listing-item">
            <div class="listing-image">
              <img src="view/assets/images/tourists.jpg" alt="Image" class="img-fluid">
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
              <a class="px-3 mb-3 category" href="guideinfo">Ver mas...</a>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-4 mb-lg-0 col-lg-4 pt-3">
          <div class="listing-item">
            <div class="listing-image">
              <img src="view/assets/images/tourists.jpg" alt="Image" class="img-fluid">
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
              <a class="px-3 mb-3 category" href="guideinfo">Ver mas...</a>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-4 mb-lg-0 col-lg-4 pt-3">
          <div class="listing-item">
            <div class="listing-image">
              <img src="view/assets/images/tourists.jpg" alt="Image" class="img-fluid">
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
              <a class="px-3 mb-3 category" href="guideinfo">Ver mas...</a>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-4 mb-lg-0 col-lg-4 pt-3">
          <div class="listing-item">
            <div class="listing-image">
              <img src="view/assets/images/tourists.jpg" alt="Image" class="img-fluid">
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
              <a class="px-3 mb-3 category" href="guideinfo">Ver mas...</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--====  End of BEST VIDEOS ====-->
  <!--=================================
=            ADVERSITING            =
==================================-->
  <div class="py-5 bg-primary">
    <div class="container">
      <div class="row text-center">
        <div class="col-md-12">
          <h2 class="mb-2 text-white">¿Quieres aprovechar el mayor tiempo posible conociendo lo mágico de la Riviera Maya?</h2>
          <p class="mb-4 lead text-white-opacity-05">Bajo costo + Seguridad + Guía privado</p>
          <!-- <p class="mb-0"><a href="booking.html" class="btn btn-outline-white text-white btn-md font-weight-bold">Sign Up</a></p> -->
        </div>
      </div>
    </div>
  </div>
  <!--====  End of ADVERSITING  ====-->
  <!--==========================
=            FAQS            =
===========================-->
  <div class="site-section">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-7 text-center border-primary">
          <h2 class="font-weight-light text-primary">Preguntas frecuentes</h2>
          <p class="color-black-opacity-5">Peguntas más relevantes acerca del sitio</p>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="border p-3 rounded mb-2">
            <a data-toggle="collapse" href="#collapse-1" role="button" aria-expanded="false" aria-controls="collapse-1" class="accordion-item h5 d-block mb-0">¿El sitio es una versión beta?</a>
            <div class="collapse" id="collapse-1">
              <div class="pt-2">
                <p class="mb-0">Así es, el sitio está en modo Beta por el momento</p>
              </div>
            </div>
          </div>
          <!--
            <div class="border p-3 rounded mb-2">
              <a data-toggle="collapse" href="#collapse-4" role="button" aria-expanded="false" aria-controls="collapse-4" class="accordion-item h5 d-block mb-0">Is this available in my country?</a>

              <div class="collapse" id="collapse-4">
                <div class="pt-2">
                  <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti esse voluptates deleniti, ratione, suscipit quam cumque beatae, enim mollitia voluptatum velit excepturi possimus odio dolore molestiae officiis aspernatur provident praesentium.</p>
                </div>
              </div>
            </div> -->
          <!--             <div class="border p-3 rounded mb-2">
              <a data-toggle="collapse" href="#collapse-2" role="button" aria-expanded="false" aria-controls="collapse-2" class="accordion-item h5 d-block mb-0">Is it free?</a>

              <div class="collapse" id="collapse-2">
                <div class="pt-2">
                  <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti esse voluptates deleniti, ratione, suscipit quam cumque beatae, enim mollitia voluptatum velit excepturi possimus odio dolore molestiae officiis aspernatur provident praesentium.</p>
                </div>
              </div>
            </div> -->
          <!--             <div class="border p-3 rounded mb-2">
              <a data-toggle="collapse" href="#collapse-3" role="button" aria-expanded="false" aria-controls="collapse-3" class="accordion-item h5 d-block mb-0">How the system works?</a>

              <div class="collapse" id="collapse-3">
                <div class="pt-2">
                  <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti esse voluptates deleniti, ratione, suscipit quam cumque beatae, enim mollitia voluptatum velit excepturi possimus odio dolore molestiae officiis aspernatur provident praesentium.</p>
                </div>
              </div>
            </div> -->
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
  <!--============================
=   Javascript functions       =
=============================-->
  <script type="text/javascript">
    var min = 9;

    function addBestTours() {
      for (var i = 0; i < 6; i++) {
        var element = document.getElementById('besttour' + min);
        console.dir(element);
        if (element != null) {
          element.style.display = "block";
        } else {
          document.getElementById("btnAddBestTour").style.display = "none";
          document.getElementById("btnAllTours").style.display = "block";
        }
        min++;
      }
    }
  </script>
</body>

</html>
