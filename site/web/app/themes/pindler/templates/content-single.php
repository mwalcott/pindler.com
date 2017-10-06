<?php while (have_posts()) : the_post(); ?>
 
  <?php if( in_category('as-seen-in') ) { ?>
	  
	  <article <?php post_class('row asi justify-content-center align-items-center'); ?>>
		  
		  <div class="col-3">
			  <?php the_post_thumbnail('magazine', array('class' => 'img-fluid magazine')); ?>
			  
		  </div>
		  
		  <div class="col-7">
		    <h1 class="entry-title"><?php the_title(); ?></h1>
		    <?php the_content(); ?>
		    <a href="<?php the_field('pdf'); ?>" class="btn btn-primary">Download Article <i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
		  </div>
		  
	  </article>
	  
  <?php } else { ?>
  
	  <article <?php post_class(); ?>>
	    <header>
	      <h1 class="entry-title"><?php the_title(); ?></h1>
	      <?php //get_template_part('templates/entry-meta'); ?>
	    </header>
	    <div class="entry-content">
	      <?php the_content(); ?>
	    </div>
	    <footer>
	      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
	    </footer>
	    <?php //comments_template('/templates/comments.php'); ?>
	  </article>
  <?php } ?>
  
<?php endwhile; ?>
