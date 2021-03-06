<footer class="content-info">
	<?php if( get_field('image') ) { ?>
  <div class="bottom-background">
  	<div style="background-image: url(<?php the_field('image'); ?>);">
	  	
  	</div>
  </div>
  <?php } ?>

  <div class="container">
		<div class="row footer-columns align-items-center">
			
			<div class="col-sm-3 footer-logo-wrap">
				<?php 
				
				$image = get_field('footer_logo', 'option');
				
				if( !empty($image) ): ?>
				
					<img class="img-fluid footer-logo" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
				
				<?php endif; ?>				

			</div>
			<div class="col-sm-6 footer-nav-wrap">
	      <?php
	      if (has_nav_menu('footer_navigation')) :
	        wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => 'footer-nav']);
	      endif;
	      ?>
			</div>
			
			<div class="col-sm-3 footer-social">
				<?= Pindler\social_links(); ?>
			</div>
			
		</div>
	  <div class="row copyright">
		  <div class="col-sm-12 text-center">
			  &copy; <?php echo date('Y'); ?> Pindler & Pindler, Inc.
		  </div>
	  </div>
  </div>
</footer>
