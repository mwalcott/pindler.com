<?php get_template_part('templates/page', 'header'); ?>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<?php 
	$term = get_queried_object();
	$termID = $term->parent;
	$collectionNav = '';
	if( $termID == 2 ) {
		$collectionNav = 'fabric_navigation';
	} elseif( $termID == 6 ) {
		$collectionNav = 'trim_navigation';
	} else {
		$collectionNav = '';
	}
?>

<?php
	if (has_nav_menu($collectionNav)) {
	  wp_nav_menu(['theme_location' => $collectionNav, 'menu_class' => 'collection-nav hidden-sm-down']);
	}
?>


<?php get_template_part('templates/content', 'tax-collection'); ?>

<?php the_posts_navigation(); ?>
