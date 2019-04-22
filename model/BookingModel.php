<?php 

require_once "model/Conexion.php";

class BookingModel{

	public function add($bookingDataModel,$table){
		$stmt = Conexion::conectar()->prepare("
				INSERT INTO  
				$table (tour_date, 
						tourist_quantyty, 
						status, 
						name, 
						lastname, 
						phone, 
						email, 						
						created_at,						
						tour_schedule_id,
						tour_id) 
				VALUES 
					   (:name, 
					    :tourist_quantyty, 
					    :status, 
					    :name, 
					    :lastname, 
					    :phone, 
					    :email, 					    
						:created_at,						
						:tour_schedule_id,
						:tour_id
						)");

						$stmt->bindParam(":tour_date",$bookingDataModel["tour_date"],PDO::PARAM_STR);
						$stmt->bindParam(":tourist_quantyty",$bookingDataModel["tourist_quantyty"],PDO::PARAM_INT);			
						$stmt->bindParam(":status",$bookingDataModel["status"],PDO::PARAM_INT);
						$stmt->bindParam(":name",$bookingDataModel["name"],PDO::PARAM_STR);
						$stmt->bindParam(":lastname",$bookingDataModel["lastname"],PDO::PARAM_STR);
						$stmt->bindParam(":phone",$bookingDataModel["phone"],PDO::PARAM_STR);
						$stmt->bindParam(":email",$bookingDataModel["email"],PDO::PARAM_STR);						
						$stmt->bindParam(":created_at",$bookingDataModel["created_at"],PDO::PARAM_STR);						
						$stmt->bindParam(":tour_schedule_id",$bookingDataModel["tour_schedule_id"],PDO::PARAM_INT);
						$stmt->bindParam(":tour_id",$bookingDataModel["tour_id"],PDO::PARAM_INT);											
						if($stmt->execute()){
							return "success";
						}else{
							return "error";
						}

			// cierra las consultas
			$stmt->close();
	}

	public function getAllAccepted($table, $id){
					$stmt = Conexion::conectar()->prepare("SELECT 
					-- Table booking
					booking.id as booking_id,
					booking.tour_date as booking_tour_date,
					booking.tourist_quantyty as booking_tourist_quantyty,
					booking.status as booking_status,
					booking.name as booking_tourist_name,
					booking.lastname as booking_tourist_lastname,
					booking.phone as booking_tourist_phone,
					booking.email as booking_tourist_email,
					booking.src as booking_tourist_src,
					booking.file_name as booking_toursit_file_name,
					-- Table tour_schedule
					tour_schedule.id as tour_schedule_id,
					tour_schedule.start_at as tour_schedule_start_at,
					-- Table tour
					tour.id as tour_id,
					tour.name as tour_name,
					tour.description as tour_description,
					tour.location as tour_location,
					-- Table user_id
					user.id as user_id,
					user.name as user_name

					from 
					$table
					inner join tour
					on booking.tour_id=tour.id

					inner join tour_schedule
					on tour_schedule.id=booking.id

					inner join user
					on user.id=tour.user_id

					where 
					-- To validate a bookig before is accepted with status 1
					user.id=$id && 
					booking.status=1 && 
					booking.src IS NULL && 
					booking.file_name IS NULL
					");
				$stmt->execute();				
				return $stmt->fetchAll();						
				$stmt->close();
	}


		public function getAllUnaccepted($table, $id){
					$stmt = Conexion::conectar()->prepare("SELECT 
					-- Table booking
					booking.id as booking_id,
					booking.tour_date as booking_tour_date,
					booking.tourist_quantyty as booking_tourist_quantyty,
					booking.status as booking_status,
					booking.name as booking_tourist_name,
					booking.lastname as booking_tourist_lastname,
					booking.phone as booking_tourist_phone,
					booking.email as booking_tourist_email,
					booking.src as booking_tourist_src,
					booking.file_name as booking_toursit_file_name,
					-- Table tour_schedule
					tour_schedule.id as tour_schedule_id,
					tour_schedule.start_at as tour_schedule_start_at,
					-- Table tour
					tour.id as tour_id,
					tour.name as tour_name,
					tour.description as tour_description,
					tour.location as tour_location,
					-- Table user_id
					user.id as user_id,
					user.name as user_name

					from 
					$table
					inner join tour
					on booking.tour_id=tour.id

					inner join tour_schedule
					on tour_schedule.id=booking.id

					inner join user
					on user.id=tour.user_id

					where 
					-- To validate a bookig before is accepted with status 1
					user.id=$id && 
					booking.status=0 && 
					booking.src IS NULL && 
					booking.file_name IS NULL
					");
				$stmt->execute();				
				return $stmt->fetchAll();						
				$stmt->close();
	}

		public function acceptTour($bookingDataModel, $table){
				$stmt = Conexion::conectar()->prepare("UPDATE $table SET status=:status WHERE id=:id");						
				$stmt->bindParam(":status",$bookingDataModel["status"],PDO::PARAM_INT);							
				$stmt->bindParam(":id",$bookingDataModel["id"],PDO::PARAM_INT);
				$stmt->execute();				
				if($stmt->execute()){
					return "success";
				}else{
					return "error";
				}
			return $stmt->fetch();						
			$stmt->close();

	}


}