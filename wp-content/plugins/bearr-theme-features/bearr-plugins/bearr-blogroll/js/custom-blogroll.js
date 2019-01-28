//Use Strict Mode
(function ($) {
    "use strict";

    //Begin - Window Load
    $(window).load(function () {

        $(".blogroll-carousel").owlCarousel({
            items: 4,
            nav: false,
            margin: 20
        });       

    });

    //End - Use Strict mode
})(jQuery);