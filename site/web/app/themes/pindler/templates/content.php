<article <?php post_class('col-sm-3'); ?>>
		<?php									 
			if ( has_post_thumbnail() ) {
				echo '<a href="'. get_permalink() .'">';
			  	the_post_thumbnail('square_small', array('class' => 'img-fluid img-thumbnail'));
			  echo '</a>';
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
