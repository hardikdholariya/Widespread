$(document).ready(function() {
    $(".backgroundB").hide();
    $(".backgroundBc").hide();

    $(".post").on('click', function(e) {
        e.preventDefault();
        $(".backgroundB").show();
        $(".post").addClass('active_link');
    });

    $(".close").on('click', function(e) {
        e.preventDefault();
        $(".backgroundB").hide();
    });
    $(".postCaption").on('click', function(e) {
        e.preventDefault();
        console.log("loading");
        $(".backgroundBc").hide();
    });
    $(".crop_close").on('click', function(e) {
        e.preventDefault();
        $(".backgroundBc").hide();
    });

});