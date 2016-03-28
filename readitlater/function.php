<?php
	ob_start();
	session_start();
	include_once 'config.php';
// Connect to server and select databse.
	mysql_connect("$host", "$username", "$password")or die("cannot connect");
	mysql_select_db("$db_name")or die("cannot select DB");
	$aid = $_GET['aid'];
	$pl=$_GET['pl'];
	$action=$_GET['action'];
	if($action=='REM'){
		$sql="DELETE FROM $tbl_name_art WHERE aid = $aid";
		mysql_query($sql);
		header("location:index.php?fn=36");
	}
	else{
	 if($action=='ARC'){
	 		$sql="UPDATE $tbl_name_art SET place = $pl WHERE aid = $aid";
			mysql_query($sql);
			if($pl=='1'){
				header("location:article_page.php?aid=$aid&fn=31");	
			}
			else{
				header("location:article_page.php?aid=$aid&fn=30");		
			}
		}
	
	else{
		$sql="UPDATE $tbl_name_art SET place = $pl WHERE aid = $aid";
		mysql_query($sql);
		if($pl=='3'){
				header("location:article_page.php?aid=$aid&fn=34");	
			}
			else{
				header("location:article_page.php?aid=$aid&fn=35");		
			}
		
	}
}
	ob_end_flush();
?>
