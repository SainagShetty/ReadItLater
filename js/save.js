$(document).ready(function(){
    
  $("#savesubmit").click(function(){

    var url = $("#url").val();
    if((url == "")) {
      
      $("#message").html("<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Please a URL/div>");
    }
    else {
      $.ajax({
        type: "POST",
        url: "checkstore.php",
        data: "&url="+url,
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