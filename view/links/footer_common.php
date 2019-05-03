
  <?php 

      // Link vars   
      $jslink = array(
        # -----------  Main scripts  -----------   
        "http://localhost/guids/view/assets/js/jquery-3.3.1.min.js", 
        "http://localhost/guids/view/assets/js/jquery.validate.js", 
        "http://localhost/guids/view/assets/js/jquery-migrate-3.0.1.min.js", 
        "http://localhost/guids/view/assets/js/jquery-ui.js", 
        "http://localhost/guids/view/assets/js/popper.min.js", 
        "http://localhost/guids/view/assets/js/bootstrap.min.js", 
        "http://localhost/guids/view/assets/js/owl.carousel.min.js", 
        "http://localhost/guids/view/assets/js/jquery.stellar.min.js", 
        "http://localhost/guids/view/assets/js/jquery.countdown.min.js", 
        "http://localhost/guids/view/assets/js/jquery.magnific-popup.min.js", 
        "http://localhost/guids/view/assets/js/bootstrap-datepicker.min.js", 
        "http://localhost/guids/view/assets/js/aos.js", 
        "http://localhost/guids/view/assets/js/rangeslider.min.js", 
        "http://localhost/guids/view/assets/js/typed.js", 
        "http://localhost/guids/view/assets/js/main.js", 
        # -----------  Custom scripts  -----------  
        // "http://localhost/guids/view/assets/js/customStatesValues.js", 
        // "http://localhost/guids/view/assets/js/customTypedWords.js", 
        "http://localhost/guids/view/assets/js/customDaysValues.js", 
        # -----------  Data tables  -----------  
        "http://localhost/guids/view/datatables/js/jquery.dataTables.min.js", 
        "http://localhost/guids/view/datatables/js/dataTables.bootstrap4.min.js", 
        "http://localhost/guids/view/datatables/js/dataTables.responsive.min.js", 
        "http://localhost/guids/view/datatables/js/responsive.bootstrap4.min.js", 
        # -----------  Fullcalendar  -----------   
        "http://localhost/guids/view/fullcalendar/core/main.js", 
        "http://localhost/guids/view/fullcalendar/daygrid/main.js", 
        "http://localhost/guids/view/fullcalendar/list/main.js", 
        "http://localhost/guids/view/fullcalendar/timegrid/main.js", 
        "http://localhost/guids/view/fullcalendar/interactions/main.js", 
        "http://localhost/guids/view/fullcalendar/bootstrap/main.js", 



        
       );    
        
        if( 
            // If the fist level of $url== for the get url content
            //var $url[0] is the cotent of the rist level get url
            $url[0]=="index"||             
            $url[0]=="signup"|| 
            $url[0]=="signin" ||
            $url[0]=="profile" ||
            $url[0]=="mytours" ||
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
            # -----------  Main scripts  ----------- 
            echo '<script src="'.$jslink[0].'"></script>
                  <script src="'.$jslink[1].'"></script>
                  <script src="'.$jslink[2].'"></script>
                  <script src="'.$jslink[3].'"></script>
                  <script src="'.$jslink[4].'"></script>
                  <script src="'.$jslink[5].'"></script>
                  <script src="'.$jslink[6].'"></script>
                  <script src="'.$jslink[7].'"></script>
                  <script src="'.$jslink[8].'"></script>
                  <script src="'.$jslink[9].'"></script>
                  <script src="'.$jslink[10].'"></script>
                  <script src="'.$jslink[11].'"></script>
                  <script src="'.$jslink[12].'"></script>    
                  <script src="'.$jslink[13].'"></script>
                  <script src="'.$jslink[14].'"></script>';           
            
            # -----------  Custom scripts  -----------    
            echo '<script src="'.$jslink[15].'"></script>';
            # -----------  Data tables  -----------                    
            echo '<script src="'.$jslink[16].'"></script>
                  <script src="'.$jslink[17].'"></script>    
                  <script src="'.$jslink[18].'"></script>    
                  <script src="'.$jslink[10].'"></script>';
            
            # -----------  Fullcalendar  -----------                        
            echo '<script src="'.$jslink[20].'"></script> 
                  <script src="'.$jslink[21].'"></script>   
                  <script src="'.$jslink[22].'"></script> 
                  <script src="'.$jslink[23].'"></script>
                  <script src="'.$jslink[24].'"></script>
                  <script src="'.$jslink[25].'"></script>';
                                                
            }else{
               # -----------  Main scripts  ----------- 
            echo '<script src="'.$jslink[0].'"></script>
                  <script src="'.$jslink[1].'"></script>
                  <script src="'.$jslink[2].'"></script>
                  <script src="'.$jslink[3].'"></script>
                  <script src="'.$jslink[4].'"></script>
                  <script src="'.$jslink[5].'"></script>
                  <script src="'.$jslink[6].'"></script>
                  <script src="'.$jslink[7].'"></script>
                  <script src="'.$jslink[8].'"></script>
                  <script src="'.$jslink[9].'"></script>
                  <script src="'.$jslink[10].'"></script>
                  <script src="'.$jslink[11].'"></script>
                  <script src="'.$jslink[12].'"></script>    
                  <script src="'.$jslink[13].'"></script>
                  <script src="'.$jslink[14].'"></script>';           
            
            # -----------  Custom scripts  -----------    
            echo '<script src="'.$jslink[15].'"></script>';
            # -----------  Data tables  -----------                    
            echo '<script src="'.$jslink[16].'"></script>
                  <script src="'.$jslink[17].'"></script>    
                  <script src="'.$jslink[18].'"></script>    
                  <script src="'.$jslink[10].'"></script>';
            
            # -----------  Fullcalendar  -----------                        
            echo '<script src="'.$jslink[20].'"></script> 
                  <script src="'.$jslink[21].'"></script>   
                  <script src="'.$jslink[22].'"></script> 
                  <script src="'.$jslink[23].'"></script>
                  <script src="'.$jslink[24].'"></script>
                  <script src="'.$jslink[25].'"></script>';   
        }
        
     ?>
    

