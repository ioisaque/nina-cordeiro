//Use Strict Mode
(function ($) {
    "use strict";

    //Begin - Window Load
    $(window).load(function () {



    	//Project Filter
        var $container = $('.bearr-portfolio-content');
       	var $grid = $('.bearr-portfolio-content').isotope({
            itemSelector: '.portfolio-item-wrapper'
        });

       	$('.bearr-portfolio-filter').on('click', 'button', function () {   
            $('.bearr-portfolio-filter button').removeClass('item-active');
            $(this).addClass('item-active');
            var filterValue = $(this).attr('data-filter');
            $grid.isotope({
                filter: filterValue
            });
        });

        //Lightbox
        $('.bearr-portfolio-lightbox').simpleLightbox({
            captions: true,
        });       


    });

    //End - Use Strict mode
})(jQuery);