<section class="section-block columns">
	<header class="section-header">
		<h2><?php the_sub_field('heading'); ?></h2>
	</header>
	<div class="row">
		<?php
		$numrows = count( get_sub_field( 'column' ) );	

		if( have_rows('column') ):
			while ( have_rows('column') ) : the_row(); 
				$attachment_id = get_sub_field('image');
				$size = 'square'; // (thumbnail, medium, large, full or custom size)
				$image = wp_get_attachment_image_src( $attachment_id, $size );	
				
				$buttonURL = get_sub_field('url');
				$buttonText = get_sub_field('button_label');
				
				$colClass = '';
				
				switch ( $numrows ) {
					
					case 1:
						$colClass = 'col-sm-12';
					case 2:
						$colClass = 'col-sm-6';
					case 3:
						$colClass = 'col-sm-4';
					case 4:
						$colClass = 'col-sm-3';
					case 5:
						$colClass = 'col';
					case 6:
						$colClass = 'col-sm-2';
					case 7:
						$colClass = 'col';
					case 8:
						$colClass = 'col';
					case 9:
						$colClass = 'col';
					case 10:
						$colClass = 'col';
					case 11:
						$colClass = 'col';
					case 12:
						$colClass = 'col-sm-1';
							
				}		
			
			?>
		
				<div class="col">	
					<div class="col-inner">
						<h4><?php the_sub_field('heading'); ?></h4>
						<?php the_sub_field('description'); ?>
						<?= Pindler\button( 'get_sub_field', '', '', 'btn-primary' ); ?>
					</div>

				</div>
			
			<?php endwhile;
		
		else :
		
		    // no rows found
		
		endif;
		
		?>
	</div>
	
	
</section>