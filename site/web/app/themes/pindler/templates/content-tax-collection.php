<?php 
	$i = 0;
?>
<?php 
	while (have_posts()) : the_post(); $i++; 
	
	$push = '';
	$pull = '';
	$text_align = '';
	if( $i % 2 == 0 ) {
		$push = 'push-md-6';
		$pull = 'pull-md-6';
		$text_align = 'text-right';
	}
?>

	<article <?php post_class('row align-items-center'); ?>>
		
		<div class="col-md-6 <?php echo $push; ?>">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('collection_landing', array('class' => 'img-fluid')); ?>
			</a>
		</div>
		
		<div class="col-md-6 <?php echo $pull; ?> <?php echo $text_align; ?>">
			<div class="pad-content">
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<?php the_excerpt(); ?>
				<p><a class="btn btn-primary" href="<?php the_permalink(); ?>">View Collection</a></p>
			</div>
		</div>
	  
	</article>
<?php 
	endwhile; 
?>