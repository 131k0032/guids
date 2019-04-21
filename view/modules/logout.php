<?php 
	// Destroying Sessions
	session_start();
	session_destroy();
	print "<script>window.location='index';</script>";
	exit();
 ?>
