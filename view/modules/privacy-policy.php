<?php  
error_reporting(0);
 session_start();

# ===========================================
# =           Language validation           =
# ===========================================
$language = new LanguageController();
require_once "view/languages/".$language->validate().".php";//include lang
# ======  End of Language validation  =======

# ======  End of Language validation  =======

?>
<!DOCTYPE html>
<html lang="en">

  
  <!--=================================
  =            Head common            =
  ==================================-->
  <title>Política de privacidad</title>
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
                <h1 data-aos="fade-up">Políticas de privacidad</h1>
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
            <h2 class="color-black-opacity-5 font-weight-bold">1. Aviso de privacidad para turistas/viajeros</h2>          
          </div>
          <div class="col-md-12">
            <br>
            <p>En cumplimiento con lo establecido por la Ley Federal de Protección de Datos Personales en Posesión de los Particulares (LFPDPPP), Guids.mx pone a su disposición el siguiente Aviso de Privacidad Simplificado:</p>
            <br>
            <p><b><i>GUIDS.MX S.A. de C.V. (En lo sucesivo “Guids.mx”)</i></b>, con domicilio en <b><i>Calle 54 s/n entre 49 y 51, Col. Javier Rojo Gómez, CP. 77259, Felipe Carrillo Puerto, Quintana Roo</i></b>, es el responsable del uso y protección de sus datos personales, y al respecto le informamos lo siguiente:</p>
            <p>Los datos personales que recabamos de usted, los utilizaremos para las siguientes finalidades que son necesarias para el servicio que solicita: </p>
            <ul>
              <li>Procesamiento, seguimiento, actualización, modificación, cancelación y confirmación de los servicios por usted reservados con Guids.mx a través de sus medios, con fines financieros, para dar cumplimiento a las obligaciones contraídas con usted y con nuestros guías.</li>
              <li>Asimismo, los datos que le sean recabados se utilizará para ponerse en contacto con usted para ofrecerles mayor información para la generación de posibles reservas o contratiempos que puedan surgir con el servicio.</li>
            </ul>
            <p>De manera adicional, utilizaremos su información personal para las siguientes finalidades que <b><i>no son necesarias</i></b> para el servicio solicitado, pero que nos permiten y facilitan brindarle una mejor atención: </p>
            <ul>
              <li>Evaluar la calidad del servicio, realizar sondeos sobre hábitos y preferencias de viaje, para participar en sorteos, programas de lealtad, implementación y desarrollo de campañas publicitarias, así como para el envío de promociones, servicios y fines publicitarios exclusivamente para Guids.mx</li>
            </ul>
            <p>En caso de que no desee que sus datos personales sean tratados para estos fines adicionales, desde este momento usted nos puede comunicar lo anterior <b><i>mediante un escrito vía correo electrónico a la dirección ceo@guids.mx</i></b>.</p>
            <p>La negativa para el uso de sus datos personales para estas finalidades no podrá ser un motivo para que le neguemos los servicios y productos que solicita o contrata con nosotros. Para conocer mayor información sobre los términos y condiciones en que serán tratados sus datos personales, como los terceros con quienes compartimos su información personal y la forma en que podrá ejercer sus derechos ARCO, puede consultar el aviso de privacidad integral en <a href="http://localhost/guids/privacy-policy">www.guids.mx/privacy-policy</a></p>
          </div>

          <div class="col-md-12 border-primary">            
            <h2 class="color-black-opacity-5 font-weight-bold">2. Aviso de privacidad para guías</h2>          
          </div>
          <div class="col-md-12">
            <br>
            <p>En cumplimiento con lo establecido por la Ley Federal de Protección de Datos Personales en Posesión de los Particulares (LFPDPPP), Guids.mx pone a su disposición el siguiente Aviso de Privacidad Simplificado:</p>
            <br>
            <p><b><i>GUIDS.MX S.A. de C.V. (En lo sucesivo “Guids.mx”)</i></b>, con domicilio en <b><i>Calle 54 s/n entre 49 y 51, Col. Javier Rojo Gómez, CP. 77259, Felipe Carrillo Puerto, Quintana Roo</i></b>, es el responsable del uso y protección de sus datos personales, y al respecto le informamos lo siguiente:</p>
            <p>Los datos personales que recabamos de usted, los utilizaremos para las siguientes finalidades que son necesarias para el servicio que solicita: </p>
            <ul>
              <li>Procesamiento, seguimiento, actualización, modificación, cancelación y confirmación de los servicios por usted reservados con Guids.mx a través de sus medios, con fines financieros, para dar cumplimiento a las obligaciones contraídas con usted y con nuestros guías.</li>
              <li>Asimismo, los datos que le sean recabados se utilizará para ponerse en contacto con usted para ofrecerles mayor información para la generación de posibles reservas o contratiempos que puedan surgir con el servicio.</li>
            </ul>
            <p>De manera adicional, utilizaremos su información personal para las siguientes finalidades que <b><i>no son necesarias</i></b> para el servicio solicitado, pero que nos permiten y facilitan brindarle una mejor atención: </p>
            <ul>
              <li>Evaluar la calidad del servicio, realizar sondeos sobre hábitos y preferencias de viaje, para participar en sorteos, programas de lealtad, implementación y desarrollo de campañas publicitarias, así como para el envío de promociones, servicios y fines publicitarios exclusivamente para Guids.mx</li>
            </ul>
            <p>En caso de que no desee que sus datos personales sean tratados para estos fines adicionales, desde este momento usted nos puede comunicar lo anterior <b><i>mediante un escrito vía correo electrónico a la dirección ceo@guids.mx</i></b>.</p>
            <p>La negativa para el uso de sus datos personales para estas finalidades no podrá ser un motivo para que le neguemos los servicios y productos que solicita o contrata con nosotros. Para conocer mayor información sobre los términos y condiciones en que serán tratados sus datos personales, como los terceros con quienes compartimos su información personal y la forma en que podrá ejercer sus derechos ARCO, puede consultar el aviso de privacidad integral en <a href="http://localhost/guids/privacy-policy">www.guids.mx/privacy-policy</a></p>
            <p><b>¿Qué datos personales utilizaremos para estos fines?</b></p>
            <p>Para llevar a cabo las finalidades descritas en el presente aviso de privacidad, utilizaremos los siguientes datos personales: <b><i>Nombre completo con apellidos, número de teléfono, correo electrónico, lugar donde radica (estado y municipio)  fecha de nacimiento, nivel de estudios, idiomas que domina, descripción de la personalidad y de habilidades, imagen física (fotografía)</i></b>, para lo cual Guids.mx habilitará los medios idóneos para obtener el consentimiento de los titulares de acuerdo a lo establecido en la LFPDPPP y en su reglamento.</p>            
            <p><b>¿Cómo puede acceder, rectificar o cancelar sus datos personales, u oponerse a su uso?</b></p>
            <p>Usted tiene derecho a conocer qué datos personales tenemos de usted, para qué los utilizamos y las condiciones del uso que les damos (<b><i>A</i></b>cceso). Asimismo, es su derecho solicitar la corrección de su información personal en caso de que esté desactualizada, sea inexacta o incompleta (<b><i>R</i></b>ectificación); que la eliminemos de nuestros registros o bases de datos cuando considere que la misma no está siendo utilizada conforme a los principios, deberes y obligaciones previstas en la normativa (<b><i>C</i></b>ancelación); así como oponerse al uso de sus datos personales para fines específicos (<b><i>O</i></b>posición). Estos derechos se conocen como derechos <b><i>ARCO</i></b>.</p>
            <p>Para el ejercicio de cualquiera de los derechos <b><i>ARCO</i></b>, usted deberá enviar una solicitud al correo electrónico <b><i>ceo@guids.mx</i></b> donde se le enviará en formato correspondiente. Guids.mx le dará seguimiento a su solicitud en un lapso de 10 días hábiles contados a partir de la recepción de la solicitud, para comunicarle sobre la procedencia de la misma deberá enviar el formato con la documentación que se le requiera. En caso de resultar procedente, Guids.mx contará con un plazo máximo de 15 días hábiles para hacer efectivo su derecho <b><i>ARCO</i></b></p>
            <p>Para conocer el procedimiento y requisitos para el ejercicio de los derechos ARCO, usted podrá llamar al siguiente número telefónico <b><i>983 267 1217</i></b>, o bien ponerse en contacto con nuestro Departamento de Privacidad, que dará trámite a las solicitudes para el ejercicio de estos derechos, y atenderá cualquier duda que pudiera tener respecto al tratamiento de su información. Los datos de contacto del Departamento de Privacidad son los siguientes:<b> <i>Calle 54 s/n entre 49 y 51, Col. Javier Rojo Gómez, CP. 77259, Felipe Carrillo Puerto, Quintana Roo, 983 267 1217, ceo@guids.mx</i></b>.</p>
            <p><b>¿Cómo puede revocar su consentimiento para el uso de sus datos personales?</b></p>
            <p>Usted puede revocar el consentimiento que, en su caso, nos haya otorgado para el tratamiento de sus datos personales. Sin embargo, es importante que tenga en cuenta que no en todos los casos podremos atender su solicitud o concluir el uso de forma inmediata, ya que es posible que por alguna obligación legal requiramos seguir tratando sus datos personales. Asimismo, usted deberá considerar que, para ciertos fines, la revocación de su consentimiento implicará que no le podamos seguir prestando el servicio que nos solicitó, o la conclusión de su relación con nosotros. </p>
            <p><b>¿Cómo puede limitar el uso o divulgación de su información personal? </b></p>
            Con objeto de que usted pueda limitar el uso y divulgación de su información personal, le ofrecemos los siguientes medios:
            <ul>
              <br>
              <li>Su inscripción en el Registro Público para Evitar Publicidad, que está a cargo de la Procuraduría Federal del Consumidor, con la finalidad de que sus datos personales no sean utilizados para recibir publicidad o promociones de empresas de bienes o servicios. Para mayor información sobre este registro, usted puede consultar el portal de Internet de la PROFECO, o bien ponerse en contacto directo con ésta.</li>
            </ul>
            <p><b>El uso de tecnologías de rastreo en nuestro portal de Internet</b></p>
            <p>Le informamos que en nuestra página de Internet utilizamos cookies, a través de las cuales es posible monitorear su comportamiento como usuario de Internet, así como brindarle un mejor servicio y experiencia de usuario al navegar en nuestra página. Las Cookies se asocian únicamente a un usuario anónimo y su ordenador y no proporcionan referencias que permitan deducir datos personales del usuario. El usuario podrá configurar su navegador para que notifique y rechace la instalación las Cookies enviadas por la Web de <b><i>Guids.mx</i></b>, sin que ello perjudique la posibilidad del usuario de acceder a los contenidos de dicha web. Sin embargo, le hacemos notar que, en todo caso, la calidad de funcionamiento de la página Web puede disminuir. Los usuarios registrados, que se registren o que hayan iniciado sesión, podrán beneficiarse de unos servicios más personalizados y orientados a su perfil, gracias a la combinación de los datos almacenados en las cookies con los datos personales utilizados en el momento de su registro. Dichos usuarios autorizan expresamente el uso de esta información con la finalidad indicada, sin perjuicio de su derecho a rechazar o deshabilitar el uso de cookies.</p>
            <p><b>Tipología, finalidad y funcionamiento de las Cookies</b></p>
            <ul>
              <li><b><i>Cookies de registro:</i></b> Las Cookies de registro se generan una vez que el usuario se ha registrado o posteriormente ha abierto su sesión, y se utilizan para identificarle en los servicios con los siguientes objetivos:
                <ul>
                  <li>Mantener al usuario identificado de forma que, si cierra un servicio, el navegador o el ordenador y en otro momento u otro día vuelve a entrar en dicho servicio, seguirá identificado, facilitando así su navegación sin tener que volver a identificarse. Esta funcionalidad se puede suprimir si el usuario pulsa la funcionalidad “cerrar sesión”, de forma que esta Cookie se elimina y la próxima vez que entre en el servicio el usuario tendrá que iniciar sesión para estar identificado.
                  <!--   <ul>
                      <li>Sub-subelemento</li>
                    </ul> -->
                  </li>
                  <li>
                    Comprobar si el usuario está autorizado para acceder a ciertos servicios, por ejemplo, para participar en promociones.                  
                  </li>
                </ul>
              </li>
            </ul>

            <ul>
              <li><b><i>Cookies analíticas:</i></b> Cada vez que un Usuario visita un servicio, una herramienta de un proveedor externo (Google Analytics) genera una Cookie analítica en el ordenador del usuario. Esta Cookie que sólo se genera en la visita, servirá en próximas visitas a los Servicios de <b><i>Guids.mx</i></b> para identificar de forma anónima al visitante. Los objetivos principales que se persiguen son:
                <ul>
                  <li>Mantener al usuario identificado de forma que, si cierra un servicio, el navegador o el ordenador y en otro momento u otro día vuelve a entrar en dicho servicio, seguirá identificado, facilitando así su navegación sin tener que volver a identificarse. Esta funcionalidad se puede suprimir si el usuario pulsa la funcionalidad “cerrar sesión”, de forma que esta Cookie se elimina y la próxima vez que entre en el servicio el usuario tendrá que iniciar sesión para estar identificado.
                  <!--   <ul>
                      <li>Sub-subelemento</li>
                    </ul> -->
                  </li>
                  <li>
                    Permitir la identificación anónima de los usuarios navegantes a través de la “Cookie” (identifica navegadores y dispositivos, no personas) y por lo tanto la contabilización aproximada del número de visitantes y su tendencia en el tiempo.
                  </li>
                  <li>
                    Identificar de forma anónima los contenidos más visitados y por lo tanto más atractivos para los usuarios.
                  </li>
                  <li>Saber si el usuario que está accediendo es nuevo o repite visita.</li>
                </ul>
              </li>
            </ul>

            <p><b><i>Importante</i></b>: Salvo que el usuario decida registrarse en un servicio de <b><i>Guids.mx</i></b>, la “Cookie” nunca irá asociada a ningún dato de carácter personal que pueda identificarle. Dichas Cookies sólo serán utilizadas con propósitos estadísticos que ayuden a la optimización de la experiencia de los Usuarios en el sitio.</p>

            <p>Estas tecnologías podrán deshabilitarse siguiendo los pasos indicados de acuerdo al navegador de su preferencia: </p>
            <ul>
              <li><a href="https://support.google.com/accounts/answer/61416?co=GENIE.Platform%3DDesktop&hl=es">Google Chrome</a></li>
              <li><a href="https://support.mozilla.org/es/kb/habilitar-y-deshabilitar-cookies-sitios-web-rastrear-preferencias">Mozilla Firefox</a></li>
              <li><a href="https://support.apple.com/es-mx/guide/safari/sfri11471/mac">Apple Safari</a></li>
              <li><a href="https://support.norton.com/sp/es/mx/home/current/solutions/v57840314_NortonM_Retail_1_es_mx">Otros</a></li>
            </ul>
            <p><b>¿Cómo puede conocer los cambios a este aviso de privacidad?</b></p>
            <p>El presente aviso de privacidad puede sufrir modificaciones, cambios o actualizaciones derivadas de nuevos requerimientos legales; de nuestras propias necesidades por los productos o servicios que ofrecemos; de nuestras prácticas de privacidad; de cambios en nuestro modelo de negocio, o por otras causas. Nos comprometemos a mantenerlo informado sobre los cambios que pueda sufrir el presente aviso de privacidad, a través de la documentación publicada en:</p>
            <ul>
              <li><a href="http://localhost/guids/privacy-policy">www.guids.mx/privacy-policy</a></li>
            </ul>
            <b><i>Guids.mx</i></b> podrá efectuar en cualquier momento modificaciones o actualizaciones al presente Aviso de Privacidad. Las modificaciones o actualizaciones que se efectúen, entrarán en vigor en el momento en que son publicados en el sitio de internet <b><i>www.guids.mx</i></b> o en cualquier medio de comunicación que utilice para publicarlo, por lo que se recomienda su revisión continua.
            <br>
            <br>
            <br>
            <br>
            <p class="text-right">Última actualización <b><i>15/mayo/2019</b></i>.</p>
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