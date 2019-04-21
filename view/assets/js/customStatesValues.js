      
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
  