$(document).ready(function () {
  $("#close").click(function (event) {
    event.preventDefault();
    var cid = $("#cid").val();
   console.log(cid);

    if (cid != "") {
      if (confirm("Are You Sure Close the Loan ?")) {
        $.ajax({
          url: "back/close_loan.php",
          method: "POST",
          data: $("#form").serialize(),
          success: function (data) {
            $("form").trigger("reset");
            $("#return").fadeIn().html(data);
            $("#close").show();
           
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
