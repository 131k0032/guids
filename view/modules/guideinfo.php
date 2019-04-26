<?php  
   error_reporting(0);
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
<title>Guide info</title>
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
  
  


  <!--================================
  =            INFO IMAGE            =
  =================================-->
  
      <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(http://localhost/guids/view/assets/images/hero_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-10">
            
            
            <div class="row justify-content-center">
              <div class="col-md-8 text-center">
                <h1 data-aos="fade-up">Conoce más a detalle al guía</h1>
                <p class="mb-0" data-aos="fade-up" data-aos-delay="100">Adelante, prueba reservar un tour con el guía</p>
              </div>
            </div>

            
          </div>
        </div>
      </div>
    </div>  
  
  <!--====  End of INFO IMAGE  ====-->
  
  
<!--================================
=            GUIDE INFO            =
=================================-->
    <?php  
    // First query
      $tourId=$url[2];
      // echo $tourId;
      $getByTourId = new TourController();
      $getByTourId = TourModel::getTourById("tour_schedule", $tourId);
    
    //Second query      
      $getUserTourById = TourModel::getUserTourById("tour", $tourId);    
      // echo $getUserTourById["tour_name"];

      //Third query
      $getAvgRating=TourModel::getAvgRating("review",$tourId);
      //Fourth query
      $getCountRating=TourModel::getCountRating("review",$tourId);
    ?>

<form method="post">

    <div class="site-section bg-light">
      <div class="container">
        <div class="row">

          <div class="col-md-7 mb-5"  data-aos="fade">
             <div class="d-block d-md-flex listing-horizontal">
              <!-- <a href="#" class="img d-block" style="background-image: url('http://localhost/guids/view/assets/images/img_1.jpg')"></a> -->                                  
                <?php if(is_null($getUserTourById["src"]) || is_null($getUserTourById["picture"])){?>                            
                  <a href="" class="img d-block" style="background-image: url('http://localhost/guids/view/images/profile/default.jpg')"></a>
                <?php } else{ ?>   
                  <a href="" class="img d-block" style="background-image: url('http://localhost/guids/<?php echo $getById["src"]. $getById["picture"];?>')"></a>                    
                <?php } ?>                                
              <div class="lh-content">                
                <h3><a href=""><?php echo $getUserTourById["user_name"]." ".$getUserTourById["user_lastname"]; ?></a></h3>
                <p>Registrado: <?php echo $getUserTourById["user_created_at"]; ?></p> 
                <p>
                  <span class="icon-star <?php echo $getAvgRating["review_rating"]>=1 ? 'text-warning' : 'text-secondary' ?>"></span>
                  <span class="icon-star <?php echo $getAvgRating["review_rating"]>=2 ? 'text-warning' : 'text-secondary' ?>"></span>
                  <span class="icon-star <?php echo $getAvgRating["review_rating"]>=3 ? 'text-warning' : 'text-secondary' ?>"></span>
                  <span class="icon-star <?php echo $getAvgRating["review_rating"]>=4 ? 'text-warning' : 'text-secondary' ?>"></span>
                  <span class="icon-star <?php echo $getAvgRating["review_rating"]>=5 ? 'text-warning' : 'text-secondary' ?>"></span>
                  <span>(<?php echo $getCountRating["review_rating"]; ?> Valoraciones)</span>
                </p>                                 
                <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Compartir</a>
                </div>
              </div>
            </div>   

<?php if(!isset($_SESSION["email"])){ ?>
<!-- Can booking -->
            <div class="p-4 mb-3 bg-white">            
              
              <input type="hidden" name="tour_id" value="<?php echo $tourId; ?>">

              <p class="mb-2 font-weight-bold">Días disponibles del guía para dar el tour</p>
              <?php 
                foreach ($getByTourId as $key => $value) {                                                      
                    echo '<p class="mb-1">'.$value["day_name"].'</p>';
                    
                }

                 ?>
              <p class="mb-2 font-weight-bold">Horarios de inicio del tour</p>
                <div class="form-group">
                  <div class="select-wrap">
                      <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>                      
                      <select class="form-control" name="tour_schedule_id" id="tour_schedule_id">
                        <option value="">Elija el horario</option>
                        <?php 
                        foreach ($getByTourId as $key => $value) {
                        ?>
                        <option value="<?php echo $value["tour_schedule_id"] ?>"><?php echo $value["tour_schedule_id"]." ".$value["day_name"]." ".$value["tour_start_at"] ?></option>                        
                        <?php 
                        }
                       ?>
                        
                      </select>
                    </div>
                </div>
            

                <p class="mb-2 font-weight-bold">Elija fecha</p>
                <div class="form-group">                  
                  <div class="wrap-icon">
                    <!-- <span class="icon icon-room"></span> -->
                    <input data-format="yyyy-MM-dd" type="date" name="tour_date" id="tour_date" class="form-control">
                  </div>
                </div>

                 <p class="mb-2 font-weight-bold">Número de personas que asisitirán</p>
                <div class="form-group">
                  <div class="select-wrap">
                      <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                      <select class="form-control" name="tourist_quantyty" id="tourist_quantyty">
                        <option value="">Elija cantidad</option>
                      <?php 
                        for($i=1; $i<=20; $i++){
                          echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                       ?> 
                      </select>
                    </div>
                </div>
                
      
                <div class="row form-group">
                  <div class="col-md-12">
                    <input data-toggle="modal" data-target="#exampleModalCenter" type="button" value="Reservar" class="btn btn-primary py-2 px-4 text-white">
                  </div>
                </div>
              
            </div>     
    
<?php }else{ ?>
<!-- Can't booking -->

<?php } ?>


        </div>
          <div class="col-md-5"  data-aos="fade" data-aos-delay="100">
            
            <div class="p-4 mb-3 bg-white">
              <p class="mb-0 font-weight-bold">Ubicación del guía</p>
              <p class="mb-4"><?php echo utf8_encode($getUserTourById["user_town"]); ?></p>
          
              <p class="mb-0 font-weight-bold">Idiomas del guía</p>
            
                      <?php if($value["language_id"]==1){
                          echo "Español";
                        }elseif($value["language_id"]==2){
                          echo "Maya";
                        }elseif($value["language_id"]==3){
                          echo "Inglés";
                        }
                      ?>       


              <p class="mb-0 font-weight-bold">Teléfono</p>
              <p class="mb-4"><a href="#"><?php echo utf8_encode($getUserTourById["user_phone"]); ?></a></p>

              <p class="mb-0 font-weight-bold">Email</p>
              <p class="mb-0"><a href="#"><?php echo utf8_encode($getUserTourById["user_email"]); ?></a></p>  
                          
            </div>
            
            <div class="p-4 mb-3 bg-white">
              <h3 class="h5 text-black mb-3">Características del guía</h3>
              <p>Personalidad: <?php echo utf8_encode($getUserTourById["user_personality"]); ?></p>
              <p>Hbilidades: <?php echo utf8_encode($getUserTourById["user_ability"]); ?></p>

              <h3 class="h5 text-black mb-3">Acerca del tour</h3>
              <p>Descripción: <?php echo utf8_encode($getUserTourById["tour_description"]); ?></p>               
                <div class="listing-image" style="max-width:100%; max-height: 100%;">
                <img src="http://localhost/guids/<?php echo $value["tour_image_src"]. $value["tour_image_filename"];?>" alt="Image" class="img-fluid img-thumbnail card-img-top">
              </div>             
            </div>

            <div class="p-4 mb-3 bg-white">
              <h3 class="h5 text-black mb-3">Punto de encuentro</h3> 
              <p><?php echo utf8_encode($getUserTourById["tour_start_in"]); ?></p>              
       <!--        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3744.1768614563816!2d-87.4652991350486!3d20.209970370599834!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f4fd6ac60c1c067%3A0x20a1acdae9634463!2sParque+Dos+Aguas%2C+Calle+alfa+sur+esquina+calle+andromeda%2C+Calle+Alfa+Sur%2C+77780+Tulum%2C+Quintana+Roo!5e0!3m2!1ses!2smx!4v1553930740010!5m2!1ses!2smx" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe> -->

              <h3 class="h5 text-black mb-3">¿Cómo localizar e identificar al guía?</h3>
              <p><?php echo utf8_encode($getUserTourById["tour_find_guide"]); ?></p>              
            </div>

          </div>

        </div>
      </div>
    </div>

<!--====  End of GUIDE INFO  ====-->

<!--==================================
=            Modal window            =
===================================-->

  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center" id="exampleModalLongTitle">Completa la información</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
              <div class="row form-group">                
                <div class="col-md-12">
                  <p class="mb-2 font-weight-bold">Nombre</p>
                  <input type="text" id="name" name="name" class="form-control" value="">
                </div>
              </div>

              <div class="row form-group">                
                <div class="col-md-12">
                  <p class="mb-2 font-weight-bold">Apellidos</p>
                  <input type="text" id="lastname" name="lastname" class="form-control" value="">
                </div>
              </div>

              <div class="row form-group">                
                <div class="col-md-12">
                  <p class="mb-2 font-weight-bold">Email</p>
                  <input type="text" id="email" name="email" class="form-control" value="">
                </div>
              </div>

             <div class="row form-group">                
                <div class="col-md-12">
                  <p class="mb-2 font-weight-bold">Teléfono</p>
                  <input type="text" id="phone" name="phone" class="form-control" value="">
                </div>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <!-- <button type="submit" class="btn btn-primary">Save changes</button> -->          
            <!-- <input type="submit" class="btn btn-primary" value="Save changes">    -->
            <input type="submit" value="Reservar" class="btn btn-primary py-2 px-4 text-white">       
            <?php 
              $addBooking = new BookingController();
              $addBooking->add();
             ?>
        </div>
      </div>
    </div>
  </div>  

</form>
<!--====  End of Modal window  ====-->

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


<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v3.2&appId=1846460415459293&autoLogAppEvents=1"></script>
<!--====  End of SCRIPTS  ====-->


    
  </body>
</html>