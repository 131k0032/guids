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
  <title><?php echo $lang["Agregar tour"]; ?></title>

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
            <h2 class="font-weight-light text-primary"><?php echo $lang["Agregar un tour"]; ?></h2>
            <p class="color-black-opacity-5"><?php echo $lang["Completa todos los campos"]; ?></p>
          </div>
        </div>
        
              <ul class="nav nav-tabs" id="myTab" role="tablist">               
                <li class="nav-item">
                  <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">1. <?php echo $lang["Describe el tour"]; ?></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="location-tab" data-toggle="tab" href="#location" role="tab" aria-controls="location" aria-selected=false>2. <?php echo $lang["¿Dónde será el tour?"]; ?></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="image-tab" data-toggle="tab" href="#image" role="tab" aria-controls="image" aria-selected="false">3. <?php echo $lang["Agrega una foto"]; ?></a>
                </li>
                 <li class="nav-item">
                  <a class="nav-link" id="duration-tab" data-toggle="tab" href="#duration" role="tab" aria-controls="duration" aria-selected="false">4. <?php echo $lang["Horario y duración"]; ?></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="people-tab" data-toggle="tab" href="#people" role="tab" aria-controls="people" aria-selected="false">5. ¿Cuántas personas pueden asistir  al tour?</a>
                </li>
              </ul>


               
<form  method="post" enctype="multipart/form-data" id="addtour">

              <div class="tab-content" id="myTabContent">

                 <!--=================================================
                =            GUIDE DESCRIPTION CONTENT PANE            =
                ==================================================-->
                <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">

                      <div class=" bg-light">
                        <div class="container">
                          <div class="row">

                            <div class="col-md-12 mb-0"  data-aos="fade">
                              <div class="p-4 mb-3 bg-white">                                         
                                
                                  <p class="mb-2 font-weight-bold"><?php echo $lang["Nombre del tour"]; ?></p>
                                  <style>
                                    form label.error {
                                      float: right;
                                      color: #f23a2e;
                                      font-weight:bold;
                                      font-size: 12px 
                                      /*vertical-align: top;*/
                                    }
                                  </style>
                                  <div class="h-entry"><div class="meta"><?php echo $lang["Un nombre interesante lo hace más llamativo"]; ?></div></div>
                                <!-- <form action="test" method="post"> -->
                                  <div class="form-group">                  
                                    <div class="wrap-icon">
                                      <!-- <span class="icon icon-room"></span> -->
                                      <!-- For send mail vars from header-->
                                      <input type="hidden" name="user_name" class="form-control" value="<?php echo $name ?>">
                                      <input type="hidden" name="user_lastname" class="form-control" value="<?php echo $lastname ?>">
                                      <input type="hidden" name="user_email" class="form-control" value="<?php echo $email ?>">

                                      <input type="text" name="name" class="form-control" placeholder="<?php echo $lang["Tour mágico en la Quinta Avenida"] ?>" required>
                                    </div>
                                  </div>
                                  
                                  <p class="mb-2 font-weight-bold"><?php echo $lang["Descripción del tour"]; ?></p>
                                  <div class="h-entry"><div class="meta"><?php echo $lang["Describe de que se trata el tour y las actividades que harás"]; ?></div></div>
                                  <div class="form-group">
                                  <textarea id="editor" style="resize:none" required name="description" class="form-control"  rows="3" placeholder="<?php echo $lang["Un tour que dará a conocer los puntos más destacados de la quinta avenida de Playa del Carmen, comenzaremos con una breve explicación de la
