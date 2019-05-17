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
<html lang="en">
  <!--=================================
  =            Head common            =
  ==================================-->
  <title>Generate insurance</title>
  <?php include 'view/links/head_common.php'; ?>
  
  <!--====  End of Head common  ====-->
  
  <body>
  

  <!--============================
  =            HEADER            =
  =============================-->
  <?php include 'view/modules/header/header.php'; ?>     
  <!--====  End of HEADER  ====-->
  

  


<!--====================================
=            TOURS ACCEPTED            =
=====================================-->


  <div class="site-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary">Tours aceptados por guías</h2>
            <p class="color-black-opacity-5">Lorem Ipsum Dolor Sit Amet</p>
          </div>
        </div>        
      </div>
    </div>

  
<div class="container">
  
    <div class="row">
      <div class="col-md-12">
 
        <p>Aquí encontrarás la lista de todos los tours que los guías han aceptado pero que no han validado</p>

        <table id="toursaccepted" class="table table-bordered table-striped dt-responsive nowrap">
          <thead>
            <tr>
             <th>Nombre del tour</th>
              <th>Reserva</th>                        
              <th>Email</th>  
              <th>Teléfono</th>  
              <th>Asistirán</th>                      
              <th>Fecha y hora</th>              
              <!-- <th>Acciones</th> -->

            </tr>
          </thead>

          <tbody>
            <?php 
                 $getAllAccepted= new BookingController();
                 $getAllAccepted->getAllAccepted();//variable $id came from header.php            
                foreach($getAllAccepted->getAllAccepted() as $row => $value){ 
             ?>
            <tr>                            
              <td><?php echo $value["tour_name"]; ?></td>                
              <td><?php echo $value["booking_tourist_name"]." ".$value["booking_tourist_lastname"]; ?></td>                
              <td><?php echo $value["booking_tourist_email"]; ?></td>
              <td><?php echo $value["booking_tourist_phone"]; ?></td>
              <td><?php echo $value["booking_tourist_quantyty"]; ?></td>                              
              <td><?php echo $value["booking_tour_date"]." ".$value["tour_schedule_start_at"]; ?></td>
    <!--           <td style="width:100px;">
                    <form action="" method="POST">    
                      <a href="" class="btn btn-warning btn-xs">Aceptar</a> 
                      <a href="" class="btn btn-warning btn-xs">Posponer</a>                       
                      <button class="btn btn-danger btn-xs" type="submit">Eliminar</button>
                    </form>
                  </td> -->
 
            </tr>

            <?php } ?>
          </tbody>
        </table>



      </div>
      
    </div>
</div>
<!--====  End of TOURS ACCEPTED  ====-->




<!--====================================
=            TOURS REPORTED            =
=====================================-->

 
  <div class="site-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary">Tours reportados por guías</h2>
            <p class="color-black-opacity-5">Lorem Ipsum Dolor Sit Amet</p>
          </div>
        </div>        
      </div>
    </div>

  
<div class="container">
  
    <div class="row">
      <div class="col-md-12">
 
        <p>Aquí encontrarás la lista de todos los tours que los guías han reportado y validado con una foto</p>

        <table id="toursreported" class="table table-bordered table-striped dt-responsive nowrap">
          <thead>
            <tr>
              <th>Nombre del tour</th>
              <th>Reservó</th>                        
              <th>Cantidad de personas</th>
              <th>Imagen de verificación</th>  
              <th>Fecha del tour</th>  
              <th>Fecha de reportado</th>                
              <!-- <th>Acciones</th> -->

            </tr>
          </thead>

          <tbody>
            <?php 
                 $getAllReported= new BookingController();
                 $getAllReported->getAllReported();//variable $id came from header.php            
                foreach($getAllReported->getAllReported() as $row => $value){ 
             ?>
            <tr>                            
              <td><?php echo $value["tour_name"]; ?></td>                
              <td><?php echo $value["booking_tourist_name"]." ".$value["booking_tourist_lastname"]; ?></td>                
              <td><?php echo $value["booking_tourist_quantyty"]; ?></td>
              <td>
                <div class="listing-image" style="max-width:20%; max-height: 20%;" >
                  <img src="http://localhost/guids/<?php echo $value["booking_tourist_src"]. $value["booking_tourist_file_name"];?>" alt="Image" class="img-fluid img-thumbnail card-img-top">

                    <a style="color: white"; data-toggle="modal" data-target="#seeImageModal<?php echo $value["booking_id"];?>" class="btn btn-info btn-sm icon-eye"></a> 
                </div>
              </td>
              <td><?php echo $value["booking_tour_date"]; ?></td>
              <td><?php echo $value["booking_updated_at"]; ?></td>
            </tr>
            
               <!-- Modal -->            
                <div class="modal fade" id="seeImageModal<?php echo $value["booking_id"];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Imagen enviada</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>                      
                      <div class="modal-body">                        
                        <p class="color-black-opacity-5">
                          <div class="listing-image" style="max-width:100%; max-height: 100%;" >
                            <img src="http://localhost/guids/<?php echo $value["booking_tourist_src"]. $value["booking_tourist_file_name"];?>" alt="Image" class="img-fluid img-thumbnail card-img-top">                              
                          </div>
                      </div>
                      <div class="modal-footer">                        
                          <button style="color: white"; type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                      </div>                      
                    </div>
                  </div>
                </div>
           
                <!-- End of Modal -->


            <?php } ?>
          </tbody>
        </table>



      </div>
      
    </div>
</div>
<!--====  End of TOURS REPORTED  ====-->




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

<script>
    $(document).ready(function() {
      $('#toursaccepted').DataTable();
      } );
  </script>


<script>
    $(document).ready(function() {
      $('#toursreported').DataTable();
      } );
  </script>

<!--====  End of SCRIPTS  ====-->
      

  </body>
</html>