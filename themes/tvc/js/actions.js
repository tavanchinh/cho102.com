$(document).ready(function(){
    $(window).scroll(function () {
        _scrollTop = $(window).scrollTop();
        if (_scrollTop > 157) {
            $(".nav-container").addClass("fiv-nav");
            return false;
        } else {
            $(".nav-container").removeClass("fiv-nav");
            return false;
        }
    });
});