historia, despúes nos desplazaremos en la calle... Por último..."] ?>"></textarea>
                                  </div>

                                  <p class="mb-2 font-weight-bold"><?php echo $lang["Idioma preferido para dar el tour"]; ?></p>
                                  <div class="h-entry"><div class="meta"><?php echo $lang["Este idioma será con el que darás el tour"]; ?></div></div>
                                  <div class="form-group">
                                    <div class="select-wrap">
                                        <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                                        <select class="form-control" name="language" id="language" required>
                                          <option value=""><?php echo $lang["Elija un idioma"]; ?></option>
                                         <?php
                                           $language =  new LanguageController();
                                           foreach ( $language -> getAllLanguageController() as $row => $value) {
                                         ?>
                                        <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                        <?php }
                                        if (!isset($value['name'])) {
                                          echo '<option value="" disabled>Sin registros</option>';
                                        } ?>
                                        </select>
                                      </div>
                                  </div>

                                <!-- </form> -->
                              </div>   
                              

                            </div>


                          </div>
                        </div>
                      </div>
                </div>                             
                <!--====  End of GUIDE DESCRIPTION CONTENT PANE  ====-->
                                
                <!--===================================================
                =            GUIDE LOCATION CONTENT PANE            =
                ====================================================-->                
                

                <div class="tab-pane fade" id="location" role="tabpanel" aria-labelledby="location-tab">

                      <div class=" bg-light">
                        <div class="container">
                          <div class="row">

                            <div class="col-md-12 mb-0"  data-aos="fade">
                              <div class="p-4 mb-3 bg-white">                                         
                                
                                  <p class="mb-2 font-weight-bold"><?php echo $lang["Lugar del tour"]; ?></p>
                                  <div class="h-entry"><div class="meta"><?php echo $lang["Escribe el lugar exacto donde vas a realizar el Tour"]; ?></div></div>
                                  <div class="form-group">                  
                                    <div class="wrap-icon">
                                      <!-- <span class="icon icon-room"></span> -->
                                      <input type="text" name="location" class="form-control" placeholder="<?php echo $lang["Playa del carmen, Quintana Roo"] ?>" required>
                                    </div>
                                  </div>
                                  
                                   <p class="mb-2 font-weight-bold"><?php echo $lang["Describe como te van a encontrar antes del tour"]; ?></p>
                                   <div class="h-entry"><div class="meta"><?php echo $lang["Especifica algunas características para que los turistas/viajeros te reconozcan"]; ?></div></div>
                                  <div class="form-group">
                                    <textarea style="resize:none" required name="find_guide" class="form-control"  rows="3" placeholder="<?php echo $lang["Soy alto con cabello, largo, normalmente traigo puesta una gorra"] ?>"></textarea>
                                  </div>  

                                    <p class="mb-2 font-weight-bold"><?php echo $lang["Especifica un punto de encuentro del tour"]; ?></p>
                                    <div class="h-entry"><div class="meta"><?php echo $lang["Describe donde te pueden localizar al para iniciar el tour"]; ?></div></div>
                                  <div class="form-group">
                                    <textarea style="resize:none" required name="start_in" class="form-control"  rows="3" placeholder="<?php echo $lang["Será en el parque central, junto a la glorieta..."] ?>"></textarea>
                                  </div>                                         

                                <!-- </form> -->
                              </div>   


                            </div>


                          </div>
                        </div>
                      </div>
                </div> 

                <!--====  End of GUIDE LOCATION CONTENT PANE  ====-->
                

                <!--==============================================
                =            IMAGE FILES CONTENT PANE            =
                ===============================================-->                
                <div class="tab-pane fade" id="image" role="tabpanel" aria-labelledby="image-tab">
                    
                      <div class=" bg-light">
                        <div class="container">
                          <div class="row">

                            <div class="col-md-12 mb-0"  data-aos="fade">
                              <div class="p-4 mb-3 bg-white">                                         
                                


                                  <p class="mb-2 font-weight-bold"><?php echo $lang["Agrega una imagen del tour"]; ?></p>
                                  <div class="h-entry"><div class="meta"><?php echo $lang["Es importante que adjuntes una imagen real y relacionada al tour, si son tomadas por ti mucho mejor"]; ?></div></div>
                                  <div class="form-group">
                                     <input type="file" class="form-control" name="src" id="src" data-validation-allowing="jpg, png" accept="image/*" required>
                                  </div>


                                <!-- </form> -->
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

                                <p class="mb-2 font-weight-bold"><?php echo $lang["¿Cuánto tiempo durará el tour?"]; ?></p>
                                <div class="h-entry"><div class="meta"><?php echo $lang["Puedes elegir la duración del tour de acuerdo a tu disponibilidad de horario"]; ?></div></div>
                                  <div class="form-group">
                                    <div class="select-wrap">
                                        <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                                        <select class="form-control" name="duration" id="duration" required>
                                          <option value=""><?php echo $lang["Elija una aproximación"]; ?></option>
                                          <option value="1:00-h">1:00 h</option>                                        
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
                                
                                  <p class="mb-2 font-weight-bold"><?php echo $lang["Elija los días para el tour"]; ?></p>
                                  <div class="h-entry"><div class="meta"><?php echo $lang["Puedes elegir uno o varios días para dar el tour, no olvides elegir el horario de inicio"]; ?> </div></div>
                                                                 
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input lunes"  id="lunes" name="day[]" value="1">
                                        <label class="custom-control-label" for="lunes"><?php echo $lang["Lunes"]; ?></label>
                                    </div>
                                    <hr>
                                    
                                     
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input martes" id="martes" name="day[]" value="2">
                                        <label class="custom-control-label" for="martes"><?php echo $lang["Martes"]; ?></label>
                                    </div>
                                    <hr>
                                    

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input miercoles" id="miercoles" name="day[]" value="3">
                                        <label class="custom-control-label" for="miercoles"><?php echo $lang["Miércoles"]; ?></label>
                                    </div>
                                    <hr>
                                    

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input jueves" id="jueves" name="day[]" value="4">
                                        <label class="custom-control-label" for="jueves"><?php echo $lang["Jueves"]; ?></label>
                                    </div>
                                    <hr>
                                    

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input viernes" id="viernes" name="day[]" value="5">
                                        <label class="custom-control-label" for="viernes"><?php echo $lang["Viernes"]; ?></label>
                                    </div>
                                    <hr>
                                    

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input sabado" id="sabado" name="day[]" value="6">
                                        <label class="custom-control-label" for="sabado"><?php echo $lang["Sábado"]; ?></label>
                                    </div>
                                    <hr>
                                    

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input domingo" id="domingo" name="day[]" value="7">
                                        <label class="custom-control-label" for="domingo"><?php echo $lang["Domingo"]; ?></label>
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
                                              <option value=""><?php echo $lang["Elija un horario de inicio para el lunes"]; ?></option>
                                              <option value="08:00 am">08:00 am</option>                                        
                                              <option value="08:15 am">08:15 am</option>
                                              <option value="08:30 am">08:30 am</option>
                                              <option value="08:45 am">08:45 am</option>
                                              <option value="09:00 am">09:00 am</option>
                                              <option value="09:15 am">09:15 am</option>
                                              <option value="09:30 am">09:30 am</option>
                                              <option value="09:45 am">09:45 am</option>
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
                                              <option value=""><?php echo $lang["Elija un horario de inicio para el martes"]; ?></option>
                                              <option value="08:00 am">08:00 am</option>                                        
                                              <option value="08:15 am">08:15 am</option>
                                              <option value="08:30 am">08:30 am</option>
                                              <option value="08:45 am">08:45 am</option>
                                              <option value="09:00 am">09:00 am</option>
                                              <option value="09:15 am">09:15 am</option>
                                              <option value="09:30 am">09:30 am</option>
                                              <option value="09:45 am">09:45 am</option>
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
                                              <option value=""><?php echo $lang["Elija un horario de inicio para el miércoles"]; ?></option>                                                                                                                
                                              <option value="08:00 am">08:00 am</option>                                        
                                              <option value="08:15 am">08:15 am</option>
                                              <option value="08:30 am">08:30 am</option>
                                              <option value="08:45 am">08:45 am</option>
                                              <option value="09:00 am">09:00 am</option>
                                              <option value="09:15 am">09:15 am</option>
                                              <option value="09:30 am">09:30 am</option>
                                              <option value="09:45 am">09:45 am</option>
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
                                              <option value=""><?php echo $lang["Elija un horario de inicio para el jueves"]; ?></option>
                                              <option value="08:00 am">08:00 am</option>                                        
                                              <option value="08:15 am">08:15 am</option>
                                              <option value="08:30 am">08:30 am</option>
                                              <option value="08:45 am">08:45 am</option>
                                              <option value="09:00 am">09:00 am</option>
                                              <option value="09:15 am">09:15 am</option>
                                              <option value="09:30 am">09:30 am</option>
                                              <option value="09:45 am">09:45 am</option>
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
                                              <option value=""><?php echo $lang["Elija un horario de inicio para el viernes"]; ?></option>
                                              <option value="08:00 am">08:00 am</option>                                        
                                              <option value="08:15 am">08:15 am</option>
                                              <option value="08:30 am">08:30 am</option>
                                              <option value="08:45 am">08:45 am</option>
                                              <option value="09:00 am">09:00 am</option>
                                              <option value="09:15 am">09:15 am</option>
                                              <option value="09:30 am">09:30 am</option>
                                              <option value="09:45 am">09:45 am</option>
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
                                              <option value=""><?php echo $lang["Elija un horario de inicio para el sábado"]; ?></option>
                                              <option value="08:00 am">08:00 am</option>                                        
                                              <option value="08:15 am">08:15 am</option>
                                              <option value="08:30 am">08:30 am</option>
                                              <option value="08:45 am">08:45 am</option>
                                              <option value="09:00 am">09:00 am</option>
                                              <option value="09:15 am">09:15 am</option>
                                              <option value="09:30 am">09:30 am</option>
                                              <option value="09:45 am">09:45 am</option>
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
                                              <option value=""><?php echo $lang["Elija un horario de inicio para el domingo"]; ?></option>
                                              <option value="08:00 am">08:00 am</option>                                        
                                              <option value="08:15 am">08:15 am</option>
                                              <option value="08:30 am">08:30 am</option>
                                              <option value="08:45 am">08:45 am</option>
                                              <option value="09:00 am">09:00 am</option>
                                              <option value="09:15 am">09:15 am</option>
                                              <option value="09:30 am">09:30 am</option>
                                              <option value="09:45 am">09:45 am</option>
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
                               <p class="mb-2 font-weight-bold"><?php echo $lang["¿Cuántas personas pueden asistir al tour?"]; ?></p>
                                 <div class="h-entry"><div class="meta"><?php echo $lang["Será la cantidad de personas que podrás admitir en el tour"]; ?></div></div>
                                <p class="mb-2 font-weight-bold"></p>
                                  <div class="form-group">
                                    <div class="select-wrap">
                                        <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                                        <select class="form-control" name="capacity" id=""  required>
                                          <option value=""><?php echo $lang["Elija un número de personas"]; ?></option>
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
                                      <input type="submit" value="<?php echo $lang["Crear tour"] ?>" class="btn btn-primary py-2 px-4 text-white">
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


