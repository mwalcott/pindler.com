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
 * Google Maps API key ACF
 */
function my_acf_init() {
	
	acf_update_setting('google_api_key', 'AIzaSyCYpy0c3e6lcb49OtV8aJMwhf2DPMYqqeM');
}

add_action('acf/init', __NAMESPACE__ . '\\my_acf_init');

/**
 * Add theme options ACF
 */
if( function_exists('acf_add_options_page') ) {
 
	$option_page = acf_add_options_page(array(
		'page_title' 	=> 'Theme Options',
		'menu_title' 	=> 'Theme Options',
		'menu_slug' 	=> 'theme-options',
		'capability' 	=> 'edit_posts',
		'position' => 26,
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
add_image_size( 'square', 800, 800, array( 'center', 'center' ) );
add_image_size( 'square_small', 500, 500, array( 'center', 'center' ) );
add_image_size( 'magazine', 627, 800, array( 'center', 'center' ) );

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
		$buttonURL = get_field('button_url');
		$buttonText = get_field('button_button_label');
		$collectionTitle = get_the_title();
		if( have_rows('slides') ):
		echo '<div class="banner-wrap">';
			if(is_singular('collections')) {
				echo '<div class="collection-banner-info">';
					echo '<h1>'. $collectionTitle .'</h1>';
					//echo '<h1>'. get_the_title() .'</h1>';
					echo '<a class="btn btn-secondary" href="'. $buttonURL .'"><em>'. $buttonText .' <i class="fa fa-search" aria-hidden="true"></i></em></a>';
				echo '</div>';
			}
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
						<?php	} elseif( $customLink ) { ?>
							<a class="slide-link" href="<?php echo $customLink; ?>">
						<?php } elseif( get_sub_field('heading') ) { ?>
							<div class="slide-link">
						<?php } else { ?>
							
						<?php	} ?>

							<?php the_sub_field('heading'); ?>	

						<?php if( $pageLink ) { ?>
							</a>
						<?php	} elseif( $customLink ) { ?>
							</a>
						<?php } elseif( get_sub_field('heading') ) { ?>
							</div>
						<?php } else { ?>
							
						<?php	} ?>


						
						
					</div>		
				<?php endwhile;
				
				
			echo '</div>';				
			echo '</div>';
		
		else :
		
		endif;

	endwhile;
	
}

/**
 * Button
 */ 
function button( $field_type, $field_prefix, $field_name, $btn_class ) {
	
	
	// Start Building ACF Field
	$has_prefix = '';
	$field = '';
	
	$button_type = '';
	$button_label = '';
	$button_url = '';
	$button_upload_file = '';
	$button_modal_id = '';



	
	if( $field_prefix ) {
		
		if( $field_prefix == 'tear_sheet_button' ) {
			$button_type = $field_type('tear_sheet_button_type');
			$button_label = $field_type('tear_sheet_button_button_label');
			$button_url = $field_type('tear_sheet_button_url');
			$button_upload_file = $field_type('tear_sheet_button_upload_file');
			$button_modal_id = $field_type('tear_sheet_button_modal_id');
		} elseif( $field_prefix == 'collection_booklet_button' ) {
			$button_type = $field_type('collection_booklet_button_type');
			$button_label = $field_type('collection_booklet_button_button_label');
			$button_url = $field_type('collection_booklet_button_url');
			$button_upload_file = $field_type('collection_booklet_button_upload_file');
			$button_modal_id = $field_type('collection_booklet_button_modal_id');			
		} elseif( $field_prefix == 'modal' ) {
			$button_type = $field_type('modal_type');
			$button_label = $field_type('modal_button_label');
			$button_url = $field_type('modal_url');
			$button_upload_file = $field_type('modal_upload_file');
			$button_modal_id = $field_type('modal_modal_id');			
		} else {

		}
		
		
	} else {
		
		$button_type = $field_type('type');
		$button_label = $field_type('button_label');
		$button_url = $field_type('url');
		$button_upload_file = $field_type('upload_file');
		$button_modal_id = $field_type('modal_id');
		
	}
	// End Building ACF Field
	
	
	
	?>
	<?php if( $button_label) { ?>
	<?php if( $button_type == 'file' ) { ?>

			<a target="_blank" class="btn <?php echo $btn_class; ?>" href="<?php echo $button_upload_file; ?>">
				<?php echo $button_label; ?> <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
			</a>

	<?php	} elseif( $button_type == 'modal' ) { ?>

		<button type="button" class="btn <?php echo $btn_class; ?>" data-toggle="modal" data-target="#<?php echo $button_modal_id; ?>">
		  <?php echo $button_label; ?>
		</button>

	<?php	} elseif( $button_type == 'custom' ) { ?>

			<a target="_blank" class="btn <?php echo $btn_class; ?>" href="<?php echo $button_url; ?>">
				<?php echo $button_label; ?>
			</a>
		
	<?php } else { ?>

			<a class="btn <?php echo $btn_class; ?>" href="<?php echo $button_url; ?>">
				<?php echo $button_label; ?>
			</a>

	<?php	} ?>
	
	<?php
		}
}


/**
 * Collection Buttons
 */
function collection_buttons() {
	//$buttonText = get_field('tear_sheet_button_button_label');
	echo '<div class="collection-buttons">';
		button( 'get_field', 'tear_sheet_button', '', 'btn-primary' );
		button( 'get_field', 'collection_booklet_button', '', 'btn-info' );
/*
		button('tear_sheet_button_button_label', 'tear_sheet_button_upload_file', 'btn-primary', 'get_field');
		button('collection_booklet_button_button_label', 'collection_booklet_button_upload_file', 'btn-info', 'get_field');
*/
	echo '</div>';
	
}

/**
 * Content Builder ACF
 */
function content_acf() { 

	// check if the flexible content field has rows of data
	if( have_rows('section') ):
	
		// loop through the rows of data
		while ( have_rows('section') ) : the_row();

			if( get_row_layout() == 'standard_text' )
			
				get_template_part('templates/acf/standard-text');

			if( get_row_layout() == 'image_block' )
			
				get_template_part('templates/acf/image-block');

			if( get_row_layout() == 'collection' )
			
				get_template_part('templates/acf/collection');

			if( get_row_layout() == 'as_seen_in' )
			
				get_template_part('templates/acf/as-seen-in');

			if( get_row_layout() == 'featured_installs' )
			
				get_template_part('templates/acf/featured-installs');

			if( get_row_layout() == 'history' )
			
				get_template_part('templates/acf/history');

			if( get_row_layout() == 'featured_fabrics' )
			
				get_template_part('templates/acf/featured-fabrics');
									
			if( get_row_layout() == 'content_columns' )
			
				get_template_part('templates/acf/content-columns');

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

function custom_tax_order( $qry ) {

	if ( $qry->is_main_query() && $qry->is_tax() ) {
	  $qry->set( 'orderby', 'menu_order' );
	  $qry->set( 'order', 'ASC' );
	}

	if ( $qry->is_main_query() && $qry->is_category() ) {
	  $qry->set( 'posts_per_page', -1 );
	}

}
add_action( 'pre_get_posts', __NAMESPACE__ . '\\custom_tax_order' );

function modal() { 


/*
if( have_rows('section') ) {
	while ( have_rows('section') ) : the_row() {
		if( get_row_layout() == 'content_columns' ) {
			
		}
	}
}
*/

?>
<?php 
	$modalID = get_field('modal_id');
?>
	<!-- Modal -->
	<div class="modal fade" id="<?php echo $modalID; ?>" tabindex="-1" role="dialog" aria-labelledby="apply" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel"><?php the_field('modal_title'); ?></h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <?php the_field('modal_content'); ?>
	      </div>
	      <div class="modal-footer">
	        <?= button( 'get_field', 'modal', '', 'btn-primary float-right' ); ?>
	      </div>
	    </div>
	  </div>
	</div>
	
<?php }
