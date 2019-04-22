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
=            CREATE TOURS            =
===========================-->

  <div class="site-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary">Agregar tours</h2>
            <p class="color-black-opacity-5">Lorem Ipsum Dolor Sit Amet</p>
          </div>
        </div>

              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">¿Dónde será el tour?</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Describe el tour</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Agrega fotos</a>
                </li>
                 <li class="nav-item">
                  <a class="nav-link" id="duration-tab" data-toggle="tab" href="#duration" role="tab" aria-controls="duration" aria-selected="false">Horario y duración</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="people-tab" data-toggle="tab" href="#people" role="tab" aria-controls="duration" aria-selected="false">¿Cuántas personas pueden asistir  al tour?</a>
                </li>
              </ul>


                <!--=================================================
                =            GUIDE LOCATION CONTENT PANE            =
                ==================================================-->
<form  method="post" enctype="multipart/form-data">

              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                      <div class=" bg-light">
                        <div class="container">
                          <div class="row">

                            <div class="col-md-12 mb-0"  data-aos="fade">
                              <div class="p-4 mb-3 bg-white">                                         
                                
                                  <p class="mb-2 font-weight-bold">Lugar del tour</p>
                                  <div class="form-group">                  
                                    <div class="wrap-icon">
                                      <!-- <span class="icon icon-room"></span> -->
                                      <input type="text" name="location" class="form-control" placeholder="Playa del carmen">
                                    </div>
                                  </div>
                                  
                                   <p class="mb-2 font-weight-bold">Describe como te van a encontrar antes del tour</p>
                                  <div class="form-group">
                                <textarea name="find_guide" class="form-control"  rows="3" placeholder="Con una mochila roja..."></textarea>
                                  </div>                                         

                                <!-- </form> -->
                              </div>   


                            </div>


                          </div>
                        </div>
                      </div>

                </div>
                
                
                <!--====  End of GUIDE LOCATION CONTENT PANE  ====-->
                

                
                <!--===================================================
                =            GUIDE DESCRPTION CONTENT PANE            =
                ====================================================-->                
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                      <div class=" bg-light">
                        <div class="container">
                          <div class="row">

                            <div class="col-md-12 mb-0"  data-aos="fade">
                              <div class="p-4 mb-3 bg-white">                                         
                                
                                  <p class="mb-2 font-weight-bold">Nombre del tour</p>
                                <form action="test" method="post">
                                  <div class="form-group">                  
                                    <div class="wrap-icon">
                                      <!-- <span class="icon icon-room"></span> -->
                                      <input type="text" name="name" class="form-control" placeholder="Nombre del tour">
                                    </div>
                                  </div>
                                  
                                  <p class="mb-2 font-weight-bold">Descripción del tour</p>
                                  <div class="form-group">
                                <textarea name="description" class="form-control"  rows="3" placeholder="Será un interesanta tour que inicia al centro del poblado..."></textarea>
                                  </div>

                                  <p class="mb-2 font-weight-bold">Idioma preferido para dar el tour</p>
                                  <div class="form-group">
                                    <div class="select-wrap">
                                        <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                                        <select class="form-control" name="language" id="">
                                         <?php
                                          $language =  new LanguageController();
                                          foreach ( $language -> getAllLanguageController() as $row => $value) {
                                        ?>
                                        <option value="<?php echo $value['id']; ?>"><?php echo utf8_encode($value['name']); ?></option>
                                        <?php }
                                        if (!isset($value['name'])) {
                                          echo '<option value="" disabled>Sin registros</option>';
                                        } ?>
                                        </select>
                                      </div>
                                  </div>

                                </form>
                              </div>   


                            </div>


                          </div>
                        </div>
                      </div>
                </div>                
                <!--====  End of GUIDE DESCRPTION CONTENT PANE  ====-->
                

                <!--==============================================
                =            IMAGE FILES CONTENT PANE            =
                ===============================================-->                
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="profile-tab">
                    
                      <div class=" bg-light">
                        <div class="container">
                          <div class="row">

                            <div class="col-md-12 mb-0"  data-aos="fade">
                              <div class="p-4 mb-3 bg-white">                                         
                                


                                  <p class="mb-2 font-weight-bold">Agrega imágenes del tour</p>
                                  <div class="form-group">
                                     <input type="file" class="form-control" name="src" id="src" accept="image/*">
                                  </div>


                                </form>
                              </div>   


                            </div>


                          </div>
                        </div>
                      </div>
                </div>                
                <!--====  End of IMAGE FILES CONTENT PANE  ====-->


                <!--=================================================
                =            GUIDE DURATION CONTENT PANE            =
                ==================================================-->                            
                <div class="tab-pane fade" id="duration" role="tabpanel" aria-labelledby="duration-tab">
                       
                      <div class=" bg-light">
                        <div class="container">
                          <div class="row">

                            <div class="col-md-12 mb-0"  data-aos="fade">

                              <div class="p-4 mb-3 bg-white">      



                              <div class="row">
                                <div class="col-md-6">   

                                <p class="mb-2 font-weight-bold">¿Cuanto tiempo durará el tour?</p>
                                  <div class="form-group">
                                    <div class="select-wrap">
                                        <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                                        <select class="form-control" name="duration" id="duration">
                                          <option value="">Elija una aproximación</option>
                                          <option value="1-h">1 h</option>                                        
                                          <option value="1:15-h">1:15 h</option>
                                          <option value="1:30-h">1:30 h</option>
                                          <option value="1:45-h">1:45 h</option>
                                          <option value="1:45-h">2:00 h</option>
                                          <option value="2:15-h">2:15 h</option>
                                          <option value="2:45-h">2:45 h</option>
                                          <option value="3:00-h">3:00 h</option>
                                        </select>
                                      </div>
                                  </div>                             
                                
                                  <p class="mb-2 font-weight-bold">Elija los días para el tour</p>

                                                                 
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input lunes"  id="lunes" name="day[]" value="1">
                                        <label class="custom-control-label" for="lunes">Lunes</label>
                                    </div>
                                    <hr>
                                    
                                     
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input martes" id="martes" name="day[]" value="2">
                                        <label class="custom-control-label" for="martes">Martes</label>
                                    </div>
                                    <hr>
                                    

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input miercoles" id="miercoles" name="day[]" value="3">
                                        <label class="custom-control-label" for="miercoles">Miércoles</label>
                                    </div>
                                    <hr>
                                    

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input jueves" id="jueves" name="day[]" value="4">
                                        <label class="custom-control-label" for="jueves">Jueves</label>
                                    </div>
                                    <hr>
                                    

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input viernes" id="viernes" name="day[]" value="5">
                                        <label class="custom-control-label" for="viernes">Viernes</label>
                                    </div>
                                    <hr>
                                    

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input sabado" id="sabado" name="day[]" value="6">
                                        <label class="custom-control-label" for="sabado">Sábado</label>
                                    </div>
                                    <hr>
                                    

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input domingo" id="domingo" name="day[]" value="7">
                                        <label class="custom-control-label" for="domingo">Domingo</label>
                                    </div>
                                    <hr>
                                    

                                  
                                </div>

                    


                                <div class="col-md-6">
                                    <!-- <p class="mb-2 font-weight-bold">Indica el horario de inicio del tour</p> -->
                                    <br><br><br><br>

                                    <!-- lunes -->
                                      <div class="form-group">
                                        <div class="select-wrap" id="horariolunes" style="display: none;">
                                            <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                                            <select class="form-control" name="start_at[]" id="start_at">
                                              <option value="">Elija hora de inicio el lunes</option>
                                              <option value="8:00 am">8:00 am</option>                                        
                                              <option value="8:15 am">8:15 am</option>
                                              <option value="8:30 am">8:30 am</option>
                                              <option value="8:45 am">8:45 am</option>
                                              <option value="9:00 am">9:00 am</option>
                                              <option value="9:15 am">9:15 am</option>
                                              <option value="9:30 am">9:30 am</option>
                                              <option value="9:45 am">9:45 am</option>
                                              <option value="10:00 am">10:00 am</option>
                                              <option value="10:15 am">10:15 am</option>
                                              <option value="10:30 am">10:30 am</option>
                                              <option value="10:45 am">10:45 am</option>
                                              <option value="11:00 am">11:00 am</option>
                                              <option value="11:15 am">11:15 am</option>
                                              <option value="11:30 am">11:30 am</option>
                                              <option value="11:45 am">11:45 am</option>
                                              <option value="12:00 pm">12:00 pm</option>
                                              <option value="12:15 pm">12:15 pm</option>
                                              <option value="12:30 pm">12:30 pm</option>
                                              <option value="12:45 pm">12:45 pm</option>
                                              <option value="13:00 pm">13:00 pm</option>
                                              <option value="13:15 pm">13:15 pm</option>
                                              <option value="13:30 pm">13:30 pm</option>
                                              <option value="13:45 pm">13:45 pm</option>
                                              <option value="14:00 pm">14:00 pm</option>
                                              <option value="14:15 pm">14:15 pm</option>
                                              <option value="14:30 pm">14:30 pm</option>
                                              <option value="14:45 pm">14:45 pm</option>
                                              <option value="15:00 pm">15:00 pm</option>
                                              <option value="15:15 pm">15:15 pm</option>
                                              <option value="15:30 pm">15:30 pm</option>
                                              <option value="15:45 pm">15:45 pm</option>
                                              <option value="16:00 pm">16:00 pm</option>
                                              <option value="16:15 pm">16:15 pm</option>
                                              <option value="16:30 pm">16:30 pm</option>
                                              <option value="16:45 pm">16:45 pm</option>
                                              <option value="17:00 pm">17:00 pm</option>
                                              <option value="17:15 pm">17:15 pm</option>
                                              <option value="17:30 pm">17:30 pm</option>
                                              <option value="17:45 pm">17:45 pm</option>
                                              <option value="18:00 pm">18:00 pm</option>
                                              <option value="18:15 pm">18:15 pm</option>
                                              <option value="18:30 pm">18:30 pm</option>
                                              <option value="18:45 pm">18:45 pm</option>
                                              <option value="19:00 pm">19:00 pm</option>
                                              <option value="19:15 pm">19:15 pm</option>
                                              <option value="19:30 pm">19:30 pm</option>
                                              <option value="19:45 pm">19:45 pm</option>
                                              <option value="20:00 pm">20:00 pm</option>
                                              <option value="20:15 pm">20:15 pm</option>
                                              <option value="20:30 pm">20:30 pm</option>
                                              <option value="20:45 pm">20:45 pm</option>
                                              <option value="21:00 pm">21:00 pm</option>
                                              <option value="21:15 pm">21:15 pm</option>
                                              <option value="21:30 pm">21:30 pm</option>
                                              <option value="21:45 pm">21:45 pm</option>
                                              <option value="22:00 pm">22:00 pm</option>
                                              <option value="22:15 pm">22:15 pm</option>
                                              <option value="22:30 pm">22:30 pm</option>
                                              <option value="22:45 pm">22:45 pm</option>
                                              <option value="23:00 pm">23:00 pm</option>
                                              <option value="23:15 pm">23:15 pm</option>
                                              <option value="23:30 pm">23:30 pm</option>
                                              <option value="23:45 pm">23:45 pm</option>                                              
                                              <option value="00:00 am">00:00 am</option>
                                              <option value="00:15 am">00:15 am</option>
                                              <option value="00:30 am">00:30 am</option>
                                              <option value="00:45 am">00:45 am</option>
                                              <option value="01:00 am">01:00 am</option>
                                              <option value="01:15 am">01:15 am</option>
                                              <option value="01:30 am">01:30 am</option>
                                              <option value="01:45 am">01:45 am</option>                                              
                                              <option value="02:00 am">02:00 am</option>
                                              <option value="02:15 am">02:15 am</option>
                                              <option value="02:30 am">02:30 am</option>
                                              <option value="02:45 am">02:45 am</option>                                              
                                              <option value="03:00 am">03:00 am</option>
                                              <option value="03:15 am">03:15 am</option>
                                              <option value="03:30 am">03:30 am</option>
                                              <option value="03:45 am">03:45 am</option>                                              
                                              <option value="04:00 am">04:00 am</option>
                                              <option value="04:15 am">04:15 am</option>
                                              <option value="04:30 am">04:30 am</option>
                                              <option value="04:45 am">04:45 am</option>                                              
                                              <option value="05:00 am">05:00 am</option>
                                              <option value="05:15 am">05:15 am</option>
                                              <option value="05:30 am">05:30 am</option>
                                              <option value="05:45 am">05:45 am</option>                                              
                                              <option value="06:00 am">06:00 am</option>
                                              <option value="06:15 am">06:15 am</option>
                                              <option value="06:30 am">06:30 am</option>
                                              <option value="06:45 am">06:45 am</option>                                              
                                              <option value="07:00 am">07:00 am</option>
                                              <option value="07:15 am">07:15 am</option>
                                              <option value="07:30 am">07:30 am</option>
                                              <option value="07:45 am">07:45 am</option>                                                                                            
                                            </select>
                                           <!--  <hr> -->
                                        </div>                                                                            
                                      </div>

                                      <!-- martes   -->
                                        <div class="form-group">
                                        <div class="select-wrap" id="horariomartes" style="display: none;">
                                            <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                                            <select class="form-control" name="start_at[]" id="start_at">
                                              <option value="">Elija hora de inicio del martes</option>
                                              <option value="8:00 am">8:00 am</option>                                        
                                              <option value="8:15 am">8:15 am</option>
                                              <option value="8:30 am">8:30 am</option>
                                              <option value="8:45 am">8:45 am</option>
                                              <option value="9:00 am">9:00 am</option>
                                              <option value="9:15 am">9:15 am</option>
                                              <option value="9:30 am">9:30 am</option>
                                              <option value="9:45 am">9:45 am</option>
                                              <option value="10:00 am">10:00 am</option>
                                              <option value="10:15 am">10:15 am</option>
                                              <option value="10:30 am">10:30 am</option>
                                              <option value="10:45 am">10:45 am</option>
                                              <option value="11:00 am">11:00 am</option>
                                              <option value="11:15 am">11:15 am</option>
                                              <option value="11:30 am">11:30 am</option>
                                              <option value="11:45 am">11:45 am</option>
                                              <option value="12:00 pm">12:00 pm</option>
                                              <option value="12:15 pm">12:15 pm</option>
                                              <option value="12:30 pm">12:30 pm</option>
                                              <option value="12:45 pm">12:45 pm</option>
                                              <option value="13:00 pm">13:00 pm</option>
                                              <option value="13:15 pm">13:15 pm</option>
                                              <option value="13:30 pm">13:30 pm</option>
                                              <option value="13:45 pm">13:45 pm</option>
                                              <option value="14:00 pm">14:00 pm</option>
                                              <option value="14:15 pm">14:15 pm</option>
                                              <option value="14:30 pm">14:30 pm</option>
                                              <option value="14:45 pm">14:45 pm</option>
                                              <option value="15:00 pm">15:00 pm</option>
                                              <option value="15:15 pm">15:15 pm</option>
                                              <option value="15:30 pm">15:30 pm</option>
                                              <option value="15:45 pm">15:45 pm</option>
                                              <option value="16:00 pm">16:00 pm</option>
                                              <option value="16:15 pm">16:15 pm</option>
                                              <option value="16:30 pm">16:30 pm</option>
                                              <option value="16:45 pm">16:45 pm</option>
                                              <option value="17:00 pm">17:00 pm</option>
                                              <option value="17:15 pm">17:15 pm</option>
                                              <option value="17:30 pm">17:30 pm</option>
                                              <option value="17:45 pm">17:45 pm</option>
                                              <option value="18:00 pm">18:00 pm</option>
                                              <option value="18:15 pm">18:15 pm</option>
                                              <option value="18:30 pm">18:30 pm</option>
                                              <option value="18:45 pm">18:45 pm</option>
                                              <option value="19:00 pm">19:00 pm</option>
                                              <option value="19:15 pm">19:15 pm</option>
                                              <option value="19:30 pm">19:30 pm</option>
                                              <option value="19:45 pm">19:45 pm</option>
                                              <option value="20:00 pm">20:00 pm</option>
                                              <option value="20:15 pm">20:15 pm</option>
                                              <option value="20:30 pm">20:30 pm</option>
                                              <option value="20:45 pm">20:45 pm</option>
                                              <option value="21:00 pm">21:00 pm</option>
                                              <option value="21:15 pm">21:15 pm</option>
                                              <option value="21:30 pm">21:30 pm</option>
                                              <option value="21:45 pm">21:45 pm</option>
                                              <option value="22:00 pm">22:00 pm</option>
                                              <option value="22:15 pm">22:15 pm</option>
                                              <option value="22:30 pm">22:30 pm</option>
                                              <option value="22:45 pm">22:45 pm</option>
                                              <option value="23:00 pm">23:00 pm</option>
                                              <option value="23:15 pm">23:15 pm</option>
                                              <option value="23:30 pm">23:30 pm</option>
                                              <option value="23:45 pm">23:45 pm</option>                                              
                                              <option value="00:00 am">00:00 am</option>
                                              <option value="00:15 am">00:15 am</option>
                                              <option value="00:30 am">00:30 am</option>
                                              <option value="00:45 am">00:45 am</option>
                                              <option value="01:00 am">01:00 am</option>
                                              <option value="01:15 am">01:15 am</option>
                                              <option value="01:30 am">01:30 am</option>
                                              <option value="01:45 am">01:45 am</option>                                              
                                              <option value="02:00 am">02:00 am</option>
                                              <option value="02:15 am">02:15 am</option>
                                              <option value="02:30 am">02:30 am</option>
                                              <option value="02:45 am">02:45 am</option>                                              
                                              <option value="03:00 am">03:00 am</option>
                                              <option value="03:15 am">03:15 am</option>
                                              <option value="03:30 am">03:30 am</option>
                                              <option value="03:45 am">03:45 am</option>                                              
                                              <option value="04:00 am">04:00 am</option>
                                              <option value="04:15 am">04:15 am</option>
                                              <option value="04:30 am">04:30 am</option>
                                              <option value="04:45 am">04:45 am</option>                                              
                                              <option value="05:00 am">05:00 am</option>
                                              <option value="05:15 am">05:15 am</option>
                                              <option value="05:30 am">05:30 am</option>
                                              <option value="05:45 am">05:45 am</option>                                              
                                              <option value="06:00 am">06:00 am</option>
                                              <option value="06:15 am">06:15 am</option>
                                              <option value="06:30 am">06:30 am</option>
                                              <option value="06:45 am">06:45 am</option>                                              
                                              <option value="07:00 am">07:00 am</option>
                                              <option value="07:15 am">07:15 am</option>
                                              <option value="07:30 am">07:30 am</option>
                                              <option value="07:45 am">07:45 am</option>                                                                                                                                                
                                            </select>
                                            <!-- <hr> -->
                                        </div>                                                                            
                                      </div>


                                         <!-- miercoles   -->
                                        <div class="form-group">
                                        <div class="select-wrap" id="horariomiercoles" style="display: none;">
                                            <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                                            <select class="form-control" name="start_at[]" id="">
                                              <option value="">Elija hora de inicio del miércoles</option>
                                                                         <option value="8:00 am">8:00 am</option>                                        
                                              <option value="8:15 am">8:15 am</option>
                                              <option value="8:30 am">8:30 am</option>
                                              <option value="8:45 am">8:45 am</option>
                                              <option value="9:00 am">9:00 am</option>
                                              <option value="9:15 am">9:15 am</option>
                                              <option value="9:30 am">9:30 am</option>
                                              <option value="9:45 am">9:45 am</option>
                                              <option value="10:00 am">10:00 am</option>
                                              <option value="10:15 am">10:15 am</option>
                                              <option value="10:30 am">10:30 am</option>
                                              <option value="10:45 am">10:45 am</option>
                                              <option value="11:00 am">11:00 am</option>
                                              <option value="11:15 am">11:15 am</option>
                                              <option value="11:30 am">11:30 am</option>
                                              <option value="11:45 am">11:45 am</option>
                                              <option value="12:00 pm">12:00 pm</option>
                                              <option value="12:15 pm">12:15 pm</option>
                                              <option value="12:30 pm">12:30 pm</option>
                                              <option value="12:45 pm">12:45 pm</option>
                                              <option value="13:00 pm">13:00 pm</option>
                                              <option value="13:15 pm">13:15 pm</option>
                                              <option value="13:30 pm">13:30 pm</option>
                                              <option value="13:45 pm">13:45 pm</option>
                                              <option value="14:00 pm">14:00 pm</option>
                                              <option value="14:15 pm">14:15 pm</option>
                                              <option value="14:30 pm">14:30 pm</option>
                                              <option value="14:45 pm">14:45 pm</option>
                                              <option value="15:00 pm">15:00 pm</option>
                                              <option value="15:15 pm">15:15 pm</option>
                                              <option value="15:30 pm">15:30 pm</option>
                                              <option value="15:45 pm">15:45 pm</option>
                                              <option value="16:00 pm">16:00 pm</option>
                                              <option value="16:15 pm">16:15 pm</option>
                                              <option value="16:30 pm">16:30 pm</option>
                                              <option value="16:45 pm">16:45 pm</option>
                                              <option value="17:00 pm">17:00 pm</option>
                                              <option value="17:15 pm">17:15 pm</option>
                                              <option value="17:30 pm">17:30 pm</option>
                                              <option value="17:45 pm">17:45 pm</option>
                                              <option value="18:00 pm">18:00 pm</option>
                                              <option value="18:15 pm">18:15 pm</option>
                                              <option value="18:30 pm">18:30 pm</option>
                                              <option value="18:45 pm">18:45 pm</option>
                                              <option value="19:00 pm">19:00 pm</option>
                                              <option value="19:15 pm">19:15 pm</option>
                                              <option value="19:30 pm">19:30 pm</option>
                                              <option value="19:45 pm">19:45 pm</option>
                                              <option value="20:00 pm">20:00 pm</option>
                                              <option value="20:15 pm">20:15 pm</option>
                                              <option value="20:30 pm">20:30 pm</option>
                                              <option value="20:45 pm">20:45 pm</option>
                                              <option value="21:00 pm">21:00 pm</option>
                                              <option value="21:15 pm">21:15 pm</option>
                                              <option value="21:30 pm">21:30 pm</option>
                                              <option value="21:45 pm">21:45 pm</option>
                                              <option value="22:00 pm">22:00 pm</option>
                                              <option value="22:15 pm">22:15 pm</option>
                                              <option value="22:30 pm">22:30 pm</option>
                                              <option value="22:45 pm">22:45 pm</option>
                                              <option value="23:00 pm">23:00 pm</option>
                                              <option value="23:15 pm">23:15 pm</option>
                                              <option value="23:30 pm">23:30 pm</option>
                                              <option value="23:45 pm">23:45 pm</option>                                              
                                              <option value="00:00 am">00:00 am</option>
                                              <option value="00:15 am">00:15 am</option>
                                              <option value="00:30 am">00:30 am</option>
                                              <option value="00:45 am">00:45 am</option>
                                              <option value="01:00 am">01:00 am</option>
                                              <option value="01:15 am">01:15 am</option>
                                              <option value="01:30 am">01:30 am</option>
                                              <option value="01:45 am">01:45 am</option>                                              
                                              <option value="02:00 am">02:00 am</option>
                                              <option value="02:15 am">02:15 am</option>
                                              <option value="02:30 am">02:30 am</option>
                                              <option value="02:45 am">02:45 am</option>                                              
                                              <option value="03:00 am">03:00 am</option>
                                              <option value="03:15 am">03:15 am</option>
                                              <option value="03:30 am">03:30 am</option>
                                              <option value="03:45 am">03:45 am</option>                                              
                                              <option value="04:00 am">04:00 am</option>
                                              <option value="04:15 am">04:15 am</option>
                                              <option value="04:30 am">04:30 am</option>
                                              <option value="04:45 am">04:45 am</option>                                              
                                              <option value="05:00 am">05:00 am</option>
                                              <option value="05:15 am">05:15 am</option>
                                              <option value="05:30 am">05:30 am</option>
                                              <option value="05:45 am">05:45 am</option>                                              
                                              <option value="06:00 am">06:00 am</option>
                                              <option value="06:15 am">06:15 am</option>
                                              <option value="06:30 am">06:30 am</option>
                                              <option value="06:45 am">06:45 am</option>                                              
                                              <option value="07:00 am">07:00 am</option>
                                              <option value="07:15 am">07:15 am</option>
                                              <option value="07:30 am">07:30 am</option>
                                              <option value="07:45 am">07:45 am</option>                                                                                            
                                            </select>
                                            <!-- <hr> -->
                                        </div>                                                                            
                                      </div>

                                         <!-- jueves   -->
                                        <div class="form-group">
                                        <div class="select-wrap" id="horariojueves" style="display: none;">
                                            <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                                            <select class="form-control" name="start_at[]" id="">
                                              <option value="">Elija hora de inicio del jueves</option>
                                                    <option value="8:00 am">8:00 am</option>                                        
                                              <option value="8:15 am">8:15 am</option>
                                              <option value="8:30 am">8:30 am</option>
                                              <option value="8:45 am">8:45 am</option>
                                              <option value="9:00 am">9:00 am</option>
                                              <option value="9:15 am">9:15 am</option>
                                              <option value="9:30 am">9:30 am</option>
                                              <option value="9:45 am">9:45 am</option>
                                              <option value="10:00 am">10:00 am</option>
                                              <option value="10:15 am">10:15 am</option>
                                              <option value="10:30 am">10:30 am</option>
                                              <option value="10:45 am">10:45 am</option>
                                              <option value="11:00 am">11:00 am</option>
                                              <option value="11:15 am">11:15 am</option>
                                              <option value="11:30 am">11:30 am</option>
                                              <option value="11:45 am">11:45 am</option>
                                              <option value="12:00 pm">12:00 pm</option>
                                              <option value="12:15 pm">12:15 pm</option>
                                              <option value="12:30 pm">12:30 pm</option>
                                              <option value="12:45 pm">12:45 pm</option>
                                              <option value="13:00 pm">13:00 pm</option>
                                              <option value="13:15 pm">13:15 pm</option>
                                              <option value="13:30 pm">13:30 pm</option>
                                              <option value="13:45 pm">13:45 pm</option>
                                              <option value="14:00 pm">14:00 pm</option>
                                              <option value="14:15 pm">14:15 pm</option>
                                              <option value="14:30 pm">14:30 pm</option>
                                              <option value="14:45 pm">14:45 pm</option>
                                              <option value="15:00 pm">15:00 pm</option>
                                              <option value="15:15 pm">15:15 pm</option>
                                              <option value="15:30 pm">15:30 pm</option>
                                              <option value="15:45 pm">15:45 pm</option>
                                              <option value="16:00 pm">16:00 pm</option>
                                              <option value="16:15 pm">16:15 pm</option>
                                              <option value="16:30 pm">16:30 pm</option>
                                              <option value="16:45 pm">16:45 pm</option>
                                              <option value="17:00 pm">17:00 pm</option>
                                              <option value="17:15 pm">17:15 pm</option>
                                              <option value="17:30 pm">17:30 pm</option>
                                              <option value="17:45 pm">17:45 pm</option>
                                              <option value="18:00 pm">18:00 pm</option>
                                              <option value="18:15 pm">18:15 pm</option>
                                              <option value="18:30 pm">18:30 pm</option>
                                              <option value="18:45 pm">18:45 pm</option>
                                              <option value="19:00 pm">19:00 pm</option>
                                              <option value="19:15 pm">19:15 pm</option>
                                              <option value="19:30 pm">19:30 pm</option>
                                              <option value="19:45 pm">19:45 pm</option>
                                              <option value="20:00 pm">20:00 pm</option>
                                              <option value="20:15 pm">20:15 pm</option>
                                              <option value="20:30 pm">20:30 pm</option>
                                              <option value="20:45 pm">20:45 pm</option>
                                              <option value="21:00 pm">21:00 pm</option>
                                              <option value="21:15 pm">21:15 pm</option>
                                              <option value="21:30 pm">21:30 pm</option>
                                              <option value="21:45 pm">21:45 pm</option>
                                              <option value="22:00 pm">22:00 pm</option>
                                              <option value="22:15 pm">22:15 pm</option>
                                              <option value="22:30 pm">22:30 pm</option>
                                              <option value="22:45 pm">22:45 pm</option>
                                              <option value="23:00 pm">23:00 pm</option>
                                              <option value="23:15 pm">23:15 pm</option>
                                              <option value="23:30 pm">23:30 pm</option>
                                              <option value="23:45 pm">23:45 pm</option>                                              
                                              <option value="00:00 am">00:00 am</option>
                                              <option value="00:15 am">00:15 am</option>
                                              <option value="00:30 am">00:30 am</option>
                                              <option value="00:45 am">00:45 am</option>
                                              <option value="01:00 am">01:00 am</option>
                                              <option value="01:15 am">01:15 am</option>
                                              <option value="01:30 am">01:30 am</option>
                                              <option value="01:45 am">01:45 am</option>                                              
                                              <option value="02:00 am">02:00 am</option>
                                              <option value="02:15 am">02:15 am</option>
                                              <option value="02:30 am">02:30 am</option>
                                              <option value="02:45 am">02:45 am</option>                                              
                                              <option value="03:00 am">03:00 am</option>
                                              <option value="03:15 am">03:15 am</option>
                                              <option value="03:30 am">03:30 am</option>
                                              <option value="03:45 am">03:45 am</option>                                              
                                              <option value="04:00 am">04:00 am</option>
                                              <option value="04:15 am">04:15 am</option>
                                              <option value="04:30 am">04:30 am</option>
                                              <option value="04:45 am">04:45 am</option>                                              
                                              <option value="05:00 am">05:00 am</option>
                                              <option value="05:15 am">05:15 am</option>
                                              <option value="05:30 am">05:30 am</option>
                                              <option value="05:45 am">05:45 am</option>                                              
                                              <option value="06:00 am">06:00 am</option>
                                              <option value="06:15 am">06:15 am</option>
                                              <option value="06:30 am">06:30 am</option>
                                              <option value="06:45 am">06:45 am</option>                                              
                                              <option value="07:00 am">07:00 am</option>
                                              <option value="07:15 am">07:15 am</option>
                                              <option value="07:30 am">07:30 am</option>
                                              <option value="07:45 am">07:45 am</option>                                                                                                                                                
                                            </select>
                                            <!-- <hr> -->
                                        </div>                                                                            
                                      </div>

                                          <!-- viernes   -->
                                        <div class="form-group">
                                        <div class="select-wrap" id="horarioviernes" style="display: none;">
                                            <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                                            <select class="form-control" name="start_at[]" id="">
                                              <option value="">Elija hora de inicio del viernes</option>
                                                                        <option value="8:00 am">8:00 am</option>                                        
                                              <option value="8:15 am">8:15 am</option>
                                              <option value="8:30 am">8:30 am</option>
                                              <option value="8:45 am">8:45 am</option>
                                              <option value="9:00 am">9:00 am</option>
                                              <option value="9:15 am">9:15 am</option>
                                              <option value="9:30 am">9:30 am</option>
                                              <option value="9:45 am">9:45 am</option>
                                              <option value="10:00 am">10:00 am</option>
                                              <option value="10:15 am">10:15 am</option>
                                              <option value="10:30 am">10:30 am</option>
                                              <option value="10:45 am">10:45 am</option>
                                              <option value="11:00 am">11:00 am</option>
                                              <option value="11:15 am">11:15 am</option>
                                              <option value="11:30 am">11:30 am</option>
                                              <option value="11:45 am">11:45 am</option>
                                              <option value="12:00 pm">12:00 pm</option>
                                              <option value="12:15 pm">12:15 pm</option>
                                              <option value="12:30 pm">12:30 pm</option>
                                              <option value="12:45 pm">12:45 pm</option>
                                              <option value="13:00 pm">13:00 pm</option>
                                              <option value="13:15 pm">13:15 pm</option>
                                              <option value="13:30 pm">13:30 pm</option>
                                              <option value="13:45 pm">13:45 pm</option>
                                              <option value="14:00 pm">14:00 pm</option>
                                              <option value="14:15 pm">14:15 pm</option>
                                              <option value="14:30 pm">14:30 pm</option>
                                              <option value="14:45 pm">14:45 pm</option>
                                              <option value="15:00 pm">15:00 pm</option>
                                              <option value="15:15 pm">15:15 pm</option>
                                              <option value="15:30 pm">15:30 pm</option>
                                              <option value="15:45 pm">15:45 pm</option>
                                              <option value="16:00 pm">16:00 pm</option>
                                              <option value="16:15 pm">16:15 pm</option>
                                              <option value="16:30 pm">16:30 pm</option>
                                              <option value="16:45 pm">16:45 pm</option>
                                              <option value="17:00 pm">17:00 pm</option>
                                              <option value="17:15 pm">17:15 pm</option>
                                              <option value="17:30 pm">17:30 pm</option>
                                              <option value="17:45 pm">17:45 pm</option>
                                              <option value="18:00 pm">18:00 pm</option>
                                              <option value="18:15 pm">18:15 pm</option>
                                              <option value="18:30 pm">18:30 pm</option>
                                              <option value="18:45 pm">18:45 pm</option>
                                              <option value="19:00 pm">19:00 pm</option>
                                              <option value="19:15 pm">19:15 pm</option>
                                              <option value="19:30 pm">19:30 pm</option>
                                              <option value="19:45 pm">19:45 pm</option>
                                              <option value="20:00 pm">20:00 pm</option>
                                              <option value="20:15 pm">20:15 pm</option>
                                              <option value="20:30 pm">20:30 pm</option>
                                              <option value="20:45 pm">20:45 pm</option>
                                              <option value="21:00 pm">21:00 pm</option>
                                              <option value="21:15 pm">21:15 pm</option>
                                              <option value="21:30 pm">21:30 pm</option>
                                              <option value="21:45 pm">21:45 pm</option>
                                              <option value="22:00 pm">22:00 pm</option>
                                              <option value="22:15 pm">22:15 pm</option>
                                              <option value="22:30 pm">22:30 pm</option>
                                              <option value="22:45 pm">22:45 pm</option>
                                              <option value="23:00 pm">23:00 pm</option>
                                              <option value="23:15 pm">23:15 pm</option>
                                              <option value="23:30 pm">23:30 pm</option>
                                              <option value="23:45 pm">23:45 pm</option>                                              
                                              <option value="00:00 am">00:00 am</option>
                                              <option value="00:15 am">00:15 am</option>
                                              <option value="00:30 am">00:30 am</option>
                                              <option value="00:45 am">00:45 am</option>
                                              <option value="01:00 am">01:00 am</option>
                                              <option value="01:15 am">01:15 am</option>
                                              <option value="01:30 am">01:30 am</option>
                                              <option value="01:45 am">01:45 am</option>                                              
                                              <option value="02:00 am">02:00 am</option>
                                              <option value="02:15 am">02:15 am</option>
                                              <option value="02:30 am">02:30 am</option>
                                              <option value="02:45 am">02:45 am</option>                                              
                                              <option value="03:00 am">03:00 am</option>
                                              <option value="03:15 am">03:15 am</option>
                                              <option value="03:30 am">03:30 am</option>
                                              <option value="03:45 am">03:45 am</option>                                              
                                              <option value="04:00 am">04:00 am</option>
                                              <option value="04:15 am">04:15 am</option>
                                              <option value="04:30 am">04:30 am</option>
                                              <option value="04:45 am">04:45 am</option>                                              
                                              <option value="05:00 am">05:00 am</option>
                                              <option value="05:15 am">05:15 am</option>
                                              <option value="05:30 am">05:30 am</option>
                                              <option value="05:45 am">05:45 am</option>                                              
                                              <option value="06:00 am">06:00 am</option>
                                              <option value="06:15 am">06:15 am</option>
                                              <option value="06:30 am">06:30 am</option>
                                              <option value="06:45 am">06:45 am</option>                                              
                                              <option value="07:00 am">07:00 am</option>
                                              <option value="07:15 am">07:15 am</option>
                                              <option value="07:30 am">07:30 am</option>
                                              <option value="07:45 am">07:45 am</option>                                                                                            
                                            </select>
                                            <!-- <hr> -->
                                        </div>                                                                            
                                      </div>


                                             <!-- sabado   -->
                                        <div class="form-group">
                                        <div class="select-wrap" id="horariosabado" style="display: none;">
                                            <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                                            <select class="form-control" name="start_at[]" id="">
                                              <option value="">Elija hora de inicio del sábado</option>
                                                   <option value="8:00 am">8:00 am</option>                                        
                                              <option value="8:15 am">8:15 am</option>
                                              <option value="8:30 am">8:30 am</option>
                                              <option value="8:45 am">8:45 am</option>
                                              <option value="9:00 am">9:00 am</option>
                                              <option value="9:15 am">9:15 am</option>
                                              <option value="9:30 am">9:30 am</option>
                                              <option value="9:45 am">9:45 am</option>
                                              <option value="10:00 am">10:00 am</option>
                                              <option value="10:15 am">10:15 am</option>
                                              <option value="10:30 am">10:30 am</option>
                                              <option value="10:45 am">10:45 am</option>
                                              <option value="11:00 am">11:00 am</option>
                                              <option value="11:15 am">11:15 am</option>
                                              <option value="11:30 am">11:30 am</option>
                                              <option value="11:45 am">11:45 am</option>
                                              <option value="12:00 pm">12:00 pm</option>
                                              <option value="12:15 pm">12:15 pm</option>
                                              <option value="12:30 pm">12:30 pm</option>
                                              <option value="12:45 pm">12:45 pm</option>
                                              <option value="13:00 pm">13:00 pm</option>
                                              <option value="13:15 pm">13:15 pm</option>
                                              <option value="13:30 pm">13:30 pm</option>
                                              <option value="13:45 pm">13:45 pm</option>
                                              <option value="14:00 pm">14:00 pm</option>
                                              <option value="14:15 pm">14:15 pm</option>
                                              <option value="14:30 pm">14:30 pm</option>
                                              <option value="14:45 pm">14:45 pm</option>
                                              <option value="15:00 pm">15:00 pm</option>
                                              <option value="15:15 pm">15:15 pm</option>
                                              <option value="15:30 pm">15:30 pm</option>
                                              <option value="15:45 pm">15:45 pm</option>
                                              <option value="16:00 pm">16:00 pm</option>
                                              <option value="16:15 pm">16:15 pm</option>
                                              <option value="16:30 pm">16:30 pm</option>
                                              <option value="16:45 pm">16:45 pm</option>
                                              <option value="17:00 pm">17:00 pm</option>
                                              <option value="17:15 pm">17:15 pm</option>
                                              <option value="17:30 pm">17:30 pm</option>
                                              <option value="17:45 pm">17:45 pm</option>
                                              <option value="18:00 pm">18:00 pm</option>
                                              <option value="18:15 pm">18:15 pm</option>
                                              <option value="18:30 pm">18:30 pm</option>
                                              <option value="18:45 pm">18:45 pm</option>
                                              <option value="19:00 pm">19:00 pm</option>
                                              <option value="19:15 pm">19:15 pm</option>
                                              <option value="19:30 pm">19:30 pm</option>
                                              <option value="19:45 pm">19:45 pm</option>
                                              <option value="20:00 pm">20:00 pm</option>
                                              <option value="20:15 pm">20:15 pm</option>
                                              <option value="20:30 pm">20:30 pm</option>
                                              <option value="20:45 pm">20:45 pm</option>
                                              <option value="21:00 pm">21:00 pm</option>
                                              <option value="21:15 pm">21:15 pm</option>
                                              <option value="21:30 pm">21:30 pm</option>
                                              <option value="21:45 pm">21:45 pm</option>
                                              <option value="22:00 pm">22:00 pm</option>
                                              <option value="22:15 pm">22:15 pm</option>
                                              <option value="22:30 pm">22:30 pm</option>
                                              <option value="22:45 pm">22:45 pm</option>
                                              <option value="23:00 pm">23:00 pm</option>
                                              <option value="23:15 pm">23:15 pm</option>
                                              <option value="23:30 pm">23:30 pm</option>
                                              <option value="23:45 pm">23:45 pm</option>                                              
                                              <option value="00:00 am">00:00 am</option>
                                              <option value="00:15 am">00:15 am</option>
                                              <option value="00:30 am">00:30 am</option>
                                              <option value="00:45 am">00:45 am</option>
                                              <option value="01:00 am">01:00 am</option>
                                              <option value="01:15 am">01:15 am</option>
                                              <option value="01:30 am">01:30 am</option>
                                              <option value="01:45 am">01:45 am</option>                                              
                                              <option value="02:00 am">02:00 am</option>
                                              <option value="02:15 am">02:15 am</option>
                                              <option value="02:30 am">02:30 am</option>
                                              <option value="02:45 am">02:45 am</option>                                              
                                              <option value="03:00 am">03:00 am</option>
                                              <option value="03:15 am">03:15 am</option>
                                              <option value="03:30 am">03:30 am</option>
                                              <option value="03:45 am">03:45 am</option>                                              
                                              <option value="04:00 am">04:00 am</option>
                                              <option value="04:15 am">04:15 am</option>
                                              <option value="04:30 am">04:30 am</option>
                                              <option value="04:45 am">04:45 am</option>                                              
                                              <option value="05:00 am">05:00 am</option>
                                              <option value="05:15 am">05:15 am</option>
                                              <option value="05:30 am">05:30 am</option>
                                              <option value="05:45 am">05:45 am</option>                                              
                                              <option value="06:00 am">06:00 am</option>
                                              <option value="06:15 am">06:15 am</option>
                                              <option value="06:30 am">06:30 am</option>
                                              <option value="06:45 am">06:45 am</option>                                              
                                              <option value="07:00 am">07:00 am</option>
                                              <option value="07:15 am">07:15 am</option>
                                              <option value="07:30 am">07:30 am</option>
                                              <option value="07:45 am">07:45 am</option>                                                                                                                                                
                                            </select>
                                            <!-- <hr> -->
                                        </div>                                                                            
                                      </div>



                                             <!-- domingo   -->
                                        <div class="form-group">
                                        <div class="select-wrap" id="horariodomingo" style="display: none;">
                                            <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                                            <select class="form-control" name="start_at[]" id="">
                                              <option value="">Elija hora de inicio del domingo</option>
                                              <option value="8:00 am">8:00 am</option>                                        
                                              <option value="8:15 am">8:15 am</option>
                                              <option value="8:30 am">8:30 am</option>
                                              <option value="8:45 am">8:45 am</option>
                                              <option value="9:00 am">9:00 am</option>
                                              <option value="9:15 am">9:15 am</option>
                                              <option value="9:30 am">9:30 am</option>
                                              <option value="9:45 am">9:45 am</option>
                                              <option value="10:00 am">10:00 am</option>
                                              <option value="10:15 am">10:15 am</option>
                                              <option value="10:30 am">10:30 am</option>
                                              <option value="10:45 am">10:45 am</option>
                                              <option value="11:00 am">11:00 am</option>
                                              <option value="11:15 am">11:15 am</option>
                                              <option value="11:30 am">11:30 am</option>
                                              <option value="11:45 am">11:45 am</option>
                                              <option value="12:00 pm">12:00 pm</option>
                                              <option value="12:15 pm">12:15 pm</option>
                                              <option value="12:30 pm">12:30 pm</option>
                                              <option value="12:45 pm">12:45 pm</option>
                                              <option value="13:00 pm">13:00 pm</option>
                                              <option value="13:15 pm">13:15 pm</option>
                                              <option value="13:30 pm">13:30 pm</option>
                                              <option value="13:45 pm">13:45 pm</option>
                                              <option value="14:00 pm">14:00 pm</option>
                                              <option value="14:15 pm">14:15 pm</option>
                                              <option value="14:30 pm">14:30 pm</option>
                                              <option value="14:45 pm">14:45 pm</option>
                                              <option value="15:00 pm">15:00 pm</option>
                                              <option value="15:15 pm">15:15 pm</option>
                                              <option value="15:30 pm">15:30 pm</option>
                                              <option value="15:45 pm">15:45 pm</option>
                                              <option value="16:00 pm">16:00 pm</option>
                                              <option value="16:15 pm">16:15 pm</option>
                                              <option value="16:30 pm">16:30 pm</option>
                                              <option value="16:45 pm">16:45 pm</option>
                                              <option value="17:00 pm">17:00 pm</option>
                                              <option value="17:15 pm">17:15 pm</option>
                                              <option value="17:30 pm">17:30 pm</option>
                                              <option value="17:45 pm">17:45 pm</option>
                                              <option value="18:00 pm">18:00 pm</option>
                                              <option value="18:15 pm">18:15 pm</option>
                                              <option value="18:30 pm">18:30 pm</option>
                                              <option value="18:45 pm">18:45 pm</option>
                                              <option value="19:00 pm">19:00 pm</option>
                                              <option value="19:15 pm">19:15 pm</option>
                                              <option value="19:30 pm">19:30 pm</option>
                                              <option value="19:45 pm">19:45 pm</option>
                                              <option value="20:00 pm">20:00 pm</option>
                                              <option value="20:15 pm">20:15 pm</option>
                                              <option value="20:30 pm">20:30 pm</option>
                                              <option value="20:45 pm">20:45 pm</option>
                                              <option value="21:00 pm">21:00 pm</option>
                                              <option value="21:15 pm">21:15 pm</option>
                                              <option value="21:30 pm">21:30 pm</option>
                                              <option value="21:45 pm">21:45 pm</option>
                                              <option value="22:00 pm">22:00 pm</option>
                                              <option value="22:15 pm">22:15 pm</option>
                                              <option value="22:30 pm">22:30 pm</option>
                                              <option value="22:45 pm">22:45 pm</option>
                                              <option value="23:00 pm">23:00 pm</option>
                                              <option value="23:15 pm">23:15 pm</option>
                                              <option value="23:30 pm">23:30 pm</option>
                                              <option value="23:45 pm">23:45 pm</option>                                              
                                              <option value="00:00 am">00:00 am</option>
                                              <option value="00:15 am">00:15 am</option>
                                              <option value="00:30 am">00:30 am</option>
                                              <option value="00:45 am">00:45 am</option>
                                              <option value="01:00 am">01:00 am</option>
                                              <option value="01:15 am">01:15 am</option>
                                              <option value="01:30 am">01:30 am</option>
                                              <option value="01:45 am">01:45 am</option>                                              
                                              <option value="02:00 am">02:00 am</option>
                                              <option value="02:15 am">02:15 am</option>
                                              <option value="02:30 am">02:30 am</option>
                                              <option value="02:45 am">02:45 am</option>                                              
                                              <option value="03:00 am">03:00 am</option>
                                              <option value="03:15 am">03:15 am</option>
                                              <option value="03:30 am">03:30 am</option>
                                              <option value="03:45 am">03:45 am</option>                                              
                                              <option value="04:00 am">04:00 am</option>
                                              <option value="04:15 am">04:15 am</option>
                                              <option value="04:30 am">04:30 am</option>
                                              <option value="04:45 am">04:45 am</option>                                              
                                              <option value="05:00 am">05:00 am</option>
                                              <option value="05:15 am">05:15 am</option>
                                              <option value="05:30 am">05:30 am</option>
                                              <option value="05:45 am">05:45 am</option>                                              
                                              <option value="06:00 am">06:00 am</option>
                                              <option value="06:15 am">06:15 am</option>
                                              <option value="06:30 am">06:30 am</option>
                                              <option value="06:45 am">06:45 am</option>                                              
                                              <option value="07:00 am">07:00 am</option>
                                              <option value="07:15 am">07:15 am</option>
                                              <option value="07:30 am">07:30 am</option>
                                              <option value="07:45 am">07:45 am</option>                                                                                            
                                            </select>
                                            <!-- <hr> -->
                                        </div>                                                                            
                                      </div>


                                                                            

                                  </div>
                              </div>

                              </div>   


                            </div>


                          </div>
                        </div>
                      </div>

                </div>                
                <!--====  End of GUIDE DURATION CONTENT PANE  ====-->



                <!--=================================================
                =            PEOPLE CONTENT PANE                    =
                ==================================================-->                            
                <div class="tab-pane fade" id="people" role="tabpanel" aria-labelledby="people-tab">
                       
                      <div class=" bg-light">
                        <div class="container">
                          <div class="row">

                            <div class="col-md-12 mb-0"  data-aos="fade">                         
                              <div class="p-4 mb-3 bg-white">      
                                   <p class="mb-2 font-weight-bold">¿Cuantas personas pueden asistir al tour?</p>
                                <p class="mb-2 font-weight-bold"></p>
                                  <div class="form-group">
                                    <div class="select-wrap">
                                        <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                                        <select class="form-control" name="capacity" id="">
                                          <option value="">Elija un número de personas</option>
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
                                      <input type="submit" value="Agregar" class="btn btn-primary py-2 px-4 text-white">
                                    </div>
                                  </div>                                                  

                              </div>  
                              <?php 
                                    $add = new TourController();
                                    $add->addTour();
                                   ?>

        


                            </div>


                          </div>
                        </div>
                      </div>

                </div>        
        </form>                                  
                <!--====  End of PEOPLE CONTENT PANE  ====-->
                
        

              </div>

      </div>
    </div>

