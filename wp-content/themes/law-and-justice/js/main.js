//Use Strict Mode
(function ($) {
    "use strict";

    //Remove loading-wrapper class before window load
    setTimeout(function(){
      $('.loading-wrapper').removeClass('loading-wrapper-hide');
      return false;
    }, 10);

    //Adjust Viewport Function
    function adjustViewport() {
        var windowHeight = $(window).height();
        var TopbarHeight = $("#top-bar").outerHeight();
        var HeaderHeight = $("#masthead").outerHeight();
        var RealViewport = windowHeight - TopbarHeight - HeaderHeight;
        $('.viewport').css('min-height', RealViewport);            
        return false;
    }

    //Begin - Window Load
    $(window).load(function () {
        adjustViewport();

        //Page Loader 
        setTimeout(function(){
            $('#loader-name').addClass('loader-up');
            $('#loader-job').addClass('loader-up');
            $('#loader-animation').addClass('loader-up');
            return false;
        }, 500); 
        setTimeout(function(){
            $('#page-loader').addClass('loader-out');
            $('#intro-item1').addClass('active');
            return false;    
        }, 1100);  
        $('#page-loader').delay(1600).fadeOut(10);  
        setTimeout(function(){
            $('#page-loader').hide();
            return false;    
        }, 1700);

        
    });

    //Runs on window Resize
    $(window).resize(function() {
        adjustViewport();
    });

    //Begin - Document Ready
    $(document).ready(function () {        

        //WAYPOINTS
        $('.content-area').waypoint(function (direction) {
            if (direction === 'down') {
                $('#masthead').addClass('header-stick');
                $('#top-bar').addClass("topbar-hide");
                $('#back-to-top').removeClass('back-to-top-hide');
            } else {
                $('#masthead').removeClass('header-stick');
                $('#top-bar').removeClass("topbar-hide");
                $('#back-to-top').addClass('back-to-top-hide');
            }
        }, {
            offset: '-20px'
        });        

        //Back to Top Btn
        $('.back-to-top').on('click', function () {
            $('html, body').animate({
                scrollTop: 0
            }, 700);
            return false;
        });        

        //Anchor Smooth Scroll
        $('a[href*=#]:not([href=#])').on('click', function () {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });

        // Mobile Menu Js
        $("#MobileMenu").off("click").on("click", function () {
            $(this).toggleClass("menu-clicked");
            $("#main-navigation").stop(0, 0).slideToggle();
            /*$("#main-navigation a").on("click", function () {
                $("#MobileMenu").stop(0, 0).trigger("click");
            });*/
            $(".top-bar-append").empty().append($("#top-bar .row").html());
        });
        
        //Lightbox
        $('.lightbox-image').simpleLightbox();
        
        //End - Document Ready
    });

    //End - Use Strict mode
})(jQuery);