$(document).ready(function(){
  $("#myemail").change(function() { 
    var usr = $("#myemail").val();
    
        $("#em").html('<span class=\"glyphicon glyphicon glyphicon glyphicon-refresh form-control-feedback\"></span>');
        $.ajax({  
          type: "POST",  
          url: "check.php",  
          data: "myemail="+ usr,  
          success: function(msg){  
            $("#status").ajaxComplete(function(event, request, settings){ 
              if(msg == 'OK')
              { 

                $("#emaild").removeClass('has-error'); // if necessary
                $("#emaild").addClass("has-success");
                $("#em").html('<span class=\"glyphicon glyphicon glyphicon-ok form-control-feedback\"></span>');
              }  
              else  
              {  
                $("#emaild").removeClass('has-success'); // if necessary
                $("#emaild").addClass("has-error");
                $("#em").html(msg);
              }  
            });
          } 
        }); 
    });


 $("#submit").click(function(){
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
});

 $('#retypepwd').on('keyup', function () {
    if ($(this).val() == $('#mypassword').val()) {
        document.getElementById("submit").disabled = false;
         $("#pwd").removeClass("has-error");
          $("#repwd").removeClass("has-error");
        document.getElementById("repwd").className += " has-success";
       document.getElementById("pwd").className += " has-success";
    } else{
       document.getElementById("submit").disabled = true;
     
  }
});