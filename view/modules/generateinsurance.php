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
  <title><?php echo $lang["Generar seguro"]; ?></title>
  <?php include 'view/links/head_common.php'; ?>
  
  <!--====  End of Head common  ====-->
  
  <body>
  

  <!--============================
  =            HEADER            =
  =============================-->
  <?php include 'view/modules/header/header.php'; ?>     
  <!--====  End of HEADER  ====-->
  

  
<!--==========================
=            GENERATEINSURANCE            =
===========================-->

  <div class="site-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary"><?php echo $lang["Adjunta una foto grupal"]; ?></h2>
            <p class="color-black-opacity-5"><?php echo $lang["Toma una foto con los turistas/viajeros antes de tour"]; ?></p>
          </div>
        </div>

           <div class="row justify-content-center">
          <div class="col-md-8">
            
            <?php 
              // Way 1 to access by id when de result is onli one
                // $getAllAccepted=BookingModel::getAllAccepted("booking", $url[2]);                 
                // var_dump($getAllAccepted);
              //Way 2 to access by id using the $id url when the result is more of one
            // echo $id;
                $getAllNullAccepted= new BookingController();
                $getAllNullAccepted->getAllNullAccepted($id);//variable $id came from header.php 
                // var_dump($getAllAccepted);

                     
             ?>

    <form  method="post" enctype="multipart/form-data" id="picture">                           
              <p><?php echo $lang["Esta foto grupal con los turistas servirá para hacer validar tu seguridad y la de los turistas/viajeros ante cualquier situación de terceros
que pueda suceder, observa que puedes elegir únicamente los tours que haz aceptado realizar"]; ?></p>
              <hr>              


              <p class="mb-2 font-weight-bold"><?php echo $lang["Tour al que pertenece esta imagen"]; ?></p>
              <style>
                form label.error {
                  float: right;
                  color: #f23a2e;
                  font-weight:bold;
                  font-size: 12px 
                  /*vertical-align: top;*/
                }
              </style>
                <div class="form-group">
                  <div class="select-wrap">
                      <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                      <select class="form-control" name="booking_id" id="booking_id" required>                        
                        <option value="" disabled selected><?php echo $lang["Elija un tour para validar"]; ?></option>
                              <?php
                              foreach ($getAllNullAccepted->getAllNullAccepted($id) as $key => $value) {
                                ?>
                                <option value="<?php echo $value['booking_id']; ?>"><?php echo $value["booking_tour_date"]." ".$value["tour_schedule_start_at"]." ".$value['tour_name']; ?></option>
                              <?php }
                              if (!isset($value['booking_id'])) {
                                echo '<option value="" disabled>No haz aceptado alguno</option>';
                              } ?>                                                             
                      </select>
                    </div>
                </div>       


             <p class="mb-2 font-weight-bold"><?php echo $lang["Adjunta la foto grupal"]; ?></p>
              <div class="form-group">
                 <input type="file" class="form-control" id="src" id="src" name="src" accept="image/*">
              </div>
              <br>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="<?php echo $lang["Adjuntar"] ?>" id="btnupdate" class="btn btn-primary py-2 px-4 text-white">
                </div>
              </div>
              <?php 
                $fileValidateTour= new BookingController();
                $fileValidateTour->fileValidateTour();

               ?>
         


            </form>
          </div>
          
        </div>
        
      </div>
    </div>

<!--====  End of GENERATEINSURANCE  ====-->

<!--====================================
=            TOURS ACCEPTED            =
=====================================-->


  <div class="site-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary"><?php echo $lang["Tours que has aceptado"]; ?></h2>
            <p class="color-black-opacity-5"><?php echo $lang["Tours que vas a realizar"]; ?></p>
          </div>
        </div>        
      </div>
    </div>

  
<div class="container">
  
    <div class="row">
      <div class="col-md-12">
 
        <p><?php echo $lang["Aquí encontrarás la lista de todos los tours que haz decidido dar a los turistas/viajeros"]; ?></p>

        <table id="toursaccepted" class="table table-bordered table-striped dt-responsive nowrap">
          <thead>
            <tr>
             <th><?php echo $lang["Lugar"]; ?></th>
              <th><?php echo $lang["Reserva"]; ?></th>                        
              <th><?php echo $lang["Correo"]; ?></th>  
              <th><?php echo $lang["Teléfono"]; ?></th>  
              <th><?php echo $lang["Asistirán"]; ?></th>                      
              <th><?php echo $lang["Fecha y hora"]; ?></th>              
              <!-- <th>Acciones</th> -->

            </tr>
          </thead>

          <tbody>
            <?php 
                 $getAllAccepted= new BookingController();
                 $getAllAccepted->getAllAccepted($id);//variable $id came from header.php            
                foreach($getAllAccepted->getAllAccepted($id) as $row => $value){ 
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
            <h2 class="font-weight-light text-primary"><?php echo $lang["Tours que has reportado"]; ?></h2>
            <p class="color-black-opacity-5"><?php echo $lang["Tours validados"]; ?></p>
          </div>
        </div>        
      </div>
    </div>

  
<div class="container">
  
    <div class="row">
      <div class="col-md-12">
 
        <p><?php echo $lang["Aquí encontrarás la lista de todos los tours que haz reportado y validado con una foto a los administradores del sitio"]; ?></p>

        <table id="toursreported" class="table table-bordered table-striped dt-responsive nowrap">
          <thead>
            <tr>
              <th><?php echo $lang["Lugar"]; ?></th>
              <th><?php echo $lang["Reserva"]; ?></th>                        
              <th><?php echo $lang["Personas que dijeron ir al tour"]; ?></th>
              <th><?php echo $lang["Imagen de verificación"]; ?></th>  
              <th><?php echo $lang["Realización del tour"]; ?></th>  
              <th><?php echo $lang["Imagen enviado"]; ?></th>                
              <!-- <th>Acciones</th> -->

            </tr>
          </thead>

          <tbody>
            <?php 
                 $getAllReported= new BookingController();
                 $getAllReported->getAllReported($id);//variable $id came from header.php            
                foreach($getAllReported->getAllReported($id) as $row => $value){ 
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
                        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $lang["Imagen enviado"]; ?></h5>
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
                          <button style="color: white"; type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $lang["Cerrar"]; ?></button>
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
<!-- validation -->
<script>
  $().ready(function() {
  $("#picture").validate({
  rules: {
    booking_id: { 
      required:true,       
    },
    src: { 
      required:true,         
    },

  },
  messages: {
    booking_id : "<?php echo $lang["Es necesario elegir un tour."] ?>",    
    src : "<?php echo $lang["Imagen es requerida."] ?>",
  }
  });
  });
</script>
<!-- end validation -->
<!--====  End of SCRIPTS  ====-->
      

  </body>
</html>