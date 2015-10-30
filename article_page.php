<?php
  session_start();

  if(!isset($_SESSION['username'])){
    header("location:main_login.php");
}
 
?><!DOCTYPE html>
<html lang="en">
  <head>
    <title>ReadItLater: Read</title>
<meta name="viewport" content="width=device-width, initial-scale=1">


<link rel="shortcut icon" href="css/assets/favicon.png">
<!--  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
-->

  <link href="css/bootstrap.css" rel="stylesheet" media="screen">
   
<style>
  .navbar-custom {
    color: #FFFFFF;
    background-color: #f5f5f5;
    border-color: #d3d3d3;
}
 

.navbar-inverse .navbar-collapse, .navbar-inverse .navbar-form {
    text-align: center;
}
.navbar-right {float: right !important;}

@media(max-width:767px)
{
    .navbar>.container .navbar-brand, .navbar>.container-fluid .navbar-brand{
  margin-left: 15px !important;
}
    .navbar-header:after 
    {
    clear: none;
    }


    .navbar-collapse:before {clear:both;}
}

.navbar-nav {
     margin: 0px 0px !important; 
}
}
.navbar.transparent.navbar-inverse .navbar-inner {
    border-width: 0px;
    -webkit-box-shadow: 0px 0px;
    box-shadow: 0px 0px;
    background-color: rgba(0,0,0,0.0);
    background-image: -webkit-gradient(linear, 50.00% 0.00%, 50.00% 100.00%, color-stop( 0% , rgba(0,0,0,0.00)),color-stop( 100% , rgba(0,0,0,0.00)));
    background-image: -webkit-linear-gradient(270deg,rgba(0,0,0,0.00) 0%,rgba(0,0,0,0.00) 100%);
    background-image: linear-gradient(180deg,rgba(0,0,0,0.00) 0%,rgba(0,0,0,0.00) 100%);
}
#float {
    position: relative;
    -webkit-animation: floatBubble 2s normal ease-out;
    animation: floatBubble 2s normal ease-out;
}
@-webkit-keyframes floatBubble {
    0% {
        top:50px;
    }
    100% {
        top: 0px;
    }
}
@keyframes floatBubble {
    0% {
        top:50px;
    }
    100% {
        top: 0px;
    }
    
}
.jumbotron p {
 
    padding: 10px;
    font-size: 1.3em;
}      
.navbar-inverse:hover .navbar-brand:hover {
    color: #000000;
}
body {
    font-family: serif;
    line-height: 1.5;
}
</style>
  </head>
  <body>
    
    <nav class="navbar navbar-inverse navbar-custom navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="nav navbar-nav navbar-brand" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span></a>
          <?php 
           include_once 'config.php';
      mysql_connect("$host", "$username", "$password")or die("cannot connect");
      mysql_select_db("$db_name")or die("cannot select DB");
      $uid = $_SESSION['id'];
      $aid = $_GET['aid'];
      $sql="SELECT * FROM $tbl_name_art WHERE id=$uid and aid=$aid";
      $result=mysql_query($sql);
      // rowCount() is counting table row
      $count=mysql_num_rows($result);
      $row = mysql_fetch_array($result,MYSQL_ASSOC);
            $pl = $row['place'];
            if(strcmp($pl,"1")!=0){
             
              if(strcmp($pl,"0")==0){
                echo '<a class="nav navbar-nav navbar-brand" href="delete.php?aid='.$aid.'"><span class="glyphicon glyphicon-trash"></span></a>
                      <a class="nav navbar-nav navbar-brand" href="#"><span class="glyphicon glyphicon-star-empty"></span></a>';
              }
              else{
                echo '<a class="nav navbar-nav navbar-brand" href="delete.php?aid='.$aid.'"><span class="glyphicon glyphicon-trash"></span></a>
                      <a class="nav navbar-nav navbar-brand" href="#"><span class="glyphicon glyphicon-star" style="color:goldenrod;"></span></a>';   
              }
            }

          ?>
          
        </div>
          </div>
    </nav>

<div class="container" style="margin-top: 70px;">
  <?php
     
      
      if($count!=0){
        $jsondata = file_get_contents($row['textpth']);
        $json = json_decode($jsondata,true);
        $text = $json['text'];

        $text = '<p>' . preg_replace('/\n/', '</p><p>', $text) . '</p>';
        if($row['imgpth'] == "NO"){
          echo mb_convert_encoding('<h2 class="list-group-item-heading" style="text-align: center;">'.$row['title'].'</h2>
                <div class="jumbotron"><div class="reader"><div><p>'.$text.'</p></div></div>',"HTML-ENTITIES","UTF-8");
        }
        else{
          echo mb_convert_encoding('<h2 class="list-group-item-heading" style="text-align: center;">'.$row['title'].'</h2>
                <div class="jumbotron"><div id="float"><img class="img-responsive img-rounded center-block" style="padding: 25px;s" src="'.$row['imgpth'].'"></img></div>
                <div class="reader"><div><p>'.$text.'</p></div></div>',"HTML-ENTITIES","UTF-8");
        }
      }
      else{
        echo '<div class="alert alert-danger">Error 203</div>';
      }
  ?>
  
</div>

</div>
</body>
</html>

