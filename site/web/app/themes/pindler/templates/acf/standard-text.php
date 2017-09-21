<?php 
	$col_size = get_sub_field('column_size');

	$attachment_id = get_sub_field('image');
	$size = 'square'; // (thumbnail, medium, large, full or custom size)
	$image = wp_get_attachment_image_src( $attachment_id, $size );	
	
	
	//$image = get_sub_field('image');
	$colClassLeft = 'col-sm-3';
	$colClassRight = 'col-sm-9';

	if( empty($image) ) {
		$colClassRight = 'col-sm-12';
	}
	elseif( $col_size == 'half' ) {
		$colClassLeft = 'col-sm-6';
		$colClassRight = 'col-sm-6';		
	}
	elseif( $col_size == 'third' ) {
		$colClassLeft = 'col-sm-4';
		$colClassRight = 'col-sm-8';		
	}
	elseif( $col_size == 'quarter' ) {
		$colClassLeft = 'col-sm-3';
		$colClassRight = 'col-sm-9';		
	}
	else {
		
	}
	
	$image_style = '';
	if( is_singular('collections') ) {
		$image_style = 'img-thumbnail';	
	}
?>
<section class="section-block standard-text">
	
	<div class="row align-items-center">
		<?php //echo $col_size; ?>
		<?php if( !empty($image) ): ?>
			<div class="<?php echo $colClassLeft; ?> text-center">
				<img class="img-fluid <?php echo $image_style; ?>" alt="" src="<?php echo $image[0]; ?>" />
			</div>
		<?php endif; ?>			

		<div class="<?php echo $colClassRight; ?>">
			<div class="content-padding">
				<?php the_sub_field('text'); ?>
			</div>
		</div>
	</div>	
	
</section>