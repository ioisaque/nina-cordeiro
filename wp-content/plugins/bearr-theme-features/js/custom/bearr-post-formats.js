//Use Strict Mode
(function ($) {
    "use strict";

    //Begin - Window Load
    $(window).load(function () {

    	//Post Format: Gallery
		$('.gallery-featured-carousel').owlCarousel({
		    loop:true,
		    loop:true,
		    margin:0,
		    nav:true,
		    items: 1,
		    afterAction: function(el){
		     	//remove class active
		     	this.$owlItems.removeClass('active');
		     	//add class active
		     	this.$owlItems.eq(this.currentItem).addClass('active');    
		    } 	    
		})
		
    });

    //End - Use Strict mode
})(jQuery);