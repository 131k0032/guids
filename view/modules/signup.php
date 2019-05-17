
<?php 

session_start();
# ===========================================
# =           Language validation           =
# ===========================================

$lang = new LanguageController();
require_once "view/languages/".$lang->validate().".php";//include lang


# ======  End of Language validation  =======


 ?>
<!DOCTYPE html>
<html lang="en">
  <!--=================================
  =            Head common            =
  ==================================-->
  <title><?php echo $lang["Registro"]; ?></title>
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
                <h1 data-aos="fade-up"><?php echo $lang["Forma parte"]; ?> <span class="typed-words"></span></h1>
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
            <h2 class="font-weight-light text-primary"><?php echo $lang["Registro de información"]; ?></h2>
            <p class="color-black-opacity-5"><?php echo $lang["Completa todos los campos"]; ?></p>
          </div>
        </div>


        <div class="row justify-content-center">
          <div class="col-md-9">
              

            <form method="post" class="p-5 bg-white" id="signup">             
              <p><?php echo $lang["La información de perfil nos permitirá conocer mas acerca de ti."]; ?></p>
              <style>
                form label.error {
                  float: right;
                  color: #f23a2e;
                  font-weight:bold;
                  font-size: 12px 
                  /*vertical-align: top;*/
                }
              </style>              
              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">                  
                  <p class="mb-2 font-weight-bold"><?php echo $lang["Nombre"]; ?></p>
                  <input type="text" id="name" name="name" class="form-control" placeholder="<?php echo $lang["Escribe tu nombre"] ?>" required>
                </div>
                <div class="col-md-6">
                  <p class="mb-2 font-weight-bold"><?php echo $lang["Apellidos"]; ?></p>
                  <input type="text" id="lastname" name="lastname" class="form-control" placeholder="<?php echo $lang["Escribe tus apellidos"] ?>" required>
                </div>
              </div>

              <div class="row form-group">                
                <div class="col-md-12">
                  <p class="mb-2 font-weight-bold"><?php echo $lang["Teléfono"]; ?></p>
                  <input type="text" id="phone" name="phone" class="form-control" maxlength="10" number="true" pattern="[0-9]" placeholder="<?php echo $lang["Escribe tu número de 10 dígitos"] ?>" required>
                </div>
              </div>

              <div class="row form-group">                
                <div class="col-md-12">
                  <p class="mb-2 font-weight-bold"><?php echo $lang["Correo"]; ?></p>
                  <input type="email" id="email" name="email" class="form-control" placeholder="<?php echo $lang["Escribe tu correo"] ?>" required>
                </div>
              </div>

              <div class="row form-group">
                
                <div class="col-md-12">
                  <p class="mb-2 font-weight-bold"><?php echo $lang["Contraseña"]; ?></p>
                  <input type="password" id="password" name="password" class="form-control" placeholder="<?php echo $lang["Escribe una contraseña"] ?>" required>
                </div>
              </div>

              <p class="mb-2 font-weight-bold"><?php echo $lang["Estado"]; ?></p>
                <div class="form-group">
                  <div class="select-wrap">
                      <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                      <select class="form-control" name="state" id="state" required>                                                
                        <option value="Quintanaroo">Quintana Roo</option>                                        
                        <!-- <option value="yucatan">Yucatan</option> -->  
                      </select>
                    </div>
                </div>

                <p class="mb-2 font-weight-bold"><?php echo $lang["Municipio"]; ?></p>
                <div class="form-group">
                  <div class="select-wrap">
                      <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                      <select class="form-control" name="town" id="town" required>
                        <!-- <option value="">Elija municipio</option>
                        <option value="fcp">Felipe Carrillo Puerto</option>                                         -->
                      </select>
                    </div>
                </div>

              <p class="mb-2 font-weight-bold"><?php echo $lang["Fecha de nacimiento"]; ?></p>              
              <div class="row form-group">
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                          <div class="select-wrap">
                              <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>                              
                              <select class="form-control" name="day" id="day" required>
                                <option value=""><?php echo $lang["Día"]; ?></option>
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
                                <option value=""><?php echo $lang["Mes"]; ?></option>
                                <option value="01"><?php echo $lang["Enero"]; ?></option>
                                <option value="02"><?php echo $lang["Febrero"]; ?></option>
                                <option value="03"><?php echo $lang["Marzo"]; ?></option>
                                <option value="04"><?php echo $lang["Abril"]; ?></option>
                                <option value="05"><?php echo $lang["Mayo"]; ?></option>
                                <option value="06"><?php echo $lang["Junio"]; ?></option>
                                <option value="07"><?php echo $lang["Julio"]; ?></option>
                                <option value="08"><?php echo $lang["Agosto"]; ?></option>
                                <option value="09"><?php echo $lang["Septiembre"]; ?></option>
                                <option value="10"><?php echo $lang["Octubre"]; ?></option>
                                <option value="11"><?php echo $lang["Noviembre"]; ?></option>                                
                                <option value="12"><?php echo $lang["Diciembre"]; ?></option>                                
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
                                <option value=""><?php echo $lang["Año"]; ?></option>
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

              <p class="mb-2 font-weight-bold"><?php echo $lang["Nivel de estudios"]; ?></p>
                <div class="form-group">
                  <div class="select-wrap">
                      <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                      <select class="form-control" name="grade" id="grade" required>

                        <option value=""><?php echo $lang["Nivel de estudios"]; ?></option>                                
                        <option value="Basico"><?php echo $lang["Básico"]; ?></option>                                
                        <option value="Mediosuperior"><?php echo $lang["Medio superior"]; ?></option>                                
                        <option value="Superior"><?php echo $lang["Superior"]; ?></option> 
                        <option value="Diplomadosycursos"><?php echo $lang["Diplomados y cursos"]; ?></option>                                                            
                      </select>
                    </div>
                </div>

             <p class="mb-2 font-weight-bold"><?php echo $lang["Idiomas(s)"]; ?></p>
                <div class="form-group">
                  <div class="select-wrap">                      
                      <select class="form-control" multiple name="language[]"  id="language" required>
                        <option value=""><?php echo $lang["Selecciona un idioma"]; ?></option>                                
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

              <p class="mb-2 font-weight-bold"><?php echo $lang["Describe tu personalidad"]; ?></p>
              <div class="form-group">
                 <textarea style="resize:none" class="form-control"  rows="3" id="personality" name="personality" placeholder="<?php echo $lang["Optimista, siempre positivo y siempre cumplo lo que me propongo..."] ?>" required></textarea>

              </div>

              <p class="mb-2 font-weight-bold"><?php echo $lang["Describe tus habilidades"]; ?></p>
              <div class="form-group">
                 <textarea style="resize:none" class="form-control"  rows="3" id="ability" name="ability" placeholder="<?php echo $lang["Pesuasivo, facilidad de palabra..."] ?>" required></textarea>
              </div>

    <!--          <p class="mb-2 font-weight-bold">Agrega una foto de perfil</p>
              <div class="form-group">
                 <input type="file" class="form-control" id="inputGroupFile04" id="picture" name="picture">
              </div>
 -->


              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="<?php echo $lang["Registrarse"]; ?>" class="btn btn-primary py-2 px-4 text-white">
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

