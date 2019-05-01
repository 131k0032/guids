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
  include "view/languages/es.php";
}


# ======  End of Language validation  =======
?>

<!DOCTYPE html>
<html lang="en">
  <title>Bookings</title>
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


$dataJson = array();
$getBookinsData = BookingController::getBookinsData($id);
// echo "<br>getBookin Obtiene: <br>";
// var_dump($getBookinsData);

 ?>

  <!--===========================================
  =            RESERVATIONS CALENDAR            =
  ============================================-->
  <div class="site-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary">Calendario de reservaciones</h2>
            <p class="color-black-opacity-5">Lorem Ipsum Dolor Sit Amet</p>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
        <div class="row">
          <div class="col-md-12">
            <p>Mira de manera general en este calendario todos los tour que te han sido solicitados por los turistas y viajeros</p><br>
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
        <h2 class="font-weight-light text-primary">Aceptar turistas/viajeros</h2>
        <p class="color-black-opacity-5">Lorem Ipsum Dolor Sit Amet</p>
      </div>
    </div>
  </div>
</div>


<div class="container">

    <div class="row">
      <div class="col-md-12">

        <p>Aquí encontrarás la lista de tours que te han solicitado por turistas y viajeros, es necesario aceptarlos para poder darle seguimiento al tour que te han solicitado, y además de que podrás obtener información de contacto y sobre todo para verificar que el tour se hará, esto en la sección <a target="_blank" href="http://localhost/guids/generateinsurance/user/<?php echo $id; ?>">Generar seguro grupal</a></p>

        <table id="mytours" class="table table-bordered table-striped dt-responsive nowrap">
          <thead>
            <tr>
             <th>Tour</th>
              <th>Reservación de</th>
              <th>Asistirán</th>
              <th>Fecha y hora</th>
              <th>Acciones</th>

            </tr>
          </thead>

          <tbody>
            <?php
                foreach($getBookinsData AS $row => $value){
                  //generate json
                  $name=utf8_encode($value["tour_name"]);
                  $date=$value["booking_date"]." ".substr($value["schedule_start"],0,5).":00";
                  $start=strtotime("Y-m-d H:i:s", $date);
                  echo $name." -> ".$date." -> ".date("Y-m-d H:i:s",$start)." -> ".$end."<br>";
                } ?>


            <tr>
              <td><?php echo utf8_encode($value["tour_name"]); ?></td>
              <td><a href="<?php echo "mailto:".$value["bookin_email"]; ?>"> <?php echo $value["booking_name"]." ".$value["booking_lastname"]; ?></a></td>
              <td><?php echo $value["booking_quantyty"]." de ".$value["tour_capacity"]; ?></td>
              <td><?php echo $value["booking_date"]." ".$value["schedule_start"]; ?></td>
              <td style="width:100px;">

                      <a style="color: white"; data-toggle="modal" data-target="#acceptBookingModal<?php echo $value["booking_id"];?>" class="btn btn-info btn-xs">Aceptar</a>

                  </td>

            </tr>

              <!-- Modal -->
                <div class="modal fade" id="acceptBookingModal<?php echo $value["booking_id"];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">¿Aceptar el tour <?php echo utf8_encode($value["tour_name"]);?> ?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form method="post">
                      <div class="modal-body">
                        <input type="hidden" name="booking_id" value="<?php echo $value["booking_id"] ?>">
                        <p class="color-black-opacity-5">Después de aceptar podrás ver la la información de contacto, tendrás que validar el tour <?php echo utf8_encode($value["tour_name"]);?> , este tour lo solicita <?php echo $value["booking_name"]." ".$value["booking_lastname"]; ?></p>
                      </div>
                      <div class="modal-footer">
                          <button style="color: white"; type="button" class="btn btn-warning" data-dismiss="modal">Ahora no</button>
                          <!-- <button type="submit" class="btn btn-danger">Eliminar</button> -->
                          <input type="submit" value="De acuerdo" id="btnupdate" class="btn btn-success py-2 px-4 text-white" >
                               <?php
                                $acceptTour = new BookingController();
                                $acceptTour->acceptTour();

                               ?>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>

                <!-- End of Modal -->
            <?php //} ?>
          </tbody>
        </table>



      </div>

    </div>
</div>
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



  <?php
    $json_encode="Tours Zona arqueológica";
    $json_encode_two="2019-04-12T22:30:00";
    $json_encode_three="2019-04-12T23:30:00";
   ?>

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
      editable: false,
      eventLimit: true, // allow "more" link when too many events
      events: [
        {
          title:<?php echo json_encode($json_encode)?>,
          start: <?php echo json_encode($json_encode_two)?>,
          end: <?php echo json_encode($json_encode_three)?>,
        },
        {
          title: 'Long Event',
          start: '2019-04-07',
          end: '2019-04-10'
        },
        {
          groupId: 999,
          title: 'Repeating Event',
          start: '2019-04-09T16:00:00'
        },
        {
          groupId: 999,
          title: 'Repeating Event',
          start: '2019-04-16T16:00:00'
        },
        {
          title: 'Conference',
          start: '2019-04-11',
          end: '2019-04-13'
        },
        {
          title: 'Meeting',
          start: '2019-04-12T10:30:00',
          end: '2019-04-12T12:30:00'
        },
        {
          title: 'Lunch',
          start: '2019-04-12T12:00:00'
        },
        {
          title: 'Meeting',
          start: '2019-04-12T14:30:00'
        },
        {
          title: 'Happy Hour',
          start: '2019-04-12T17:30:00'
        },
        {
          title: 'Dinner',
          start: '2019-04-12T20:00:00'
        },
        {
          title: 'Birthday Party',
          start: '2019-04-13T07:00:00'
        },
        {
          title: 'Click for Google',
          url: 'http://google.com/',
          start: '2019-04-28'
        }
      ]
    });


        calendar.render();
      });

  </script>

<!--====  End of SCRIPTS  ====-->



   <script>
      $(document).ready(function() {
        $('#mytours').DataTable();
        } );
    </script>
  </body>
</html>
