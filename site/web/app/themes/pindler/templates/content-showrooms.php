<?php 
	$queried_object = get_queried_object(); 

	$taxonomyName = 'showroom_category';
	$args = [
    'taxonomy'     	=> $taxonomyName,
    'number'        => 0,
    'orderby'				=> 'name',
    'hide_empty'    => true,
    'parent'  => 0           
	];
	$terms = get_terms( $args );
	//var_dump($terms);
	
	foreach ( $terms as $term ) {
		
		echo '<h3>'. $term->name .'</h3>';


		$args = array(
			'post_type' => 'showrooms',
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
		
		query_posts($args);
		echo '<div class="row">';
		if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="col-sm-4 showroom">
				
				<h5><?php the_title(); ?></h5>
				<?php if( get_field('heading') ) { ?>
					<p class="showroom-heading"><?php the_field('heading'); ?></p>
				<?php } ?>
				
				<address>
					<?php if( get_field('address_line_1') ) { ?>
						<?php the_field('address_line_1'); ?><br />
					<?php } ?>
					<?php if( get_field('address_line_2') ) { ?>
						<?php the_field('address_line_2'); ?><br />
					<?php } ?>
					<?php if( get_field('city') ) { ?>
						<?php the_field('city'); ?>, <?php the_field('state'); ?> <?php the_field('zip'); ?>
					<?php } ?>
				</address>
				
				
				<ul class="showroom-contact">
					<?php if( get_field('phone_number') ) { ?>
						<li>
							<a href="tel:<?php the_field('phone_number'); ?>">
								<i class="fa fa-phone" aria-hidden="true"></i>
								<?php the_field('phone_number'); ?>
							</a>
						</li>
					<?php } ?>
					<?php if( get_field('fax_number') ) { ?>
						<li>
							<i class="fa fa-fax" aria-hidden="true"></i>
							<?php the_field('fax_number'); ?>
						</li>
					<?php } ?>
					<?php if( get_field('email') ) { ?>
						<li>
							<a href="mailto:<?php the_field('email'); ?>">
								<i class="fa fa-envelope" aria-hidden="true"></i>
								<?php the_field('email'); ?>
							</a>
						</li>
					<?php } ?>
				</ul>
				<?php if( get_field('location') ) { ?>
					<button href="" class="btn btn-info">
						<i class="fa fa-map-marker" aria-hidden="true"></i> View Map
					</button>
				<?php } ?>
				
			</div>
		
		<?php endwhile; endif;
		echo '</div>';
			
	}
	
?>