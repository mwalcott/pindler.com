<article <?php post_class('col-sm-4'); ?>>
	<?php									 
		if ( has_post_thumbnail() ) {
		  the_post_thumbnail('featured_installs', array('class' => 'img-fluid'));
		}
	
	?>
  <header>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php //get_template_part('templates/entry-meta'); ?>
  </header>
  <div class="entry-summary">
	  
    <?php //the_excerpt(); ?>
  </div>
</article>
