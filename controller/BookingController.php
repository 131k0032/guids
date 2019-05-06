<?php


include_once "view/classupload/class.upload.php";
class BookingController{

	public function add(){
		if(isset($_POST["tour_date"])){
				$now=date('Y-m-d');
				// $date = $_POST['tour_date'];
				// $format = explode('-', $date);
				// $date_formatted = "{$format[0]}-{$format[1]}-{$format[2]}";
				$bookingDataController=array(
				// "dbfields"=>$_POST["variables"]
					"tour_date"=>$_POST["tour_date"],
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
			// var_dump($bookingDataController);

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
	public function getAllNullAccepted($id){
 	   	 $getAllNullAccepted = BookingModel::getAllNullAccepted("booking", $id);
 	   	 return $getAllNullAccepted;
	}

	// For booking template
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



	// For booking template
	public function fileValidateTour(){


		if(isset($_POST["booking_id"])){
			 if(isset($_FILES["src"])){
			 	  $now=date('Y-m-d');
                  // echo "Hay imagen";
                  $handle = new Upload($_FILES['src']);

                  if($handle->uploaded){
                    // $src="view/images/toursvalidated/".$id;
                    $src="view/images/toursvalidated/";
                    $handle->Process($src);
                    if($handle->processed){
                      $file_name = $handle->file_dst_name;

						$fileValidateTour=array(
							"id"=>$_POST["booking_id"],
							"src"=>$src,
							"file_name"=>$file_name,
							"updated_at"=>$now,
						);
                      // Updating src and file_name on booking
                      $validate = BookingModel::fileValidateTour($fileValidateTour, "booking");
                      if($validate=="success"){
                        // var_dump($tourScheduleInsert);
                        print "<script>alert(\"Bookig validated\");window.location='http://localhost/guids/mytours';</script>";
                      }else{
                        echo "Error al agregar datos";
                      }
                    }else{
                      echo "Error size";
                    }
                  }else{
                    echo "Cannot uplad image";
                  }
                }else{
                  echo "There is not image";
                  echo $_FILES["src"];
                }
		}
	}


	// For booking template
	public function getAllReported($id){
 	   	 $getAllReported = BookingModel::getAllReported("booking", $id);
 	   	 return $getAllReported;
	}


	public function getBookinsData($id){
		$getBookinsData = BookingModel::getBookinsData($id);
		return $getBookinsData;
	}


	public function GetCountBookinByTour($idTour){
		$count = BookingModel::GetCountBookinByTour($idTour);
		return $count[0];
	}
}
