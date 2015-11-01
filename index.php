<?php
  session_start();

  if(!isset($_SESSION['username'])){
    header("location:main_login.php");

}
 
?><!DOCTYPE html>
<html lang="en">
  <head>
    <title>ReadItLater: Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="fixed-navigation-bar.css">
    <link rel="shortcut icon" href="css/assets/favicon.png">
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">
   <style>
      .navbar-custom {
        color: #FFFFFF;
        background-color: #00a087;
        border-color: #00a087;
      }
      .navbar-inverse .navbar-brand {
        color: #ffffff;
      }
      .navbar-inverse .navbar-nav>li>a {
          color: #ffffff;
      }
      .navbar-inverse .navbar-collapse, .navbar-inverse .navbar-form {
          text-align: center;
      }
      .navbar-inverse:hover .navbar-brand:hover {
          color: #000000;
      }
      #float {
        position: relative;
        -webkit-animation: floatBubble 0.4s normal ease-out;
        animation: floatBubble 0.4s normal ease-out;
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
    </style>
  </head>
  <body style="background-color: linen;">
    <?php
      if(isset($_GET['fn'])){
    $fn=$_GET['fn'];
    if($fn=='36'){
      echo '<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Item Deleted</h4>
        </div>
      </div>
    </div>
  </div>';
    }
    else if($fn=='49'){
      echo '<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Item Added</h4>
        </div>
      </div>
    </div>
  </div>';
    }
  }?>
    <nav class="navbar navbar-inverse navbar-fixed-top navbar-custom">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
          <a class="navbar-brand" href="index.php">ReadItLater</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">
                <li> <!--<a data-placement="bottom" data-toggle="popover" data-title="Save a URL" data-container="body" type="button" data-html="true" id="save"><span class="glyphicon glyphicon-plus"></span></a></li><div id="popover-content" class="hide"><form class="form-inline" role="form" name="form1" submit='checkstore.php' method="post" id="savesubmit"><div class="form-group"><input type="text" placeholder="http://.." class="form-control" name="url"></br><button type="submit" class="btn btn-primary" style="margin-top:10px;" id="savesubmit">Save</button> <div id="message"></div>                                 </div></form> <script src="js/save.js"></script></div>-->
                  <a href="save_article.php" data-toggle="tooltip" title="Save a URL!" data-placement="bottom"><span class="glyphicon glyphicon-plus"></span></a>
                <li class="dropdown">
                  <a class="dropdown-toggle" id="username" data-toggle="dropdown" href=""><?php echo $_SESSION['username']?><span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="help.php">Help</a></li>
                    <li><a href="logout.php">Logout</a></li>
                  </ul>
    </div>
  </div>
