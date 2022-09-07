$(document).ready(function () {
    function check_session(){
        $.ajax({
            type: "POST",
            url: "back/check_session.php",
            success: function (data) {
                if(data == '1')
                {
                    alert('Your Session has been expired !');
                    window.location.href="../login.php";
                }
            }
        });
    }
    setInterval(function(){
        check_session();
    },5000);
});