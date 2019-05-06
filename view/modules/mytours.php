<?php
error_reporting(0);
 session_start();
    if(!$_SESSION['validar']){
      print "<script>window.location='index';</script>";
      exit();
    }
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
<title>My tours</title>
<?php include 'view/links/head_common.php'; ?>
<!--====  End of Head common  ====-->

<body>
  <!--============================
  =            HEADER            =
  =============================-->
  <?php include 'view/modules/header/header.php'; ?>
  <!--====  End of HEADER  ====-->
  <!--=====================================
=            MY TOURS CREATED            =
======================================-->
  <div class="site-section">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-7 text-center border-primary">
          <h2 class="font-weight-light text-primary">Mis tours que he creado</h2>
          <p class="color-black-opacity-5">Lorem Ipsum Dolor Sit Amet</p>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque consequatur enim possimus quas, tempora eveniet nihil delectus eum fugiat ut inventore sequi placeat, qui accusamus dolor atque explicabo? Necessitatibus, eum.</p>
        <table id="mytours" class="table table-bordered table-striped dt-responsive nowrap">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Date</th>
              <th>Bookings</th>
              <th>Reviews</th>
              <th>Location</th>
              <th>Languages</th>
              <th>Schedule</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody> <?php
            $getAllTourByUser = TourController::getAllToursByUser($id);
            foreach($getAllTourByUser as $row => $value){
              $countBookings = BookingController::GetCountBookinByTour($value["tour_id"]);
              $getAvgRating = TourController::getCountRatingByIdTour($value["tour_id"]);
              $getTourSchedule = TourController::getTourSchedule($value["tour_id"]);
              ?>
            <tr>
              <td><?php echo $value["tour_id"]; ?></td>
              <td>
                <a href="https://guids.mx/guideinfo/tour/<?php echo $value["tour_id"]; ?>" target="_blank">
                  <div class="listing-image" style="max-width:250px;">
                    <img src="<?php echo $value["tour_image_src"].$value["tour_image_file_name"];?>" alt="Image" class="img-fluid img-thumbnail card-img-top">
                  </div>                <?php echo utf8_encode($value["tour_name"]); ?>
                </a>
              </td>
              <td><?php echo utf8_encode($value["tour_created_at"]); ?></td>
              <td><a href="https://guids.mx/bookings/#<?php echo $value["tour_id"]; ?>" target="_blank"><?php echo $countBookings["count"]; ?> bookings</a></td>
              <td><?php echo $getAvgRating["review_rating"]." comments" ?></td>
              <td><?php echo utf8_encode($value["tour_location"]); ?></td>
              <td><?php echo utf8_encode($getTourSchedule[0][2]); ?></td>
              <td><?php echo "<br>"; foreach ($getTourSchedule as $key => $schedule) {
                echo utf8_encode($schedule["tour_date"])." at ".$schedule["tour_time"]."<br>";} ?>
              </td>
              <td style="width:300px;">
                <form method="post">
                  <!-- <a href="" class="btn btn-warning btn-xs">Modificar</a> -->
                  <li><a href="http://localhost/guids/mytours-setting/tour/<?php echo $value["tour_id"];?>" class="btn btn-warning btn-xs"><i class="icon-settings"></i></a></li>
                  <li><a data-toggle="modal" data-target="#modalTourID<?php echo $value["tour_id"];?>" class="btn btn-danger btn-xs"><i class="icon-trash"></i></a></li>
                  <!-- <button class="btn btn-danger btn-xs" type="submit">Eliminar</button> -->
                </form>
              </td>
            </tr> <?php } ?>
          </tbody>
        </table>
      </div>
      <!-- Inicio modales -->
      <?php foreach ($getAllTourByUser as $id => $data) {
        # code... ?>
      <div class="modal fade" id="modalTourID<?php echo $data["tour_id"];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" style="font-weight:900;color:red;">¿Seguro deseas eliminar este tour?</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post">
              <div class="modal-body">
                <input type="hidden" name="id" value="<?php echo $value["tour_id"] ?>">
                <p class="color-black-opacity-5">Realmente desea eliminar el tour: <i><?php echo $value["tour_name"]; ?>.</i><br>
                Por favor escriba el identificador <code><?php echo $value["tour_id"] ?></code> del tour para confirmar.</p>
                <input type="text" name="false" pattern="<?php echo $value["tour_id"] ?>" title="Escribe el identificador, por favor." required>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
                <input type="submit" value="Eliminar" id="btnupdate" class="btn btn-danger py-2 px-4 text-white">
              </div>
            </form>
          </div>
        </div>
      </div>
    <?php }
      TourController::dropAllTour();
     ?>
    </div>
  </div>
  <!--====  End of MY TOURS CREATED  ====-->
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
==============================--> <?php include 'view/links/footer_common.php'; ?> <script>
    $(document).ready(function() {
      $('#mytours').DataTable();
    });
  </script>
  <!--====  End of SCRIPTS  ====-->
</body>

</html>
