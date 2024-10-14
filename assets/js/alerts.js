


setInterval(function() {
    $.ajax({
        url: '/fetch_notifications.php',
        method: 'GET',
        success: function(data) {
            $('.notifications ul').html(data);
        }
    });
}, 60000); // Check every minute
