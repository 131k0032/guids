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
             <th>Lugar</th>
              <th>Día</th>                        
              <th>Tour</th>
              <th>Imagen</th>
              <th>Duración</th>
              <th>Capacidad</th>
              <th>Fecha creación del tour</th>
              <th>Idioma para el tour</th>
              <th>Acciones</th>

            </tr>
          </thead>

          <tbody>          
          <?php 
            $getAllById= new TourController();
            $getAllById->getAllById($id);//variable $id came from header.php            

            foreach($getAllById->getAllById($id) as $row => $value){ 
          ?>
            <tr>
              <td><?php echo utf8_encode(($value["tour_schedule_id"])); ?></td>
              <td><?php echo utf8_encode(($value["tour_start_at"])); ?></td>
              <td><?php echo utf8_encode($value["day_name"]); ?></td>                                                                                  
              <td><?php echo utf8_encode($value["tour_name"]); ?></td>                    
              <td>            
                 <div class="listing-image">
                <img src="http://localhost/guids/<?php echo $value["tour_image_src"]. $value["tour_image_filename"];?>" alt="Image" class="img-fluid img-thumbnail card-img-top">
              </div>
              </td>                    
              <td><?php echo $value["tour_duration"]; ?></td>
              <td><?php echo $value["tour_capacity"]; ?> persona(s)</td>
              <td><?php echo $value["tour_created_at"]; ?></td>
              <td><?php echo utf8_encode($value["language_name"]); ?></td>            
              <td style="width:300px;">
                    <form method="post">    
                      <!-- <a href="" class="btn btn-warning btn-xs">Modificar</a> -->
                        <li><a href="http://localhost/guids/mytours-setting/tour/<?php echo $value["tour_id"];?>" class="btn btn-warning btn-xs"><i class="icon-settings"></i></a></li> 
                        <li><a data-toggle="modal" data-target="#exampleModalCenter<?php echo $value["tour_id"];?>" class="btn btn-danger btn-xs"><i class="icon-trash"></i></a></li> 
                      <!-- <button class="btn btn-danger btn-xs" type="submit">Eliminar</button> -->
                    </form>
                  </td>
 
            </tr>     
              
              <!-- Modal -->            
                <div class="modal fade" id="exampleModalCenter<?php echo $value["tour_id"];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">¿Seguro deseas eliminar el tour <?php echo $value["tour_name"];?> ?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form method="post">
                        <div class="modal-body">
                          <input type="hidden" name="id" value="<?php echo $value["tour_id"] ?>">
                          <p class="color-black-opacity-5">Se eliminará el tour <?php echo $value["tour_name"]; ?></p>                       
                        </div>
                        <div class="modal-footer">                        
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
                            <!-- <button type="submit" class="btn btn-danger">Eliminar</button> -->
                            <input type="submit" value="Eliminar" id="btnupdate" class="btn btn-danger py-2 px-4 text-white" >
                                 <?php 
                                  $deleteTour= new TourController();
                                  $deleteTour->del();
                                 ?>                        
                        </div>
                      </form>
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
<!--====  End of MY TOURS CREATED  ====-->


  


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
      $('#mytours').DataTable();
      } );
  </script>

<!--====  End of SCRIPTS  ====-->

  </body>
</html>