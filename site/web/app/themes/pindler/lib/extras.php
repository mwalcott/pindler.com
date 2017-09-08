<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');

/**
 * Add theme options ACF
 */
if( function_exists('acf_add_options_page') ) {
 
	$option_page = acf_add_options_page(array(
		'page_title' 	=> 'Theme Options',
		'menu_title' 	=> 'Theme Options',
		'menu_slug' 	=> 'theme-options',
		'capability' 	=> 'edit_posts',
		'position' => 25,
		'icon_url' => 'dashicons-schedule',
		'redirect' 	=> false
	));
 
}

/**
 * Custom Image Sizes
 */

// Slider Images
add_image_size( 'slider', 1920, 800, array( 'center', 'center' ) );

// Collection Images
add_image_size( 'collection', 1080, 730, array( 'center', 'center' ) );
add_image_size( 'collection_tall', 700, 1080, array( 'center', 'center' ) );
add_image_size( 'collection_landing', 1000, 700, array( 'center', 'center' ) );

add_image_size( 'featured_installs', 600, 400, array( 'center', 'center' ) );

namespace Pindler;

/**
 * Social Media Links
 */
function social_links() {

	if( have_rows('provider', 'option') ):

		echo '<ul class="head-foot-links">';
			echo '<li>Stay Connected</li>';
			while ( have_rows('provider', 'option') ) : the_row(); ?>
				<li>
					<a href="<?php the_sub_field('account_url'); ?>" target="_blank" rel="nofollow">
						<i class="fa fa-<?php the_sub_field('account_provider'); ?>" aria-hidden="true"></i>
					</a>
				</li>		
			<?php endwhile;
		echo '</ul>';
	
	else :
	
	endif;
	
}

/**
 * Banner
 */
function banner() { 
	while (have_posts()) : the_post();
	
		if( have_rows('slides') ):
	
			echo '<div class="owl-carousel owl-banner">';
				while ( have_rows('slides') ) : the_row(); ?>
					
					<?php 
						$pageLink = get_sub_field('page_link');
						$customLink = get_sub_field('custom_link');
	
						$image = get_sub_field('slide_image');
						$imgUrl = $image['sizes']['slider'];
						//var_dump($imgUrl);
	
	
					?>
	
					<div style="background-image: url(<?php echo $imgUrl; ?>);">
						<?php if( $pageLink ) { ?>
							<a class="slide-link" href="<?php echo $pageLink; ?>">
								<?php the_sub_field('heading'); ?>	
							</a>
						<?php	} elseif( $customLink ) { ?>
							<a class="slide-link" href="<?php echo $customLink; ?>">
								<?php the_sub_field('heading'); ?>	
							</a>						
						<?php } else { ?>
							
						<?php	} ?>
						
					</div>		
				<?php endwhile;
			echo '</div>';
		
		else :
		
		endif;

	endwhile;
	
}


/**
 * Content Builder ACF
 */
function content_acf() { 

	// check if the flexible content field has rows of data
	if( have_rows('section') ):
	
		// loop through the rows of data
		while ( have_rows('section') ) : the_row();

			if( get_row_layout() == 'collection' )
			
				get_template_part('templates/acf/collection');

			if( get_row_layout() == 'as_seen_in' )
			
				get_template_part('templates/acf/as-seen-in');

			if( get_row_layout() == 'featured_installs' )
			
				get_template_part('templates/acf/featured-installs');
									
		endwhile;
	
	else :
	
		// no layouts found
	
endif;

}

/**
 * Remove Acrhive & Category Titles
 */

function filter_archives_title($title) {
	if(is_archive()) {
		return str_replace('Archives: ', '', $title);	
	}
  
}
add_filter('get_the_archive_title', __NAMESPACE__ . '\\filter_archives_title');

function filter_category_title($title) {
  return str_replace('Category: ', '', $title);
}
add_filter('get_the_archive_title', __NAMESPACE__ . '\\filter_category_title');