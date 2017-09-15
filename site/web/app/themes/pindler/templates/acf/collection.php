<?php 
	$i = 0;
	$collection_term_id = get_sub_field('collection_category'); 
	
	$featured = get_sub_field('featured_collections');
	$featuredClass = '';
	$collectionLink = '';
	if( $featured == 1 ) {
		$featuredClass = 'featured-collection';
		$collectionLink = '<a href="'. get_permalink() .'" class="btn btn-secondary"><span>View Collection</span></a>';
	} else {
		$collectionLink = '<a href="'. get_permalink() .'" class=""><span>View Collection</span></a>';
	}
	
	$imageOffset = get_sub_field('image_offset');
	$pushCol = '';
	$pullCol = '';
	if( $imageOffset == 1 ) {
		$pushCol = 'push-sm-6';
		$pullCol = 'pull-sm-6';
	}

	
?>
<section class="collection-block section-block">
	<header class="section-header">
		<h2><?php the_sub_field('heading'); ?></h2>
	</header>
	<div class="row">

		<?php 	
		
		$post_objects = get_sub_field('choose_collection');
		
		if( $post_objects ) { ?>
			<?php foreach( $post_objects as $post): $i++; // variable must be called $post (IMPORTANT) ?>
						
				<?php setup_postdata($post); ?>

				<?php if( $i == 1 ) { ?>
					
					<div class="col-sm-6 <?php echo $pushCol; ?>">
						<div class="collection-portrait <?php echo $featuredClass; ?>" style="background-image: url(<?php the_post_thumbnail_url('collection_tall'); ?>);">
							<div class="collection-cta">
								<div>
									<?php the_title('<h2>', '</h2>'); ?>									
									<?php echo $collectionLink; ?>
								</div>
							</div>
						</div>
					</div>
					
				<?php	} elseif( $i == 2 ) { ?>
				
					<!-- Open Collection Multiple Div -->
					<div class="col-sm-6 <?php echo $pullCol; ?> collection-multiple">
						
						<div class="collection-landscape img-2 h-50 <?php echo $featuredClass; ?>" style="background-image: url(<?php the_post_thumbnail_url('collection'); ?>);">
							<div class="collection-cta">
								<div>
									<?php the_title('<h2>', '</h2>'); ?>									
									<?php echo $collectionLink; ?>
								</div>
							</div>
						</div>
				
				<?php } else { ?>

						<div class="collection-landscape img-3 h-50 <?php echo $featuredClass; ?>" style="background-image: url(<?php the_post_thumbnail_url('collection'); ?>);">
							<div class="collection-cta">
								<div>
									<?php the_title('<h2>', '</h2>'); ?>									
									<?php echo $collectionLink; ?>
								</div>
							</div>
						</div>
					
					</div>
					<!-- Close Collection Multiple Div -->
					
				<?php } ?>
								
			
			<?php endforeach; ?>
			
			<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
		<?php }	?>

	</div>
	
</section>