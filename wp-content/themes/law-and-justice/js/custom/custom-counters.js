//Use Strict Mode
(function ($) {
    "use strict";

    //Begin - Window Load
    $(document).ready(function () {

        var settingObj = window['tb_counter_scripts'];
        var $count1 = settingObj.counter1_number;
        var $count2 = settingObj.counter2_number;
        var $count3 = settingObj.counter3_number;

         // Counters (Used with Waypoints.JS)
         $('body').imagesLoaded( function() {
            $('.container-counters').waypoint(function () {

                // >> Finished projects
                $('.counter-item-title1').countTo({
                    from: 0,
                    to: $count1,
                    speed: 1400,
                    refreshInterval: 50
                });

                // >> Happy Customers
                $('.counter-item-title2').countTo({
                    from: 0,
                    to: $count2,
                    speed: 1400,
                    refreshInterval: 50
                });

                // >> Working Hours
                $('.counter-item-title3').countTo({
                    from: 0,
                    to: $count3,
                    speed: 1400,
                    refreshInterval: 50
                });
            }, {
                triggerOnce: true,
                offset: '95%'
            });
        });    

    });

    //End - Use Strict mode
})(jQuery);