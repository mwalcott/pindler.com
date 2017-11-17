<?php 

	$queried_object = get_queried_object(); 

	$taxonomyName = 'resource_category';
	$args = [
    'taxonomy'     	=> $taxonomyName,
    'number'        => 0,
    'orderby'				=> 'name',
    'hide_empty'    => true           
	];
	$terms = get_terms( $args );
	//var_dump($terms);
	
	foreach ( $terms as $term ) {
		
		echo '<h3 class="resource-cat">'. $term->name .'</h3>';

		$i = 0;
		$args = array(
			'post_type' => 'resource',
			'tax_query' => array(
				array(
					'taxonomy' => $taxonomyName,
					'field' => 'slug',
		      'terms' => $term->slug
				),
			),
		
		);
		
		query_posts($args);
		echo '<div class="resource-outer">';
		echo '<ul class="nav nav-tabs" role="tablist">';
			if (have_posts()) : while (have_posts()) : the_post(); $i++; ?>
				<?php 
					$active = '';
					if($i == 1) {
						$active = 'active';
					}
					global $post;
					$post_slug = $post->post_name;

				?>
				<li class="nav-item">
					<a class="nav-link <?php echo $active; ?>" data-toggle="tab" href="#<?php echo $post_slug; ?>" role="tab">
						<?php the_title(); ?>
					</a>
				</li>
			
			<?php endwhile; endif;
		echo '</ul>';

		$i2 = -1;
		$args2 = array(
			'post_type' => 'resource',
			'orderby' => 'title',
			'order' => 'ASC',
			'tax_query' => array(
				array(
					'taxonomy' => $taxonomyName,
					'field' => 'slug',
		      'terms' => $term->slug
				),
			),
		
		);
		
		query_posts($args2);
		
		echo '<div class="tab-content">';
			if (have_posts()) : while (have_posts()) : the_post(); $i2++; ?>
				<?php 
					$active2 = '';
					if($i2 == 1) {
						$active2 = 'active show';
					} 
					global $post;
					$post_slug = $post->post_name;

				?>
				<div class="tab-pane fade <?php echo $active2; ?>" id="<?php echo $post_slug; ?>" role="tabpanel">
					<?php
					
					if( have_rows('resource') ):
						
						if( has_term( 'textile-glossary', 'resource_category') ) :
							echo '<div class="glossary-wrap">';
						endif;
					
						while ( have_rows('resource') ) : the_row();				
						
						?>
							
							<?php if( has_term( 'textile-glossary', 'resource_category') ) { ?>


								<div class="glossary-item">
									<a tabindex="0" class="glossary" role="button" data-toggle="popover" data-trigger="focus" data-placement="top" data-html="true" title="<?php the_sub_field('heading'); ?>" data-content="<?php the_sub_field('description'); ?>">
										<i class="fa fa-plus-circle" aria-hidden="true"></i> <?php the_sub_field('heading'); ?>
									</a>
								</div>						  


							<?php	} else { ?>
								<div class="resource-wrap">
									<?php if( get_sub_field('heading') ) { ?>
										<h4><?php the_sub_field('heading'); ?></h4>
									<?php } ?>
									<?php the_sub_field('description'); ?>
									<?= Pindler\button( 'get_sub_field', '', '', 'btn-primary' ); ?>
								</div>
							<?php	} ?>
							
							
						<?php endwhile;

						if( has_term( 'textile-glossary', 'resource_category') ) :
							echo '</div>';
						endif;
					
					else :
					
					    // no rows found
					
					endif;
					
					?>
				</div>
			<?php endwhile; endif;
		echo '</div>';
		echo '</div>';
			
	}
	
?>