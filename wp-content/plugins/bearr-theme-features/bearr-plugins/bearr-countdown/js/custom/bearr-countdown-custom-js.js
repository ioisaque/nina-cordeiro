//Use Strict Mode
(function ($) {
    "use strict";
    

    //Begin - Document Ready
    $(document).ready(function () {

        $('.bearr-countdown-wrapper[id^="bearr-countdown-wrapper-"]').each( function() {

            var $div = $(this);
            var token = $div.data('token');

            var settingObj = window['bearr_countdown_config_' + token];
            var $countdown_date_content = settingObj.theCountdownDate;
           
            //=====>  Countdown (Edit this with your own date)  <====
            $("#bearr-countdown-item-"+settingObj.id+"").countdown( $countdown_date_content , function (event) {
                var $this = $(this).html(event.strftime('' + '<div class="countdown-col"><span class="countdown-time"> %-D </span> <span class="countdown-type"> Days </span></div> ' + '<div class="countdown-col"><span class="countdown-time"> %H </span> <span class="countdown-type">Hours </span></div>' + '<div class="countdown-col"><span class="countdown-time"> %M </span> <span class="countdown-type">Minutes </span></div>' + '<div class="countdown-col"><span class="countdown-time"> %S </span> <span class="countdown-type">Seconds </span></div>'));
            });

        });

        //End - Document Ready
    });

    //End - Use Strict mode
})(jQuery);