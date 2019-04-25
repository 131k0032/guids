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
  <title>Add tour</title>
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
        <h2 class="font-weight-light text-primary">Usuarios confirmados el sitio</h2>
        <p class="color-black-opacity-5">Usuarios aceptados</p>
      </div>
    </div>        
  </div>
</div>


<div class="container">
  
    <div class="row">
      <div class="col-md-12">
 
        <p>Se muestra la lista de usuarios que haz aceptado que forman parte de Guids.mx, estos pueden publicar tours</p>

        <table id="allactive" class="table table-bordered table-striped dt-responsive nowrap">
          <thead>
            <tr>
              <th>Id</th>
              <th>Nombre</th>
              <th>Teléfono</th>                        
              <th>Email</th>
              <th>Estado</th>
              <th>Ciudad</th>
              <th>Fecha nacimiento</th>
              <th>Estudios</th>
              <th>Personalidad</th>
              <th>Habiliidad</th>
              <th>Fotos</th>
              <th>Activo </th>
              <th>Registrado el</th>
              <th>Actualizado el</th>
              <th>Inhabilitar</th>

            </tr>
          </thead>

          <tbody>          
          <?php           
            $getAll=UserModel::getAllActive("user");      

            foreach($getAll as $row => $value){ 
          ?>
            <tr>
              <td><?php echo utf8_encode(($value["id"])); ?></td>
              <td><?php echo utf8_encode(($value["name"]))." ".utf8_encode($value["lastname"]); ?></td>              
              <td><?php echo utf8_encode($value["phone"]); ?></td>
              <td><?php echo utf8_encode($value["email"]); ?></td>                                                                                                                    
              <td><?php echo utf8_encode($value["state"]); ?></td>  
              <td><?php echo utf8_encode($value["town"]); ?></td>  
              <td><?php echo utf8_encode($value["age"]); ?></td> 
              <td><?php echo utf8_encode($value["grade"]); ?></td> 
              <td><?php echo utf8_encode($value["personality"]); ?></td>  
              <td><?php echo utf8_encode($value["ability"]); ?></td>                        
              <td>            
                 <div class="listing-image">
                <img src="http://localhost/guids/<?php echo $value["tour_image_src"]. $value["tour_image_filename"];?>" alt="Image" class="img-fluid img-thumbnail card-img-top">
              </div>
              </td> 
              <td><?php echo utf8_encode($value["is_active"]); ?></td>  
              <td><?php echo utf8_encode($value["created_at"]); ?></td> 
              <td><?php echo utf8_encode($value["updated_at"]); ?></td>          
              <td style="width:300px;">
                    <form method="post">    
                      <!-- <a href="" class="btn btn-warning btn-xs">Modificar</a> -->
                        <!-- <li><a href="http://localhost/guids/access-admin/accept/user/id/<?php echo $value["id"];?>" class="btn btn-success btn-xs"><i class="icon-settings"></i></a></li>  -->
                        <li><a data-toggle="modal" data-target="#exampleModalCenter<?php echo $value["id"];?>" class="btn btn-danger btn-xs"><i class="icon-trash"></i></a></li> 
                      <!-- <button class="btn btn-danger btn-xs" type="submit">Eliminar</button> -->
                    </form>
              </td>
 
            </tr>     
              
              <!-- Modal -->            
                <div class="modal fade" id="exampleModalCenter<?php echo $value["id"];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">¿Inhabilitar a <?php echo $value["name"];?> ?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form method="post">
                        <div class="modal-body">
                          <input type="hidden" name="id" value="<?php echo $value["id"] ?>">
                          <p class="color-black-opacity-5">Al inhabilitar el usuario <?php echo $value["name"];?> no podrá acceder a Guids.mx por consiguiente no podrá publicar tours</p>                       
                        </div>
                        <div class="modal-footer">                        
                            <button type="button" class="btn btn-info" data-dismiss="modal">Ahora no</button>
                            <!-- <button type="submit" class="btn btn-danger">Eliminar</button> -->
                            <input type="submit" value="Inhabilitar" id="btnupdate" class="btn btn-success py-2 px-4 text-white" >
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
      $('#allactive').DataTable();
      } );
  </script>

<!--====  End of SCRIPTS  ====-->


  </body>
</html>