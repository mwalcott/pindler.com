<?php 
	$i = 1;
	$collection_term_id = get_sub_field('collection_category'); 
?>
<section class="collection-block cb-block">
	<header class="section-header">
		<h2><?php the_sub_field('heading'); ?></h2>
	</header>
	<div class="row">
		<?php
			if( get_sub_field('featured_collections') ) {
				$args = array(
					'post_type' => 'collections',
					'posts_per_page' => 3,
					'meta_query' => array(
						array(
							'key' => 'featured_collection_featured',
							'compare' => '==',
							'value' => '1'
						)
					),
				);
				
			} else {
				
				$args = array(
					'post_type' => 'collections',
					'posts_per_page' => 3,
		
					'tax_query' => array(
						array(
							'taxonomy' => 'collection',
							'field'    => 'term_id',
							'terms'    => $collection_term_id,
						),
					),
				);
		
			}
		
		
			// The Query
			$the_query = new WP_Query( $args );
			
			// The Loop
			if ( $the_query->have_posts() ) {
				while ( $the_query->have_posts() ) {
					$the_query->the_post(); 
					
					$pushCol = '';
					$pullCol = '';
					if( get_sub_field('image_offset') ) {
						$pushCol = 'push-sm-6';
						$pullCol = 'pull-sm-6';
					}
					
					$featured = '';
					$collectionLink = '';
					if( get_sub_field('featured_collections') ) {
						$featured = 'featured-collection';
						$collectionLink = '<a href="'. get_permalink() .'" class="btn btn-secondary"><span>View Collection</span></a>';
					} else {
						$collectionLink = '<a href="'. get_permalink() .'" class=""><span>View Collection</span></a>';
					}
					
					?>
					
						<?php if($i == 1) { ?>
						
							<div class="col-sm-6 <?php echo $pushCol; ?>">
								<div class="collection-portrait <?php echo $featured; ?>" style="background-image: url(<?php the_post_thumbnail_url('collection_tall'); ?>);">
									
									<div class="collection-cta">
										<div>
											<?php the_title('<h2>', '</h2>'); ?>									
											<?php echo $collectionLink; ?>
										</div>
									</div>
									
								</div>
							</div>
						
						<?php } elseif($i == 2) { ?>
							
							<div class="col-sm-6 <?php echo $pullCol; ?> collection-multiple">
								<div class="collection-landscape img-2 h-50 <?php echo $featured; ?>" style="background-image: url(<?php the_post_thumbnail_url('collection'); ?>);">

									<div class="collection-cta">
										<div>
											<?php the_title('<h2>', '</h2>'); ?>									
											<?php echo $collectionLink; ?>
										</div>
									</div>

								</div>
								
						<?php } elseif($i == 3) { ?>
								
								<div class="collection-landscape img-3 h-50 <?php echo $featured; ?>" style="background-image: url(<?php the_post_thumbnail_url('collection'); ?>);">

									<div class="collection-cta">
										<div>
											<?php the_title('<h2>', '</h2>'); ?>									
											<?php echo $collectionLink; ?>
										</div>
									</div>

								</div>
							</div>
							
						<?php } else { ?>
							
							</div>
							
						<?php } ?> 
					
					
					
					
		  	<?php 
			  	$i++;	
			  }
			/* Restore original Post Data */
			wp_reset_postdata();
		} else {
			// no posts found
		}
		?>
	</div>
	
</section>