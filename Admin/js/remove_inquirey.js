function Removeinquirey(id) {



    if (confirm('Are You Sure to Want to Delete this Record ?')) {



        $.ajax({

            url: "./back/remove_inquirey.php",

            type: "POST",

            data: { id: id },

            success: function(data) {

                $('#return').fadeIn().html(data);

                $('#delete' + id).hide('slow');

                setTimeout(function() {

                    location.reload(true);

                }, 5000);

                return false;

            }

        });

        return false;

    }

}