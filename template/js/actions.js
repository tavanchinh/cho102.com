$(document).ready(function () {
    /*
    var _scrollTop = 0;
    var _btnBackToTop = $(".back-to-top");
    $(window).scroll(function () {
        _scrollTop = $(window).scrollTop();
        if (_scrollTop > 100) {
            _btnBackToTop.removeClass("hide");
        } else {
            _btnBackToTop.addClass("hide");
        }
    });

    _btnBackToTop.click(function () {
        $('body,html').animate({ scrollTop: 0 }, 500);
    });
    */
    
    $(window).scroll(function () {
        _scrollTop = $(window).scrollTop();
        console.log(_scrollTop);
        if (_scrollTop > 97) {
            $(".main-menu").addClass("fiv-nav");
            return false;
        } else {
            $(".main-menu").removeClass("fiv-nav");
            return false;
        }
    });

})