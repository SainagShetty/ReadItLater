<?php 
	session_start();
	session_destroy();
	unset($_COOKIE['visit']);
    setcookie('visit', null, -1, '/');
	//setcookie('visit', false);
	header("location:main_login.php");
	
?>