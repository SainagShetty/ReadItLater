<?php 
	session_start();
	session_destroy();
	setcookie('visit', false);
	header("location:main_login.php");
	
?>