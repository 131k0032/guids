<?php


include_once "view/classupload/class.upload.php";
include_once "view/phpmailer/class.phpmailer.php";

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
				//Data to send email
			 		$user_guide_name=$_POST["user_guide_name"];
			 		$user_guide_lastname=$_POST["user_guide_lastname"];
					$user_guide_email=$_POST["user_guide_email"];
					    $mail = new PHPMailer();

					    $mail->From     = "ceo@guids.mx";    // Correo Electronico para SMTP
					    $mail->FromName = "CEO Guids.mx";
					    $mail->AddAddress($user_guide_email); // DirecciÃ³n a la que llegaran los mensajes.

					// AquÃ­ van los datos que apareceran en el correo que reciba

					    $mail->WordWrap = 50;
					    $mail->CharSet = 'UTF-8';
					    $mail->IsHTML(true);					    
					    $mail->Subject  =  "Solicitud de tour";
					    $mail->addReplyTo('ceo@guids.mx', 'CEO Guids.mx');
					    $mail->Body    = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
							<html xmlns="http://www.w3.org/1999/xhtml">
							<head>
							<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
							<title>Demystifying Email Design</title>
							<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
							</head>
							<body style="margin: 0; padding: 0;">
								<table border="0" cellpadding="0" cellspacing="0" width="100%">
									<tr>
										<td style="padding: 10px 0 30px 0;">
											<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
												<tr>
													<td align="center" bgcolor="#ee4c50" style="padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
							                          <img src="https://guids.mx/view/assets/images/email/header.png" alt="Creating Email Magic" width="300" height="230" style="display: block;" />
							                        </td>
												</tr>
												<tr>
													<td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
														<table border="0" cellpadding="0" cellspacing="0" width="100%">
															<tr>
																<td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;">
																	<b>Alguien te ha solicitado un tour</b>
																</td>
															</tr>
															<tr>
																<td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
																	Hola '.$user_guide_name.' '.$user_guide_lastname.' , el equipo de Guids.mx te informa que te han hecho una reserva a uno de los tours haz publicado en Guids.mx, accede con tu cuenta, en tu agenda puedes observar las solicitudes de turistas/viajeros que te lo han solicitado. Y, si tu itinerario lo permite, confirma los tours, pero recuerda, mientras mas tours realizes vas a tener un mejor posicionamiento en el sitio y sobre todo no menos impotante, mayores ingresos.
																	<br>
					                                                  <br>
					                                                  <strong>Saludos cordiales</strong>
					                                                  <br>
					                                                  <em>Lic. Yazzir Adan Vazquez Sarabia</em>
					                                                  <br>                                      
					                                                  <em>CEO de Guids.mx</em>
																</td>
															</tr>

														</table>
													</td>
												</tr>
												<tr>
													<td bgcolor="#ee4c50" style="padding: 30px 30px 30px 30px;">
														<table border="0" cellpadding="0" cellspacing="0" width="100%">
															<tr>
																<td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" width="60%">
																	El equipo de Guids.mx<br/>				
																</td>
																<td align="right" width="40%">
																	<table border="0" cellpadding="0" cellspacing="0">
																		<tr>
							                                              <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
							                                                <a href="http://www.twitter.com/" style="color: #ffffff;">
							                                                  <img src="https://guids.mx/view/assets/images/email/facebook.png" alt="Twitter" width="38" height="38" style="display: block;" border="0" />
							                                                </a>
							                                              </td>

							                                              <td style="font-size: 0; line-height: 0;" width="10">&nbsp;</td>
							                                              <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
							                                                <a href="http://www.twitter.com/" style="color: #ffffff;">
							                                                  <img src="https://guids.mx/view/assets/images/email/twitter.png" alt="Facebook" width="38" height="38" style="display: block;" border="0" />
							                                                </a>
							                                              </td>

							                                              <td style="font-size: 0; line-height: 0;" width="10">&nbsp;</td>
							                                              <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
							                                                <a href="http://www.instagram.com/" style="color: #ffffff;">
							                                                  <img src="https://guids.mx/view/assets/images/email/instagram.png" alt="Instagram" width="38" height="38" style="display: block;" border="0" />
							                                                </a>
							                                              </td>

							                                              <td style="font-size: 0; line-height: 0;" width="10">&nbsp;</td>
									                                      <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
									                                        <a href="http://www.blogger.com/" style="color: #ffffff;">
									                                          <img src="https://guids.mx/view/assets/images/email/blogger.png" alt="Blogger" width="38" height="38" style="display: block;" border="0" />
									                                        </a>
									                                      </td>

							                                              <td style="font-size: 0; line-height: 0;" width="10">&nbsp;</td>
							                                              <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
							                                                <a href="http://www.youtube.com/" style="color: #ffffff;">
							                                                  <img src="https://guids.mx/view/assets/images/email/youtube.png" alt="Youtube" width="38" height="38" style="display: block;" border="0" />
							                                                </a>
							                                              </td>
							                                              
							                                          	</tr>
																	</table>
																</td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</body>
							</html>';
                         $mail->AltBody = 'Este es el mansaje en texto plano para clientes que no admitan HTML';

					   // Datos del servidor SMTPs

					    $mail->IsSMTP();
					    $mail->Host = "mail.guids.mx";  // mail. o solo dominio - Servidor de Salida.
					    $mail->SMTPAuth = true;
					    $mail->Username = "ceo@guids.mx";  // Correo ElectrÃ³nico para SMTP
					    $mail->Password = "Yazzirguids#2019"; // ContraseÃ±a para SMTP

					    if ($mail->Send()){
					    	print "<script>alert(\"Tour reservado, espera respuesta del guía\");window.location='https://guids.mx/index';</script>";
					    	// print "<script>alert(\"Added\");window.location='http://localhost/guids/index';</script>";
					    }
					    else{
					    	print "<script>alert(\"No reservado, espera respuesta del guía\");window.location='https://guids.mx/index';</script>";
					    	// print "<script>alert(\"no Added\");window.location='http://localhost/guids/index';</script>";
					  }
				// print "<script>alert(\"Added\");window.location='http://localhost/guids/index';</script>";
			}else{
				// print "<script>alert(\"Error al reservar\");window.location='https://guids.mx/index';</script>";
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
			$respuesta=BookingModel::acceptTour($_POST["booking_id"],"booking");
			if($respuesta){
					
						$tour_name=$_POST["tour_name"];
						$tour_location=$_POST["tour_location"];
						$tour_start_in=$_POST["tour_start_in"];
						$tour_find_guide=$_POST["tour_find_guide"];

						$booking_tourist_name=$_POST["booking_tourist_name"];
						$booking_tourist_lastname=$_POST["booking_tourist_lastname"];
						$booking_tourist_email=$_POST["booking_tourist_email"];
						$booking_tourist_quantyty=$_POST["booking_tourist_quantyty"];
						$booking_date=$_POST["booking_date"];

						$schedule_start_at=$_POST["schedule_start_at"];

						//User guide data
						$user_guide_name_confirm=$_POST["user_guide_name_confirm"];
						$user_guide_phone_confirm=$_POST["user_guide_phone_confirm"];

				        $mail = new PHPMailer();

					    $mail->From     = "ceo@guids.mx";    // Correo Electronico para SMTP
					    $mail->FromName = "CEO Guids.mx";
					    $mail->AddAddress($booking_tourist_email); // DirecciÃ³n a la que llegaran los mensajes.

					// AquÃ­ van los datos que apareceran en el correo que reciba

					    $mail->WordWrap = 50;
					    $mail->CharSet = 'UTF-8';
					    $mail->IsHTML(true);
					    $mail->Subject  =  "Reservación aceptada";
					    $mail->addReplyTo('ceo@guids.mx', 'CEO Guids.mx');
					    $mail->Body    = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
							<html xmlns="http://www.w3.org/1999/xhtml">
							<head>
							<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
							<title>Demystifying Email Design</title>
							<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
							</head>
							<body style="margin: 0; padding: 0;">
								<table border="0" cellpadding="0" cellspacing="0" width="100%">
									<tr>
										<td style="padding: 10px 0 30px 0;">
											<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
												<tr>
													<td align="center" bgcolor="#ee4c50" style="padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
							                          <img src="https://guids.mx/view/assets/images/email/header.png" alt="Creating Email Magic" width="300" height="230" style="display: block;" />
							                        </td>
												</tr>
												<tr>
													<td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
														<table border="0" cellpadding="0" cellspacing="0" width="100%">
															<tr>
																<td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;">
																	<b>Reservación aceptada por el guía</b>
																</td>
															</tr>
															<tr>
																<td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
																	Hola <b>'.$booking_tourist_name.' '.$booking_tourist_lastname.'</b>, recien haz realizado una reservación del tour <b>'.$tour_name.'</b> mismo que se realiza en <b>'.$tour_location.'</b>. El equipo de Guids.mx pero sobre todo el guía te damos las gracias por reservar este grandioso tour, este a su vez ha decido que tu reservación ha sido Aceptada, he aquí un breve resumen de información importante que necesitas saber:<br>
																	    El tour lo haz reservado para el <b>'.$booking_date.'</b> a la(s) <b>'.$schedule_start_at.'</b>, el tour inicia en <b>'.$tour_start_in.'</b> y elegiste que irá una cantidad de <b>'.$booking_tourist_quantyty.'</b> persona(s): El guía dijo que lo encontrarías y reconocerías: <b>'.$tour_find_guide.'</b>. Por último, si tienes alguna duda puedes contactar a '.$user_guide_name_confirm.': '.$user_guide_phone_confirm.', quien es el guía responsable del tour. Sabemos que será un excelente e interesante tour el quiere darte a conocer, sabemos que será una experiencia única y divertida y esperamos pronto nuevamente tu reservación para este tour y compartirlo con tus amigos. De momento no queda mucho más que decirle y que "tenga un excelente guía".
																	  <br>
					                                                  <br>
					                                                  <strong>Saludos cordiales</strong>
					                                                  <br>
					                                                  <em>Lic. Yazzir Adan Vazquez Sarabia</em>
					                                                  <br>                                      
					                                                  <em>CEO de Guids.mx</em>
																</td>
															</tr>

														</table>
													</td>
												</tr>
												<tr>
													<td bgcolor="#ee4c50" style="padding: 30px 30px 30px 30px;">
														<table border="0" cellpadding="0" cellspacing="0" width="100%">
															<tr>
																<td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" width="60%">
																	El equipo de Guids.mx<br/>				
																</td>
																<td align="right" width="40%">
																	<table border="0" cellpadding="0" cellspacing="0">
																		<tr>
							                                              <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
							                                                <a href="http://www.twitter.com/" style="color: #ffffff;">
							                                                  <img src="https://guids.mx/view/assets/images/email/facebook.png" alt="Twitter" width="38" height="38" style="display: block;" border="0" />
							                                                </a>
							                                              </td>

							                                              <td style="font-size: 0; line-height: 0;" width="10">&nbsp;</td>
							                                              <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
							                                                <a href="http://www.twitter.com/" style="color: #ffffff;">
							                                                  <img src="https://guids.mx/view/assets/images/email/twitter.png" alt="Facebook" width="38" height="38" style="display: block;" border="0" />
							                                                </a>
							                                              </td>

							                                              <td style="font-size: 0; line-height: 0;" width="10">&nbsp;</td>
							                                              <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
							                                                <a href="http://www.instagram.com/" style="color: #ffffff;">
							                                                  <img src="https://guids.mx/view/assets/images/email/instagram.png" alt="Instagram" width="38" height="38" style="display: block;" border="0" />
							                                                </a>
							                                              </td>

							                                              <td style="font-size: 0; line-height: 0;" width="10">&nbsp;</td>
									                                      <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
									                                        <a href="http://www.blogger.com/" style="color: #ffffff;">
									                                          <img src="https://guids.mx/view/assets/images/email/blogger.png" alt="Blogger" width="38" height="38" style="display: block;" border="0" />
									                                        </a>
									                                      </td>

							                                              <td style="font-size: 0; line-height: 0;" width="10">&nbsp;</td>
							                                              <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
							                                                <a href="http://www.youtube.com/" style="color: #ffffff;">
							                                                  <img src="https://guids.mx/view/assets/images/email/youtube.png" alt="Youtube" width="38" height="38" style="display: block;" border="0" />
							                                                </a>
							                                              </td>
							                                              
							                                          	</tr>
																	</table>
																</td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</body>
							</html>';
                         $mail->AltBody = 'Este es el mansaje en texto plano para clientes que no admitan HTML';

					   // Datos del servidor SMTPs

					    $mail->IsSMTP();
					    $mail->Host = "mail.guids.mx";  // mail. o solo dominio - Servidor de Salida.
					    $mail->SMTPAuth = true;
					    $mail->Username = "ceo@guids.mx";  // Correo ElectrÃ³nico para SMTP
					    $mail->Password = "Yazzirguids#2019"; // ContraseÃ±a para SMTP

					    if ($mail->Send()){
					    	print "<script>alert(\"Reservación confirmada, se envió un correo al turista/viajero\");window.location='http://localhost/guids/index';</script>";
					    	// print "<script>alert(\"Added\");window.location='http://localhost/guids/index';</script>";
					    }else{
					    	print "<script>alert(\"Error de mail, pero tour aceptado jeje\");window.location='http://localhost/guids/index';</script>";
					    	// print "<script>alert(\"no Added\");window.location='http://localhost/guids/index';</script>";
					  }

			}else{
				print "<script>alert(\"Error no se ha podido aceptar la reservación.\");</script>";
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

	// For booking template
	public function getBookingsDataTable($id){
		$getBookingsDataTable = BookingModel::getBookingsData($id, 0);
		return $getBookingsDataTable;
	}

	public function getBookingsCalendar($id){
		$jsonData = array();
		$getDataBookins = BookingModel::getBookingsData($id, 1);
		foreach ($getDataBookins as $key => $data) {
			$start = new DateTime($data["booking_date"].substr($data["schedule_start"],0,5).":00");
			$end = new DateTime($start->format("c"));
			$end->add(new DateInterval("PT".substr($data["tour_duration"],0,1)."H".substr($data["tour_duration"],2,2)."M"));
			$url="https://guids.mx/guideinfo/tour/".$data["tour_id"];
			$jsonData[] = array("title" => utf8_encode($data["tour_name"]), "start" => $start->format("Y-m-d\TH:i:s"), "end" => $end->format("Y-m-d\TH:i:s"), "url" => $url);
		}
		return $jsonData;
	}


	// For booking template
	public function GetCountBookinByTour($idTour){
		$count = BookingModel::GetCountBookinByTour($idTour);
		return $count[0];
	}



}