<!--====  End of CREATE TOURS  ====-->



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
      $(function(){
            $('.lunes').change(function(){
              if($(this).prop('checked')){
                $('#horariolunes').show();
              }else{
                $('#horariolunes').hide();
              }
            
            })

          $('.martes').change(function(){
              if($(this).prop('checked')){
                $('#horariomartes').show();
              }else{
                $('#horariomartes').hide();
              }
            
            })

          $('.miercoles').change(function(){
              if($(this).prop('checked')){
                $('#horariomiercoles').show();
              }else{
                $('#horariomiercoles').hide();
              }
            
            })

          $('.jueves').change(function(){
              if($(this).prop('checked')){
                $('#horariojueves').show();
              }else{
                $('#horariojueves').hide();
              }
            
            })

          $('.viernes').change(function(){
              if($(this).prop('checked')){
                $('#horarioviernes').show();
              }else{
                $('#horarioviernes').hide();
              }
            
            })

          $('.sabado').change(function(){
              if($(this).prop('checked')){
                $('#horariosabado').show();
              }else{
                $('#horariosabado').hide();
              }
            
            })

          $('.domingo').change(function(){
              if($(this).prop('checked')){
                $('#horariodomingo').show();
              }else{
                $('#horariodomingo').hide();
              }
            
            })

          })


    </script>

<!--====  End of SCRIPTS  ====-->


  </body>
</html>