function paid(id) {

    if (confirm('Are You Sure Paid the EMI ?')) {

        $.ajax({
            url: "./back/pay_emi.php",
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
