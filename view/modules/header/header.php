<?php if (!isset($_SESSION['email'])) { ?>
<div class="site-wrap">
<div class="site-mobile-menu">
  <div class="site-mobile-menu-header">
    <div class="site-mobile-menu-close mt-3">
      <span class="icon-close2 js-menu-toggle"></span>
    </div>
  </div>
  <div class="site-mobile-menu-body"></div>
</div>

<header class="site-navbar py-2 bg-light" role="banner">

  <div class="container">
    <div class="row align-items-center">
      
      <div class="col-11 col-xl-2" >
        <h1 class="mb-0 site-logo"><a href="http://localhost/guids/index" class="text-black h2 mb-0" ><img src="http://localhost/guids/view/assets/images/logoweb.png" style="border-radius:25px;" alt=""></a></h1>
      </div>
      <div class="col-12 col-md-10 d-none d-xl-block">
        <nav class="site-navigation position-relative text-right" role="navigation">
          <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
            <li><a href="signup"><span>Registro</span></a></li>
            <li><a href="signin"><span>Iniciar sesión</span></a></li>
            <!-- <li><a href="contact.html"><span>Contact</span></a></li> -->            
          </ul>
        </nav>
      </div>


      <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;">
        <a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a>
      </div>

      </div>

    </div>
    </header>
  </div> 
<?php } else { ?>


  <!--============================
  =            HEADER            =
  =============================-->
  
   <div class="site-wrap">
    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    
    <header class="site-navbar py-2 bg-light" role="banner">

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-11 col-xl-2" >
            <h1 class="mb-0 site-logo"><a href="http://localhost/guids/index" class="text-black h2 mb-0" ><img src="http://localhost/guids/view/assets/images/logoweb.png" style="border-radius:25px;" alt</a></h1>
          </div>
          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">              
            <?php 
                $email=$_SESSION["email"];
                $emailById=array("email"=>$_SESSION["email"]);        
                $getIdByEmail = UserModel::getIdByEmailUser($emailById,"user");
                $id=$getIdByEmail["id"];                            
                $name=$getIdByEmail["name"];
            ?>
              <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">                                                          
                <li><a href="http://localhost/guids/bookings/user/<?php echo $id ?>"><span>Agenda</span></a></li>              
                <li class="has-children">
                  <a href="#"><span>Más opciones</span></a>
                  <ul class="dropdown">
                    <li><a href="#"><i class="icon-notifications_active"></i> Avisos</a></li>                    
                    <li><a href="profile"><i class="icon-user"></i> Perfil</a></li>   
                    <li><a href="http://localhost/guids/addtour"><i class="icon-add_circle"></i> Agregar tour </a></li>
                    <li><a href="http://localhost/guids/mytours"><i class="icon-list-ul"></i> Mis tours </a></li>
                    <li><a href="http://localhost/guids/generateinsurance/user/<?php echo $id; ?>"><i class="icon-picture-o"></i> Generar seguro grupal</a></li>
                    <!-- For new type edition of user -->                    
                    <li><a href="http://localhost/guids/settings/user/<?php echo $id; ?>/<?php echo $name; ?>"><i class="icon-settings"></i> Configurar</a></li>                                                        
                    <li><a href="http://localhost/guids/logout"><i class="icon-sign-out"></i> <span>Cerrar sesión</span></a></li>
                  </ul>
                </li>
                <!-- <li><a href="contact.html"><span>Contact</span></a></li> -->
              </ul>
            </nav>
          </div>
              

          <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;">
            <a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a>
          </div>

          </div>

        </div>
        </header>
      </div>        
  <!--====  End of HEADER  ====-->
  
<?php } ?>