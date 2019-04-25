<?php 

require_once "model/Conexion.php";


	class TourModel {

# =======================================================
# =           GETTING ALL NEW PUBLISHED TOURS           =
# =======================================================


# -----------  GETING ALL ACTIVE   -----------      	
public function getAllInActive($table){
		$stmt = Conexion::conectar()->prepare("
			SELECT 
		-- Table tour
		tour.id as tour_id,
		tour.name as tour_name,
		tour.description as tour_description,
		tour.find_guide as tour_find_guide,
		tour.location as tour_location, 
		tour.duration as tour_duration, 
		tour.capacity as tour_capacity,
		tour.status as tour_status,
		tour.created_at as tour_created_at,
		-- Table user
		user.id as user_id,
		user.name as user_name,
		user.lastname as user_lastname,

		-- Tatle tour_image
		tour_image.id as tour_image_id,
		tour_image.src as tour_image_src,
		tour_image.file_name as tour_name_file_name
		 FROM tour 
		 inner join user
		 on tour.user_id=user.id
		 
		 inner join tour_image 
		 on tour_image.tour_id=tour.id
		 
		 where tour.status=0 && user.is_active=1;
			");
		$stmt->execute();				
		return $stmt->fetchAll();						
		$stmt->close();

}


# ======  End of GETTING ALL NEW PUBLISHED TOURS  =======



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
            $stmt = Conexion::conectar()->prepare("INSERT INTO $table (`start_at`, `day_id`,`tour_id`,`language_id`) VALUES (:start_at,:day_id,:tour_id,:language_id)");
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
            $stmt = Conexion::conectar()->prepare("INSERT INTO $table (`src`, `file_name`,`tour_id`) VALUES (:src,:file_name,:tour_id)");
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
					user.ability as user_ability


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
      public function getAll($table){
				$stmt = Conexion::conectar()->prepare("SELECT 
					-- Tabla tour
					tour.id as tour_id,
					tour.name as tour_name,
					tour.location as tour_location,
					tour.description as tour_escription,
					-- Tabla tour_image
					tour_image.id as tour_image_id,
					tour_image.src as tour_image_src,
					tour_image.file_name as tour_image_file_name
					from $table
					inner join tour_image
					on tour.id=tour_image.tour_id
					");
				$stmt->execute();				
				return $stmt->fetchAll();						
				$stmt->close();

		}


# ======  End of SHOWING TOURS  =======


# =====================================
# =           UPDATING TOUR           =
# =====================================

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



# -----------  GETING TOURBY ID  -----------

		public function getById($id, $table){
		$stmt = Conexion::conectar()->prepare("SELECT id, name, description, find_guide, location, duration FROM $table where id=:id");
		$stmt->bindParam(":id",$id,PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();		
		// cierra las consultas
			$stmt->close();

		}



	public function updateById($tourDataModel, $table){
			$stmt = Conexion::conectar()->prepare("UPDATE $table SET name=:name WHERE id=:id");				

			$stmt->bindParam(":name",$tourDataModel["name"],PDO::PARAM_STR);
			// $stmt->bindParam(":lastname",$userDataModel["lastname"],PDO::PARAM_STR);							
			// $stmt->bindParam(":phone",$userDataModel["phone"],PDO::PARAM_INT);				
			// $stmt->bindParam(":personality",$userDataModel["personality"],PDO::PARAM_STR);				
			// $stmt->bindParam(":ability",$userDataModel["ability"],PDO::PARAM_STR);				
			$stmt->bindParam(":id",$tourDataModel["id"],PDO::PARAM_INT);
			$stmt->execute();
			
			if($stmt->execute()){
				return "success";
			}else{
				return "error";
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
            



}