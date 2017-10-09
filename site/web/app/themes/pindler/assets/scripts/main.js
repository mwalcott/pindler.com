/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages
        
        // Start Owl Carousel
        $(".owl-banner").owlCarousel({
					animateOut: 'fadeOut',
					loop: true,
					margin: 0,
					nav: true,
					navText: [
					   "<i class='fa fa-angle-left'></i>",
					   "<i class='fa fa-angle-right'></i>"
					],
					dots: true,
 					autoplay: true,
			    items: 1
        });

				$('.owl-asi').owlCarousel({
			    loop:false,
			    margin:30,
			    nav:true,
					navText: [
					   "<i class='fa fa-angle-left'></i>",
					   "<i class='fa fa-angle-right'></i>"
					],
			    responsive:{
			        0:{
			            items:2
			        },
			        600:{
			            items:3
			        },
			        1000:{
			            items:6
			        }
			    }
				});

				$('.owl-installs').owlCarousel({
			    loop:false,
			    margin:10,
			    nav:true,
					navText: [
					   "<i class='fa fa-angle-left'></i>",
					   "<i class='fa fa-angle-right'></i>"
					],
			    responsive:{
			        0:{
			            items:1
			        },
			        600:{
			            items:3
			        },
			        1000:{
			            items:3
			        }
			    }
				}); 
				// End Owl Carousel


				var collectionHeight = function() {
				  var height = $('.collection-multiple').height();
				  $('.collection-multiple').height(height);
				};
				
				$('.collection-multiple').css('height', collectionHeight);

				$(window).resize(function() {
				  $('.collection-multiple').css('height', collectionHeight);
				});				

				var $menu = $("#my-menu").mmenu({
				   //   options
				});
				var $icon = $("#my-icon");
				var API = $menu.data( "mmenu" );
				
				$icon.on( "click", function() {
				   API.open();
				});
				
				API.bind( "open:finish", function() {
				   setTimeout(function() {
				      $icon.addClass( "is-active" );
				   }, 100);
				});
				API.bind( "close:finish", function() {
				   setTimeout(function() {
				      $icon.removeClass( "is-active" );
				   }, 100);
				});



      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
