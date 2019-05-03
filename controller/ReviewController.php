<?php 

class ReviewController{


	public function add(){
		$created_at=date('Y-m-d');
		if(isset($_POST['comment']) && $_POST["rating_input"]>=1){
			
			$rating=$_POST['rating_input'];
			$comment=$_POST['comment'];
			$created_at=$created_at;
			$tour_id=$_POST['tour_id'];
			$user_id=$_POST['user_id'];
			

			$reviewInsert = ReviewModel::add("review", $rating, $comment, $created_at, $tour_id, $user_id);
			
			if($reviewInsert=="success"){
				print "<script>alert(\"Gracias por calificar.\");window.location='http://localhost/guids/index';</script>";
				// echo $_POST["phone"];
		
			}else{
				print "<script>alert(\"Error al calificar.\");window.location='http://localhost/guids/index';</script>";

		}		


	 }
  }

}