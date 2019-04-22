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
  <title>Tour setting</title>
  <?php include 'view/links/head_common.php'; ?>
  
  <!--====  End of Head common  ====-->
  
  <body>
  

  <!--============================
  =            HEADER            =
  =============================-->
  <?php include 'view/modules/header/header.php'; ?>     
  <!--====  End of HEADER  ====-->
  
  


<!--==========================
=            SETTINGS FORM            =
===========================-->

  <div class="site-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary">Configuración de tour</h2>
            <p class="color-black-opacity-5"><?php echo $_SESSION['findguide']; ?></p>
          </div>
        </div>

           <div class="row justify-content-center">
          <div class="col-md-8">
              

            <form method="post" class="p-5 bg-white">      
              <!-- id value from the get url -->              
              <input type="hidden" value="<?php echo $url[2]; ?>" name="id">                     
              <?php 
                  $getById=TourModel::getById($url[2],"tour");                 
               ?>
              <p>Puedes modificar la información de tour siempre que así lo desasdees</p>                            
              
              <div class="custom-control custom-checkbox form-check">
                  <input type="checkbox" class="custom-control-input spanish" id="toursetting" name="toursetting">
                  <label class="custom-control-label" for="toursetting">Modificar información de tour</label>
              </div>
              <hr>              
              
                <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">                  
                  <p class="mb-2 font-weight-bold">Nombre</p>
                  <input type="text" id="name" name="name" class="form-control" disabled="disabled" value="<?php echo $getById["name"]?>">
                </div>
                <div class="col-md-6">
                  <p class="mb-2 font-weight-bold">Description</p>
                  <input type="text" id="description" name="description" class="form-control" disabled="disabled" value="">
                </div>
              </div>

              <div class="row form-group">                
                <div class="col-md-12">
                  <p class="mb-2 font-weight-bold">Ubicación</p>
                  <input type="text" id="location" name="location" class="form-control" disabled="disabled" value="">
                </div>
              </div>

              <div class="row form-group">                
                <div class="col-md-12">
                  <p class="mb-2 font-weight-bold">¿Cómo me encuentran?</p>
                    <textarea id="findguide" name="findguide" class="form-control"  disabled="disabled" rows="3" placeholder="Será un interesante tour que inicia al centro del poblado..."></textarea>
                </div>
              </div>


                 <p class="mb-2 font-weight-bold">¿Cuanto tiempo durará el tour?</p>
                  <div class="form-group">
                    <div class="select-wrap">
                        <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                        <select class="form-control" name="duration" id="duration" disabled="disabled">
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


                  <p class="mb-2 font-weight-bold">¿Cuantas personas pueden asistir al tour?</p>
                    <p class="mb-2 font-weight-bold"></p>
                      <div class="form-group">
                        <div class="select-wrap">
                            <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                            <select class="form-control" name="capacity" id="capacity" disabled="disabled">
                              <option value="">Elija un número de personas</option>
                              <?php 

                                for($i=1; $i<=20; $i++){
                                  echo '<option value="'.$i.'">'.$i.'</option>';
                                }
                               ?>                                                                                  
                            </select>
                          </div>
                      </div>

<!--               <p class="mb-2 font-weight-bold">Estado</p>
                <div class="form-group">
                  <div class="select-wrap">
                      <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                      <select class="form-control" name="state" id="state" disabled="disabled">                        
                        <option value="Quintanaroo">Quintana Roo</option> -->                                        
                        <!-- <option value="yucatan">Yucatan</option> -->  
           <!--            </select>
                    </div>
                </div> -->

             <!--    <p class="mb-2 font-weight-bold">Municipio</p>
                <div class="form-group">
                  <div class="select-wrap">
                      <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                      <select class="form-control" name="town" id="town" disabled="disabled"> -->
                        <!-- <option value="">Elija municipio</option>
                        <option value="fcp">Felipe Carrillo Puerto</option> -->
                 <!--      </select>
                    </div>
                </div> -->

<!--               <p class="mb-2 font-weight-bold">Edad</p>
                <div class="form-group">
                  <div class="select-wrap">
                      <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                      <select class="form-control" name="age" id="age" disabled="disabled">
                        <option value="">Elija edad</option>
                                                  
                           <?php
                              //$edad=45; 
                              //for($i=18; $i<=$edad; $i++): 
                                //echo '<option value="'.$i.'">'.$i.'</option>';
                            ?> 
                                
                          <?php //endfor; ?>
                      </select>
                    </div>
                </div> -->

        <!--       <p class="mb-2 font-weight-bold">Nivel de estudios</p>
                <div class="form-group">
                  <div class="select-wrap">
                      <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                      <select class="form-control" name="grade" id="grade" disabled="disabled">                        
                        <option value="">Elija uno</option>                                        
                        <option value="">Básico</option>  
                        <option value="">Medio superior</option>  
                        <option value="">Superior</option>  
                        <option value="">Diplomados y cursos</option>                          
                      </select>
                    </div>
                </div> -->


             <!--  <p class="mb-2 font-weight-bold">Idioma(s) que más dominas</p>              
              <div class="row form-group">
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-3">
                       <div class="custom-control custom-checkbox form-check">
                          <input type="checkbox" class="custom-control-input spanish" id="spanish" name="spanish" disabled="disabled">
                            <label class="custom-control-label" for="spanish">Español</label>
                          </div>
                    </div>
                    <div class="col-md-3">
                       <div class="custom-control custom-checkbox form-check">
                          <input type="checkbox" class="custom-control-input mayan" id="mayan" disabled="disabled">
                            <label class="custom-control-label" for="mayan">Maya</label>
                          </div>
                    </div>
                    <div class="col-md-3">
                       <div class="custom-control custom-checkbox form-check">
                          <input type="checkbox" class="custom-control-input english" id="english" disabled="disabled">
                            <label class="custom-control-label" for="english">Inglés</label>
                          </div>
                    </div>
                    <div class="col-md-3">
                       <input type="text" id="otherlanguage" name="otherlanguage" class="form-control" placeholder="Otro idioma..." disabled="disabled">
                    </div>
                  </div>                                    
                </div>
              </div>    -->     


