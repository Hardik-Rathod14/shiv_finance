$(document).ready(function () {
  $("#save").click(function (event) {
    event.preventDefault();
    var cstid = $("#cstid").val();
    var cname = $("#cname").val();
    var contact_no = $("#contact_no").val();
    // var loantype = $("#loantype").val();
    var amount = $("#amount").val();
    var duration = $("#duration").val();
    //     console.log(cname);
    //     console.log(contact_no);
    //     console.log(loantype);
    //     console.log(amount);
    //     console.log(duration);
    if (
      cstid === " "
     
    ) {
      $("#data").html('<h4 style="color:red;">Required All Fields..</h4>');
    } else {
      $.ajax({
        url: "./back/edit_customer.php",
        method: "POST",
        data: $("#edit_ctmr").serialize(),
        success: function (data) {
          $("form").trigger("reset");
          $("#return").fadeIn().html(data);
          $("#save").show();

          setTimeout(function () {
            location.reload(true);
          }, 5000);
          return false;
        
        },
      });
    }
  });
});
