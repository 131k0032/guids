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
  <title>Tours confirmados</title>
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
        <h2 class="font-weight-light text-primary">Tours confirmados</h2>
        <p class="color-black-opacity-5">Tours que han sido revisados y confirmados</p>
      </div>
    </div>        
  </div>
</div>


<div class="container">
  
    <div class="row">
      <div class="col-md-12">
 
        <p>Se muestra la lista de tours que se han registrado en Guids.mx por usuarios y que son visibles a todo el mundo</p>

        <table id="confirmatedtours" class="table table-bordered table-striped dt-responsive nowrap">
          <thead>
            <tr>
              <th>Id</th>
              <th>Nombre</th>
              <th>Descripción</th>                        
              <th>Como me enuentran</th>
              <th>Lugar del tour</th>
              <th>Duración de tour</th>
              <th>Cantidad de personas</th>              
              <th>Creado el</th>
              <th>Creado por</th>              
              <th>Foto </th>
              <th>Tour activo</th>
              <th>Actualizado el</th>
              <th>Actualizado el</th>
              <th>Avisos</th>
              <th>Inhabilitar</th>
            </tr>
          </thead>

          <tbody>          
          <?php           
            $getAll=TourModel::getAllActive("tour");      

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
              <td><?php echo utf8_encode($value["tour_created_at"]); ?></td>  
              <td><?php echo utf8_encode($value["user_name"]." ".$value["user_lastname"]); ?></td>                        
                                    
              <td>            
                <div class="listing-image" style="max-width:20%; max-height: 20%;">
                  <img src="http://localhost/guids/<?php echo $value["tour_image_src"]. $value["tour_image_filename"];?>" alt="Image" class="img-fluid img-thumbnail card-img-top">
              </div>
              </td> 
              <td>
                <?php if($value["tour_is_active"]==0){ ?>
                  <?php echo "Inactivo, no aparece en Guids.mx"; ?>
                <?php }else{ ?>
                  <?php echo "Activo, aparece en Guids.mx"; ?>
                <?php } ?>
              </td>  
              <td><?php echo utf8_encode($value["tour_created_at"]); ?></td> 
              <td><?php echo utf8_encode($value["tour_updated_at"]); ?></td>          
              <td>
                <?php if($value["user_is_active"]==0){ ?>
                  <?php echo "Has inhabilitado a ". utf8_encode($value["user_name"]." ".$value["user_lastname"]). ", ¡Por favor deshabilita este tour que creó! "; ?>
                <?php }else{ ?>
                  <?php echo "Usuario activo, puede acceder a Guids.mx"; ?>
                <?php } ?>
              </td>
              <td style="width:300px;">
                    <form method="post">                         
                        <li><a data-toggle="modal" data-target="#exampleModalCenter<?php echo $value["tour_id"];?>" class="btn btn-danger btn-xs"><i class="icon-trash"></i></a></li>                       
                    </form>
              </td>
 
            </tr>     
              
              <!-- Modal -->            
                <div class="modal fade" id="exampleModalCenter<?php echo $value["tour_id"];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">¿Inhabilitar el tour <?php echo $value["tour_name"];?> ?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form method="post">
                        <div class="modal-body">                          
                          <input type="hidden" name="id_disable" value="<?php echo $value["tour_id"] ?>">
                          <!-- User data for send mail -->
                          <input type="hidden" name="name_disable" value="<?php echo $value["user_name"] ?>">
                          <input type="hidden" name="lastname_disable" value="<?php echo $value["user_lastname"] ?>">
                          <input type="hidden" name="email_disable" value="<?php echo $value["user_email"] ?>">
                          <p class="color-black-opacity-5">El tour <?php echo $value["tour_name"];?> no podrá aparecer más en Guids.mx</p>                       
                        </div>
                        <div class="modal-footer">                        
                            <button type="button" class="btn btn-info" data-dismiss="modal">Ahora no</button>
                            <!-- <button type="submit" class="btn btn-danger">Eliminar</button> -->
                            <input type="submit" value="Confirmar" id="btnupdate" class="btn btn-success py-2 px-4 text-white" >
                               <?php 
                                  $disable= new TourController();
                                  $disable->disable();
                                 ?>                          
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
           
                <!-- End of Modal -->


          <?php } ?>   
          <?php 
            $sendDisableMessage = new TourController();
            $sendDisableMessage->sendDisableMessage();
          ?>
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
      $('#confirmatedtours').DataTable();
      } );
  </script>

<!--====  End of SCRIPTS  ====-->


  </body>
</html>