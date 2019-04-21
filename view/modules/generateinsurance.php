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
              

            <form action="#" method="post" class="p-5 bg-white">                           
              <p>Este servirá para hacer validar tu seguridad y la de los turistas/viajeros ante cualquier situación de terceros que pueda suceder</p>                            

        
              <hr>              


              <p class="mb-2 font-weight-bold">Tour al que pertenece esta imagen</p>
                <div class="form-group">
                  <div class="select-wrap">
                      <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                      <select class="form-control" name="tour" id="tour">                        
                        <option value="">Elija</option>                                        
                        <option value="">Ruinas de Tulum</option>                                                                
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
      $('#toursreported').DataTable();
      } );
  </script>

<!--====  End of SCRIPTS  ====-->
      

  </body>
</html>