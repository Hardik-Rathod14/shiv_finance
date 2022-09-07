function resetEmi(id) {

      if (confirm('Are You Sure to Unpaid an EMI ?')) {
  console.log(id);
          $.ajax({
              url: "./back/reset_emi.php",
              type: "POST",
              data: { id: id },
              success: function(data) {
                  $('#output').fadeIn().html(data);
                  setTimeout(function() {
                          location.reload(true);
                      }, 5000);
              return false;
              }
          });
          return false;
      }
  }
  