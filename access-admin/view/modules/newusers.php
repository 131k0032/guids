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
  <title>Nuevos usuarios</title>
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
        <h2 class="font-weight-light text-primary">Nuevos usuarios en el sitio</h2>
        <p class="color-black-opacity-5">Nuevos registros</p>
      </div>
    </div>        
  </div>
</div>


<div class="container">
  
    <div class="row">
      <div class="col-md-12">
 
        <p>Se muestra la lista de usuarios que se han registrado en Guids.mx, mas si embargo no pueden acceder al sitio, hasta que le des confirmar, esto si los datos que el usuario proporciona son datos que parecen ser reales y no ficticios</p>

        <table id="newusers" class="table table-bordered table-striped dt-responsive nowrap">
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
              <th>Habilidad</th>
              <th>Fotos</th>
              <th>Activo </th>
              <th>Registrado el</th>
              <th>Actualizado el</th>
              <th>Confirmar</th>
              <th>Enviar email de sugerencias</th>

            </tr>
          </thead>

          <tbody>          
          <?php           
            $getAll=UserModel::getAllInactive("user");      

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
              <td><?php echo utf8_encode($value["created_at"]); ?></td> 
              <td><?php echo utf8_encode($value["updated_at"]); ?></td>          
              <td style="width:300px;">
                    <form method="post">    
                        <li><a data-toggle="modal" data-target="#exampleModalCenter<?php echo $value["id"];?>" class="btn btn-warning btn-xs"><i class="icon-check-circle"></i></a></li>                       
                    </form>
              </td>
              <td style="width:300px;">
                    <form method="post">    
                        <li><a data-toggle="modal" data-target="#exampleModalCenterEmail<?php echo $value["id"];?>" class="btn btn-info btn-xs"><i class="icon-mail_outline"></i></a></li>                       
                    </form>
              </td>
 
            </tr>     
              
              <!-- Modal -->            
                <div class="modal fade" id="exampleModalCenter<?php echo $value["id"];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">¿Haz verificado los datos de <?php echo $value["name"];?>?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form method="post">
                        <div class="modal-body">
                          <input type="hidden" name="id" value="<?php echo $value["id"] ?>">
                          <p class="color-black-opacity-5">El usuario <?php echo $value["name"];?> podrá acceder a Guids.mx y publicar tours</p>                       
                        </div>
                        <div class="modal-footer">                        
                            <button type="button" class="btn btn-info" data-dismiss="modal">Ahora no</button>
                            <!-- <button type="submit" class="btn btn-danger">Eliminar</button> -->
                            <input type="submit" value="Confirmar" id="btnupdate" class="btn btn-success py-2 px-4 text-white" >
                                 <?php 
                                  $confirm= new UserController();
                                  $confirm->confirm();
                                 ?>                        
                        </div>
                      </form>
                    </div>
                  </div>
                </div>        
                <!-- End of Modal -->


                 <!-- Modal -->            
                <div class="modal fade" id="exampleModalCenterEmail<?php echo $value["id"];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">¿Qué es lo que le ha faltado al perfil de <?php echo $value["name"];?>?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form method="post">
                        <div class="modal-body">                          
                          <input type="hidden" name="name" value="<?php echo $value["name"] ?>">
                          <input type="hidden" name="lastname" value="<?php echo $value["lastname"] ?>">
                          <p class="color-black-opacity-5">El usuario <?php echo $value["name"];?> recibirá este correo una vez que se lo envíes</p>

                          <div class="form-group">
                              <div class="h-entry"><div class="meta">Email del usuario</div></div>
                              <input type="text" id="name" name="email" class="form-control" value="<?php echo $value["email"]; ?>">
                          </div>
                          
                          <div class="form-group">
                            <div class="h-entry"><div class="meta">Mensaje</div></div>
                               <textarea style="resize:none" class="form-control"  rows="3" id="message" name="message" placeholder="Parece que te ha faltado completar la infomación de habilidades..." required></textarea>
                          </div>                      
                        </div>
                        <div class="modal-footer">                        
                            <button type="button" class="btn btn-info" data-dismiss="modal">Ahora no</button>
                            <!-- <button type="submit" class="btn btn-danger">Eliminar</button> -->
                            <input type="submit" value="Enviar mensaje" id="btnupdate" class="btn btn-success py-2 px-4 text-white" >
                                 <?php 
                                  $sendMessage= new UserController();
                                  $sendMessage->sendMessage();
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
      $('#newusers').DataTable();
      } );
  </script>

<!--====  End of SCRIPTS  ====-->


  </body>
</html>