<section class="section-block featured-fabrics">

	<header class="section-header">
		<h2><?php the_sub_field('heading'); ?></h2>
	</header>
	
	<div class="row text-center">

<?php

if( have_rows('fabrics') ):

	while ( have_rows('fabrics') ) : the_row(); 
		$attachment_id = get_sub_field('image');
		$size = 'square'; // (thumbnail, medium, large, full or custom size)
		$image = wp_get_attachment_image_src( $attachment_id, $size );	
		
		$buttonURL = get_sub_field('url');
		$buttonText = get_sub_field('button_label');

	
	?>

		<div class="col-sm-4">	
			<img class="img-fluid img-thumbnail" alt="" src="<?php echo $image[0]; ?>" />
			<h4><?php the_sub_field('heading'); ?></h4>
			<?php the_sub_field('content'); ?>
			<a class="btn btn-primary" href="<?php echo $buttonURL; ?>">
				<i><?php echo $buttonText; ?></i>
			</a>
		</div>
	
	<?php endwhile;

else :

    // no rows found

endif;

?>
		

	</div>	
	
</section>