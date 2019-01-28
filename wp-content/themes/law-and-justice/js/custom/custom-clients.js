//Use Strict Mode
(function ($) {
    "use strict";

    //Begin - Window Load
    $(window).load(function () {

        $(".clients-carousel").owlCarousel({
            nav: false,
            margin: 20,
            responsive : {
                0 : {
                    items: 3,
                },
                // breakpoint from 768 up
                768 : {
                   items: 4,
                },
                980 : {
                    items: 5,
                }
            }
        });

       

    });

    //End - Use Strict mode
})(jQuery);