<!-- day scipts -->
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
    <!-- end day scipts -->

    <!-- validation -->
    <script>

      $().ready(function() {
      $("#addtour").validate({
        ignore:"",//For contemplate all inputs
        rules: {        
          name: { 
            required:true,             
          },
          description:{
            required:true,
          },
          language:{
            required:true,
          },
          location:{
            required:true,
          },
          find_guide:{
            required:true,
          },
          start_in:{
            required:true,
          },
          src:{
            required:true,
          },
          duration:{
            required:true,
          },
          capacity:{
            required:true,
          },



        },
        messages: {
          name : "<?php echo $lang["Nombre del tour es requerido."] ?>",    
          description : "<?php echo $lang["Descripión del tour es requerido."] ?>",   
          language : "<?php echo $lang["Idioma del tour es requerido."] ?>",     
          location : "<?php echo $lang["Ubicación excacta del tour es requerido."] ?>",    
          find_guide : "<?php echo $lang["Descripión de guia es requerido."] ?>",    
          start_in : "<?php echo $lang["Punto de encuentro del tour es requerido."] ?>",    
          src : "<?php echo $lang["Imagen del tour es requerido."] ?>",    
          duration : "<?php echo $lang["Duración del tour es requerido."] ?>",    
          capacity : "<?php echo $lang["Capacidad de personas es requerido."] ?>",
        }
      });
    });
    </script>
    <!-- end validation -->

<!-- Editor -->
 <script type="text/javascript">
        $(document).ready(function () {
            $("#editor").editor({
                uiLibrary: 'bootstrap4'
            });
        });
 </script>
<!-- End Editor -->
<!--====  End of SCRIPTS  ====-->


  </body>
</html>