$(document).ready(function () {
  $("#remove").click(function (event) {
    event.preventDefault();
    var uid = $("#uid").val();
   console.log(uid);


    if (uid !='') {
      if (confirm("Are You Sure Delete the User?")) {
        $.ajax({
          url: "back/delete_user.php",
          method: "POST",
          data: $("#form").serialize(),
          success: function (data) {
            $("form").trigger("reset");
            $("#return").fadeIn().html(data);
            $("#remove").show();
           
setTimeout(function() {
                        location.reload(true);
                    }, 5000);
return false;
          },
        });
      } else {
        return false;
      }

      // Run Code
    }
    else{
     console.log('error!');
    }
  });
});
