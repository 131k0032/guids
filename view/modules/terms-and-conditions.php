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
<html lang="en">

  
  <!--=================================
  =            Head common            =
  ==================================-->
  <title>Términos y condiciones</title>
  <?php include 'view/links/head_common.php'; ?>
  
  <!--====  End of Head common  ====-->
  <body>
  <!--============================
  =            HEADER            =
  =============================-->
  <?php include 'view/modules/header/header.php'; ?>     
  <!--====  End of HEADER  ====-->
  

<!--======================================
=            BACKGROUDN IMAGE            =
=======================================-->

 <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(http://localhost/guids/view/assets/images/Cancun.jpg);" data-aos="fade" data-stellar-background-ratio="1">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-10">
            
            
            <div class="row justify-content-center">
              <div class="col-md-8 text-center">
                <h1 data-aos="fade-up">Términos y condiciones</h1>
                <p class="mb-0" data-aos="fade-up" data-aos-delay="100">Conoce más de Guids.mx</p>
              </div>
            </div>

            
          </div>
        </div>
      </div>
    </div>    
<!--====  End of BACKGROUDN IMAGE  ====-->


<!--================================
=            Who we are            =
=================================-->

    <div class="site-section "  data-aos="fade">
      <div class="container">

        <div class="row mb-5">
          <div class="col-md-12 border-primary">
            <!-- <h2 class="font-weight-light text-primary">Aviso de privacidad para usuarios</h2> -->
            <h2 class="color-black-opacity-5 font-weight-bold">ANTES DE HACER USO DE ESTE SITIO, LEER CUIDADOSAMENTE LOS TÉRMINOS Y CONDICIONES DE LA PLATAFORMA DIGITAL GUIDS.MX</h2>          
          </div>
            <br>
          <div class="col-md-12">
            <br>
            <p style="text-indent: 2cm">Este contrato describe los términos y condiciones generales (en adelante únicamente “términos y condiciones) aplicable al uso de los contenidos, productos y servicios ofrecidos a través del sitio www.guids.mx ( en adelante, SITIO WEB), del cual es titular GUIDS.MX ( en adelante, TITULAR) quien tiene su domicilio establecido en Quintana Roo, en la siguiente dirección: calle 54/49 y 51, S/N en la colonia Javier Rojo Gómez con código postal 77259 en la ciudad de Felipe Carrillo Puerto, Quintana Roo, México.                 
          </p>
          <br>
          <p style="text-indent: 2cm">Cualquier persona que desee acceder o hacer uso del sitio o los servicios que en él se ofrecen, podrán hacerlo sujetándose a los presentes TERMINOS Y CONDICIONES, así como políticas y principios incorporados al  presente documento. En todo caso, cualquier persona que no acepte los presentes términos y condiciones, deberá abstenerse de utilizar el SITIO WEB y/o adquirir los productos y servicios  que en su caso sean ofrecidos.</p>
          <br>
          <ol type="I">
             <li><b>DEL OBJETO</b>
                <p>El objeto de los presentes TERMINOS Y CONDICIONES es regular el acceso y la utilización del SITIO WEB entendiendo por este cualquier tipo de contenido, producto o servicio que se encuentre a disposición del público en general dentro del dominio: www.guids.mx.
                <br><br>El titular se reserva la facultad de modificar en cualquier momento y sin previo aviso, la presentación, los contenidos, las funcionalidad, los productos, los servicios y la configuración que pudiera estar contenida en el SITIO WEB; en este sentido el USUARIO reconoce y acepta que GUIDS.MX en el cualquier momento podrá interrumpir, desactivar o cancelar cualquiera de los elementos que conforman el SITIO WEB o el acceso a los mismos.
                </p>
             </li>

             <li><b>ACCESO Y REGISTRO</b>
                <p>El acceso a los contenidos y la utilización de los servicios de la Plataforma tiene carácter gratuito para los buscadores de tour. El acceso, navegación y utilización de la Plataforma no requiere registro. No obstante, para el acceso y utilización de los servicios de la Plataforma será necesario que te registres en la misma. Para más información acerca del tratamiento de tus datos personales puedes acudir a nuestra Política de Privacidad: www.guids.mx /privacy-policy <br><br>
                El SITIO WEB se encuentra dirigido exclusivamente a personas que cuenten con la mayoría de edad (a partir de los 18 años); en este sentido, GUIDS.MX. declina cualquier responsabilidad por el incumplimiento  de este requisito. Se hace del conocimiento del USUARIO que el TITULAR podrá administrar o gestionar el SITIO WEB  de manera directa o a través de un tercero, lo cual no modifica en ningún sentido lo establecido en los presentes TERMINOS Y CONDICIONES.</p>               
             </li>
             <li><b>DEL USUARIO</b>
                                <ol type="A">
                  <li><b>Usuario guía</b>
                    <ol type="1">
                      <li>Guids.mx conecta a guías locales con turistas y viajeros, facilitándoles las reservas a proveedores de tours.</li>
                      <li>Al contratar un tour, estás contratando al proveedor de ese tour, apegándote a las políticas establecidas, sin que Guids.mx forme parte de ese contrato y cuente con responsabilidad alguna sobre cualquier suceso relacionado con el mismo. Es responsabilidad exclusiva del organizador del tour garantizar la exactitud, legitimidad y corrección de todo el contenido e información que aporta en la Plataforma perteneciente a su servicio. </li>
                      <li>Los  usuarios comparten sus opiniones sobre la satisfacción del servicio o rating sobre el  tour realizado, esto sirve como referencia. Guids.mx no modifica ni cambia la calificación o rating de los tours.</li>
                      <li>Guids.mx  no organiza ni ofrece ningún tipo de tours propios. El proveedor de los tours es el organizador del tour, el cual ofrece sus servicios de acompañamiento y/o asesoramiento  para turistas y viajeros, a través de la Plataforma digital.</li>
                      <li>El proveedor del tour garantiza a Guids.mx que estará al tanto de todas las obligaciones que pudieran derivarse de su actividad (a título ejemplificativo no limitativo se enuncian la obligación de respetar los itinerarios marcados donde se pueden realizar tours, la normativa local donde se realiza el tour y cualquier otra obligación legal, fiscal o tributaria, así como de contar con todas las licencias o certificaciones necesarias y requeridas por la legislación en materia turística local, autonómica o nacional que corresponda).</li>
                      <li>Guids.mx  no garantiza de manera alguna la correcta ejecución del tour. Cualquier reclamación sobre esta ejecución debe ser realizada única y exclusivamente al proveedor del tour con el que decidiste libremente contratar. el proveedor del tour buscara el mecanismo para poder remediar alguna falta.</li>
                      <li>Guids.mx no exige la propiedad de ningún contenido que publiques en la Plataforma o a través de este. En su lugar, otorgas a Guids.mx una autorización sobre todos los contenidos o imágenes que publiques en la Plataforma, a través de cualquier soporte o medio conocido o por haber, para todo el territorio mundial.</li>
                      <li>Guids.mx podrá bloquear la cuenta de cualquier usuario en momento que no cumplan con las condiciones previamente anunciadas. no habrá perjuicio del ejercicio de las acciones judiciales o administrativas que Guids.mx pueda emprender contra el usuario infractor. La eliminación de la cuenta no acarreará en caso alguna un resarcimiento de daños y perjuicios al usuario.</li>
                      <li>El proveedor garantiza que  el contenido publicado es original y que tú eres el autor de dicho contenido; la publicación y la utilización de dicho contenido no infringe, malversa ni vulnera los derechos de terceros, incluidos sin limitación, los derechos de privacidad, de publicidad, de autor, de marca comercial u otros derechos de propiedad intelectual;  aceptas pagar todos los derechos de autor, las tasas y cualquier otra suma adeudada como consecuencia del contenido publicado en la Plataforma o a través de ella, y tienes el derecho y la capacidad legal de cumplir estos términos y condiciones bajo la jurisdicción mexicana.</li>
                    </ol>
                  </li>
                  <li><b>Usuario turista/viajero</b>
                    <ol>
                      <li>Al hacer una reserva del tour, aceptas las pólizas de los proveedores de tours incluyendo todas sus políticas de no presentación, cancelación y check-in que se muestran o establecen en sus términos y condiciones. De nuevo se recuerda que el tour se contrata con un tercero proveedor del tour, no con Guids.mx, por lo que el contrato que regirá la prestación de servicios del tour será el que se pacte con el proveedor concreto, y la responsabilidad acerca de la prestación correcta y legítima del servicio será del prestador.</li>
                      <li>Al contratar  un tour, garantizas que informarás a tus a acompañantes  de los términos y condiciones, dando por enterado y aceptando los términos y condiciones por ellos.</li>
                      <li>Vía email recibirás la validez de la reserva después de completar el proceso de reserva, incluyendo toda la información de la que dispone Guids.mx acerca del tour específico de acuerdo con la información proporcionada por el proveedor del tour.</li>
                      <li>Es tu responsabilidad comunicar al proveedor de tour directamente para hacer cualquier modificación de la reserva o informarle sobre cualquier requerimiento especial / facilidades que tú o tus acompañantes pueda requerir.</li>
                      <li>Guids.mx,  únicamente oferta los servicios de los proveedores de tours que se registran en la Plataforma, intentando en todo momento que la calidad de los mismos sea adecuada, pero sin hacerse responsable de la correcta prestación de los servicios de acompañamiento turístico.</li>
                      <li>La Plataforma pone a disposición del usuario un sistema de rating a través del cual el usuario puede revisar la puntuación que otros usuarios han otorgado a los servicios prestados por determinados proveedores de tours, así como los comentarios que otros usuarios han facilitado sobre su experiencia. Guids.MX no se responsabiliza de opiniones y valoraciones otorgadas por los demás usuarios. </li>                      
                    </ol>
                    <br>
                      <p  type="1">LOS USUARIOS se comprometen a utilizar la información, contenidos o servicios ofrecidos a través del GUIDS.MX de manera licita, sin contravenir lo dispuesto en los presentes TERMINOS Y CONDICIONES, la moral o el orden público, y se abstendrá de realizar cualquier acto que pueda suponer una afectación a los derechos de terceros, o perjudique de algún modo el funcionamiento de GUIDS.MX <br><br>
                      GUIDS.MX se reserva el derecho de retirar todos aquellos comentarios y aportaciones que vulneren la ley, el respeto a la dignidad de la persona, que sean discriminatorios, atenten contra los derechos de terceros o el orden público, o bien, que a su juicio no resulten adecuadas para su publicación. En cualquier caso GUIDS.MX no será responsable de las opiniones vertidas por los USUARIOS a través de comentarios o publicaciones que estos realicen.
                      </p>
                  </li>
                </ol>
             </li>
             <li><b>ENLACES</b>
              <p>Por la falta de control respecto a la información, contenidos y servicios que contengan otras websites a los que se pueda acceder a través de los enlaces que la Plataforma pone a su disposición, comunicándoles que GUIDS.Mx, queda absuelta de cualquier responsabilidad por los daños y perjuicios de toda clase que pudiesen derivar por la utilización de esas páginas web ajenas a nuestra empresa por parte del usuario.</p>
             </li>
             <li><b>PROPIEDAD INTELECTUAL E INDUSTRIAL</b><br>
             GUIDS.MX es titular de todos los derechos de propiedad intelectual e industrial del SITIO WEB entendido que por este código fuente que hace posible su funcionamiento así como las imágenes, archivos de audio o video, logotipos, marcas, combinación de colores, estructuras, diseño, y demás elementos que lo distingan. Serán protegidas por la legislación mexicana en materia de propiedad intelectual e industrial, así como por los tratados internacionales aplicables. Por consiguiente, queda expresamente prohibida la reproducción, distribución o difusión de los contenidos del SITIO WEB, con fines comerciales en cualquier soporte y por cualquier medio, sin la autorización de GUIDS.MX.<br><br>

             El USUARIO se compromete a respetar los derechos de la propiedad intelectual e industrial de GUIDS.MX. No obstante además de poder visualizar los elementos de GUIDS.MX podrá imprimirlos, copiarlos o almacenarlos, siempre y cuando sea exclusivamente para su uso estrictamente personal.<br><br>

             En caso de que el USUARIO o algún tercero consideren que cualquiera de los contenidos de GUIDS.MX suponga una violación de los derechos de protección de la propiedad industrial o intelectual, deberá comunicarlo inmediatamente a GUIDS.MX a través del correo ceo@guids.mx

             </li>
             <br>
             <li><b>LEGISLACION Y JURISDICCION APLICABLE</b><br>
              GUIDS.MX se reserva la facultad de presentar las acciones civiles o penales que considere necesarias por la utilización indebida de GUIDS.MX, sus contenidos, productos o servicios, o por el incumplimiento de los presentes TERMINOS Y CONDICIONES. <br>
              La relación entre el USUARIO y GUIDS.MX se regirá por la legislación vigente en México, específicamente en Quintana Roo. De surgir cualquier controversia en relación a la interpretación o aplicación de los presentes TERMINOS Y CONDICIONES, las partes se someterán a la jurisdicción ordinaria de los tribunales que correspondan conforme a derecho en el estado al que se hace referencia.

             </li>
          </ol>

          </div>
        </div>

      </div>
    </div>

<!--====  End of Who we are  ====-->


    




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

        

  </body>
</html>