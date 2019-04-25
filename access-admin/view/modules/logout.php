<?php 
	// Destroying Sessions
	session_start();
	unset($_SESSION["validar"]);
	unset($_SESSION["email"]);
	
	// session_destroy();
	print "<script>window.location='index';</script>";
	exit();
 ?>
