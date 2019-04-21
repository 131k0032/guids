<?php 

echo "lugar". $location=$_POST["location"];
echo "<br>";
echo "guia". $find_guide=$_POST["find_guide"];
echo "<br>";
echo "nombre del tour:". $name=$_POST["name"];
echo "<br>";
echo "description". $description=$_POST["description"];
echo "<br>";
echo "lenguage". $language=$_POST["language"];
echo "<br>";
// $_POST["src"];
echo "duration". $duration=$_POST["duration"];
echo "<br>";
if(isset($_POST['day']) && isset($_POST['start_at'])){
	$day=$_POST['day'];
	$start_at=$_POST['start_at'];
		  foreach ($day as $index => $value) {
				// $dayinsert = LanguageModel::addUserLanguage("user_language", $lastIdUser, $value);
		  	
		  	echo $value;		  	
		  	echo "<br>";
		  	// echo $start_at[$index];
			}

			foreach ($start_at as $key => $value2) {
				echo $value2;
			}
			echo "<br>";


  }
 echo "<br>";
// $_POST["day"];
// $_POST["start_at"];
echo "capacity".$capacity=$_POST["capacity"];





// if(isset($_POST['start_at'])){
// 	$start_at=$_POST['start_at'];
// 		  foreach ($start_at as $index => $value) {
// 				// $dayinsert = LanguageModel::addUserLanguage("user_language", $lastIdUser, $value);
// 		  	echo $value;
// 		  	echo "<br>";
// 			}


//   }

 ?>