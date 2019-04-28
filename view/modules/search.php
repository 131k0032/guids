<?php
error_reporting(0);
 // session_start();
    // if(!$_SESSION['validar']){
    //   print "<script>window.location='index';</script>";
    //   exit();
    // }
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
<title>Search</title>
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
  <?php
//Get rang, start and end
$rang=20; //Set rang default
if (isset($_GET["p"]) && $_GET["p"]>0) {
  $start=($_GET["p"]-1)*$rang;
}else {
  $start=0;
}
$end=$start+$rang;

if (isset($_GET["key"]) && $_GET["key"]!="") {
  $value=$_GET["key"];
  $results = TourController::getAllSearchEngine($_GET["key"],$start,$end,"ASC");
}else {
  if (isset($url[1])) {
    $value=$url[1];
  }
}
 ?>
 <!--=================================
 =               SEARCH               =
 ==================================-->
 <div class="container">
   <div class="form-search-wrap p-2" data-aos="fade-up" data-aos-delay="200">
     <form method="get" action="<?php if(isset($url[1])){ echo "..\index.php"; }else{ echo "index.php"; } ?>">
       <div class="row align-items-center">
         <div class="col-lg-12 col-xl-10 no-sm-border text-center">
           <input type="hidden" name="page" value="search">
           <input type="hidden" name="p" value="1">
           <input type="text" class="form-control" name="key" value="<?php echo $value; ?>" placeholder="Pruebe con Cancún">
         </div>
         <div class="col-lg-12 col-xl-2 ml-auto text-right">
           <input type="submit" class="btn btn-primary" value="Buscar">
         </div>
       </div>
     </form>
   </div>
 </div>
  <!--====  End of MY TOURS  ====-->

  <!--=================================
  =            BEST GUIDES            =
  ==================================-->
  <div class="site-section" data-aos="fade">
    <div class="container">
      <?php if (isset($results)) { ?>
      <div class="row justify-content-center mb-5">
        <div class="col-md-7 text-center border-primary">
          <h2 class="font-weight-light text-primary"><?php echo "Los tours encontrados"; ?></h2>
          <p class="color-black-opacity-5"><?php echo "para la palabra ".$_GET["key"]; ?></p>
        </div>
      </div>
      <div class="row">
              <?php foreach ($results as $row => $value) {
                $getAvgRatingByIdTour = TourController::getAvgRatingByIdTour($row+1);
                $getCountRatingByIdTour = TourController::getCountRatingByIdTour($row+1);
              ?>
        <div class="col-md-6 mb-4 mb-lg-0 col-lg-4 pt-3">
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
            if ($results==null) {
              echo "No se encontraron tours activos";
          } ?>
        </div> <?php }else { ?>
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary"><?php echo "Los tours encontrados"; ?></h2>
            <p class="color-black-opacity-5"><?php echo "para la palabra ".$_GET["key"]; ?></p>
          </div>
        </div>
        <?php } ?>
  </div>
</div>
  <!--====  End of MY TOURS  ====-->
  <!--==========================
=            FAQS            =
===========================--> <?php include 'view/links/faqs.php'; ?>
  <!--====  End of FAQS  ====-->
  <!--============================
=            FOOTER            =
=============================--> <?php include "view/modules/footer/footer.php" ?>
  <!--====  End of FOOTER  ====-->
  <!--=============================
=            SCRIPTS            =
==============================--> <?php include 'view/links/footer_common.php'; ?>
  <!--====  End of SCRIPTS  ====-->
</body>

</html>
