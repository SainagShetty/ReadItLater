jQuery(document).ready(function () {
    $('#form12').validator('validator')
 jQuery("#submit").click(function () {
        console.log("button url clicked");

    var url = $("#url").val();
    if((url == "")) {
      
      $("#message").html("<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Please enter a  URL</div>");
    }
    else {
      $.ajax({
        type: "POST",
        url: "checkstore.php",
        data: "&url="+url,
        async: 'false',
        success: function(html){    
          if(html=='true') {
            
            window.location="index.php?fn=49";

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