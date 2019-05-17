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
 $language = new LanguageController();
 require_once "view/languages/".$language->validate().".php";//include lang
# ======  End of Language validation  =======
?>
<!DOCTYPE html>
<html lang="<?php echo $language->validate(); ?>">
<!--=================================
  =            Head common            =
  ==================================-->
<title>Tour setting</title>
<?php include 'view/links/head_common.php'; ?>
<!--====  End of Head common  ====-->

<body> <?php
if (isset($_POST["tour"])) {
  $tour_id = (int) $_POST["tour"];  
  echo $tour_id;
  $tourData = TourController::getById($tour_id);
}else {
  // echo "<script>
  //   window.location='http://localhost/guids/mytours';
  // </script>";
        print "<script>alert(\"Tour modificado.\");window.location='http://localhost/guids/mytours';</script>";
}
  $updateTour= new TourController();
  $updateTour->update();

 ?>
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
          <p class="color-black-opacity-5">Modificar tour</p>          
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-8">
          <form method="post" class="p-5 bg-white">
            <p>Puedes modificar la información de tour siempre que así lo desasdees</p>
            <div class="custom-control custom-checkbox form-check">              
              <input type="checkbox" class="custom-control-input spanish" id="toursetting" name="toursetting">              
              <input type="hidden" name="id" value="<?php echo $tour_id; ?>">
              <label class="custom-control-label" for="toursetting">Modificar información de tour</label>
            </div>
            <hr>
            <div class="row form-group">
              <div class="col-md-6 mb-3 mb-md-0">
                <p class="mb-2 font-weight-bold">Nombre</p>
                <input type="text" id="name" name="name" class="form-control" disabled="disabled" value="<?php echo $tourData["name"]?>">
              </div>
              <div class="col-md-6">
                <p class="mb-2 font-weight-bold">Ubicación</p>
                <input type="text" id="location" name="location" class="form-control" disabled="disabled" value="<?php echo $tourData["location"]; ?>">
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12">
                <p class="mb-2 font-weight-bold">Descripción</p>
                <textarea id="editortemp" name="editortemp" class="form-control" disabled="disabled"><?php echo $tourData["description"]; ?></textarea>
                <textarea id="editor" style="resize:vertical" required name="description" class="form-control"><?php echo $tourData["description"]; ?></textarea>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12">
                <p class="mb-2 font-weight-bold">¿Donde te encuentran?</p>
                <textarea id="start_in" name="start_in" class="form-control" disabled="disabled"><?php echo $tourData["start_in"]; ?></textarea>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12">
                <p class="mb-2 font-weight-bold">¿Cómo te encuentran?</p>
                <textarea id="find_guide" name="find_guide" class="form-control" disabled="disabled"><?php echo $tourData["find_guide"]; ?></textarea>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-6">
                <p class="mb-2 font-weight-bold">¿Cuanto tiempo durará el tour?</p>
                <div class="select-wrap">
                  <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                  <select class="form-control" name="duration" id="duration" disabled="disabled">
                    <option value="<?php echo $tourData["duration"]; ?>" selected hidden><?php echo $tourData["duration"]; ?></option>
                    <option value="1:00-h">1:00 h</option>
                    <option value="1:15-h">1:15 h</option>
                    <option value="1:30-h">1:30 h</option>
                    <option value="1:45-h">1:45 h</option>
                    <option value="2:00-h">2:00 h</option>
                    <option value="2:15-h">2:15 h</option>
                    <option value="2:30-h">2:30 h</option>
                    <option value="2:45-h">2:45 h</option>
                    <option value="3:00-h">3:00 h</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <p class="mb-2 font-weight-bold">¿Para cuantas personas es el tour?</p>
                <div class="select-wrap">
                  <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                  <select class="form-control" name="capacity" id="capacity" disabled="disabled">
                    <option value="<?php echo $tourData["capacity"]; ?>" selected hidden><?php echo $tourData["capacity"]; ?></option>
                    <?php for($i=1; $i<=20; $i++){
                      echo '<option value="'.$i.'">'.$i.'</option>';
                      } ?>
                  </select>
                </div>
              </div>
            </div>
            <!-- <div class="row form-group">
              <div class="col-md-6">
                <p class="mb-2 font-weight-bold">¿Deseas ocultar el tour?</p>
                <p>Ya no podrías recibir más reservaciones.</p>
              </div>
              <div class="col-md-6">
                <style media="screen">
                  .switch {
                  position: relative;
                  display: inline-block;
                  margin-top: 10px;
                  width: 60px;
                  height: 34px;
                  }
                  .switch input {
                  opacity: 0;
                  width: 0;
                  height: 0;
                  }
                  .slider {
                  position: absolute;
                  cursor: pointer;
                  top: 0;
                  left: 0;
                  right: 0;
                  bottom: 0;
                  background-color: #ccc;
                  -webkit-transition: .4s;
                  transition: .4s;
                  }

                  .slider:before {
                  position: absolute;
                  content: "";
                  height: 26px;
                  width: 26px;
                  left: 4px;
                  bottom: 4px;
                  background-color: white;
                  -webkit-transition: .4s;
                  transition: .4s;
                  }

                  input:checked + .slider {
                  background-color: #7971ea;
                  }

                  input:focus + .slider {
                  box-shadow: 0 0 1px #2196F3;
                  }

                  input:checked + .slider:before {
                  -webkit-transform: translateX(26px);
                  -ms-transform: translateX(26px);
                  transform: translateX(26px);
                  }

                  /* Rounded sliders */
                  .slider.round {
                  border-radius: 34px;
                  }

                  .slider.round:before {
                  border-radius: 50%;
                  }
                </style>
                <label class="switch">
                  <input type="checkbox" name="is_active" value="0" checked="checked" disabled="disabled">
                  <span class="slider round"></span>
                </label>
              </div>
            </div> -->
            <div class="row form-group">
              <div class="col-md-12">
                <input type="submit" value="Actualizar" id="btnupdate" class="btn btn-primary py-2 px-4 text-white" disabled="disabled">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--====  End of SETTINGS FORM  ====-->
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
  <!--====  End of SCRIPTS  ====-->
  <!--=======================================================
  =            ENABLE OR DISABLE SETTING OPTIONS            =
  ========================================================-->
  <script>
    $(function() {
      $('#toursetting').change(function() {
        if ($(this).prop('checked')) {
          $('#name').prop("disabled", false);
          $('#description').prop("disabled", false);
          $('#location').prop("disabled", false);
          $('#find_guide').prop("disabled", false);
          $('#start_in').prop("disabled", false);
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
          $('#editortemp').hide();
          $('.gj-editor-bootstrap').toggle();

        } else {
          $('#name').prop("disabled", true);
          $('#description').prop("disabled", true);
          $('#location').prop("disabled", true);
          $('#find_guide').prop("disabled", true);
          $('#start_in').prop("disabled", true);
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
          $('#editortemp').show();
          $('.gj-editor-bootstrap').toggle();
        }
      })
    })
  </script>

  <script type="text/javascript">
         $(document).ready(function () {
             $("#editor").editor({
                 uiLibrary: 'bootstrap4'
             });
             $(".gj-editor-bootstrap").toggle();
         });
  </script>
  <!--====  End of ENABLE OR DISABLE SETTING OPTIONS  ====-->
  <!--====  End of SCRIPTS  ====-->
</body>

</html>
