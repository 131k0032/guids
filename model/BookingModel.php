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
					   (:tour_date,
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

	public function getAllNullAccepted($table, $id){
					$stmt = Conexion::conectar()->prepare("SELECT
					-- Table booking
					booking.id as booking_id,
					booking.tour_date as booking_tour_date,
					booking.tourist_quantyty as booking_tourist_quantyty,
					booking.status as booking_tourist_status,
					booking.name as booking_tourist_name,
					booking.lastname as booking_tourist_lastname,
					-- Table tour_schedule
					tour_schedule.id as tour_schedule_id,
					tour_schedule.start_at as tour_schedule_start_at,
					-- Table tour
					tour.id as tour_id,
					tour.name as tour_name,
					-- Table user
					user.id as user_id
					from $table
					inner join tour
					on booking.tour_id=tour.id

					inner join tour_schedule
					on booking.tour_schedule_id=tour_schedule.id

					inner join user
					on user.id=tour.user_id

					where user.id=$id &&
					booking.status=1  &&
					booking.src IS NULL &&
					booking.file_name IS NULL
					ORDER BY booking.id desc
					");
				$stmt->execute();
				return $stmt->fetchAll();
				$stmt->close();
	}

		public function getAllAccepted($table, $id){
					$stmt = Conexion::conectar()->prepare("SELECT
					-- Table booking
					booking.id as booking_id,
					booking.tour_date as booking_tour_date,
					booking.tourist_quantyty as booking_tourist_quantyty,
					booking.status as booking_tourist_status,
					booking.name as booking_tourist_name,
					booking.lastname as booking_tourist_lastname,
					booking.phone as booking_tourist_phone,
					booking.email as booking_tourist_email,
					-- Table tour_schedule
					tour_schedule.id as tour_schedule_id,
					tour_schedule.start_at as tour_schedule_start_at,
					-- Table tour
					tour.id as tour_id,
					tour.name as tour_name,
					-- Table user
					user.id as user_id
					from $table
					inner join tour
					on booking.tour_id=tour.id

					inner join tour_schedule
					on booking.tour_schedule_id=tour_schedule.id

					inner join user
					on user.id=tour.user_id

					where user.id=$id &&
					booking.status=1  ORDER BY booking.id desc

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
				booking.name as booking_tourist_name,
				booking.lastname as booking_tourist_lastname,
				-- Table tour_schedule
				tour_schedule.id as tour_schedule_id,
				tour_schedule.start_at as tour_schedule_start_at,
				-- Table tour
				tour.id as tour_id,
				tour.name as tour_name,
				-- Table user
				user.id as user_id
				from $table
				inner join tour
				on booking.tour_id=tour.id

				inner join tour_schedule
				on booking.tour_schedule_id=tour_schedule.id

				inner join user
				on user.id=tour.user_id

				where user.id=$id &&
				booking.status=0 &&
				booking.src IS NULL &&
				booking.file_name IS NULL ORDER BY booking.id desc");
				$stmt->execute();
				return $stmt->fetchAll();
				$stmt->close();
	}

		public function acceptTour($bookingDataModel, $table){
			$stmt = Conexion::conectar()->prepare("UPDATE $table SET status=1 WHERE id=:id");
			$stmt->bindParam(":id",$bookingDataModel,PDO::PARAM_INT);
				if($stmt->execute()){
					return true;
				}else{
					return false;
				}
			$stmt->close();
	}

	public function fileValidateTour($bookingDataModel, $table){
				$stmt = Conexion::conectar()->prepare("UPDATE $table SET src=:src, file_name=:file_name, updated_at=:updated_at WHERE id=:id");
				$stmt->bindParam(":src",$bookingDataModel["src"],PDO::PARAM_STR);
				$stmt->bindParam(":file_name",$bookingDataModel["file_name"],PDO::PARAM_STR);
				$stmt->bindParam(":updated_at",$bookingDataModel["updated_at"],PDO::PARAM_STR);
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

		public function getAllReported($table, $id){
					$stmt = Conexion::conectar()->prepare("SELECT
					-- Table booking
					booking.id as booking_id,
					booking.tour_date as booking_tour_date,
					booking.tourist_quantyty as booking_tourist_quantyty,
					booking.status as booking_tourist_status,
					booking.name as booking_tourist_name,
					booking.lastname as booking_tourist_lastname,
					booking.src as booking_tourist_src,
					booking.file_name as booking_tourist_file_name,
					booking.updated_at as booking_updated_at,
					-- Table tour_schedule
					tour_schedule.id as tour_schedule_id,
					tour_schedule.start_at as tour_schedule_start_at,
					-- Table tour
					tour.id as tour_id,
					tour.name as tour_name,
					-- Table user
					user.id as user_id
					from $table
					inner join tour
					on booking.tour_id=tour.id

					inner join tour_schedule
					on booking.tour_schedule_id=tour_schedule.id

					inner join user
					on user.id=tour.user_id

					where user.id=$id &&
					booking.status=1  &&
					booking.src IS NOT NULL &&
					booking.file_name IS NOT NULL
					ORDER BY booking.id desc
					");
				$stmt->execute();
				return $stmt->fetchAll();
				$stmt->close();
	}


		public function getBookingsData($id, $status){
			$stmt = Conexion::conectar()->prepare("SELECT
			tour.id AS tour_id,
			tour.name AS tour_name,
			tour.location AS tour_location,
			tour.start_in AS tour_start_in,
			tour.find_guide AS tour_find_guide,
			tour.duration AS tour_duration,
			tour.capacity AS tour_capacity,
			tour.is_active AS tour_active,
			tour.user_id AS tour_user_id,
			booking.tour_date AS booking_date,
			booking.id AS booking_id,
			booking.tourist_quantyty AS booking_quantyty,
			booking.status AS booking_status,
			booking.name AS booking_name,
			booking.lastname AS booking_lastname,
			booking.email AS booking_email,
			booking.tour_schedule_id AS booking_schedule,
			tour_schedule.start_at AS schedule_start
			FROM tour
				INNER JOIN booking
					ON booking.tour_id=tour.id
				INNER JOIN tour_schedule
					ON tour_schedule.id=booking.tour_schedule_id
			WHERE tour.is_active=1 and booking.status=$status and tour.user_id=$id
			ORDER BY booking.tour_date ASC
			");
			$stmt->execute();
			return $stmt->fetchAll();
			$stmt->close();
		}

		public function GetCountBookinByTour($idTour){
			$stmt = Conexion::conectar()->prepare("SELECT
				COUNT(*) AS count
				FROM booking WHERE tour_id=$idTour");
			$stmt->execute();
			return $stmt->fetchAll();
			$stmt->close();
		}

}
