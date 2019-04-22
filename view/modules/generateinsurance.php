<?php  
error_reporting(0);
 session_start();
    if(!$_SESSION['validar']){
      print "<script>window.location='index';</script>";
      exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
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
  

  
<!--==========================
=            GENERATEINSURANCE            =
===========================-->

  <div class="site-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary">Adjunta una foto grupal</h2>
            <p class="color-black-opacity-5">Lorem Ipsum Dolor Sit Amet</p>
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
                $getAllAccepted= new BookingController();
                $getAllAccepted->getAllAccepted($id);//variable $id came from header.php 
                // var_dump($getAllAccepted);

                     
             ?>

            <form action="#" method="post" class="p-5 bg-white">                           
              <p>Esta foto grupal con los turistas servirá para hacer validar tu seguridad y la de los turistas/viajeros ante cualquier situación de terceros que pueda suceder, observa que puedes elegir únicamente los tours que haz aceptado realizar</p>
              <hr>              


              <p class="mb-2 font-weight-bold">Tour al que pertenece esta imagen</p>
                <div class="form-group">
                  <div class="select-wrap">
                      <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                      <select class="form-control" name="tour" id="tour" required>                        
                        <option value="" disabled selected>Eija un tour para validar</option>
                              <?php
                              foreach ($getAllAccepted->getAllAccepted($id) as $key => $value) {
                                ?>
                                <option value="<?php echo $value['booking_id']; ?>"><?php echo $value["booking_tour_date"]." ".$value["tour_schedule_start_at"]." ".$value['tour_name']; ?></option>
                              <?php }
                              if (!isset($value['booking_id'])) {
                                echo '<option value="" disabled>No haz aceptado alguno</option>';
                              } ?>                                                             
                      </select>
                    </div>
                </div>       


             <p class="mb-2 font-weight-bold">Adjunta la foto grupal</p>
              <div class="form-group">
                 <input type="file" class="form-control" id="securitypicture" id="securitypicture" name="securitypicture" >
              </div>
              <br>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Adjuntar" id="btnupdate" class="btn btn-primary py-2 px-4 text-white">
                </div>
              </div>

         


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
            <h2 class="font-weight-light text-primary">Mis tours que he aceptado</h2>
            <p class="color-black-opacity-5">Lorem Ipsum Dolor Sit Amet</p>
          </div>
        </div>        
      </div>
    </div>

  
<div class="container">
  
    <div class="row">
      <div class="col-md-12">
 
        <p>Aquí encontrarás la lista de todos los tours que haz decidido dar a los turistas/viajeros</p>

        <table id="toursaccepted" class="table table-bordered table-striped dt-responsive nowrap">
          <thead>
            <tr>
             <th>Lugar</th>
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
                 $getAllUnaccepted= new BookingController();
                 $getAllUnaccepted->getAllAccepted($id);//variable $id came from header.php            
                foreach($getAllUnaccepted->getAllAccepted($id) as $row => $value){ 
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
            <h2 class="font-weight-light text-primary">Mis tours que he informado</h2>
            <p class="color-black-opacity-5">Lorem Ipsum Dolor Sit Amet</p>
          </div>
        </div>        
      </div>
    </div>

    <div class="container">
      
        <div class="row">
          <div class="col-md-12">
     
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque consequatur enim possimus quas, tempora eveniet nihil delectus eum fugiat ut inventore sequi placeat, qui accusamus dolor atque explicabo? Necessitatibus, eum.</p>

                      <table id="toursreported" class="table table-striped table-bordered dt-responsive nowrap">
                          <thead>
                            <tr>                                                        
                                <th>Lugar</th>
                                <th>Estatus</th>
                                <th>Fecha de reporte</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                          <tbody>
                              <tr>
                                  
                                  <td>lorem</td>                
                                  <td>lorem</td>
                                  <td>lorem</td>
                                  <td style="width:100px;">
                                        <form action="" method="POST">    
                                          <a href="" class="btn btn-warning btn-xs">Modificar</a> 
                                          <button class="btn btn-danger btn-xs" type="submit">Eliminar</button>
                                        </form>
                                      </td>
                              </tr>
                              <tr>                                  
                                  <td>lorem</td>                
                                  <td>lorem</td>
                                  <td>lorem</td>
                                  <td style="width:100px;">
                                        <form action="" method="POST">    
                                          <a href="" class="btn btn-warning btn-xs">Modificar</a> 
                                          <button class="btn btn-danger btn-xs" type="submit">Eliminar</button>
                                        </form>
                                      </td>
                              </tr>
                          </tbody>
                      </table><!-- .table--> 


  
          </div>
          
        </div>
    </div>

<!--====  End of TOURS REPORTED  ====-->




<!--==========================
=            FAQS            =
===========================-->

  <div class="site-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary">Preguntas frecuentes</h2>
            <p class="color-black-opacity-5">Lorem Ipsum Dolor Sit Amet</p>
          </div>
        </div>


        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="border p-3 rounded mb-2">
              <a data-toggle="collapse" href="#collapse-1" role="button" aria-expanded="false" aria-controls="collapse-1" class="accordion-item h5 d-block mb-0">How to list my item?</a>

              <div class="collapse" id="collapse-1">
                <div class="pt-2">
                  <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti esse voluptates deleniti, ratione, suscipit quam cumque beatae, enim mollitia voluptatum velit excepturi possimus odio dolore molestiae officiis aspernatur provident praesentium.</p>
                </div>
              </div>
            </div>

            <div class="border p-3 rounded mb-2">
              <a data-toggle="collapse" href="#collapse-4" role="button" aria-expanded="false" aria-controls="collapse-4" class="accordion-item h5 d-block mb-0">Is this available in my country?</a>

              <div class="collapse" id="collapse-4">
                <div class="pt-2">
                  <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti esse voluptates deleniti, ratione, suscipit quam cumque beatae, enim mollitia voluptatum velit excepturi possimus odio dolore molestiae officiis aspernatur provident praesentium.</p>
                </div>
              </div>
            </div>

            <div class="border p-3 rounded mb-2">
              <a data-toggle="collapse" href="#collapse-2" role="button" aria-expanded="false" aria-controls="collapse-2" class="accordion-item h5 d-block mb-0">Is it free?</a>

              <div class="collapse" id="collapse-2">
                <div class="pt-2">
                  <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti esse voluptates deleniti, ratione, suscipit quam cumque beatae, enim mollitia voluptatum velit excepturi possimus odio dolore molestiae officiis aspernatur provident praesentium.</p>
                </div>
              </div>
            </div>

            <div class="border p-3 rounded mb-2">
              <a data-toggle="collapse" href="#collapse-3" role="button" aria-expanded="false" aria-controls="collapse-3" class="accordion-item h5 d-block mb-0">How the system works?</a>

              <div class="collapse" id="collapse-3">
                <div class="pt-2">
                  <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti esse voluptates deleniti, ratione, suscipit quam cumque beatae, enim mollitia voluptatum velit excepturi possimus odio dolore molestiae officiis aspernatur provident praesentium.</p>
                </div>
              </div>
            </div>
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