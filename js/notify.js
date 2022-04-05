$(document).ready(function() {

    //notify like and comment

    setInterval(function() {
        $.ajax({
            type: "POST",
            url: "./php_files/notify.php",
            success: function(data) {
                $(".notify_pop").addClass('active');
                $(".notify_pop").html(data);
                setTimeout(myGreeting, 2000);
            }
        });
    }, 3000);

    function myGreeting() {
        $(".notify_pop").removeClass('active');
    }

});