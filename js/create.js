jQuery(document).ready(function () {
  $('#form1').validator('validator')
    jQuery("#submit").click(function () {
        console.log("button clicked");

    	var username = $("#myusername").val();
    	var password = $("#mypassword").val();
    	var email = $("#myemail").val();
      var repwd = $("#retypepwd").val();
      if((email == "") || (password == "") || (username == "") ) {
        $("#message").html("<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Please enter all the fields</div>");
      }
      else {
        $.ajax({
          type: "POST",
          url: "createuser.php",
          data: "&myusername="+username+"&myemail="+email+"&mypassword="+password,
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

$('#retypepwd').on('keyup', function () {
    if ($(this).val() == $('#mypassword').val()) {
        document.getElementById("submit").disabled = false;
         $("#pwd").removeClass("has-error");
          $("#repwd").removeClass("has-error");
        document.getElementById("repwd").className += " has-success";
       document.getElementById("pwd").className += " has-success";
       console.log("passwords match");
    } else{
       document.getElementById("submit").disabled = true;
       console.log("passwords dont match");
     
  }


});