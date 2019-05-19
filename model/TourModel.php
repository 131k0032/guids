<?php

require_once "model/Conexion.php";


	class TourModel {


# ====================================
# =           ADDING TOOUR           =
# ====================================


		# -----------  LAST ID INSERTED  -----------

		public function lastIdTour($id, $table){
		    $stmt = Conexion::conectar()->prepare("SELECT MAX($id) AS tours_id FROM $table");
			    if ($stmt->execute()) {
			      $result = $stmt->fetch();
			      return $result[0];
			    }
		    $stmt -> close();
		}


		# -----------  ADDING ON TE MAIN TABLE  -----------

		public function addTour($tourDataModel, $table){
			$stmt = Conexion::conectar()->prepare("
				INSERT INTO
				$table (name,
						description,
						find_guide,
						start_in,
						location,
						duration,
						capacity,
						status,
						created_at,
						-- updadet_at,
						user_id)

				VALUES
					   (:name,
						:description,
						:find_guide,
						:start_in,
						:location,
						:duration,
						:capacity,
						:status,
						:created_at,
						-- :updadet_at,
						:user_id)");

						$stmt->bindParam(":name",$tourDataModel["name"],PDO::PARAM_STR);
						$stmt->bindParam(":description",$tourDataModel["description"],PDO::PARAM_STR);
						$stmt->bindParam(":find_guide",$tourDataModel["find_guide"],PDO::PARAM_STR);
						$stmt->bindParam(":start_in",$tourDataModel["start_in"],PDO::PARAM_STR);
						$stmt->bindParam(":location",$tourDataModel["location"],PDO::PARAM_STR);
						$stmt->bindParam(":duration",$tourDataModel["duration"],PDO::PARAM_STR);
						$stmt->bindParam(":capacity",$tourDataModel["capacity"],PDO::PARAM_STR);
						$stmt->bindParam(":status",$tourDataModel["status"],PDO::PARAM_STR);
						$stmt->bindParam(":created_at",$tourDataModel["created_at"],PDO::PARAM_STR);
						// $stmt->bindParam(":updadet_at",$tourDataModel["updadet_at"],PDO::PARAM_STR);
						$stmt->bindParam(":user_id",$tourDataModel["user_id"],PDO::PARAM_INT);

						if($stmt->execute()){
							return "success";
						}else{
							return "error";
						}

			// cierra las consultas
			$stmt->close();
		}

		# -----------  ADDING ON A MANY TO MANY TABLE  -----------

		 public function addTourSchedule($table, $start_at, $day_id, $tour_id, $language_id){
            $stmt = Conexion::conectar()->prepare("INSERT INTO $table (start_at, day_id,tour_id,language_id) VALUES (:start_at,:day_id,:tour_id,:language_id)");
            $stmt->bindParam(":start_at", $start_at, PDO::PARAM_STR);
            $stmt->bindParam(":day_id", $day_id ,PDO::PARAM_STR);
            $stmt->bindParam(":tour_id", $tour_id ,PDO::PARAM_STR);
            $stmt->bindParam(":language_id", $language_id ,PDO::PARAM_STR);
            if($stmt->execute()){
              return "success";
            }else{
              return "error";
            }

            $stmt->close();
      }


      # -----------  ADDING ON A ONE TO MANY TABLE  -----------



       public function addTourImage($table, $src, $file_name, $tour_id){
            $stmt = Conexion::conectar()->prepare("INSERT INTO $table (src, file_name,tour_id) VALUES (:src,:file_name,:tour_id)");
            $stmt->bindParam(":src", $src, PDO::PARAM_STR);
            $stmt->bindParam(":file_name", $file_name ,PDO::PARAM_STR);
            $stmt->bindParam(":tour_id", $tour_id ,PDO::PARAM_STR);
            if($stmt->execute()){
              return "success";
            }else{
              return "error";
            }

            $stmt->close();
      }

# ======  End of ADDING TOOUR  =======



# =====================================
# =           SHOWING TOURS           =
# =====================================
 public function getUserTourById($table, $id){
				$stmt = Conexion::conectar()->prepare("SELECT
					-- Tour table
					tour.id as tour_id,
					tour.name as tour_name,
					tour.description as tour_description,
					tour.start_in as tour_start_in,
					tour.find_guide as tour_find_guide,
					tour.location as tour_location,
					-- User table
					user.id as user_id,
					user.name as user_name,
					user.phone as user_phone,
					user.email as user_email,
					user.lastname as user_lastname,
					user.town as user_town,
					user.state as user_state,
					user.personality as user_personality,
					user.ability as user_ability,
					user.src as user_src,
					user.picture as user_picture,
					user.created_at as user_created_at


					FROM $table
					inner join user
					on tour.user_id=user.id
					where tour.id=$id
					");
				$stmt->execute();
				return $stmt->fetch();
				$stmt->close();

		}


 public function getTourById($table, $id){
				$stmt = Conexion::conectar()->prepare("SELECT
						-- Table tour_schedule
						tour_schedule.id as tour_schedule_id,
						tour_schedule.start_at as tour_start_at,

						-- Table day
						day.id as day_id,
						day.name as day_name,
					-- Table tour
						tour.id as tour_id,
						tour.name as tour_name,
						tour.location as tour_location,
						tour.duration as tour_duration,
						tour.capacity as tour_capacity,
						tour.created_at as tour_created_at,
						-- Table language
						language.id as language_id,
						language.name as language_name,
						-- Table user
						user.id as user_id,
						user.name as user_name,
						-- Table tour_image
						tour_image.id as tour_image_id,
						tour_image.src as tour_image_src,
						tour_image.file_name as tour_image_filename

						from $table
						INNER JOIN day
						on tour_schedule.day_id = day.id
						INNER JOIN tour
						on tour_schedule.tour_id = tour.id
						INNER JOIN language
						on tour_schedule.language_id = language.id
						INNER JOIN user
						on user.id =tour.user_id
						INNER JOIN tour_image
						on tour_image.tour_id = tour.id
						where tour.id=$id
					");
				$stmt->execute();
				return $stmt->fetchAll();
				$stmt->close();

		}


		# -----------  GETING ALL TOURS   -----------
      public function getAll(){
				$stmt = Conexion::conectar()->prepare("SELECT
					tour.id AS tour_id,
					tour.name AS tour_name,
					tour.location AS tour_location,
					tour_image.src AS tour_image_src,
					tour_image.file_name AS tour_image_file_name,
					COUNT(review.tour_id) AS tour_count,
					AVG(review.rating) AS tour_rating
					FROM tour
						INNER JOIN tour_image
					    	ON tour_image.tour_id=tour.id
					    INNER JOIN review
					    	ON review.tour_id=tour.id
					WHERE tour.is_active=1
					GROUP BY tour.id
					ORDER BY tour_rating DESC
					LIMIT 51
				");
				$stmt->execute();
				return $stmt->fetchAll();
				$stmt->close();
		}

		# -----------  GETING ALL TOURS BY ID  -----------
		  public function getAllById($table, $id){
				$stmt = Conexion::conectar()->prepare("SELECT
						-- Table tour_schedule
						tour_schedule.id as tour_schedule_id,
						tour_schedule.start_at as tour_start_at,

						-- Table day
						day.id as day_id,
						day.name as day_name,
					-- Table tour
						tour.id as tour_id,
						tour.name as tour_name,
						tour.location as tour_location,
						tour.duration as tour_duration,
						tour.capacity as tour_capacity,
						tour.created_at as tour_created_at,
						-- Table language
						language.id as language_id,
						language.name as language_name,
						-- Table user
						user.id as user_id,
						user.name as user_name,
						-- Table tour_image
						tour_image.id as tour_image_id,
						tour_image.src as tour_image_src,
						tour_image.file_name as tour_image_filename

						from $table
						INNER JOIN day
						on tour_schedule.day_id = day.id
						INNER JOIN tour
						on tour_schedule.tour_id = tour.id
						INNER JOIN language
						on tour_schedule.language_id = language.id
						INNER JOIN user
						on user.id =tour.user_id
						INNER JOIN tour_image
						on tour_image.tour_id = tour.id
						where user.id=$id");
				$stmt->execute();
				return $stmt->fetchAll();
				$stmt->close();
		}
		#----------- Get All Tours By User on MyTours View -----------
		public function getAllToursByUser($userId){
			$stmt = Conexion::conectar()->prepare("SELECT
				/*Tour table*/
				tour.id AS tour_id,
				tour.name AS tour_name,
				tour.description AS tour_description,
				tour.find_guide AS tour_find_guide,
				tour.start_in AS tour_start_in,
				tour.location AS tour_location,
				tour.duration AS tour_duration,
				tour.capacity AS tour_capacity,
				tour.is_active AS tour_active,
				tour.created_at AS tour_created_at,
				/*tour_image table*/
				tour_image.src AS tour_image_src,
				tour_image.file_name AS tour_image_file_name
				FROM tour
					INNER JOIN tour_image
						ON tour_image.tour_id=tour.id
				WHERE tour.user_id=$userId");
			$stmt->execute();
			return $stmt->fetchAll();
			$stmt->close();
		}

		public function getAllTourSchedule($idTour){
			$stmt = Conexion::conectar()->prepare("SELECT
			tour_schedule.start_at AS tour_time,
			day.name as tour_date,
			language.name as tour_language
			FROM tour_schedule
				INNER JOIN day
			    	ON day.id=tour_schedule.day_id
				INNER JOIN language
			    	ON language.id=tour_schedule.language_id
			WHERE tour_schedule.tour_id=$idTour
			");
			$stmt->execute();
			return $stmt->fetchAll();
			$stmt->close();
		}

		public function getSearchEngine($like, $start, $rang, $order){
			 // echo "La consulta será: $like, $start, $rang, $order";
			$stmt=Conexion::conectar()->prepare("SELECT
				tour.id AS tour_id,
				tour.name AS tour_name,
				tour.location AS tour_location,
				tour_image.src AS tour_image_src,
				tour_image.file_name AS tour_image_file_name,
				COUNT(review.tour_id) AS tour_count,
				AVG(review.rating) AS tour_rating
				FROM tour
					INNER JOIN tour_image
							ON tour_image.tour_id=tour.id
						INNER JOIN review
							ON review.tour_id=tour.id
				WHERE tour.is_active=1 and (tour.name LIKE '%$like%' OR tour.description LIKE '%$like%' OR tour.find_guide LIKE '%$like%' OR tour.start_in LIKE '%$like%' OR tour.location LIKE '%$like%')
				GROUP BY tour.id
				ORDER BY tour_rating $order
				LIMIT $start, $rang");
			$stmt->execute();
			return $stmt->fetchAll();
			$stmt->close();

		}

		public function getAllSearchEngine($start, $rang, $order){
			 // echo "La consulta será: $like, $start, $rang, $order";
			$stmt=Conexion::conectar()->prepare("SELECT
				tour.id AS tour_id,
				tour.name AS tour_name,
				tour.location AS tour_location,
				tour_image.src AS tour_image_src,
				tour_image.file_name AS tour_image_file_name,
				COUNT(review.tour_id) AS tour_count,
				AVG(review.rating) AS tour_rating
				FROM tour
					INNER JOIN tour_image
							ON tour_image.tour_id=tour.id
						INNER JOIN review
							ON review.tour_id=tour.id
				WHERE tour.is_active=1
				GROUP BY tour.id
				ORDER BY tour_rating $order
				LIMIT $start, $rang");
			$stmt->execute();
			return $stmt->fetchAll();
			$stmt->close();

		}

		// For home template
		public function getCountRatingByIdTour($table, $id){
			$stmt = Conexion::conectar()->prepare("SELECT
				review.id as review_id,
				count(review.rating) as review_rating,

				tour.id as tour_id,
				tour.name as tour_name,

				user.id as user_id,
				user.name as user_name

				FROM
				$table

				inner join tour
				on review.tour_id=tour.id
				inner join user
				on review.user_id=user.id
				where tour.id=$id");
			$stmt->execute();
			return $stmt->fetchAll();
			$stmt->close();

		}

		// For home template
		public function getAvgRatingByIdTour($table, $id){
			$stmt = Conexion::conectar()->prepare("SELECT
				review.id as review_id,
				avg(review.rating) as review_rating,

				tour.id as tour_id,
				tour.name as tour_name,

				user.id as user_id,
				user.name as user_name

				FROM
				$table

				inner join tour
				on review.tour_id=tour.id
				inner join user
				on review.user_id=user.id
				where tour.id=$id");
			$stmt->execute();
			return $stmt->fetchAll();
			$stmt->close();

		}

	   // For guideinfo template
	   public function getAvgRating($table, $id){
			$stmt = Conexion::conectar()->prepare("SELECT
				review.id as review_id,
				avg(review.rating) as review_rating,

				tour.id as tour_id,
				tour.name as tour_name,

				user.id as user_id,
				user.name as user_name

				FROM
				$table

				inner join tour
				on review.tour_id=tour.id
				inner join user
				on review.user_id=user.id
				where tour.id=$id");
			$stmt->execute();
			return $stmt->fetch();
			$stmt->close();

		}
		// For guideinfo template
		public function getCountRating($table, $id){
			$stmt = Conexion::conectar()->prepare("SELECT
				review.id as review_id,
				count(review.rating) as review_rating,

				tour.id as tour_id,
				tour.name as tour_name,

				user.id as user_id,
				user.name as user_name

				FROM
				$table

				inner join tour
				on review.tour_id=tour.id
				inner join user
				on review.user_id=user.id
				where tour.id=$id");
			$stmt->execute();
			return $stmt->fetch();
			$stmt->close();

		}

	  
# ======  End of SHOWING TOURS  =======


# =====================================
# =           UPDATING TOUR           =
# =====================================





# -----------  GETING TOURBY ID  -----------

		public function getById($id, $table){
		//$stmt = Conexion::conectar()->prepare("SELECT id, name, description, find_guide, location, duration FROM $table where id=:id");
		$stmt = Conexion::conectar()->prepare("SELECT
			id, name, description, find_guide, start_in,
			location, duration, capacity, status, is_active,
			created_at, updated_at
			FROM $table WHERE id=:id
		");
		$stmt->bindParam(":id",$id,PDO::PARAM_INT);
		if ($stmt->execute()) {
			return $stmt->fetch();
		}else {
			return null;
		}
		$stmt->close();
		}



	public function updateById($tourDataModel, $idTour, $table){
			$stmt = Conexion::conectar()->prepare("UPDATE
				$table SET
				name=:name,description=:description,find_guide=:find_guide,
				start_in=:start_in,location=:location,duration=:duration,capacity=:capacity,
				updated_at=:updated_at WHERE id=:id");

			$stmt->bindParam(":name",$tourDataModel["name"],PDO::PARAM_STR);
			$stmt->bindParam(":description",$tourDataModel["description"],PDO::PARAM_STR);
			$stmt->bindParam(":find_guide",$tourDataModel["find_guide"],PDO::PARAM_STR);
			$stmt->bindParam(":start_in",$tourDataModel["start_in"],PDO::PARAM_STR);
			$stmt->bindParam(":location",$tourDataModel["location"],PDO::PARAM_STR);
			$stmt->bindParam(":duration",$tourDataModel["duration"],PDO::PARAM_STR);
			$stmt->bindParam(":capacity",$tourDataModel["capacity"],PDO::PARAM_INT);
			$stmt->bindParam(":updated_at",$tourDataModel["updated_at"],PDO::PARAM_STR);
			$stmt->bindParam(":id",$idTour,PDO::PARAM_INT);
			if($stmt->execute()){
				return true;
			}else{
				return false;
		}
 	}


# ======  End of UPDATING TOUR  =======



# ==========================================
# =           DEETING TOUR BY ID           =
# ==========================================
	# -----------  DELETE BY ID  -----------
		public function del($tourDataModel, $table){
			$stmt = Conexion::conectar()->prepare("DELETE FROM $table WHERE id=:id");
			$stmt->bindParam(":id",$tourDataModel,PDO::PARAM_INT);

			if($stmt->execute()){
				return "success";
			}else{
				return "error";
			}

			// cierra las consultas
			$stmt->close();

			}


# ======  End of DEETING TOUR BY ID  =======




#===========================================
# =           	DROP ALL TOUR 	           =
# ==========================================
public function dropAllTour($idTour){
	$stmt = Conexion::conectar()->prepare("
	DELETE FROM booking WHERE booking.tour_id=$idTour;
	DELETE FROM review WHERE tour_id=$idTour;
	DELETE FROM tour_schedule WHERE tour_id=$idTour;
	DELETE FROM tour_image WHERE tour_id=$idTour;
	DELETE FROM tour WHERE id=$idTour;
	");
	if ($stmt->execute()) {
		return true;
	}else {
		return false;
	}
	$stmt->close();

}

}
