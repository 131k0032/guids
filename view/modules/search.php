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
<title>Buscar tour</title>
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
  if (isset($_GET["n"])) {
    $rang=((int)$_GET["n"]);
  }else {
    $rang=9;
  }
  if (isset($_GET["p"]) && $_GET["p"]>0) {
    $page=((int)$_GET["p"]);
    $start=($_GET["p"]-1)*$rang;
  }else {
    $start=0;
  }

  if (isset($_GET["key"]) && $_GET["key"]!="") {
    $key=$_GET["key"];
    if ($key == "all") {
      $results = TourController::getAllSearchEngine($start,$rang,"DESC");
    }else {
      $results = TourController::getSearchEngine($key,$start,$rang,"DESC");
    }
  }else {
    if (isset($url[1])) {
      $key=$url[1];
    }
  }
 ?>
 <!--=================================
 =               SEARCH               =
 ==================================-->
 <div class="container">
   <div class="form-search-wrap p-2" data-aos="fade-up" data-aos-delay="200">
     <form method="get" action="<?php if(isset($url[1])){ echo '..\index.php'; }else{ echo 'index.php'; } ?>" id="search">
      <style>
        form label.error {
          /*float: left;*/
          color: #7971ea;
          font-weight:bold;
          font-size: 12px
          /*vertical-align: top;*/
        }
      </style>
       <div class="row align-items-center">
         <div class="col-lg-12 col-xl-9 no-sm-border text-center">
           <input type="hidden" name="page" value="search">
           <input type="hidden" name="p" value="1">
           <input type="text" class="form-control" name="key" value="<?php echo $key; ?>" placeholder="<?php echo $lang["Prueba escribiendo Cancún"]; ?>" required>
         </div>
         <div class="col-lg-12 col-xl-1 ml-auto text-center">
           <select class="custom-select" name="n">
             <option value="9" selected>9</option>
             <option value="15">15</option>
             <option value="54">54</option>
           </select>
         </div>
         <div class="col-lg-12 col-xl-2 ml-auto text-right">
           <input type="submit" class="btn btn-primary" value="<?php echo $lang["Buscar"] ?>">
         </div>
       </div>
     </form>
   </div>
 </div>
  <!--====  End of MY TOURS  ====-->
<?php
// echo "La busqueda comienza con: <br>";
// var_dump($start);
// echo "<br>La pagina es: <br>";
// var_dump($_GET["p"]);
// echo "<br>La pagina es: <br>";
// var_dump($page);
 ?>

  <!--=================================
  =            BEST GUIDES            =
  ==================================-->
  <div class="site-section" data-aos="fade">
    <div class="container">
      <?php if (count($results)>0) { ?>
      <div class="row justify-content-center mb-5">
        <div class="col-md-7 text-center border-primary">
          <h2 class="font-weight-light text-primary"><?php echo count($results)." ".$lang["Tour(s) encontrado(s)"]; ?></h2>
          <p class="color-black-opacity-5"><?php echo $lang["Con la palabra"]." ".$key; ?></p>
        </div>
      </div>
      <div class="row">
              <?php foreach ($results as $row => $value) { ?>
        <div class="col-md-6 mb-4 mb-lg-0 col-lg-4 pt-3">
            <div class="listing-item" style="max-width:500px; max-height: 200px;">
              <div class="listing-image">
                <img style="width: 100%;" src="<?php echo $value["tour_image_src"].$value["tour_image_file_name"] ?>" alt="Image" class="img-fluid ">
              </div>
              <div class="listing-item-content">
                <h2 class="mb-1"><a href="#"><?php echo $value["tour_id"]." ".utf8_encode($value["tour_name"]); ?></a></h2>
                <span class="address"><?php echo utf8_encode($value["tour_location"]); ?></span>
                <p>
                  <span class="icon-star <?php echo $value["tour_rating"]>=1 ? 'text-warning' : 'text-secondary' ?>"></span>
                  <span class="icon-star <?php echo $value["tour_rating"]>=2 ? 'text-warning' : 'text-secondary' ?>"></span>
                  <span class="icon-star <?php echo $value["tour_rating"]>=3 ? 'text-warning' : 'text-secondary' ?>"></span>
                  <span class="icon-star <?php echo $value["tour_rating"]>=4 ? 'text-warning' : 'text-secondary' ?>"></span>
                  <span class="icon-star <?php echo $value["tour_rating"]>=5 ? 'text-warning' : 'text-secondary' ?>"></span>
                  <span>(<?php echo $value["tour_count"]-1; ?> <?php echo $lang["Valoraciones"]; ?>)</span>
                </p>
                <a class="px-3 mb-3 category" href="http://localhost/guids/guideinfo/tour/<?php echo $value["tour_id"]; ?>"><?php echo $lang["Ver más..."] ?></a>
              </div>
            </div>
          </div>
        <?php } //End foreach ?>
        <div class="col-12 mt-5 text-center">
           <div class="custom-pagination">
             <?php if($page>1){ echo "<a href=http://localhost/guids/index.php?page=search&p=".($page-1)."&key=".$key."&n=".$rang.">".($page-1)."</a>";} ?>
             <span><?php echo $page; ?></span>
             <a href="<?php echo 'http://localhost/guids/index.php?page=search&p='.($page+1).'&key='.$key.'&n='.$rang; ?>"><?php echo $page+1; ?></a>
             <a href="<?php echo 'http://localhost/guids/index.php?page=search&p='.($page+2).'&key='.$key.'&n='.$rang; ?>"><?php echo $page+2; ?></a>
             <a style="font-size: 12px;" href="index.php?page=search&p=1&key=all&n=54"><?php echo $lang["Todos"]; ?></a>
           </div>
         </div>
        <?php
      }else {
        echo '<p class="px-3 mb-3 category text-secondary"> <i class="icon-eye-slash"><b></i> '.$lang["No se encontraron tours activos"].'</b></p>';
      }
      ?>

      </div>
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
<!-- Validations -->
<script>
  $().ready(function() {
  $("#search").validate({
    rules: {

      key: {
        required:true,
        minlength: 2,
      },
    },
    messages: {
      key : "<?php echo $lang["Intenta escribir algo"] ?>",
    }
  });
});
</script>
<!-- End Validations -->
  <!--====  End of SCRIPTS  ====-->
</body>

</html>
