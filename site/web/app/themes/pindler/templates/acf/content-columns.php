<section class="section-block columns">
	<header class="section-header">
		<h2><?php the_sub_field('heading'); ?></h2>
	</header>
	<div class="row justify-content-center">
		<?php
		$numrows = count( get_sub_field( 'column' ) );	

		if( have_rows('column') ):
			while ( have_rows('column') ) : the_row(); 
				$attachment_id = get_sub_field('image');
				$size = 'square'; // (thumbnail, medium, large, full or custom size)
				$image = wp_get_attachment_image_src( $attachment_id, $size );	
				
				$buttonURL = get_sub_field('url');
				$buttonText = get_sub_field('button_label');
				$colSize = get_sub_field('column_size');
				$colColor = get_sub_field('column_background_color');
				

				$colClass = '';
				$colClassColor = '';
				$colPadding = '';
				switch ( $colSize ) {
					
					case 'auto':
						$colClass = 'col-sm';
						break;
					case 'half':
						$colClass = 'col-sm-6';
						break;
					case 'third':
						$colClass = 'col-sm-4';
						break;
					case 'quarter':
						$colClass = 'col-sm-3';
						break;
				}		
				
				if($colColor) {
					$colClassColor = 'gray';
					$colPadding = 'top-padding';
				}

				$attachment_id = get_sub_field('image');
				$size = 'square'; // (thumbnail, medium, large, full or custom size)
				$image = wp_get_attachment_image_src( $attachment_id, $size );		
				
				$center = '';
				if( $numrows == 1 ) {
					$center = 'text-center';
				}
				
			
			?>
		
				<div class="<?php echo $colClass; ?> <?php echo $colClassColor; ?> <?php echo $center; ?>">	
					<div class="col-inner <?php echo $colPadding; ?>">
						<?php if( get_sub_field('heading') ) { ?>
							<h4>
								<?php the_sub_field('heading'); ?>
							</h4>
						<?php } ?>

						<?php the_sub_field('description'); ?>
						<img class="img-fluid" alt="" src="<?php echo $image[0]; ?>" />
						
							<?= Pindler\button( 'get_sub_field', '', '', 'btn-primary' ); ?>


						<?php
							$ai = 0;
							if( get_sub_field('column_background_color_copy') ) {
								if( have_rows('accordion_sections') ):
									echo '<div id="accordion" role="tablist" aria-multiselectable="true">';
										while ( have_rows('accordion_sections') ) : the_row(); $ai++; ?>
	
										  <div class="card">
										    <div class="card-header" role="tab" id="heading-<?php echo $ai; ?>">
										      <h5 class="mb-0">
										        <?php the_sub_field('heading'); ?>
										      </h5>									      
										      
										      <p><?php the_sub_field('short_description'); ?></p>
										      <a data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php echo $ai; ?>" aria-expanded="false" aria-controls="collapse-<?php echo $ai; ?>">
											    	Learn More
										      </a>
										    </div>
										
										    <div id="collapse-<?php echo $ai; ?>" class="collapse" role="tabpanel" aria-labelledby="heading-<?php echo $ai; ?>">
										      <div class="card-block">
										        <?php the_sub_field('job_description'); ?>
										      </div>
										    </div>
										  </div>
										
											
										
										<?php endwhile; 								
									echo '</div>';
								
								else :
								
								endif;
							
							}
						
						?>
										
						
						<?php
							$location = get_sub_field('google_map');
							if( !empty($location) ):
						?>
						<div class="acf-map">
							<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
						</div>
						<?php endif; ?>
					</div>

				</div>
			
			<?php endwhile;
		
		else :
		
		endif;
		
		?>
	</div>
	
	
</section>