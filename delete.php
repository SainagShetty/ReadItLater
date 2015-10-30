<?php
	ob_start();
	session_start();
	include_once 'config.php';
// Connect to server and select databse.
	mysql_connect("$host", "$username", "$password")or die("cannot connect");
	mysql_select_db("$db_name")or die("cannot select DB");
	$aid = $_GET['aid'];
	$sql="DELETE FROM $tbl_name_art WHERE aid = $aid";
	mysql_query($sql);
	header("location:index.php");
	ob_end_flush();
?>
