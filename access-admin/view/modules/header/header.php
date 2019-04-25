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
        <h1 class="mb-0 site-logo"><a href="http://localhost/guids/access-admin/index" class="text-black h2 mb-0" ><img src="http://localhost/guids/access-admin/view/assets/images/logo-three.png" style="border-radius:25px; width: 250px; height: 50px;" alt=""></a></h1>
      </div>
      <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">                                        
                <li class="has-children" >
                  <a href="#"><span><i class="icon-language2"></i></span></a>
                  <ul class="dropdown pl-1 pr-1 pt-1 pb-1">
                     <form class="" method="POST">                        
                        <select class="custom-select mb-1"  name="lang">                          
                          <option value="es"><?php echo $lang["Español"]; ?></option>
                          <option value="en"><?php echo $lang["Inglés"]; ?></option>
                        </select>
                        <button  type="submit" class="btn btn-info btn-block" style="border-radius:25px;"><?php echo $lang["Cambiar idioma"]; ?></button>
                     </form>
                  </ul>
                </li>            
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
           <h1 class="mb-0 site-logo"><a href="http://localhost/guids/access-admin/profile" class="text-black h2 mb-0" ><img src="http://localhost/guids/access-admin/view/assets/images/logo-three.png" style="border-radius:25px; width: 250px; height: 50px;" alt=""></a></h1>
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
                <li class="has-children">
                  <a href="#"><span><?php echo $lang["Más opciones"]; ?></span></a>
                  <ul class="dropdown">
                    <!-- <li><a href="#"><i class="icon-notifications_active"></i> <?php echo $lang["Avisos"]; ?></a></li>  -->                   
                    <li><a href="http://localhost/guids/access-admin/profile"><i class="icon-user"></i> <?php echo $lang["Perfil"]; ?></a></li>   
                    <li><a href="http://localhost/guids/access-admin/newusers"><i class="icon-users"></i> Nuevos usuarios</a></li>
                    <li><a href="http://localhost/guids/access-admin/confirmatedusers"><i class="icon-check_circle"></i> Usuarios aceptados</a></li>                    
                    <li><a href="http://localhost/guids/access-admin/newtours"><i class="icon-list-ul"></i> Nuevos tours</a></li>
                    <li><a href="http://localhost/guids/access-admin/addtour"><i class="icon-list-ul"></i> Tours verificados</a></li>                    
                    <li><a href="http://localhost/guids/access-admin/mytours"><i class="icon-list-ul"></i> <?php echo $lang["Mis tours"]; ?></a></li>
                    <li><a href="http://localhost/guids/access-admin/generateinsurance/user/<?php echo $id; ?>"><i class="icon-picture-o"></i> <?php echo $lang["Generar seguro grupal"]; ?></a></li>
                    <!-- For new type edition of user -->                    
                    <li><a href="http://localhost/guids/access-admin/settings/user/<?php echo $id; ?>"><i class="icon-settings"></i> <?php echo $lang["Configurar"]; ?></a></li>                                                        
                    <li><a href="http://localhost/guids/access-admin/logout"><i class="icon-sign-out"></i> <span><?php echo $lang["Cerrar sesión"]; ?></span></a></li>
                  </ul>
                </li>
                <li class="has-children" >
                  <a href="#"><span><i class="icon-language2"></i></span></a>
                  <ul class="dropdown pl-1 pr-1 pt-1 pb-1">
                     <form class="" method="POST">                        
                        <select class="custom-select mb-1"  name="lang">                          
                          <option value="es"><?php echo $lang["Español"]; ?></option>
                          <option value="en"><?php echo $lang["Inglés"]; ?></option>
                        </select>
                        <button  type="submit" class="btn btn-info btn-block" style="border-radius:25px;"><?php echo $lang["Cambiar idioma"]; ?></button>
                     </form>
                  </ul>
                </li>           
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