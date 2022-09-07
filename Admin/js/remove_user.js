function removeuser(id) {



    if (confirm('Are You Sure to Want to Delete this User?')) {



        $.ajax({

            url: "./back/delete_user.php",

            type: "POST",

            data: { id: id },

            success: function(data) {

                $('#return').fadeIn().html(data);

                $('#delete' + id).hide('slow');

                setTimeout(function() {

                    location.reload(true);

                }, 5000);

console.log(data);

                return false;

            }

        });

        return false;

    }

}