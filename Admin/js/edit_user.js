$(document).ready(function () {
      $("#edit").click(function (event) {
        event.preventDefault();
var id= $("#id").val();
        var uname = $("#uname").val();
        var contact_no = $("#contact_no").val();
        var branch = $("#branch").val();
        var pass = $("#pass").val();
        console.log(id);
        if (
          uname === ""
      //      &&
      //     slname === "" &&
      //     smname === "" &&
      //     adhaar_number === "" &&
      //     nationality === "" &&
      //     dob === ""
        ) {
          $("#data").html('<h4 style="color:red;">Required All Fields..</h4>');
        } else {
          $.ajax({
            url: "./back/edit_user.php",
            method: "POST",
            data: $("#edituser").serialize(),
             success: function (data) {
            $("form").trigger("reset");
            $("#return").fadeIn().html(data);
            $("#edit").show();
           
setTimeout(function() {
                        location.reload(true);
                    }, 5000);
return false;
              console.log(data);
            },
          });
        }
      });
    });
    