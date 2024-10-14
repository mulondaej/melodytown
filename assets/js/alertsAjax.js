
setInterval(function() {
    $.ajax({
        url: '/notifications.php',
        method: 'GET',
        success: function(data) {
            $('.notifications ul').html(data);
        }
    });
}, 60000); // Check every minute
