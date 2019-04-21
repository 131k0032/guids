      
      $(function(){
            $('.lunes').change(function(){
              if($(this).prop('checked')){
                $('#horariolunes').show();
              }else{
                $('#horariolunes').hide();
              }
            
            })

          $('.martes').change(function(){
              if($(this).prop('checked')){
                $('#horariomartes').show();
              }else{
                $('#horariomartes').hide();
              }
            
            })

          $('.miercoles').change(function(){
              if($(this).prop('checked')){
                $('#horariomiercoles').show();
              }else{
                $('#horariomiercoles').hide();
              }
            
            })

          $('.jueves').change(function(){
              if($(this).prop('checked')){
                $('#horariojueves').show();
              }else{
                $('#horariojueves').hide();
              }
            
            })

          $('.viernes').change(function(){
              if($(this).prop('checked')){
                $('#horarioviernes').show();
              }else{
                $('#horarioviernes').hide();
              }
            
            })

          $('.sabado').change(function(){
              if($(this).prop('checked')){
                $('#horariosabado').show();
              }else{
                $('#horariosabado').hide();
              }
            
            })

          $('.domingo').change(function(){
              if($(this).prop('checked')){
                $('#horariodomingo').show();
              }else{
                $('#horariodomingo').hide();
              }
            
            })

          })


