<!-- <?php   //session_start(); ?> -->
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
  

  


  <!--================================
  =            INFO IMAGE            =
  =================================-->
  
      <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(view/assets/images/Cancun.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-10">
            
            
            <div class="row justify-content-center">
              <div class="col-md-8 text-center">
                <h1 data-aos="fade-up">Regístrate y comienza a ser uno de los mejores guías de turista</h1>
              <!--   <p class="mb-0" data-aos="fade-up" data-aos-delay="100">¿Ya tienes una cuenta? Adelante prueba <a href="login.php" style="color: white">iniciar sesión</a></p> -->
              </div>
            </div>

            
          </div>
        </div>
      </div>
    </div>  
  
  <!--====  End of INFO IMAGE  ====-->
  
  


<!--===================================
=            REGISTER FORM            =
====================================-->
<div class="site-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-8 text-center border-primary">
            <h2 class="font-weight-light text-primary">Registro de información</h2>
            <p class="color-black-opacity-5">Completa todos los campos</p>
          </div>
        </div>


        <div class="row justify-content-center">
          <div class="col-md-9">
              

            <form method="post" class="p-5 bg-white">             
              <p>La información de perfil nos permitirá conocer mas acerca de ti.</p>
              
              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">                  
                  <p class="mb-2 font-weight-bold">Nombre</p>
                  <input type="text" id="name" name="name" class="form-control" placeholder="Escribe tu nombre" required>
                </div>
                <div class="col-md-6">
                  <p class="mb-2 font-weight-bold">Apellidos</p>
                  <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Escribe tus apellidos" required>
                </div>
              </div>

              <div class="row form-group">                
                <div class="col-md-12">
                  <p class="mb-2 font-weight-bold">Teléfono</p>
                  <input type="text" id="phone" name="phone" class="form-control" placeholder="Escribe tu número de 10 dígitos" required>
                </div>
              </div>

              <div class="row form-group">                
                <div class="col-md-12">
                  <p class="mb-2 font-weight-bold">Email</p>
                  <input type="email" id="email" name="email" class="form-control" placeholder="Escribe tu correo" required>
                </div>
              </div>

              <div class="row form-group">
                
                <div class="col-md-12">
                  <p class="mb-2 font-weight-bold">Password</p>
                  <input type="password" id="password" name="password" class="form-control" placeholder="Escribe un password" required>
                </div>
              </div>

              <p class="mb-2 font-weight-bold">Estado</p>
                <div class="form-group">
                  <div class="select-wrap">
                      <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                      <select class="form-control" name="state" id="state" required>                        
                        <option value="Quintanaroo">Quintana Roo</option>                                        
                        <!-- <option value="yucatan">Yucatan</option> -->  
                      </select>
                    </div>
                </div>

                <p class="mb-2 font-weight-bold">Municipio</p>
                <div class="form-group">
                  <div class="select-wrap">
                      <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                      <select class="form-control" name="town" id="town" required>
                        <!-- <option value="">Elija municipio</option>
                        <option value="fcp">Felipe Carrillo Puerto</option>                                         -->
                      </select>
                    </div>
                </div>
<!-- 
                   <div class="row form-group">                
                <div class="col-md-12">
                  <p class="mb-2 font-weight-bold">Fecha de nacimiento</p>
                  <input type="date" id="birthday" name="birthday" class="form-control" placeholder="Escribe tu correo">
                </div>
              </div> -->

              <p class="mb-2 font-weight-bold">Fecha de nacimiento</p>              
              <div class="row form-group">
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                          <div class="select-wrap">
                              <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>                              
                              <select class="form-control" name="day" id="day" required>
                                <option value="">Día</option>
                                <?php 
                                  $dia=31;
                                  for($i=1; $i<=$dia; $i++){
                                    echo '<option value='.$i.'>'.$i.'</option>';
                                  }
                                 ?>                                                                
                              </select>
                            </div>
                        </div>
                    </div>
                      <div class="col-md-4">
                      <div class="form-group">
                          <div class="select-wrap">
                              <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>                              
                              <select class="form-control" name="month" id="month" required>
                                <option value="">Mes</option>
                                <option value="01">Enero</option>
                                <option value="02">Febrero</option>
                                <option value="03">Marzo</option>
                                <option value="04">Abril</option>
                                <option value="05">Mayo</option>
                                <option value="06">Junio</option>
                                <option value="07">Julio</option>
                                <option value="08">Agosto</option>
                                <option value="09">Septiembre</option>
                                <option value="10">Octubre</option>
                                <option value="11">Noviembre</option>                                
                                <option value="12">Diciembre</option>                                
                                <!--  -->                                                            
                              </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                          <div class="select-wrap">
                              <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>                              
                              <select class="form-control" name="year" id="year" required>
                                <option value="">Año</option>
                                <?php                                   
                                  $aniofin=date("Y");
                                  
                                  for($anioinicio=1900; $anioinicio<=$aniofin; $anioinicio++){                                    
                                    echo '<option value='.$anioinicio.'>'.$anioinicio.'</option>';
                                    
                                  }
                                 ?>                                                                
                              </select>
                            </div>
                        </div>
                    </div>                   
                  </div>                                    
                </div>
              </div>   

              <p class="mb-2 font-weight-bold">Nivel de estudios</p>
                <div class="form-group">
                  <div class="select-wrap">
                      <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                      <select class="form-control" name="grade" id="grade" required>

                        <option value="">Nivel de estudios</option>                                
                        <option value="Basico">Básico</option>                                
                        <option value="Mediosuperior">Medio superior</option>                                
                        <option value="Superior">Superior</option> 
                        <option value="Diplomadosycursos">Diplomados y cursos</option>                                                            
                      </select>
                    </div>
                </div>


     <!--          <p class="mb-2 font-weight-bold">Idioma(s) que más dominas</p>              
              <div class="row form-group">
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-3">
                       <div class="custom-control custom-checkbox form-check">
                          <input type="checkbox" class="custom-control-input spanish" id="spanish" name="lenguage[]" value="spanish">
                            <label class="custom-control-label" for="spanish">Español</label>
                          </div>
                    </div>
                    <div class="col-md-3">
                       <div class="custom-control custom-checkbox form-check">
                          <input type="checkbox" class="custom-control-input mayan" id="mayan" name="lenguage[]" value="mayan">
                            <label class="custom-control-label" for="mayan">Maya</label>
                          </div>
                    </div>
                    <div class="col-md-3">
                       <div class="custom-control custom-checkbox form-check">
                          <input type="checkbox" class="custom-control-input english" id="english" name="lenguage[]" value="english">
                            <label class="custom-control-label" for="english">Inglés</label>
                          </div>
                    </div>
                    <div class="col-md-3">
                       <input type="text" id="otherlanguage" name="lenguage[]" class="form-control" placeholder="Otro idioma...">
                    </div>
                  </div>                                    
                </div>
              </div>        


 -->
             <p class="mb-2 font-weight-bold">Idioma(s)</p>
                <div class="form-group">
                  <div class="select-wrap">                      
                      <select class="form-control" multiple name="language[]"  id="language" required>
                        <option value="">Selecciona tus idiomas</option>                                
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

              <p class="mb-2 font-weight-bold">Describe tu personalidad</p>
              <div class="form-group">
                 <textarea class="form-control"  rows="3" id="personality" name="personality" placeholder="Optimista, siempre positivo y siempre cumplo lo que me propongo..." required></textarea>

              </div>

              <p class="mb-2 font-weight-bold">Habilidades</p>
              <div class="form-group">
                 <textarea class="form-control"  rows="3" id="ability" name="ability" placeholder="Pesuasivo, facilidad de palabra..." required></textarea>
              </div>

    <!--          <p class="mb-2 font-weight-bold">Agrega una foto de perfil</p>
              <div class="form-group">
                 <input type="file" class="form-control" id="inputGroupFile04" id="picture" name="picture">
              </div>
 -->


              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Registarse" class="btn btn-primary py-2 px-4 text-white">
                </div>
              </div>


                <?php 
                      $newuser = new SignupController();
                      $newuser->newUserSignupController();                

                ?> 

         


            </form>
          </div>
          
        </div>
        
      </div>
    </div>

<!--====  End of REGISTER FORM  ====-->



<!--==========================
=            FAQS            =
===========================-->
<!-- 
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
 -->
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

<!--====  End of SCRIPTS  ====-->



    
  </body>
</html>