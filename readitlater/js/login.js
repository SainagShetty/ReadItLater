$(document).ready(function(){
    
  $("#submit").click(function(){

    var email = $("#myemail").val();
    var password = $("#mypassword").val();

    
    if((email == "") || (password == "")) {
      
      $("#message").html("<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Please enter a email and a password</div>");
    }
    else {
      $.ajax({
        type: "POST",
        url: "checklogin.php",
        data: "&myemail="+email+"&mypassword="+password,
        success: function(html){    
          if(html=='true') {
            window.location="index.php";
          }
          else {
            $("#message").html(html);
          }
        },
        beforeSend:function()
        {
          $("#message").html("<p class='text-center'><img src='css/assets/ajax-loader.gif'></p>")
        }
      });
    }
    return false;
  });
});