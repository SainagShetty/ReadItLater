<?php
  session_start();

  if(isset($_SESSION['username'])){
    header("location:index.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
<title>ReadItLater</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/base.css">

<link rel="shortcut icon" href="css/assets/favicon.png">
<script src="js/jquery.js"></script>
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

</style>

</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
  <nav class="navbar navbar-inverse navbar-custom navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#page-top">ReadItLater</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#about" class="page-scroll">About</a></li>
        <li><a href="adduser.php">Sign Up</a></li>
        <li><a type="button" id="myBtn3">Login</a></li>
      </ul>
    </div>
  </div>
</nav>
<script type="text/javascript" src="js/actions.js"></script>

<div id="main_container">
<section class="content" id="page-top">
  <div class="description">
    <div class="summary"> 
<p>GOT TIME</p>
<p>READ NOW</p>
<p>ELSE</p>
<p><strong>READ IT LATER</strong></p>
</div>
</div>
</section>
<section id="about" class="about-section">

<section class="some-related-articles">
</br><h1 align=center>ABOUT</h1>
</br><p>READ IT LATER was founded in 2015 by RAS enterprises to help people save interesting articles, images and more from the web for later enjoyment.</p>
 <p>Once saved to Read It Later, the list of content is visible on any device; phone, tablet or computer.</p> 
 <p>It can be viewed while waiting in line, on the couch, during commutes or travel.</p>
 <p>It is available for major devices and platforms including Google Chrome, Safari, Firefox, Opera and Windows.</p>
 <p>Follow us on Twitter or Facebook for the latest news.
</p>
<span class='st_facebook_large' displayText='Facebook'></span>
<span class='st_twitter_large' displayText='Tweet'></span>
<span class='st_linkedin_large' displayText='LinkedIn'></span>
<span class='st_pinterest_large' displayText='Pinterest'></span>
<span class='st_email_large' displayText='Email'></span>
<br><p style="color: brown;">Start saving in ReadItLater    <a type="button" class="btn btn-success" id="myBtn3" href="login_form.php">Login now</a></p> 
</section>

</section>

</div>
<div class="container">
  <div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <form class="form-signin" name="form1" method="post" action="checklogin.php">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input name="myemail" id="myemail" type="email" class="form-control" placeholder="Email ID" autofocus></br>
        <input name="mypassword" id="mypassword" type="password" class="form-control" placeholder="Password"></br>
        <button name="Submit" id="submit" class="btn btn-lg btn-success" type="submit">Sign in</button></br>
        <div id="message"></div></br>
        <a href="adduser.php" id="create" class="btn btn-lg btn-default">Create Account</a>
      </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready (function(){
	$("#success-alert").alert();
    $("#success-alert").fadeTo(1000, 500).slideUp(500, function(){
    	$("#success-alert").alert('close');
    });           
 });  
</script>

</body>
</html>