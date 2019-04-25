  <head>    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">


    <?php 

      // Link vars   
      $csslink = array(
         # -----------  Tab icon  -----------
        "http://localhost/guids/access-admin/view/assets/images/favicon.ico", 
        # -----------  Fonts  -----------
        "http://localhost/guids/access-admin/view/assets/fonts/icomoon/style.css", 
        "http://localhost/guids/access-admin/view/assets/images/favicon.ico", 
        # -----------  Styles  -----------
        "http://localhost/guids/access-admin/view/assets/css/bootstrap.min.css", 
        "http://localhost/guids/access-admin/view/assets/css/magnific-popup.css", 
        "http://localhost/guids/access-admin/view/assets/css/jquery-ui.css", 
        "http://localhost/guids/access-admin/view/assets/css/owl.carousel.min.css", 
        "http://localhost/guids/access-admin/view/assets/css/owl.theme.default.min.css", 
        "http://localhost/guids/access-admin/view/assets/css/bootstrap-datepicker.css", 
        "http://localhost/guids/access-admin/view/assets/css/aos.css", 
        "http://localhost/guids/access-admin/view/assets/css/rangeslider.css",
        # -----------  Custom styles  ----------- 
        "http://localhost/guids/access-admin/view/assets/css/style.css", 
        # -----------  Datatables  -----------
        "http://localhost/guids/access-admin/view/datatables/css/dataTables.bootstrap4.min.css", 
        "http://localhost/guids/access-admin/view/datatables/css/responsive.bootstrap4.min.css", 
        # -----------  Full Calendar  -----------  
        "http://localhost/guids/access-admin/view/fullcalendar/core/main.css", 
        "http://localhost/guids/access-admin/view/fullcalendar/bootstrap/main.css", 
        "http://localhost/guids/access-admin/view/fullcalendar/daygrid/main.css", 
        "http://localhost/guids/access-admin/view/fullcalendar/list/main.css", 
        "http://localhost/guids/access-admin/view/fullcalendar/timegrid/main.css", 
       );    
        
        if( 
            // If the first level of $url== for the get url content
            //var $url[0] is the cotent of the first level get url
            $url[0]=="index"||             
            $url[0]=="signup"|| 
            $url[0]=="signin" ||
            $url[0]=="profile" ||
            $url[0]=="newusers" ||
            $url[0]=="confirmatedusers" ||
            $url[0]=="confirmatedtours" ||
            $url[0]=="newtours" ||
            $url[0]=="mytours-setting" ||
            $url[0]=="mytours-delete" ||
            $url[0]=="bookings" ||
            $url[0]=="addtour" ||
            $url[0]=="generateinsurance" ||
            $url[0]=="settings" ||            
            $url[0]=="guideinfo" ||    
            $url[0]=="test" ||     
            $url[0]=="aboutus" ||    
            $url[0]=="terms-and-conditions" ||                  
            $url[0]=="privacy-policy" ||
            //Logout
            $url[0]=="logout"

            ){
            # -----------  Tab icon  -----------
            echo ' <link rel="shortcut icon" href="'.$csslink[0].'" />';        
            # -----------  Fonts  -----------
            echo ' <link rel="stylesheet" href="'.$csslink[1].'">
                   <link rel="stylesheet" href="'.$csslink[2].'">';
            # -----------  Styles  -----------
            echo ' <link rel="stylesheet" href="'.$csslink[3].'">
                   <link rel="stylesheet" href="'.$csslink[4].'">
                   <link rel="stylesheet" href="'.$csslink[5].'">
                   <link rel="stylesheet" href="'.$csslink[6].'">
                   <link rel="stylesheet" href="'.$csslink[7].'">
                   <link rel="stylesheet" href="'.$csslink[8].'">    
                   <link rel="stylesheet" href="'.$csslink[9].'">
                   <link rel="stylesheet" href="'.$csslink[10].'">';
            # -----------  Custom styles  -----------
            echo ' <link rel="stylesheet" href="'.$csslink[11].'">';
            # -----------  Datatables  -----------
            echo ' <link rel="stylesheet" href="'.$csslink[12].'">    
                   <link rel="stylesheet" href="'.$csslink[13].'">';
            # -----------  Full Calendar  -----------            
            echo ' <link rel="stylesheet" href="'.$csslink[14].'">
                   <link rel="stylesheet" href="'.$csslink[15].'">
                   <link rel="stylesheet" href="'.$csslink[16].'">
                   <link rel="stylesheet" href="'.$csslink[17].'">
                   <link rel="stylesheet" href="'.$csslink[18].'">';
                                                
            }else{
                      # -----------  Tab icon  -----------
            echo ' <link rel="shortcut icon" href="'.$csslink[0].'" />';        
            # -----------  Fonts  -----------
            echo ' <link rel="stylesheet" href="'.$csslink[1].'">
                   <link rel="stylesheet" href="'.$csslink[2].'">';
            # -----------  Styles  -----------
            echo ' <link rel="stylesheet" href="'.$csslink[3].'">
                   <link rel="stylesheet" href="'.$csslink[4].'">
                   <link rel="stylesheet" href="'.$csslink[5].'">
                   <link rel="stylesheet" href="'.$csslink[6].'">
                   <link rel="stylesheet" href="'.$csslink[7].'">
                   <link rel="stylesheet" href="'.$csslink[8].'">    
                   <link rel="stylesheet" href="'.$csslink[9].'">
                   <link rel="stylesheet" href="'.$csslink[10].'">';
            # -----------  Custom styles  -----------
            echo ' <link rel="stylesheet" href="'.$csslink[11].'">';
            # -----------  Datatables  -----------
            echo ' <link rel="stylesheet" href="'.$csslink[12].'">    
                   <link rel="stylesheet" href="'.$csslink[13].'">';
            # -----------  Full Calendar  -----------            
            echo ' <link rel="stylesheet" href="'.$csslink[14].'">
                   <link rel="stylesheet" href="'.$csslink[15].'">
                   <link rel="stylesheet" href="'.$csslink[16].'">
                   <link rel="stylesheet" href="'.$csslink[17].'">
                   <link rel="stylesheet" href="'.$csslink[18].'">';
        
        }
        
     ?>
    


    
  </head>