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

$lang = new LanguageController();
require_once "view/languages/".$lang->validate().".php";//include lang

# ======  End of Language validation  =======
?>

<!DOCTYPE html>
<html lang="en" style="scroll-behavior:smooth;">
  <title><?php echo $lang["Reservaciones"]; ?></title>
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




  <!--===========================================
  =            RESERVATIONS CALENDAR            =
  ============================================-->
  <div class="site-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary"><?php echo $lang["Calendario de reservaciones"]; ?></h2>
            <p class="color-black-opacity-5"><?php echo $lang["Verifica tu agenda"]; ?></p>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
        <div class="row">
          <div class="col-md-12">
            <p><?php echo $lang["Mira de manera general en este calendario todos los tour que te han sido solicitados por los turistas y viajeros."]; ?></p><br>
              <div id="calendar">

              </div>
          </div>
        </div>
    </div>

  <!--====  End of RESERVATIONS CALENDAR  ====-->



<!--=====================================
=            MY RESERVATIONS            =
======================================-->

<div class="site-section">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-7 text-center border-primary">
        <h2 class="font-weight-light text-primary"><?php echo $lang["Aceptar turistas/viajeros"]; ?></h2>
        <p class="color-black-opacity-5"><?php echo $lang["Confirmarlos puede ayudar a tener más ratings"]; ?></p>
      </div>
    </div>
  </div>
</div>

<?php
  $getBookinsData = BookingController::getBookinsData($id);
  $jsonData = array();
  foreach ($getBookinsData as $key => $value) { //foreach for calendar
    $date = new DateTime($value["booking_date"].substr($value["schedule_start"],0,5).":00");
    $fin = new DateTime($date->format("c"));
    $fin->add(new DateInterval("PT".substr($value["tour_duration"],0,1)."H".substr($value["tour_duration"],2,2)."M"));
    $url="http://localhost/guids/bookings/#".$value["tour_id"];
    //echo "title: ".$name.", start: ".$date->format("Y-m-d\TH:i:s").", end: ".$fin->format("Y-m-d\TH:i:s").", url: ".$url." <br>";
    $jsonData[] = array("title" => utf8_encode($value["tour_name"]), "start" => $date->format("Y-m-d\TH:i:s"), "end" => $fin->format("Y-m-d\TH:i:s"), "url" => $url);
  }

 ?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
    <p><?php echo $lang["Aquí encontrarás la lista de tours que te han solicitado por turistas y viajeros, es necesario aceptarlos para poder darle seguimiento al
tour que te han solicitado, y además de que podrás obtener información de contacto y sobre todo para verificar que harás el tour, esto en la
sección"]; ?> <a target="_blank" href="http://localhost/guids/generateinsurance/user/<?php echo $id; ?>"><?php echo $lang["Generar seguro grupal."]; ?></a></p>
    <table id="mytours" class="table table-bordered table-striped dt-responsive nowrap">
      <thead>
        <tr>
          <th>Tour</th>
          <th><?php echo $lang["Reservación de"]; ?></th>
          <th><?php echo $lang["Asistirán"]; ?></th>
          <th><?php echo $lang["Fecha y hora"]; ?></th>
          <th><?php echo $lang["Acciones"]; ?></th>
        </tr>
      </thead>
      <tbody>
          <?php
          foreach ($getBookinsData as $key => $value) {
            echo "<tr>";
            echo "<td><a name='".$value["tour_id"]."'>".utf8_encode($value["tour_name"])."</td>";
            echo "<td>".$value["booking_name"]." ".$value["booking_lastname"]."</td>";
            echo "<td>".$value["booking_quantyty"]." ".$lang["de"]." ".$value["tour_capacity"]."</td>";
            echo "<td>".$value["booking_date"]." ".$lang["a la(s)"]." ".$value["schedule_start"]."</td>";
            echo "<td><a style='color:white', data-toggle='modal' data-target='#acceptBookingModal".$value["tour_id"]."' class='btn btn-info btn-xs'>Aceptar</td>";
            echo "</tr>";
          } ?>
      </tbody>
    </table>
    </div>
  </div>
</div>
<!-- Modal -->
<?php
foreach ($getBookinsData as $key => $value) { ?>
<div class="modal fade" id="acceptBookingModal<?php echo $value["tour_id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">¿<?php echo $lang["Aceptar el tour"]; ?> <?php echo utf8_encode($value["tour_name"]); ?>?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post">
      <div class="modal-body">
        <input type="hidden" name="booking_id" value="">
        <p class="color-black-opacity-2"><?php echo $lang["Después de aceptar el tour"]; ?> <b><?php echo utf8_encode($value["tour_name"]); ?></b> <?php echo $lang["podrás ver la información de contacto. Tendrás que validar el tour, que solicita"]; ?> <i><?php echo $value["booking_name"]." ".$value["booking_lastname"];  ?>.</i></p>
      </div>
      <div class="modal-footer">
          <button style="color: white"; type="button" class="btn btn-warning" data-dismiss="modal"><?php echo $lang["Ahora no"]; ?></button>
          <input type="submit" value="<?php echo $lang["De acuerdo"] ?>" id="btnupdate" class="btn btn-success py-2 px-4 text-white" >
      </div>
      </form>
    </div>
  </div>
</div>
<?php }
$acceptTour = new BookingController();
$acceptTour->acceptTour();
?>

<!--====  End of MY RESERVATIONS  ====-->



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

  <script>
      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
          var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid', 'list' ],
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      defaultDate: '<?php echo date("Y-m-d") ?>',
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      events: <?php echo json_encode($jsonData); ?>
    });
        calendar.render();
      });
      $(document).ready(function() {
        $('#mytours').DataTable({
          "order":[[3, 'asc']]
        });
        } );
    </script>
  </body>
</html>