<?php
ob_start();
  session_start();

include_once 'config.php';
ini_set('max_execution_time', 300);
  // Connect to server and select databse.
  mysql_connect("$host", "$username", "$password")or die("cannot connect");     
  mysql_select_db("$db_name")or die("cannot select DB");

 // $myurl = $_POST['url'];
  $myurl = isset($_POST['url']) ? $_POST['url'] : '';
  if($myurl==""){
    echo "<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Invalid URL</div>";
    return;
  }
  $requrl=$myurl;
  $input = time();
	$key=$apikey;
	$apicall_comb="http://access.alchemyapi.com/calls/url/URLGetCombinedData?apikey=$key&outputMode=json&knowledgeGraph=1&extract=page-image,entity,keyword,taxonomy,feed,image-kw,title,author,pubdate,docsentiment&url=$requrl";
  $apicall_txt="http://access.alchemyapi.com/calls/url/URLGetText?apikey=$key&outputMode=json&url=$requrl";
  $jsondata2 = file_get_contents($apicall_txt);
  
file_put_contents('uploads/'.$input.'.json', $jsondata2);
  $jsondata1 = file_get_contents($apicall_comb);
  $json = json_decode($jsondata1,true);
  $title = $json['title'];

    
 
  
  
  $author = $json['author'];
  $imgurl = $json['image'];
  if($imgurl != NULL)
  { file_put_contents('uploads/1.jpg', file_get_contents($imgurl));
    rename('uploads/1.jpg','uploads/'.$input.'.jpg');
    $imgpth = 'uploads/'.$input.'.jpg';
  }
  else
  {
    $imgpth = "NO";
  }
  $txtpth = 'uploads/'.$input.'.json';
  $imgurl = stripslashes($imgurl);
  $title = stripslashes($title);
  $imgpth = stripslashes($imgpth);  
  $author = stripslashes($author);
  $txtpth = stripslashes($txtpth); 
  $requrl = stripslashes($requrl);
  $requrl =  mysql_real_escape_string($requrl); 
  $imgurl = mysql_real_escape_string($imgurl);  
  $title = mysql_real_escape_string($title);
  $imgpth = mysql_real_escape_string($imgpth);
  $author = mysql_real_escape_string($author);
  $txtpth = mysql_real_escape_string($txtpth);
  $imgurl = mysql_real_escape_string($imgurl);
  $id = $_SESSION['id'];
  $sql = "INSERT INTO $tbl_name_art (`aid`,`id`,`ourl`,`imgurl`,`title`,`imgpth`,`author`,`textpth`,`place`) VALUES (NULL,'$id','$requrl','$imgurl','$title','$imgpth','$author','$txtpth',0)";
    mysql_query($sql) or die(mysql_error());
  if($sql){
    echo "true";
    header("location:index.php?fn=49");
  }

  ob_end_flush();
  
?>