// JavaScript Document
/* -------------------------------
	* Focus new code Start
---------------------------------- */
jQuery('input,textarea').on('focus',function(){
	 var $this = jQuery(this);
		$this.data('placeholder',$this.prop('placeholder'));
		$this.removeAttr('placeholder')
 	})
		.on('blur',function(){
    	var $this = jQuery(this);
    	$this.prop('placeholder',$this.data('placeholder'));
});

/* -------------------------------
	* Responsive Menu
---------------------------------- */

jQuery(document).ready(function(){
	'use strict'; 
	jQuery('.cs-main-nav>ul').slicknav();
});



/* -------------------------------
	* Tool Tips
---------------------------------- */
$(function () {
  'use strict';
  $('[data-toggle="tooltip"]').tooltip()
})

/* -------------------------------
	* Header footer files
---------------------------------- */
// $("#header").load("header.html");
// $("#footer").load("footer.html");

/* -------------------------------
	* Chosen Select 
---------------------------------- */

    var config = {
      '.chosen-select'           : {width:"100%"},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }

/* -------------------------------
	* Slick Slider 
---------------------------------- */

$('.main-slider').slick({
  slidesToShow:1,
  slidesToScroll:1,
  autoplay: true,
  autoplaySpeed: 2000,
  speed: 4000,
  infinite: true,
  dots:false,
  arrows:false,
});

$('.cs-blog-slider').slick({
  slidesToShow:1,
  slidesToScroll:1,
  autoplay:true,
  autoplaySpeed:2000,
});


jQuery('.cs-testimonial-slides').slick({
  dots: false,
  arrows:false,
  autoplay: true,
  infinite: true,
  speed: 200,
  fade: true,
  autoplaySpeed: 2000,
  cssEase: 'linear'
});


// Client Slider 
$('.client-slides').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: true,
  arrows: false,
  dots:true,
  autoplaySpeed: 2000,
});


/* -------------------------------
	* Accordian 
---------------------------------- */

$('.panel-heading a').click(function() {
    $('.panel-heading').removeClass('cs-active');
    $(this).parents('.panel-heading').addClass('cs-active');
    
    $('.panel-title').removeClass('cs-active'); //just to make a visual sense
    $(this).parent().addClass('cs-active'); //just to make a visual sense
 });
 


/* -------------------------------
	* Time Counter for under construction page
---------------------------------- */
jQuery(document).ready(function(){

	// set options

	var endDate = '2025/09/24 20:30:00'; // you can set date and time both or any one of those.
	var element = '.date'; // set class or id name.
	if(element.length != ''){
		var timeInterval = setInterval(function(){ 

			// converting milliseconds into seperate units

			var seconds = 1000;
			var minutes = seconds * 60;
			var hours = minutes * 60;
			var days = hours * 24;
			var months = days * 30;
			var years = days * 365;

			// getting end and start times

			var startTime = new Date();
			var endTime = new Date(endDate);

			// checking endtime should be greater than current time 

			if(startTime >= endTime){

				jQuery(element).html('Time has Reached! Wait for A While.');
				clearInterval(timeInterval);

			}else{

				// getting difference in time 

				var timeDiff = endTime.getTime()-startTime.getTime();

				// converting difference in time into seperate units

				var secondsLeft= Math.floor(timeDiff/seconds);
				var minutesLeft= Math.floor(timeDiff/minutes);
				var hoursLeft= Math.floor(timeDiff/hours);
				var daysLeft= Math.floor(timeDiff/days);
				var monthsLeft= Math.floor(timeDiff/months);
				var yearsLeft= Math.floor(timeDiff/years);

				// time should not exceed its unit limit

				var secondsRem = secondsLeft % 60;
				var minutesRem = minutesLeft % 60;
				var hoursRem = hoursLeft % 24;
				var daysRem = daysLeft % 31;
				var monthsRem = monthsLeft % 12;
				var yearsRem = yearsLeft % 365;

				// html structure for putting data

				var secondsHtml = '<span class="seconds"> <span class="digit">'+secondsRem+'</span> <span class="unit">Seconds</span></span>';
				var minutesHtml = '<span class="minutes"> <span class="digit">'+minutesRem+'</span> <span class="unit">Minutes</span></span>';
				var hoursHtml = '<span class="hours"> <span class="digit">'+hoursRem+'</span> <span class="unit">Hours</span></span>';
				var daysHtml = '<span class="days"> <span class="digit">'+daysRem+'</span> <span class="unit">Days</span></span>';
				var monthsHtml = '<span class="months"> <span class="digit">'+monthsRem+'</span> <span class="unit">Months</span></span>';
				var yearsHtml = '<span class="years"> <span class="digit">'+yearsRem+'</span> <span class="unit">Years</span></span>';

				// if any unit reaches to '0' it won't show

				if(secondsLeft > 0){

					secondsLeft = secondsLeft % 60;
					jQuery(element).html(secondsHtml);

					if( minutesLeft > 0){

						minutesLeft = minutesLeft % 60;
						jQuery(element).html(minutesHtml+''+secondsHtml);

						if( hoursLeft > 0){

							hoursLeft = hoursLeft % 24;
							jQuery(element).html(hoursHtml+''+minutesHtml+''+secondsHtml);

							if( daysLeft > 0){

								daysLeft = daysLeft % 31;
								jQuery(element).html(daysHtml+''+hoursHtml+''+minutesHtml+''+secondsHtml);

								if( monthsLeft > 0){

									monthsLeft = monthsLeft % 12;
									jQuery(element).html(monthsHtml+''+daysHtml+''+hoursHtml+''+minutesHtml+''+secondsHtml);

									if( yearsLeft > 0){

										yearsLeft = yearsLeft % 365;
										jQuery(element).html(yearsHtml+''+monthsHtml+''+daysHtml+''+hoursHtml+''+minutesHtml+''+secondsHtml);

									}

								}

							}

						}

					}

				}else{

					jQuery(element).html('Time has Reached! Wait for A While.');
					clearInterval(timeInterval);

				}
				
			}

		}, 1000);

	}

});
	
if (jQuery("#count").length != '') {
	    function changeValue(o){
			document.getElementById('count').value;
		}
	}
	
/* -------------------------------
	* Counter Small 
---------------------------------- */

jQuery(document).ready(function( $ ) {

	let percentCount = $('#percentCount').attr('percentCount');
	if( jQuery(".counter-small").length != '' ){
	 $('.counter-small').counterUp({
	  delay: 10,
	  time: 1000
	 });
	}
	if (jQuery(".progress").length != '') {
        jQuery('.progress').rProgressbar({
            percentage: percentCount,
            fillBackgroundColor: '#54D84B'
        });
    }
});



$('.cs-widget-slider').slick({
  slidesToShow:1,
  slidesToScroll:1,
  autoplay:true,
  autoplaySpeed:2000,
});


$('.cs-team-slider').slick({
  dots: false,
  arrows:true,
  infinite: true,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});


$('.cs-tweets-slider').slick({
  slidesToShow:1,
  slidesToScroll:1,
  autoplay:true,
  autoplaySpeed:2000,
  arrows: false,
});
	
//Fit Video Fram Funtion



jQuery(document).ready(function(){
	if( jQuery("body").length != '' ){
		jQuery("body").fitVids();
	}
});


