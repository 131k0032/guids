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

$language = new LanguageController();
require_once "view/languages/".$language->validate().".php";//include lang

$acceptTour = BookingController::acceptTour();
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
  <?php
$jsonData = BookingController::getBookingsCalendar($id);
?>
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

$getBookinsData = BookingController::getBookingsDataTable($id);

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
          foreach ($getBookinsData as $key => $BookingTable) {
            echo "<tr>";
            echo "<td><a name='".$BookingTable["tour_id"]."'>".$BookingTable["tour_name"]."<br>".$BookingTable["tour_duration"]."</td>";
            echo "<td>".$BookingTable["booking_name"]." ".$BookingTable["booking_lastname"]."</td>";
            echo "<td>".$BookingTable["booking_quantyty"]." ".$lang["de"]." ".$BookingTable["tour_capacity"]."</td>";
            echo "<td>".$BookingTable["booking_date"]." ".$lang["a la(s)"]." ".$BookingTable["schedule_start"]."</td>";
            echo "<td><a style='color:white', data-toggle='modal' data-target='#acceptBookingModal".$BookingTable["tour_id"]."' class='btn btn-info btn-xs'>Aceptar</td>";
            echo "</tr>";
          } ?>
      </tbody>
    </table>
    </div>
  </div>
</div>
<!-- Modal -->
<?php
foreach ($getBookinsData as $key => $BookingModal) { ?>
<div class="modal fade" id="acceptBookingModal<?php echo $BookingModal["tour_id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">¿<?php echo $lang["Aceptar el tour"]; ?> <?php echo $BookingModal["tour_name"]; ?>?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post">
      <div class="modal-body">
        <input type="hidden" name="booking_id" value="<?php echo $BookingModal["tour_id"]; ?>">
        <!-- Tour data -->
        <input type="text" name="tour_name" value="<?php echo $BookingModal["tour_name"]; ?>">
        <input type="text" name="tour_location" value="<?php echo $BookingModal["tour_location"]; ?>">
        <input type="text" name="tour_start_in" value="<?php echo $BookingModal["tour_start_in"]; ?>">
        <input type="text" name="tour_find_guide" value="<?php echo $BookingModal["tour_find_guide"]; ?>">
        <!-- User guide info-->
        <input type="text" name="user_guide_name_confirm" value="<?php echo $name?>">
        <input type="text" name="user_guide_lastname_confirm" value="<?php echo $lastname?>">
        <input type="text" name="user_guide_phone_confirm" value="<?php echo $phone?>">
        <!-- Booking data -->
        <input type="text" name="booking_tourist_name" value="<?php echo $BookingModal["booking_name"]; ?>">
        <input type="text" name="booking_tourist_lastname" value="<?php echo $BookingModal["booking_lastname"]; ?>">
        <input type="text" name="booking_tourist_email" value="<?php echo $BookingModal["booking_email"]; ?>">        
        <input type="text" name="booking_tourist_quantyty" value="<?php echo $BookingModal["booking_quantyty"]; ?>">   
        <input type="text" name="booking_date" value="<?php echo $BookingModal["booking_date"]; ?>">           
        <!-- Schedule data -->
        <input type="text" name="schedule_start_at" value="<?php echo $BookingModal["schedule_start"]; ?>">

        <p class="color-black-opacity-2"><?php echo $lang["Después de aceptar el tour"]; ?> <b><?php echo $BookingModal["tour_name"]; ?></b> <?php echo $lang["podrás ver la información de contacto. Tendrás que validar el tour, que solicita"]; ?> <i><?php echo $BookingModal["booking_name"]." ".$BookingModal["booking_lastname"];  ?>.</i></p>
      </div>
      <div class="modal-footer">
          <button style="color: white"; type="button" class="btn btn-warning" data-dismiss="modal"><?php echo $lang["Ahora no"]; ?></button>
          <input type="submit" value="<?php echo $lang["De acuerdo"] ?>" id="btnupdate" class="btn btn-success py-2 px-4 text-white" >
      </div>
      </form>
    </div>
  </div>
</div>
<?php } ?>

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
