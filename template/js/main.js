$(document).ready(function () {
    var flag = 0;

    $(".editComment").click(function () {
        if (flag == 0) {
            var id = $(this).attr("data-id");
            $('div[data-in=' + id + ']').load("form", function () {
                $("#smbform").attr('action', '/update/' + id);
                $.post("ajax/update", {id: id}, function (data) {
                    $('#updateText').append(data);
                    flag = 1;
                });
            });
        }
        else {

        }
    });

    $(".addToComment").click(function () {
        if (flag == 0) {
            var id = $(this).attr("data-id");
            $('div[data-in=' + id + ']').load("form", function () {
                $("#smbform").attr('action', '/answer/' + id);
                flag = 1;
            });
        }
        else {

        }
    });

    $(function () {
        $.scrollUp({
            scrollName: 'scrollUp', // Element ID
            scrollDistance: 300, // Distance from top/bottom before showing element (px)
            scrollFrom: 'top', // 'top' or 'bottom'
            scrollSpeed: 300, // Speed back to top (ms)
            easingType: 'linear', // Scroll to top easing (see http://easings.net/)
            animation: 'fade', // Fade, slide, none
            animationSpeed: 200, // Animation in speed (ms)
            scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
            //scrollTarget: false, // Set a custom target element for scrolling to the top
            scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
            scrollTitle: false, // Set a custom <a> title if required.
            scrollImg: false, // Set true to use image
            activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
            zIndex: 2147483647 // Z-Index for the overlay
        });
    });
    $( ".slide" ).click(function() {
        var id = $(this).attr("data-slide");
        $('.slide' + id + '').slideToggle( "slow");
    });
    $( ".slideall" ).click(function() {
        $('.padding').slideToggle( "slow");
    });
    $( ".slideallmsg" ).click(function() {
        $('.firstmsg').slideToggle( "slow", function() {

        });
    });
});
