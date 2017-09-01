<header class="banner">
	<div class="header-top">
		<div class="container">
			
			<div class="row align-items-center">
				<div class="col-sm-4 text-left">
					<a href="#FIXME">Search Fabrics <i class="fa fa-search" aria-hidden="true"></i></a>
				</div>
				<div class="col-sm-4 text-center">
					<ul class="user-links head-foot-links">
						<li>
						
							<a data-toggle="modal" data-target="#login">Login</a>
						</li>
						<li>
							<a href="/sign-up">Sign up</a>
						</li>
					</ul>
				</div>
				<div class="col-sm-4 text-right header-social">
					<?= Pindler\social_links(); ?>
				</div>
			</div>
			
		</div>
	</div>

  <div class="container">
		
	  <nav class="nav-primary row align-items-center justify-content-center">

			<!-- Menu Logo -->
			<a class="brand col-sm-4 push-sm-4" href="<?= esc_url(home_url('/')); ?>">
				<?php 
				
				$image = get_field('header_logo', 'option');
				
				if( !empty($image) ): ?>
				
					<img class="img-fluid" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
				
				<?php endif; ?>
				<?php //bloginfo('name'); ?>
			</a>

			<!-- Left Menu -->
      <?php
      if (has_nav_menu('left_navigation')) :
        wp_nav_menu(['theme_location' => 'left_navigation', 'menu_class' => 'nav col-sm-4 hidden-xs-down pull-sm-4']);
      endif;
      ?>
      			
			<!-- Right Menu -->
      <?php
      if (has_nav_menu('right_navigation')) :
        wp_nav_menu(['theme_location' => 'right_navigation', 'menu_class' => 'nav col-sm-4 hidden-xs-down']);
      endif;
      ?>

	  </nav>
	
  </div>
  
</header>
