<?php
  session_start();
if(!isset($_SESSION['username'])){
    header("location:main_login.php");
  }
  
?><!DOCTYPE html>
<html lang="en">
  <head>
    <title>ReadItLater: Save</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="fixed-navigation-bar.css">
<link rel="shortcut icon" href="css/assets/favicon.png">
<link rel="stylesheet" href="css/base.css">
<!--  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
-->

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
.jumbotron {
  color: #F5F5F5;
  text-shadow: 0 0 30px #000;
  margin-top: 100px;
background-image: url("css/assets/image_signup.png");
background-size: cover;}
.body{
background-color: #e9ffff !important;
}
</style>
 <script type="text/javascript" src="js/bootstrap.js"></script>
<script src="js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
   
    <script src="js/save.js"></script>

  </head>
  
  <body>
    <nav class="navbar navbar-inverse navbar-custom navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="main_login.php">ReadItLater</a>
    </div>
    
  </div>
</nav>

    <div class="container">
     
    
    <div class="jumbotron">   
      <form class="form-signin form-horizontal" name="form1" method="post" action="checkstore.php">

        <h2 class="form-signin-heading ">Save Page</h2>
        <hr class="divider">
        <div class="form-group">
          <label class="control-label col-sm-2" for="url">URL:</label>
          <div class="col-sm-10">
            <input name="url" id="url" type="url" class="form-control" autofocus>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button name="Submit" id="submit" class="btn btn-lg btn-primary center-block" type="submit">Save</button>
          </div>
        </div>
        <div id="message" style="
    text-shadow: 0 0 30px #fff"></div>
      </form>

</div>
  </div> <!-- /container -->

  </body>
</html>
