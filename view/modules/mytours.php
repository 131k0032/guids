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
$language = new LanguageController();
require_once "view/languages/".$language->validate().".php";//include lang
# ======  End of Language validation  =======

?>
<!DOCTYPE html>
<html lang="en">
<!--=================================
  =            Head common            =
  ==================================-->
<title><?php echo $lang["Mis tours"]; ?></title>
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
          <h2 class="font-weight-light text-primary"><?php echo $lang["Mis tours que he creado"]; ?></h2>
          <p class="color-black-opacity-5"><?php echo $lang["Detalle de todos mis tours"]; ?></p>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <p><?php echo $lang["Aquí podrás observar de manera general y más a detalle todos los tours que haz creado en el sitio y que los administradores an decidido
aceptar. Cabe mencionar que si haz creado un tour y este aún no aparece, puede que esté aún en verificación."]; ?></p>
        <table id="mytours" class="table table-bordered table-striped dt-responsive nowrap">
          <thead>
            <tr>
              <th><?php echo $lang["ID"]; ?></th>
              <th><?php echo $lang["Nombre"]; ?></th>
              <th><?php echo $lang["Creado"]; ?></th>
              <th><?php echo $lang["Reservaciones"]; ?></th>
              <th><?php echo $lang["Ratings"]; ?></th>
              <th><?php echo $lang["Lugar del tour"]; ?></th>
              <th><?php echo $lang["Idioma"]; ?></th>
              <th><?php echo $lang["Mi(s) horario(s)"]; ?></th>
              <th><?php echo $lang["Acciones"]; ?></th>
            </tr>
          </thead>
          <tbody> <?php
            $getAllTourByUser = TourController::getAllToursByUser($id);
            foreach($getAllTourByUser as $row => $tourData){
              $countBookings = BookingController::GetCountBookinByTour($tourData["tour_id"]);
              $getAvgRating = TourController::getCountRatingByIdTour($tourData["tour_id"]);
              $getTourSchedule = TourController::getTourSchedule($tourData["tour_id"]);
              ?>
            <tr>
              <td><?php echo $tourData["tour_id"]; ?></td>
              <td>
                <a href="https://guids.mx/guideinfo/tour/<?php echo $tourData["tour_id"]; ?>" target="_blank">
                  <div class="listing-image" style="max-width:250px;">
                    <img src="<?php echo $tourData["tour_image_src"].$tourData["tour_image_file_name"];?>" alt="Image" class="img-fluid img-thumbnail card-img-top">
                  </div><?php echo utf8_encode($tourData["tour_name"]); ?>
                </a>
              </td>
              <td><?php echo utf8_encode($tourData["tour_created_at"])."<br>".($tourData["tour_active"]==1 ? "published" : "waiting" ) ?></td>
              <td><a href="https://guids.mx/bookings/#<?php echo $tourData["tour_id"]; ?>" target="_blank"><?php echo $countBookings["count"]; ?> bookings</a></td>
              <td><?php echo $getAvgRating["review_rating"]-1; echo " comments";?></td>
              <td><?php echo utf8_encode($tourData["tour_location"]); ?></td>
              <td><?php echo utf8_encode($getTourSchedule[0][2]); ?></td>
              <td><?php foreach ($getTourSchedule as $key => $schedule) {
                echo "<br>".utf8_encode($schedule["tour_date"])." at ".$schedule["tour_time"];} ?>
              </td>
              <td style="width:300px;">
                <form method="post">
                  <!-- <a href="" class="btn btn-warning btn-xs">Modificar</a> -->
                  <li><a href="http://localhost/guids/mytours-setting/tour/<?php echo $tourData["tour_id"];?>" class="btn btn-warning btn-xs"><i class="icon-settings"></i></a></li>
                  <li><a data-toggle="modal" data-target="#modalTourID<?php echo $tourData["tour_id"];?>" class="btn btn-danger btn-xs"><i class="icon-trash"></i></a></li>
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
              <h5 class="modal-title" style="font-weight:900;color:red;"><?php echo $lang["¿Seguro deseas eliminar este tour?"]; ?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post">
              <div class="modal-body">
                <input type="hidden" name="id" value="<?php echo $data["tour_id"] ?>">
                <p class="color-black-opacity-5"><?php echo $lang["¿Realmente desea eliminar el tour?:"]; ?> <i><?php echo $data["tour_name"]; ?>.</i><br>
                <?php echo $lang["Por favor escriba el identificador"]; ?> <code><?php echo $data["tour_id"] ?></code> <?php echo $lang["del tour para confirmar."]; ?></p>
                <input type="text" name="false" pattern="<?php echo $data["tour_id"] ?>" title="<?php echo $lang["Escribe el identificador, por favor."] ?>" required>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal"><?php echo $lang["Cancelar"]; ?></button>
                <input type="submit" value="<?php echo $lang["Eliminar"] ?>" id="btnupdate" class="btn btn-danger py-2 px-4 text-white">
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
