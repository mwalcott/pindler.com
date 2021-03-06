<section class="section-block">
	<header class="section-header">
		<h2><?php the_sub_field('heading'); ?></h2>
	</header>

	<div class="owl-carousel owl-installs owl-theme">

		<?php
			$args = array(
				'post_type' => 'featured_installs',
				'posts_per_page' => 12,

			);
			// The Query
			$the_query = new WP_Query( $args );
			
			// The Loop
			if ( $the_query->have_posts() ) {
				while ( $the_query->have_posts() ) {
					$the_query->the_post(); 
			
		?>					
			<div>
				<a href="<?php the_permalink(); ?>">
					<?php									 
						if ( has_post_thumbnail() ) {
						  the_post_thumbnail('featured_installs', array('class' => 'img-fluid'));
						}
					?>
				</a>
			</div>
			<?php }
			/* Restore original Post Data */
			wp_reset_postdata();
		} else {
			// no posts found
		}
		?>
	
	</div>
	
	
</section>