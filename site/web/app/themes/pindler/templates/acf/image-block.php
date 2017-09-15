<?php 
	$image = get_sub_field('image');
?>
<section class="section-block standard-text">
	
	<div class="row align-items-center">
		
		<?php if( !empty($image) ): ?>
			<div class="col-sm-12 text-center">
				<img src="<?php echo $image['url']; ?>" class="img-fluid" alt="<?php echo $image['alt']; ?>" />			
			</div>
		<?php endif; ?>			

	</div>	
	
</section>