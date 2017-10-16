<header class="banner">
	<div class="header-top">
		<div class="container">
			
			<div class="row align-items-center">
				<div class="col-4 text-left head-search-link">
					<a class="hidden-xs-down search-fabrics" href="http://trade.pindler.com/cgi-bin/fccgi.exe?w3exec=public&cmd=cust.fabric.search&stype=fabric">
						Search Fabrics <i class="fa fa-search" aria-hidden="true"></i>
					</a> 
					<a class="hidden-xs-down search-trim" href="http://trade.pindler.com/cgi-bin/fccgi.exe?w3exec=public&cmd=cust.trim.search&stype=trim">
						Search Trims <i class="fa fa-search" aria-hidden="true"></i>
					</a>
				</div>
				<div class="col-4 text-center">
					<ul class="user-links head-foot-links">
						<li>
						
							<a data-toggle="modal" data-target="#login">Login</a>
						</li>
						<li>
							<a href="/sign-up">Sign up</a>
						</li>
					</ul>
				</div>
				<div class="col-4 text-right header-social">
					<?= Pindler\social_links(); ?>
				</div>
			</div>
			
		</div>
	</div>

  <div class="container">
		
	  <nav class="nav-primary row align-items-center justify-content-center">

			<button id="my-icon" class="hamburger hamburger--squeeze hidden-md-up" type="button">
			   <span class="hamburger-box">
			      <span class="hamburger-inner"></span>
			   </span>
			</button>
			
			<!-- Menu Logo -->
			<a class="brand col-sm-10 col-md-4 push-md-4" href="<?= esc_url(home_url('/')); ?>">
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
        wp_nav_menu(['theme_location' => 'left_navigation', 'menu_class' => 'nav col-sm-4 hidden-sm-down pull-sm-4']);
      endif;
      ?>
      			
			<!-- Right Menu -->
      <?php
      if (has_nav_menu('right_navigation')) :
        wp_nav_menu(['theme_location' => 'right_navigation', 'menu_class' => 'nav col-sm-4 hidden-sm-down']);
      endif;
      ?>

	  </nav>
	
  </div>
  
</header>
