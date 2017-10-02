<article <?php post_class('col-sm-6 advertise-block'); ?>>
	<?php									 
	
	
		if( is_category( 'whats-new' ) ) { ?>
			
		<?php } elseif( is_category( 'advertising' ) ) { ?>
			
		<?php } elseif( is_category( 'as-seen-in' ) ) { ?>
			
		<?php } else {
			
		}
	
	
	
	?>
	<div class="row">
		<div class="col-sm-5">
		<?php									 
			if ( has_post_thumbnail() ) {
			  the_post_thumbnail('magazine', array('class' => 'img-fluid'));
			}
		?>
		</div>
		<div class="col-sm-7">
		  <header>
		    <h2><?php the_title(); ?></h2>
		  </header>

			<?php
			
			if( have_rows('pattern') ):
				echo '<ul>';
				while ( have_rows('pattern') ) : the_row(); ?>
				
					<li>
					  <a href="<?php the_sub_field('pattern_link'); ?>"><?php the_sub_field('pattern_title'); ?></a>
					</li>
				
				<?php endwhile;
				echo '</ul>';
			
			else :
			
			
			endif;
			
			?>
		  
		</div>
	</div>
</article>
