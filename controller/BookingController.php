<?php 

class BookingController{

	public function add(){
		if(isset($_POST["tour_date"])){
				$now=date('Y-m-d');				
				$date_formatted=date('Y-m-d',$_POST["tour_date"]);
				$bookingDataController=array(
				// "dbfields"=>$_POST["variables"]
					"tour_date"=>$date_formatted,
					"tourist_quantyty"=>$_POST["tourist_quantyty"],
					"status"=>0,
					"name"=>$_POST["name"],
					"lastname"=>$_POST["lastname"],
					"phone"=>$_POST["phone"],
					"email"=>$_POST["email"],
					// "src"=>"NULL",
					// "file_name"=>"NULL",	
					"created_at"=>$now,
					// "updadet_at"="NUL",
					"tour_schedule_id"=>$_POST["tour_schedule_id"],
					"tour_id"=>$_POST["tour_id"]													
				);
			$bookinginsert = BookingModel::add($bookingDataController,"booking");
			var_dump($bookingDataController);

			if($bookinginsert=="success"){
				// var_dump($bookinginsert);
				print "<script>alert(\"Added\");window.location='http://localhost/guids/index';</script>"; 
			}else{
				print "<script>alert(\"No added\");window.location='http://localhost/guids/index';</script>"; 
				// var_dump($bookinginsert);
			}
			
		}
	}

	// For generateinsurance template
	// Way 1 to access by id when de result is onli one
	// public function getAllAccepted(){
	// 	 $getAllAccepted = BookingModel::getAllAccepted("booking", $id);
 // 	   	 return $getAllAccepted;
	// }
	
	// For generateinsurance template
	//Way 2 to access by id using the $id url when the result is more of one
	public function getAllAccepted($id){
 	   	 $getAllAccepted = BookingModel::getAllAccepted("booking", $id);
 	   	 return $getAllAccepted;
	}

	//For bookings template
	public function getAllUnaccepted($id){
 	   	 $getAllUnaccepted = BookingModel::getAllUnaccepted("booking", $id);
 	   	 return $getAllUnaccepted;
	}

	// For bookings template
	public function acceptTour(){
		if(isset($_POST["booking_id"])){

			$acceptTour=array(
				"id"=>$_POST["booking_id"],
				"status"=>1
			);

        	$respuesta=BookingModel::acceptTour($acceptTour,"booking");
        	   if($respuesta=="success"){
              print "<script>alert(\"Excelente! Haz aceptado el tour.\");window.location='http://localhost/guids/index';</script>";
            	}else{
              print "<script>alert(\"Error.\");window.location='http://localhost/guids/index';</script>";
            }
		}
	}
}