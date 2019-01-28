//Use Strict Mode
(function ($) {
    "use strict";

    //Begin - Window Load
    $(window).load(function () {

        $(".team-carousel").owlCarousel({
            items: 4,
            nav: false,
            margin: 10
        });

    });

    //End - Use Strict mode
})(jQuery);