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
                    userLoad();
                    recentLoad();
                }
            });
        }
    });
    $("#signIn").click(function(e) {
        $.ajax({
            type: "POST",
            url: "./php_files/validation.php",
            data: $(mySing).serialize(),
            success: function(data) {
                if (data == 1) {
                    window.location.href = "./";
                }
            }
        });

    });
    $("#logOut").click(function(e) {
        e.preventDefault();
        window.location.href = "./logout.php";
    });

    $("#editProfile").submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "./php_files/updateProfile.php",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                console.log(data);
            }
        });
    });
});