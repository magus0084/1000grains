/*
 * Bones Scripts File
 * Author: Eddie Machado
 *
 * This file should contain any js scripts you want to add to the site.
 * Instead of calling it in the header or throwing it inside wp_head()
 * this file will be called automatically in the footer so as not to
 * slow the page load.
 *
 * There are a lot of example functions and tools in here. If you don't
 * need any of it, just remove it. They are meant to be helpers and are
 * not required. It's your world baby, you can do whatever you want.
*/


/*
 * Get Viewport Dimensions
 * returns object with viewport dimensions to match css in width and height properties
 * ( source: http://andylangton.co.uk/blog/development/get-viewport-size-width-and-height-javascript )
*/
function updateViewportDimensions() {
	var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName('body')[0],x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;
	return { width:x,height:y };
}
// setting the viewport width
var viewport = updateViewportDimensions();


/*
 * Throttle Resize-triggered Events
 * Wrap your actions in this function to throttle the frequency of firing them off, for better performance, esp. on mobile.
 * ( source: http://stackoverflow.com/questions/2854407/javascript-jquery-window-resize-how-to-fire-after-the-resize-is-completed )
*/
var waitForFinalEvent = (function () {
	var timers = {};
	return function (callback, ms, uniqueId) {
		if (!uniqueId) { uniqueId = "Don't call this twice without a uniqueId"; }
		if (timers[uniqueId]) { clearTimeout (timers[uniqueId]); }
		timers[uniqueId] = setTimeout(callback, ms);
	};
})();

// how long to wait before deciding the resize has stopped, in ms. Around 50-100 should work ok.
var timeToWaitForLast = 100;


/*
 * Here's an example so you can see how we're using the above function
 *
 * This is commented out so it won't work, but you can copy it and
 * remove the comments.
 *
 *
 *
 * If we want to only do it on a certain page, we can setup checks so we do it
 * as efficient as possible.
 *
 * if( typeof is_home === "undefined" ) var is_home = $('body').hasClass('home');
 *
 * This once checks to see if you're on the home page based on the body class
 * We can then use that check to perform actions on the home page only
 *
 * When the window is resized, we perform this function
 * $(window).resize(function () {
 *
 *    // if we're on the home page, we wait the set amount (in function above) then fire the function
 *    if( is_home ) { waitForFinalEvent( function() {
 *
 *	// update the viewport, in case the window size has changed
 *	viewport = updateViewportDimensions();
 *
 *      // if we're above or equal to 768 fire this off
 *      if( viewport.width >= 768 ) {
 *        console.log('On home page and window sized to 768 width or more.');
 *      } else {
 *        // otherwise, let's do this instead
 *        console.log('Not on home page, or window sized to less than 768.');
 *      }
 *
 *    }, timeToWaitForLast, "your-function-identifier-string"); }
 * });
 *
 * Pretty cool huh? You can create functions like this to conditionally load
 * content and other stuff dependent on the viewport.
 * Remember that mobile devices and javascript aren't the best of friends.
 * Keep it light and always make sure the larger viewports are doing the heavy lifting.
 *
*/

/*
 * We're going to swap out the gravatars.
 * In the functions.php file, you can see we're not loading the gravatar
 * images on mobile to save bandwidth. Once we hit an acceptable viewport
 * then we can swap out those images since they are located in a data attribute.
*/
function loadGravatars() {
  // set the viewport using the function above
  viewport = updateViewportDimensions();
  // if the viewport is tablet or larger, we load in the gravatars
  if (viewport.width >= 768) {
  jQuery('.comment img[data-gravatar]').each(function(){
    jQuery(this).attr('src',jQuery(this).attr('data-gravatar'));
  });
	}
} // end function




/* FUNCTION: InitToggleDisplayButtons
 * ----------------------------------
 * Sets all toggle buttons to display their targets when clicked.
 * A target is any element of the 'toggle-display-target' class
 * that has the same parent as the button.
 */

function initToggleDisplayTriggers() {
	jQuery('.toggle-display-trigger').click(function() {
		
		jQuery(this)
			.toggleClass('toggle-display-trigger--isActive')
			.siblings('.toggle-display-target')
			.toggleClass('toggle-display-target--isVisible');
			
		// If the user has clicked the overlay
		if (jQuery(this).hasClass('toggle-display-target-overlay-bg')) {

			// Hide overlay
			jQuery(this)
				.removeClass('toggle-display-target--isVisible')
				.removeClass('toggle-display-trigger--isActive');
				
			// Remove active state from other triggers
			jQuery(this)
				.siblings('.toggle-display-trigger')
				.removeClass('toggle-display-trigger--isActive');
				
		// If the user clicked the original trigger
		} else {
			jQuery(this)
				.siblings('.toggle-display-target-overlay-bg')
				.toggleClass('toggle-display-target--isVisible');
		}
	});
}


/* FUNCTION: initSmoothScrollLinks
 * -------------------------------
 * Makes all links within the page scroll smoothly to their
 * destinations
 */

function initSmoothScrollLinks() {
	jQuery('a[href*=#]:not([href=#])').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	      var target = jQuery(this.hash);
	      target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
	      if (target.length) {
	        jQuery('html,body').animate({
	          scrollTop: target.offset().top
	        }, 1200, 'swing');
	        return false;
	      }
	    }
	});
}




/*
 * Put all your regular jQuery in here.
*/
jQuery(document).ready(function($) {

  // Set height of all full-screen elements
  //if ($(".full-screen").height() < $(window).height()) {
//		$(".full-screen").height(updateViewportDimensions().height);
 // }


  	/* Top Page Slideshow
	 * ------------------
	 * Function that looks to see if the page is the top page and adds classes
	 * at intervals to create an animating slideshow.
	 * 
	 * If the browser does not support CSS3 Transitions, a single background
	 * image will be used instead.
	 */
	
	if ($('body').hasClass("page-template-page-top")) {
		$('body').addClass("background-1");

		if ($('html').hasClass('csstransitions')) {
		   	setInterval(function() {
			    var $body = $('body');
			    if($body.hasClass('background-1'))
			    {
			        $body.removeClass('background-1');
			        $body.addClass('background-2');
			    }
			    else if ($body.hasClass('background-2')) {        
			        $body.removeClass('background-2');
			        $body.addClass('background-3');
			    }
				else if ($body.hasClass('background-3')) {        
			        $body.removeClass('background-3');
			        $body.addClass('background-4');
			    }
				else if ($body.hasClass('background-4')) {        
			        $body.removeClass('background-4');
			        $body.addClass('background-5');
			    }
				else if ($body.hasClass('background-5')) {        
			        $body.removeClass('background-5');
			        $body.addClass('background-1');
			    }
			}, 4000);
		}
	}
	
	


  /*
   * Let's fire off the gravatar function
   * You can remove this if you don't need it
  */
  loadGravatars();

  /* 
   * Initialize all toggle buttons.
   */
  initToggleDisplayTriggers();

  /*
   * Initializes smooth scrolling internal page links
   */
  initSmoothScrollLinks();


}); /* end of as page load scripts */