</nav>
    <div class="container" style="margin-top: 70px;">
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">My List</a></li>
        <li><a data-toggle="tab" href="#menu1">Archive</a></li>
        <li><a data-toggle="tab" href="#menu2">Favorites</a></li>
      </ul>
      <div class="tab-content">
        <div id="home" class="tab-pane fade in active"><br>
          <div class="form-signin">
            <?php
              if (!isset($_COOKIE['visit'])) {
                  setcookie('visit', true, time()+(3600*60)); // TODO modify time till end of session
                  echo '<div class="alert alert-success" id="success-alert">You have been <strong>successfully logged in</strong>.</div>';
              }
            ?>
          </div>

  



          <div class="list-group">
            <?php
             error_reporting(0);
                include_once 'config.php';
                try{
                  mysql_connect("$host", "$username", "$password")or die("cannot connect");
                  mysql_select_db("$db_name")or die("cannot select DB");
                  $uid = $_SESSION['id'];
                  $sql="SELECT * FROM $tbl_name_art WHERE id=$uid and (place = 0 or place = 3) and title != '' ORDER BY aid DESC";
                  $result=mysql_query($sql);
                  $count=mysql_num_rows($result);
                  if($count==0){
                    echo '<h4 class="list-group-item-heading">Oops...no articles yet!</h4>';
                  }
                  else{
                  $row=0;
                    while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
                        if($row['place'] == 0){
                          echo mb_convert_encoding('<div id="float"><a href="'."article_page.php?aid=".$row['aid'].'" class="list-group-item modal-fade">
                                <h4 class="list-group-item-heading">'.$row['title'].'</h4>
                                <p class="list-group-item-text">'.$row['author'].'</p>
                                </a></div>',"HTML-ENTITIES","UTF-8"); 
                        }
                        else{
                          echo mb_convert_encoding('<div id="float"><a href="'."article_page.php?aid=".$row['aid'].'" class="list-group-item modal-fade">
                                <span class="glyphicon glyphicon-star" style="color:goldenrod; float: right;"></span>
                                <h4 class="list-group-item-heading">'.$row['title'].'</h4>
                                <p class="list-group-item-text">'.$row['author'].'</p>
                                </a></div>',"HTML-ENTITIES","UTF-8");;   
                        }
                    }
                  }
                }
                catch(Exception $ea){}
            ?>
          </div>
        </div>
        <div id="menu1" class="tab-pane fade"><br>
          <div class="list-group">
            <?php
                include_once 'config.php';
                try{
                  mysql_connect("$host", "$username", "$password")or die("cannot connect");
                  mysql_select_db("$db_name")or die("cannot select DB");
                  $uid = $_SESSION['id'];
                  $sql="SELECT * FROM $tbl_name_art WHERE id=$uid and place = 1 and title != '' ORDER BY aid DESC";
                  $result=mysql_query($sql);
                  $count=mysql_num_rows($result);
                  if($count==0){
                    echo '<h4 class="list-group-item-heading">Nothing in the Archived section!</h4>';
                  }
                  else{
                  $row=0;
                    while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
                        echo mb_convert_encoding('<a href="'."article_page.php?aid=".$row['aid'].'" class="list-group-item modal-fade">
                              <h4 class="list-group-item-heading">'.$row['title'].'</h4>
                              <p class="list-group-item-text">'.$row['author'].'</p>
                              </a>',"HTML-ENTITIES","UTF-8");;
                    }
                  }
                }
                catch(Exception $ea){}
            ?>
          </div>
        </div>
        <div id="menu2" class="tab-pane fade"><br>
          <div class="list-group">
            <?php
                include_once 'config.php';
                try{
                  mysql_connect("$host", "$username", "$password")or die("cannot connect");
                  mysql_select_db("$db_name")or die("cannot select DB");
                  $uid = $_SESSION['id'];
                  $sql="SELECT * FROM $tbl_name_art WHERE id=$uid and place = 3 and title != '' ORDER BY aid DESC";
                  $result=mysql_query($sql);
                  $count=mysql_num_rows($result);
                  if($count==0){
                    echo '<h4 class="list-group-item-heading">Nothing in the Favorites section!</h4>';
                  }
                  else{
                  $row=0;
                    while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
                        echo mb_convert_encoding('<a href="'."article_page.php?aid=".$row['aid'].'" class="list-group-item modal-fade">
                        <span class="glyphicon glyphicon-star" style="color:goldenrod; float: right;"></span>
                              <h4 class="list-group-item-heading">'.$row['title'].'</h4>
                              <p class="list-group-item-text">'.$row['author'].'</p>
                              </a>',"HTML-ENTITIES","UTF-8");;
                    }
                  }
                }
                catch(Exception $ea){}
            ?>
          </div>
        </div>
      </div>
    </div>
    <script src="//code.jquery.com/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script src="js/save.js"></script>
    <script>
      $(document).ready (function(){
       
        
        $("#float").delay(30000).show();       
      	$("#success-alert").alert();
          $("#success-alert").fadeTo(1000, 500).slideUp(500, function(){
          	$("#success-alert").alert('close');
          });

      });  
      

    </script>
    <script type="text/javascript">
    $(window).load(function(){
        $('#myModal').modal('show');
setTimeout(function(){
        $("#myModal").modal('hide');
    }, 900);
    });

</script>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
  </body>
</html>