<!--   <script src="view/assets/js/jquery-3.3.1.min.js"></script>
  <script src="view/assets/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="view/assets/js/jquery-ui.js"></script>
  <script src="view/assets/js/popper.min.js"></script>
  <script src="view/assets/js/bootstrap.min.js"></script>
  <script src="view/assets/js/owl.carousel.min.js"></script>
  <script src="view/assets/js/jquery.stellar.min.js"></script>
  <script src="view/assets/js/jquery.countdown.min.js"></script>
  <script src="view/assets/js/jquery.magnific-popup.min.js"></script>
  <script src="view/assets/js/bootstrap-datepicker.min.js"></script>
  <script src="view/assets/js/aos.js"></script>
  <script src="view/assets/js/rangeslider.min.js"></script>    
  <script src="view/assets/js/typed.js"></script>
  <script src="view/assets/js/main.js"></script> -->
  <!-- Custom Scripts -->
<!--   <script src="view/assets/js/customStatesValues.js"></script>
  <script src="view/assets/js/customTypedWords.js"></script>  
  <script src="view/assets/js/customDaysValues.js"></script>   -->
  <!-- Datatables -->    
<!--   <script src="view/datatables/js/jquery.dataTables.min.js"></script>
  <script src="view/datatables/js/dataTables.bootstrap4.min.js"></script>    
  <script src="view/datatables/js/dataTables.responsive.min.js"></script>    
  <script src="view/datatables/js/responsive.bootstrap4.min.js"></script>     -->
  <!-- Fullcalendar -->
<!--   <script src="view/fullcalendar/core/main.js"></script> 
  <script src="view/fullcalendar/daygrid/main.js"></script>   
  <script src="view/fullcalendar/list/main.js"></script> 
  <script src="view/fullcalendar/timegrid/main.js"></script>
  <script src="view/fullcalendar/interactions/main.js"></script>
  <script src="view/fullcalendar/bootstrap/main.js"></script> -->
 