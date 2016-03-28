<?php
  session_start();

  if(!isset($_SESSION['username'])){
    header("location:main_login.php");
}
 
?><!DOCTYPE html>
<html lang="en">
  <head>
    title>ReadItLater: Edit Account</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/base.css">
<link rel="stylesheet" href="fixed-navigation-bar.css">
<link rel="shortcut icon" href="css/assets/favicon.png">
<!--  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
-->
<script src="//code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <!-- The AJAX login script -->
    <script src="js/login.js"></script>
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

  margin-top: 100px;
}
</style>
  </head>
  <body>
<nav class="navbar navbar-inverse navbar-custom navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="">ReadItLater</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a class="dropdown-toggle" id="username" data-toggle="dropdown" href="#"><?php echo $_SESSION['username'];?><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="#">Help</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
  <div class="jumbotron">   
     <form class="form-horizontal" name="form1" method="post" action="#">

        <h2 class="form-signin-heading ">Edit Account</h2>
        <hr class="divider">
        <div class="form-group">
          <label class="control-label col-sm-2" for="name">Name:</label>
          <div class="col-sm-10">
            <input name="myusername" id="myusername" type="name" class="form-control" placeholder="<?php echo $_SESSION['username'];?>"autofocus>
          </div>
        </div>  
        <div class="form-group">
          <label class="control-label col-sm-2" for="password">Current Password:</label>
          <div class="col-sm-10">
            <input name="myemail" id="myemail" type="email" class="form-control" autofocus>
          </div>
        </div>
        <div class="form-group">  
          <label class="control-label col-sm-2" for="email">New Password:</label>
          <div class="col-sm-10">
            <input name="mypassword" id="mypassword" type="password" class="form-control">
          </div>
        </div>
        <div class="form-group">  
          <label class="control-label col-sm-2" for="email">Confirm Password:</label>
          <div class="col-sm-10"> 
            <input name="retypepwd" id="retypepwd" type="password" class="form-control">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button name="Submit" id="submit" class="btn btn-lg btn-success center-block disabled" type="submit">Save Changes</button>
          </div>
        </div>
        <div id="message" style="
    text-shadow: 0 0 30px #fff"></div>
      </form>
  </div>
</div>
</body>
</html>
