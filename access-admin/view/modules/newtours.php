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
  <title>Nuevos tours</title>
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
  

<!--=====================================
=            MY TOURS CREATED            =
======================================-->

<div class="site-section">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-7 text-center border-primary">
        <h2 class="font-weight-light text-primary">Nuevos tours en el sitio</h2>
        <p class="color-black-opacity-5">Nuevos registros</p>
      </div>
    </div>        
  </div>
</div>


<div class="container">
  
    <div class="row">
      <div class="col-md-12">
 
        <p>Se muestra la lista de tours que se han registrado en Guids.mx, mas si embargo no pueden ser visibles al público, hasta que le des activar.</p>

        <table id="newusers" class="table table-bordered table-striped dt-responsive nowrap">
          <thead>
            <tr>
              <th>Id</th>
              <th>Nombre</th>
              <th>Descripción</th>                        
              <th>Como me enuentran</th>
              <th>Lugar del tour</th>
              <th>Duración de tour</th>
              <th>Cantidad de personas</th>
              <th>Estatus</th>
              <th>Creado el</th>
              <th>Creado por</th>              
              <th>Foto </th>
              <th>Activo</th>
              <th>Actualizado el</th>
              <th>Actualizado el</th>
              <th>Activar</th>

            </tr>
          </thead>

          <tbody>          
          <?php           
            $getAll=TourModel::getAllInactive("tour");      

            foreach($getAll as $row => $value){ 
          ?>
            <tr>
              <td><?php echo utf8_encode(($value["tour_id"])); ?></td>
              <td><?php echo utf8_encode(($value["tour_name"])); ?></td>              
              <td><?php echo utf8_encode($value["tour_description"]); ?></td>
              <td><?php echo utf8_encode($value["tour_find_guide"]); ?></td>                                                                                                                    
              <td><?php echo utf8_encode($value["tour_location"]); ?></td>  
              <td><?php echo utf8_encode($value["tour_duration"]); ?></td>  
              <td><?php echo utf8_encode($value["tour_capacity"]); ?></td> 
              <td><?php echo utf8_encode($value["tour_status"]); ?></td> 
              <td><?php echo utf8_encode($value["tour_created_at"]); ?></td>  
              <td><?php echo utf8_encode($value["user_name"]." ".$value["user_lastname"]); ?></td>                        
                                    
              <td>            
                <div class="listing-image" style="max-width:20%; max-height: 20%;">
                  <img src="http://localhost/guids/<?php echo $value["tour_image_src"]. $value["tour_image_filename"];?>" alt="Image" class="img-fluid img-thumbnail card-img-top">
              </div>
              </td> 
              <td>
                <?php if($value["tour_is_active"]==0){ ?>
                  <?php echo "Requiere activación"; ?>
                <?php }else{ ?>
                  <?php echo "Activo"; ?>
                <?php } ?>
              </td>  
              <td><?php echo utf8_encode($value["tour_created_at"]); ?></td> 
              <td><?php echo utf8_encode($value["tour_updated_at"]); ?></td>          
              <td style="width:300px;">
                    <form method="post">    
                      <!-- <a href="" class="btn btn-warning btn-xs">Modificar</a> -->
                        <!-- <li><a href="http://localhost/guids/access-admin/accept/user/id/<?php echo $value["id"];?>" class="btn btn-success btn-xs"><i class="icon-settings"></i></a></li>  -->
                        <li><a data-toggle="modal" data-target="#exampleModalCenter<?php echo $value["tour_id"];?>" class="btn btn-warning btn-xs"><i class="icon-check-circle"></i></a></li> 
                      <!-- <button class="btn btn-danger btn-xs" type="submit">Eliminar</button> -->
                    </form>
              </td>
 
            </tr>     
              
              <!-- Modal -->            
                <div class="modal fade" id="exampleModalCenter<?php echo $value["tour_id"];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">¿Haz verificado el tour <?php echo $value["tour_name"];?> ?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form method="post">
                        <div class="modal-body">
                          <input type="hidden" name="id" value="<?php echo $value["id"] ?>">
                          <p class="color-black-opacity-5">El tour <?php echo $value["name"];?> podrá aparecer en Guids.mx</p>                       
                        </div>
                        <div class="modal-footer">                        
                            <button type="button" class="btn btn-info" data-dismiss="modal">Ahora no</button>
                            <!-- <button type="submit" class="btn btn-danger">Eliminar</button> -->
                            <input type="submit" value="Confirmar" id="btnupdate" class="btn btn-success py-2 px-4 text-white" >
                                 <!-- <?php 
                                  $deleteTour= new TourController();
                                  $deleteTour->del();
                                 ?>                         -->
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
      $('#newusers').DataTable();
      } );
  </script>

<!--====  End of SCRIPTS  ====-->


  </body>
</html>