<?php  
// error_reporting(0);
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
  <title>Usuarios confirmados</title>
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

        <table id="confirmatedusers" class="table table-bordered table-striped dt-responsive nowrap">
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
              <td><?php echo $value["id"]; ?></td>
              <td><?php echo $value["name"]." ".$value["lastname"]; ?></td>              
              <td><?php echo $value["phone"]; ?></td>
              <td><?php echo $value["email"]; ?></td>                                                                                                                    
              <td><?php echo $value["state"]; ?></td>  
              <td><?php echo $value["town"]; ?></td>  
              <td><?php echo $value["age"]; ?></td> 
              <td><?php echo $value["grade"]; ?></td> 
              <td><?php echo $value["personality"]; ?></td>  
              <td><?php echo $value["ability"]; ?></td>                        
              <td>            
                <div class="listing-image" style="max-width:20%; max-height: 20%;">
                <?php if(is_null($value["src"]) || is_null($value["picture"])){?>
                  <img src="http://localhost/guids/view/images/profile/default.jpg" name="aboutme" width="200" height="200px" class="rounded-circle">
                <?php } else{ ?>                              
                  <img src="http://localhost/guids/<?php echo $value["src"]. $value["picture"];?>" name="aboutme" width="200" height="200" class="rounded-circle">
                <?php } ?>
              </div>
              </td> 
              <td>         
                <?php if($value["is_active"]==0){ ?>
                  <?php echo "Requiere confirmación"; ?>
                <?php }else{ ?>
                  <?php echo "Activo"; ?>
                <?php } ?>
                
              </td>  
              <td><?php echo $value["created_at"]; ?></td> 
              <td><?php echo $value["updated_at"]; ?></td>          
              <td style="width:300px;">
                    <form method="post">    
                        <li><a data-toggle="modal" data-target="#exampleModalCenter<?php echo $value["id"];?>" class="btn btn-danger btn-xs"><i class="icon-trash"></i></a></li> 
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
                          <input type="hidden" name="id_disable" value="<?php echo $value["id"] ?>">
                          <input type="hidden" name="name_disable" value="<?php echo $value["name"] ?>">
                          <input type="hidden" name="lastname_disable" value="<?php echo $value["lastname"] ?>">
                          <input type="hidden" name="email_disable" value="<?php echo $value["email"] ?>">
                          <p class="color-black-opacity-5">Al inhabilitar el usuario <?php echo $value["name"];?> no podrá acceder a Guids.mx por consiguiente no podrá publicar tours</p>                       
                        </div>
                        <div class="modal-footer">                        
                            <button type="button" class="btn btn-info" data-dismiss="modal">Ahora no</button>                            
                            <input type="submit" value="Inhabilitar" id="btnupdate" class="btn btn-success py-2 px-4 text-white" >
                                 <?php 
                                  $disable= new UserController();
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
            $sendDisableMessage= new UserController();
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
      $('#confirmatedusers').DataTable();
      } );
  </script>

<!--====  End of SCRIPTS  ====-->


  </body>
</html>