<!--              <p class="mb-2 font-weight-bold">Describe tu personalidad</p>
              <div class="form-group">
                 <textarea class="form-control" disabled="disabled"  rows="3" id="personality" name="personality" required><?php echo $getById["personality"]; ?></textarea>
              </div>

            <p class="mb-2 font-weight-bold">Habilidades</p>
              <div class="form-group">
                 <textarea class="form-control" disabled="disabled"  rows="3" id="ability" name="ability" required><?php echo $getById["ability"]; ?></textarea>
              </div>
 -->
        <!--      <p class="mb-2 font-weight-bold">Agrega una foto de perfil</p>
              <div class="form-group">
                 <input type="file" class="form-control" id="picture" id="picture" name="picture" disabled="disabled">
              </div>
              <br> -->

        <!--       <div class="row form-group">                
                <div class="col-md-12">
                  <p class="mb-2 font-weight-bold">Nuevo password</p>
                  <input type="password" id="password" name="password" class="form-control" disabled="disabled">
                </div>
              </div> -->

              <!--  <div class="row form-group">                
                <div class="col-md-12">
                  <p class="mb-2 font-weight-bold">Confirmarasdsad password</p>
                  <input type="password" id="confirmpassword" name="confirmpassword" class="form-control" disabled="disabled">
                </div>
              </div> -->




              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Actualizar" id="btnupdate" class="btn btn-primary py-2 px-4 text-white" disabled="disabled" >
                </div>
              </div>
                
                <?php 
                  $updateTour= new TourController();
                  $updateTour->update();
                 ?>
         

            </form>
          </div>
          
        </div>
        
      </div>
    </div>

<!--====  End of SETTINGS FORM  ====-->


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
    <footer class="site-footer">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-6">
            <h2 class="footer-heading mb-4">Acerca de nosotros</h2>
            <ul class="list-unstyled">
              <li><p>Conectamos guías privados con turistas y viajeros para experiencias </p></li>
            </ul>
          </div>
          <div class="col-md-3">
            <h2 class="footer-heading mb-4">Acerca del sitio</h2>
            <ul class="list-unstyled">
              <li><a href="#">Términos y condiciones</a></li>
              <li><a href="#">Ayuda</a></li>
              <li><a href="#">Contacto : ceo@guids.mx</a></li>
              <!-- <li><a href="#">+ 52 9000000000 </a></li> -->
            </ul>
          </div>
          <div class="col-md-3">
            <h2 class="footer-heading mb-4">Síguenos</h2>
            <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
            <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
            <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
            <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
          </div>
        </div>
      </div>
    </div>
    <div class="row pt-5 mt-5 text-center">
      <div class="col-md-12">
        <div class="border-top pt-5">
        <p>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        Copyright &copy;<script>document.write(new Date().getFullYear());</script>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </p>
        </div>
      </div>
      
    </div>
  </div>
</footer>

<!--====  End of FOOTER  ====-->


<!--=============================
=            SCRIPTS            =
==============================-->
<?php include 'view/links/footer_common.php'; ?>
<script src="http://localhost/guids/view/assets/js/jquery-3.3.1.min.js"></script>
<!--====  End of SCRIPTS  ====-->
      
  
  <!--=======================================================
  =            ENABLE OR DISABLE SETTING OPTIONS            =
  ========================================================-->
  
    <script>
    $(function(){
          $('#toursetting').change(function(){
              if($(this).prop('checked')){
                $('#name').prop("disabled", false);
                $('#description').prop("disabled", false);
                $('#location').prop("disabled", false);
                $('#findguide').prop("disabled", false);
                $('#duration').prop("disabled", false);                                
                $('#capacity').prop("disabled", false);
                $('#town').prop("disabled", false);
                $('#age').prop("disabled", false);
                $('#grade').prop("disabled", false);
                $('#spanish').prop("disabled", false);
                $('#mayan').prop("disabled", false);
                $('#english').prop("disabled", false);
                $('#otherlanguage').prop("disabled", false);
                $('#personality').prop("disabled", false);
                $('#ability').prop("disabled", false);
                $('#picture').prop("disabled", false);
                $('#password').prop("disabled", false);
                $('#confirmpassword').prop("disabled", false);
                $('#btnupdate').prop("disabled", false);
              }else{
                $('#name').prop("disabled", true);
                $('#description').prop("disabled", true);
                $('#location').prop("disabled", true);
                $('#findguide').prop("disabled", true);
                $('#duration').prop("disabled", true);                                                
                $('#capacity').prop("disabled", true);
                $('#town').prop("disabled", true);
                $('#age').prop("disabled", true);
                $('#grade').prop("disabled", true);
                $('#spanish').prop("disabled", true);
                $('#mayan').prop("disabled", true);
                $('#english').prop("disabled", true);
                $('#otherlanguage').prop("disabled", true);
                $('#personality').prop("disabled", true);
                $('#ability').prop("disabled", true);
                $('#picture').prop("disabled", true); 
                $('#password').prop("disabled", true);
                $('#confirmpassword').prop("disabled", true);               
                $('#btnupdate').prop("disabled", true);  
              }          
        })



    })

  </script>
  
  <!--====  End of ENABLE OR DISABLE SETTING OPTIONS  ====-->
  



<!--====  End of SCRIPTS  ====-->
      

  </body>
</html>