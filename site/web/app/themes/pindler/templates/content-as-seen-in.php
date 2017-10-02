<article <?php post_class('col-sm-2 magazine-block'); ?>>
	<a href="<?php the_permalink(); ?>">
	<?php									 
		if ( has_post_thumbnail() ) {
		  the_post_thumbnail('magazine', array('class' => 'img-fluid'));
		}
	?>
	</a>
</article>
