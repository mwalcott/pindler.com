$(document).ready(function() {
	
	////////////////////////////////////////////////////////////
	//SEARCH PAGE TOGGLE CONTROLS
	////////////////////////////////////////////////////////////

	// Toggle Search Page
	$('.ps-toggle .ps-header').click(function() {
		$(this).siblings('.ps-options').slideToggle();
		if ($(this).parent('.ps-closed').length) {
			$(this).parent('.ps-container').removeClass('ps-closed').addClass('ps-open');
		} else {
			$(this).parent('.ps-container').removeClass('ps-open').addClass('ps-closed');
		}
	});
	
	$('.ps-toggle-all').click(function() {
		
		if($(this).hasClass('ps-all-closed')) {		
			$('.guided-search .ps-toggle .ps-options').slideDown();
			$('.guided-search .ps-toggle').removeClass('ps-closed').addClass('ps-open');
			$(this).removeClass('ps-all-closed').addClass('ps-all-open').html('Hide Options');
		} else {
			$('.guided-search .ps-toggle .ps-options').slideUp();
			$('.guided-search .ps-toggle').removeClass('ps-open').addClass('ps-closed');
			$(this).removeClass('ps-all-open').addClass('ps-all-closed').html('Show All Options');
		}
		
	});
	
	////////////////////////////////////////////////////////////
	//Product Details - Tab Controls
	////////////////////////////////////////////////////////////
	
	//Toggle tabs to show different info
	
	$('.ps-details-tab-item').click(function() {
		var $tabid = $(this).attr('id');
		
		$('.ps-details-tabs-buttons .active').removeClass('active');
		$(this).addClass('active');
		
		$('.ps-details-tab-content .active').removeClass('active');
		if ($tabid == 'ps-details-tab-01') {
			$('.ps-details-content-01').addClass('active');
		} else if ($tabid == 'ps-details-tab-02') {
			$('.ps-details-content-02').addClass('active');
		} else if ($tabid == 'ps-details-tab-03') {
			$('.ps-details-content-03').addClass('active');
		} else if ($tabid == 'ps-details-tab-04') {
			$('.ps-details-content-04').addClass('active');
		} else if ($tabid == 'ps-details-tab-05') {
			$('.ps-details-content-05').addClass('active');
		} else if ($tabid == 'ps-details-tab-06') {
			$('.ps-details-content-06').addClass('active');
		}
	});
	
	////////////////////////////////////////////////////////////
	//COLOR CHOICE CONTROLS
	////////////////////////////////////////////////////////////
	
	// Choose Color Options Controls
	// Select a Color When Option is Blank
	$('.ps-color-options ul li img').click(function() {
		
		var $currentColorBackground = $(this).attr('src');
		var $currentColor = $(this).attr('class');
		
		if($('.color-option-1').hasClass('select-color')) {
		
			$('.color-option-1').css('background', 'url('+$currentColorBackground+')').removeClass('select-color').addClass('color-selected');
			$('.color-option-1 input').attr('value', $currentColor);
			$('.color-option-1 .remove-color-choice').css('display', 'block');
			
		} else if($('.color-option-2').hasClass('select-color')) {
		
			$('.color-option-2').css('background', 'url('+$currentColorBackground+')').removeClass('select-color').addClass('color-selected');
			$('.color-option-2 input').attr('value', $currentColor);
			$('.color-option-2 .remove-color-choice').css('display', 'block');
		
		} else if($('.color-option-3').hasClass('select-color') && $('.color-option-3').is(':visible')) {
		
			$('.color-option-3').css('background', 'url('+$currentColorBackground+')').removeClass('select-color').addClass('color-selected');
			$('.color-option-3 input').attr('value', $currentColor);
			$('.color-option-3 .remove-color-choice').css('display', 'block');

		}		
	});
	
	//Remove Single Color Choice Button
	//Revert Color Option to Blank
	$('.remove-color-choice').click(function() {
		$(this).parent('.color-selected').css('background', 'none').removeClass('color-selected').addClass('select-color');
		$(this).siblings('input').attr('value', '');
		$(this).css('display', 'none');
	});
	
	////////////////////////////////////////////////////////////
	//AUTO LOAD COLOR CHOICES TO RESULTS PAGE
	////////////////////////////////////////////////////////////

if($('.color-option-1 input').attr('value') != '') {
	var colorBG = $('.color-option-1 input').attr('value');
	$('.color-option-1').css('background', 'url(/cp/search/assets/images/swatches/'+colorBG+'.png)').removeClass('select-color').addClass('color-selected');
	$('.color-option-1 .remove-color-choice').css('display', 'block');
}
	
if($('.color-option-2 input').attr('value') != '') {
	var colorBG = $('.color-option-2 input').attr('value');
	$('.color-option-2').css('background', 'url(/cp/search/assets/images/swatches/'+colorBG+'.png)').removeClass('select-color').addClass('color-selected');
	$('.color-option-2 .remove-color-choice').css('display', 'block');
}
	
if($('.color-option-3 input').attr('value') != '') {
	var colorBG = $('.color-option-3 input').attr('value');
	$('.color-option-3').css('background', 'url(/cp/search/assets/images/swatches/'+colorBG+'.png)').removeClass('select-color').addClass('color-selected');
	$('.color-option-3 .remove-color-choice').css('display', 'block');
	}
	
	////////////////////////////////////////////////////////////
	//CHANGE COLOR CHOICE POPUP CONTROLS
	////////////////////////////////////////////////////////////
	
	//Save Color Choice
	//Save Page Loaded Values
	var $currentColorBackground1 = $('.color-option-1 input').attr('value'); //change to Doug's variable
	var $currentColorBackground2 = $('.color-option-2 input').attr('value'); //change to Doug's variable
	var $currentColorBackground3 = $('.color-option-3 input').attr('value'); //change to Doug's variable
	var $currentColor1 = $('.color-option-1 input').attr('value'); //change to Doug's variable
	var $currentColor2 = $('.color-option-2 input').attr('value'); //change to Doug's variable
	var $currentColor3 = $('.color-option-3 input').attr('value'); //change to Doug's variable
	//Save Button
	$('.ps-filter-color-choice .filter-close-save').click(function() {
		$currentColorBackground1 = $('.color-option-1 input').attr('value');
		$currentColorBackground2 = $('.color-option-2 input').attr('value');
		$currentColorBackground3 = $('.color-option-3 input').attr('value');
		$currentColor1 = $('.color-option-1 input').attr('value');
		$currentColor2 = $('.color-option-2 input').attr('value');
		$currentColor3 = $('.color-option-3 input').attr('value');
	});
	
	// Cancel Color Choice
	// Revert Color Selection to Saved Values
	$('.ps-filter-color-choice .filter-close').click(function() {
		//Color Option 1
		$('.color-option-1').css('background', 'url(http://dev3.mustangmktg.com/pindler/search/assets/images/swatches/'+$currentColorBackground1+'.png)');
		$('.color-option-1 input').attr('value', $currentColor1);
		if($currentColor1 == '') {
			$('.color-option-1 .remove-color-choice').css('display', 'none');
			$('.color-option-1').removeClass('color-selected').addClass('select-color');
		} else {
			$('.color-option-1 .remove-color-choice').css('display', 'block');
			$('.color-option-1').removeClass('select-color').addClass('color-selected');
		}
		//Color Option 2
		$('.color-option-2').css('background', 'url(http://dev3.mustangmktg.com/pindler/search/assets/images/swatches/'+$currentColorBackground2+'.png)');
		$('.color-option-2 input').attr('value', $currentColor2);
		if($currentColor2 == '') {
			$('.color-option-2 .remove-color-choice').css('display', 'none');
			$('.color-option-2').removeClass('color-selected').addClass('select-color');
		} else {
			$('.color-option-2 .remove-color-choice').css('display', 'block');
			$('.color-option-2').removeClass('select-color').addClass('color-selected');
		}
		//Color Option 3
		$('.color-option-3').css('background', 'url(http://dev3.mustangmktg.com/pindler/search/assets/images/swatches/'+$currentColorBackground3+'.png)');
		$('.color-option-3 input').attr('value', $currentColor3);
		if($currentColor3 == '') {
			$('.color-option-3 .remove-color-choice').css('display', 'none');
			$('.color-option-3').removeClass('color-selected').addClass('select-color');
		} else {
			$('.color-option-3 .remove-color-choice').css('display', 'block');
			$('.color-option-3').removeClass('select-color').addClass('color-selected');
		}
	});
	
	////////////////////////////////////////////////////////////
	//CLEAR ALL COLORS CONTROLS
	////////////////////////////////////////////////////////////
	
	//Reset All Colors
$('.ps-reset-colors a').click(function() {
	$('.color-selected input').attr('value', '');
	$('.color-selected').css('background', 'none').removeClass('color-selected').addClass('select-color');
	$('.remove-color-choice').css('display', 'none');
}); 
	
	// More Colors Buttons
	$('.view-more-colors').click(function() {
		$('.ps-details-colors').slideDown();
		$(this).fadeOut();
	});
	
	$('.view-less-colors').click(function() {
		$('.ps-details-colors').slideUp();
		$('.view-more-colors').fadeIn();
	});
	
	////////////////////////////////////////////////////////////
	//CHANGE DESIGN STYLE POPUP CONTROLS
	////////////////////////////////////////////////////////////
	
	//Design Styles Save & Cancel
	var designStyles = [];
	$('.ps-filter-design-choice input:checked').each(function() {
		designStyles.push($(this).attr('value'));
	});
	
	$('.ps-filter-design-choice .filter-close-save').click(function() {
		designStyles = [];
		$('.ps-filter-design-choice input:checked').each(function() {
			designStyles.push($(this).attr('value'));
		});
	});
	
	$('.ps-filter-design-choice .filter-close').click(function() {
		$('.ps-filter-design-choice input:checkbox').prop('checked', false);
		$('.ps-filter-design-choice input:checkbox').each(function() {
			if (jQuery.inArray($(this).attr('value'), designStyles) !== -1) {
				$(this).prop('checked', true);
			}
		});
	});
	
	$('.ps-reset-design-styles a').click(function() {
		$('.ps-filter-design-choice input:checkbox').prop('checked', false);
		$('.ps-design-choice input:checkbox').prop('checked', false);
	});
	
	////////////////////////////////////////////////////////////
	//MISC. OVERLAY CONTROLS
	////////////////////////////////////////////////////////////
	
	// Results Page Filter Overlays
	$('.ps-filter-option .brown-button').click(function() {
		$(this).siblings('.pindler-search').css('visibility', 'visible');
	});
	
	$('.filter-close').click(function() {
		$(this).parents('.pindler-search').css('visibility', 'hidden');
	});
	
	$('.filter-close-save').click(function() {
		$(this).parents('.pindler-search').css('visibility', 'hidden');
	});
	
	$('.ps-click-overlay-button').click(function() {
		$(this).parent().next('.ps-click-overlay').css('visibility', 'visible');
	});
	
	////////////////////////////////////////////////////////////
	//CHECK NUMBER OF COLOR OPTIONS TO DISPLAY
	////////////////////////////////////////////////////////////
	
	// Check number of color options to show
	if ($('.two-color-option').is(':checked')) {
		$('.color-option-3').hide();
	}
	
	$('.select-color-type input').click(function() {
		if ($('.two-color-option').is(':checked')) {
			$('.color-option-3').hide();
		} else {
			$('.color-option-3').show();
		}
	});
	
	////////////////////////////////////////////////////////////
	//PRODUCT DETAIL EMAIL CONTROLS
	////////////////////////////////////////////////////////////
	
	// Email Page Pop Up
	// Controls for the product details page
	// When clicking the email icon, a pop up appear with a short form
	$('.ps-email-results').click(function() {
		$(this).siblings('.ps-click-overlay').css('visibility', 'visible');
	});
	
	////////////////////////////////////////////////////////////
	//Navigation Login Popup
	////////////////////////////////////////////////////////////
	
	//Login Display Controls
	//Toggle the Login Form On Hover
	
	var loginTimer;
	$('.nav-login-container #nav-login li:first-child').hover(function() {
		clearTimeout(loginTimer);
		$('.login-popup').show();
	}, function() {
		loginTimer = setTimeout(function() {
			$('.login-popup').hide();
		}, 350);
	});
	
	$('.login-popup').hover(function() {
		clearTimeout(loginTimer);
		$('.login-popup').show();
	}, function() {
		loginTimer = setTimeout(function() {
			$('.login-popup').hide();
		}, 350);
	});

	////////////////////////////////////////////////////////////
	//Mobile Navigation
	////////////////////////////////////////////////////////////
	
	//Mobile Navigation - Slideout Controls
	//Mobile Navigation - Stop Page Scrolling When Mobile Nav is Active
	$('.nav-mobile-trigger').click(function() {
		if($('#navigation').css('left') == '0px') {
			$('#navigation').stop().animate({'left':('-500px')}, 300);
			$('.mobile-nav-close').stop().animate({'right':('-54px')}, 300);
			$('#wrapper').removeClass('noscroll');
		} else {
			$('#navigation').stop().animate({'left':('0px')}, 300);
			$('.mobile-nav-close').stop().animate({'right':('0px')}, 300);
			$('#wrapper').addClass('noscroll');
		}
	});
	
	$('.mobile-nav-close').click(function() {
		$('#navigation').stop().animate({'left':('-500px')}, 300);
		$('.mobile-nav-close').stop().animate({'right':('-54px')}, 300);
		$('#wrapper').removeClass('noscroll');
	});

	////////////////////////////////////////////////////////////
	//Form Field Placeholders
	////////////////////////////////////////////////////////////
	
	//Placeholder text for form fields
	//This is for older browsers that do not support placeholder
	$('input, textarea').placeholder();
	
});