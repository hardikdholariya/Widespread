$(document).ready(function() {
    function userLoad() {
        $.ajax({
            url: "./loadData/load-user.php",
            success: function(data) {
                $("#main-user").html(data);
            }
        });
    }

    function recentLoad() {
        $.ajax({
            url: "./loadData/recent-load-user.php",
            success: function(data) {
                $("#recent-user").html(data);
            }
        });
    }
    userLoad();
    recentLoad();

    $(document).on('click', ".delete-user", function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        if (confirm('Are you sure to remove this record ?')) {
            $.ajax({
                type: "post",
                url: "./php_files/delete-user.php",
                data: {
                    id
                },
                success: function(data) {
                    console.log(data);
                    userLoad();
                    recentLoad();
                }
            });
        }
    });
});