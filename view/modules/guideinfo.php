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
  
        <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(http://localhost/guids/view/assets/images/Cancun.jpg);" data-aos="fade" data-stellar-background-ratio="1">
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
      $getTourById = new TourController();
      $getTourById = TourModel::getTourById("tour_schedule", $tourId);    
      //Second query      
      $getUserTourById = TourModel::getUserTourById("tour", $tourId);          
      //Third query
      $getAvgRating=TourModel::getAvgRating("review",$tourId);
      //Fourth query
      $getCountRating=TourModel::getCountRating("review",$tourId);
      //5 Query
      $getAllComment=ReviewModel::getAllComment("review",$tourId);
      //6 Query
      $getCountComment=ReviewModel::getCountComment("review",$tourId);
  ?>

    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <!-- GUIDE GENERAL INFO -->
          <div class="col-md-7 mb-5"  data-aos="fade">
            <!-- Image info -->
            <div class="d-block d-md-flex listing-horizontal">                                  
                <?php if(is_null($getUserTourById["src"]) || is_null($getUserTourById["picture"])){?>                            
                  <a href="" class="img d-block" style="background-image: url('http://localhost/guids/view/images/profile/default.jpg')"></a>
                <?php } else{ ?>   
                  <a href="" class="img d-block" style="background-image: url('http://localhost/guids/<?php echo $getById["src"]. $getById["picture"];?>')"></a>                    
                <?php } ?>                                
              <div class="lh-content">                
                <h3><a href=""><?php echo $getUserTourById["user_name"]." ".$getUserTourById["user_lastname"]; ?></a></h3>
                <p>Registrado: <?php echo $getUserTourById["user_created_at"]; ?></p> 
                <div class="text-capitalize"><?php echo $getAvgRating["review_rating"]; ?></div>
                <p>                  
                  <span class="icon-star <?php echo $getAvgRating["review_rating"]>=1 ? 'text-warning' : 'text-secondary' ?>"></span>
                  <span class="icon-star <?php echo $getAvgRating["review_rating"]>=2 ? 'text-warning' : 'text-secondary' ?>"></span>
                  <span class="icon-star <?php echo $getAvgRating["review_rating"]>=3 ? 'text-warning' : 'text-secondary' ?>"></span>
                  <span class="icon-star <?php echo $getAvgRating["review_rating"]>=4 ? 'text-warning' : 'text-secondary' ?>"></span>
                  <span class="icon-star <?php echo $getAvgRating["review_rating"]>=5 ? 'text-warning' : 'text-secondary' ?>"></span>
                  <span>(<?php echo $getCountRating["review_rating"]-1; ?> Valoraciones)</span>
                </p>                                 
                <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Compartir</a>
                </div>
              </div>
            </div>   
  
            <!-- end Image info -->
            
           <!-- Guide infor -->
            <div class="p-4 mb-3 bg-white">
              <p class="mb-0 font-weight-bold">Ubicación del guía</p>
              <p class="mb-4"><?php echo utf8_encode($getUserTourById["user_town"]); ?></p>

              <p class="mb-0 font-weight-bold">Idiomas del guía</p>
              <?php foreach ($getTourById as $key => $value) {} ?>

              <?php if($value["language_id"]==1){
                          echo '<p class="mb-4">Español</p>';
                        }elseif($value["language_id"]==2){
                          echo '<p class="mb-4">Maya</p>';
                        }elseif($value["language_id"]==3){
                          echo '<p class="mb-4">Inglés</p>';
                        }
              ?>  

              <p class="mb-0 font-weight-bold">Teléfono</p>
              <p class="mb-4"><a href="#"><?php echo utf8_encode($getUserTourById["user_phone"]); ?></a></p>

              <p class="mb-0 font-weight-bold">Email</p>
              <p class="mb-4"><a href="#"><?php echo utf8_encode($getUserTourById["user_email"]); ?></a></p>
            </div>
            
            <div class="p-4 mb-3 bg-white">
               <h3 class="h5 text-black mb-3">Características del guía</h3>
              <p>Personalidad: <?php echo utf8_encode($getUserTourById["user_personality"]); ?></p>
              <p>Habilidades: <?php echo utf8_encode($getUserTourById["user_ability"]); ?></p>

              <h3 class="h5 text-black mb-3">Sobre el tour</h3>
              <p><p>Descripción: <?php echo utf8_encode($getUserTourById["tour_description"]); ?></p></p>  
               <div class="listing-image" style="max-width:100%; max-height: 100%;">
                <img src="http://localhost/guids/<?php echo $value["tour_image_src"]. $value["tour_image_filename"];?>" alt="Image" class="img-fluid img-thumbnail card-img-top">
              </div>             
            </div>

            <div class="p-4 mb-3 bg-white">
              <h3 class="h5 text-black mb-3">Punto de encuentro</h3>
              <p><?php echo utf8_encode($getUserTourById["tour_start_in"]); ?></p>              

              <h3 class="h5 text-black mb-3">¿Dónde localizar e identificar al guía?</h3>
              <p><?php echo utf8_encode($getUserTourById["tour_find_guide"]); ?></p>              
            </div>
            <!-- end Guide info -->

            <!-- Booking info -->
            <div class="p-4 mb-3 bg-white">              
              <p class="mb-2 font-weight-bold">Días disponibles del guía para dar el tour</p>
              <?php 
                foreach ($getTourById as $key => $day) {                                                      
                    echo '<p class="mb-1">'.$day["day_name"].'</p>';
                    
                }

              ?>                                                        
              <br>
                <div class="row form-group">
                  <div class="col-md-12">
                     <input data-toggle="modal" data-target="#exampleModalCenter" type="button" value="Reservar tour" class="btn btn-primary py-2 px-4 text-white">
                  </div>
                </div>
                                
            </div>   
            <!-- end Booking info -->        

          </div><!-- .col-md-7 -->
          
          <!-- modal -->
          <form method="post" id="booking">
      

           <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title text-center" id="exampleModalLongTitle">Completa la información</h5>
                  <style>
                    form label.error {
                      float: right;
                      color: #f23a2e;
                      font-weight:bold;
                      font-size: 12px 
                      /*vertical-align: top;*/
                    }
                  </style>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                <input type="hidden" name="tour_id" value="<?php echo $tourId; ?>">
                 <div class="h-entry"><div class="meta">Elija la fecha</div></div> 
                    <div class="form-group">                  
                      <div class="wrap-icon">
                        <!-- <span class="icon icon-room"></span> -->
                        <input data-format="yyyy-MM-dd" type="date" name="tour_date" id="tour_date" class="form-control">
                      </div>
                    </div>
                
                <div class="h-entry"><div class="meta">Horario de incio del tour</div></div> 
                   <div class="form-group">
                  <div class="select-wrap">
                      <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>                      
                      <select class="form-control" name="tour_schedule_id" id="tour_schedule_id">
                        <option value="">Elija el horario</option>
                        <?php 
                        foreach ($getTourById as $key => $schedule) {
                        ?>
                        <option value="<?php echo $schedule["tour_schedule_id"] ?>"><?php echo $schedule["day_name"]." ".$value["tour_start_at"] ?></option>                        
                        <?php 
                        }
                       ?>
                        
                      </select>
                    </div>
                </div>
               

                    <div class="h-entry"><div class="meta">Cantidad de personas que irán al tour</div></div> 
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

                      <div class="form-group">                                        
                          <div class="h-entry"><div class="meta">Nombre</div></div> 
                          <input type="text" id="name" name="name" class="form-control" value="" placeholder="karl">                        
                      </div>

                      <div class="form-group">                                        
                          <div class="h-entry"><div class="meta">Apellidos</div></div> 
                          <input type="text" id="lastname" name="lastname" class="form-control" value="" placeholder="Smith">                        
                      </div>

                      <div class="form-group">                
                          <div class="h-entry"><div class="meta">Email</div></div> 
                          <input type="text" id="email" name="email" class="form-control" value="" placeholder="smith@ceo.com">
                      </div>

                     <div class="form-group">                                    
                          <div class="h-entry"><div class="meta">Teléfono</div></div> 
                          <input type="text" id="phone" name="phone" class="form-control" value="" placeholder="55 44 33 22 11">
                      </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Ahora no</button>                  
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
          <!-- end modal -->


          <!-- END GUIDE GENERAL INFO -->

          
          <!-- RATING AND COMMENT GENERAL INFO -->
          <div class="col-md-5 mb-5"  data-aos="fade" data-aos-delay="100">
             <!-- Rating tour -->
             <form method="post" id="rating_form">
             <div class="p-4 mb-3 bg-white">                                      
                <p class="mb-2 font-weight-bold">¿Que tal te pareció el tour?</p>
                <div class="h-entry"><div class="meta">Tu opinión será visible para los usuarios en la pagina del tour. Ayudará a que <?php echo $getUserTourById["user_name"]; ?> mejore su trabajo y para que otras personas decidan si este es de su interés.</div></div>                
                <div class="row form-group">            
                  <div class="col-md-12">                  
                     <p id="list_rating" style="cursor: pointer;">
                      <span class="icon-star text-warning" data-number="1" style="cursor: pointer;"></span>
                      <span class="icon-star text-secondary" data-number="2" style="cursor: pointer;"></span>
                      <span class="icon-star text-secondary" data-number="3" style="cursor: pointer;"></span>
                      <span class="icon-star text-secondary" data-number="4" style="cursor: pointer;"></span>
                      <span class="icon-star text-secondary" data-number="5" style="cursor: pointer;"></span>                     
                    </p>   
          
                  </div>
                </div>
                                 
                <div class="row form-group">
                  <div class="col-md-12">
                    <label class="text-black" for="message">Comentario</label> 
                    <textarea style="resize:none" name="comment" id="comment" cols="10" rows="4" class="form-control" placeholder="Un tour asombroso, enigmático..." required></textarea>
                  </div>
                </div>
                <input type="hidden" name="rating_input" value="1">
                <input type="hidden" name="tour_id" value="<?php echo $tourId ?>">
                <input type="hidden" name="user_id" value="<?php echo $getUserTourById["user_id"] ?>">
             
                 <?php
                  if (!isset($_SESSION["email"])):
                    echo '<div class="row form-group">
                      <div class="col-md-12">
                        <input type="submit" value="Enviar" class="btn btn-primary py-2 px-4 text-white">
                      </div>
                    </div>';                  
                  else:
                      echo '<div class="row form-group">
                      <div class="col-md-12">
                        <input type="button" value="No puedes realizar esta accción" class="btn btn-warning py-2 px-4 text-white" disabled="disabled">
                      </div>
                    </div>';
                  endif;
                  ?>
             </div>
                <?php 
                  $addReview = new ReviewController();
                  $addReview->add();
                 ?>
             </form> 
             <!-- End Rating tour -->

             <!-- All Comments -->
              <div class="p-4 mb-3 bg-white">   
              <?php foreach ($getCountComment as $key => $review_comment) {} ?>                                     
              <p class="mb-2 font-weight-bold">Comentarios acerca de este tour (<?php echo $review_comment["review_comment"]?>)</p>
              <hr>              
              <?php foreach ($getAllComment as $row => $comment) {?>
              <div class="row form-group">              
                  <div class="col-md-3" >                  
                  <p>
                     <img src="http://localhost/guids/view/assets/images/comment-default-48x48.png" name="aboutme" width="30" height="30" class="rounded-circle ml-3" style="opacity: .7; border:2px  solid #98a5a5;">                  
                  </p>   
                  <p>
                    <span class="icon-star <?php echo $comment["rating"]>=1 ? 'text-warning' : 'text-secondary' ?>" style="font-size: 12px;"></span>
                    <span class="icon-star <?php echo $comment["rating"]>=2 ? 'text-warning' : 'text-secondary' ?>" style="font-size: 12px;"></span>
                    <span class="icon-star <?php echo $comment["rating"]>=3 ? 'text-warning' : 'text-secondary' ?>" style="font-size: 12px;"></span>
                    <span class="icon-star <?php echo $comment["rating"]>=4 ? 'text-warning' : 'text-secondary' ?>" style="font-size: 12px;"></span>
                    <span class="icon-star <?php echo $comment["rating"]>=5 ? 'text-warning' : 'text-secondary' ?>" style="font-size: 12px;"></span>
                  </p>           
                </div>

                <div class="col-md-9">                  
                  <label class="text-black" for="message">Anónimo </label> <span class="mx-2">&bullet;</span>  <label class="text-black" for="message"><?php echo $comment["created_at"]; ?></label>
                  <p><div class="h-entry"><div class="meta"><?php echo $comment["comment"]; ?></div></div></p>        
                </div> 

              </div>
              <hr> 
              <?php } ?>            
              <?php if($getAllComment==null){echo '<div class="col-md-12">Aún no hay comentarios para este tour</div>';} ?>            
            </div>  
             <!-- end All Comments -->
          </div>
          <!-- END RATING AND COMMENT GENERAL INFO -->

        </div>
      </div>
    </div>

<!--====  End of GUIDE INFO  ====-->


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
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v3.2&appId=1846460415459293&autoLogAppEvents=1">
  
</script>

<!-- Validations -->
<script>
  //Booking validation
  $().ready(function() {
  $("#booking").validate({
    rules: {
      tour_date: { 
        required: true,         
      },
      tour_schedule_id: { 
        required: true,         
      },
       tourist_quantyty: { 
        required: true,         
      },
      name: { 
        required: true,         
      },
      lastname: { 
        required: true,         
        minlength: 2,
      },
      email: { 
        required:true, 
        email: true
      },
      phone: { 
        required:true, 
        minlength: 2, 
        maxlength:10,
        number:true        
      },
      password: { 
        required:true, 
        minlength: 2,           
      },
      day:{
        required:true
      },
      month:{
        required:true
      },
      year:{
        required:true
      },
      grade:{
        required:true
      },
      "language[]":{
        required:true
      },
      ability:{
        required:true
      },
      personality:{
        required:true
      },
    },
    messages: {
      tour_date: "Fecha es requerida",
      tour_schedule_id: "Elija un horario de inicio",      
      tourist_quantyty : "Elije cuantos irán al tour",
      name : "Nombre es requerido",
      lastname : "Apellidos son requeridos",
      email : "Email es requerido y debe tener formato de email correcto.",    
      phone : "El teléfono es requerido.",               
    }
  });
});

  //Rating validation
$().ready(function() {
  $("#rating_form").validate({
    rules: {
      comment: { 
        required: true,         
      },    
    },
    messages: {      
      comment : "Es necesario agregar un comentario.",               
    }
  });
});

</script>
<!-- End Validations -->
<!-- Rating -->
<script>
  jQuery(document).ready(function(){
    const ratingSelector = jQuery('#list_rating');
    ratingSelector.find('span').on('click', function(){
      // console.log($(this));
      const number = $(this).data('number');
      // console.log((number));
      $("#rating_form").find('input[name=rating_input]').val(number);
      ratingSelector.find('span').removeClass('text-warning').each(function(index){
        if((index+1) <= number){
          $(this).addClass('text-warning');
        }
      })

    })

  });
</script>
<!-- end Rating -->

<!--====  End of SCRIPTS  ====-->


    
  </body>
</html>