<section class="section-block">
	<header class="section-header">
		<h2><?php the_sub_field('heading'); ?></h2>
	</header>

		<?php
			$i = 0;
			$args = array(
				'post_type' => 'our_history',
				'posts_per_page' => 12,

			);
			// The Query
			$the_query = new WP_Query( $args );
			
			// The Loop
			if ( $the_query->have_posts() ) { while ( $the_query->have_posts() ) { $the_query->the_post(); $i++;
			
			$flexOrderImage = 'flex-last';
			$flexOrderContent = 'flex-first';
			$textAlign = 'text-right';
			if( $i % 2 == 0 ) {
				$flexOrderImage = 'flex-first';
				$flexOrderContent = 'flex-last';
				$textAlign = 'text-left';
			}
		
		?>	
						
				<div class="row history">
					<div class="col-6 <?php echo $flexOrderImage; ?> image">
						<div class="inner">
							<?php the_post_thumbnail('square_small', array('class' => 'img-fluid')); ?>
						</div>
					</div>
					<div class="col-6 <?php echo $flexOrderContent; ?> history-content <?php echo $textAlign; ?>">
						<div class="inner">
							<cite><?php the_field('year'); ?></cite>
							<h3><?php the_title(); ?></h3>
							<?php the_content(); ?>
						</div>
					</div>
				</div>

			<?php 
			}
			/* Restore original Post Data */
			wp_reset_postdata();
		} else {
			// no posts found
		}
		?>
	
	
</section>