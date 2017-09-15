<?php 
	$image = get_sub_field('image');
	$colClass = 'col-sm-9';
	if( empty($image) ) {
		$colClass = 'col-sm-12';
	}
?>
<section class="section-block standard-text">
	
	<div class="row align-items-center">
		
		<?php if( !empty($image) ): ?>
			<div class="col-sm-3 text-center">
				<img src="<?php echo $image['url']; ?>" class="img-fluid" alt="<?php echo $image['alt']; ?>" />			
			</div>
		<?php endif; ?>			

		<div class="<?php echo $colClass; ?>">
			<?php the_sub_field('text'); ?>
		</div>
	</div>	
	
</section>