<!-- Show typed text -->
<script>
var typed = new Typed('.typed-words', {      
      strings: ["<?php echo $lang["de Guids.Mx"] ?>","<?php echo $lang["de nuestro equipo"] ?>","<?php echo $lang["de los mejores guías privados"] ?>"],
      typeSpeed: 80,
      backSpeed: 80,
      backDelay: 4000,
      startDelay: 1000,
      loop: true,
      showCursor: true
});        
</script>
<!-- end Show typed text -->


<!-- states values -->
<script>        
    var options = {
        Quintanaroo : [
        "Cozumel", 
        "Bacalar", 
        "Felipe Carrillo Puerto",
        "Isla Mujeres", 
        "Othón P. Blanco",
        "Benito Juárez",
        "José María Morelos",
        "Lázaro Cárdenas",
        "Solidaridad",
        "Tulum",
        "Bacalar",
        "Puerto Morelos"
        ]
        // yucatan : ["cidudad 1","ciudad 2","ciudad n"]
    }

    $(function(){
      var fillSecondary = function(){
        var selected = $('#state').val();
        $('#town').empty();
        options[selected].forEach(function(element,index){
          $('#town').append('<option value="'+element+'">'+element+'</option>');
        });
      }
      $('#state').change(fillSecondary);
      fillSecondary();
    });
  
</script>
<!-- end states values -->

<!-- Validations --> 
<script> 
  $().ready(function() { 
  $("#signup").validate({ 
    rules: { 
      name: {  
        required: true,  
        minlength: 2 
      }, 
      lastname: {  
        required: true,  
        minlength: 2 
      }, 
      email: {  
        required:true,  
        email: true 
      }, 
      phone: {  
        required:true,  
        minlength: 10,  
        maxlength:10, 
        digits: true,    
 
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
      name: "<?php echo $lang["El nombre es requerido."] ?>", 
      lastname: "<?php echo $lang["Los apellidos son requeridos."] ?>", 
      email : "<?php echo $lang["Email es requerido y debe tener formato de email correcto."] ?>",     
      phone : "<?php echo $lang["El teléfono es requerido y solo números son aceptados."] ?>",    
      password : "<?php echo $lang["El password es requerido."] ?>", 
      day : "<?php echo $lang["El día es requerido."] ?>", 
      month : "<?php echo $lang["El mes es requerido."] ?>", 
      year : "<?php echo $lang["El año es requerido."] ?>", 
      grade : "<?php echo $lang["El grado de estudios es requerido."] ?>", 
      "language[]" : "<?php echo $lang["El idioma es requerido."] ?>", 
      ability : "<?php echo $lang["Las habilidades son requeridas."] ?>", 
      personality : "<?php echo $lang["La personalidad es requerida."] ?>", 
    } 
  }); 
}); 
</script> 
<!-- End Validations --> 
<!--====  End of SCRIPTS  ====-->



    
  </body>
</html>