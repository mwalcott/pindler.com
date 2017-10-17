<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>
    <div id="">
	    <!--[if IE]>
	      <div class="alert alert-warning">
	        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
	      </div>
	    <![endif]-->
			
			<nav id="my-menu">
	      <?php
	      if (has_nav_menu('mobile_navigation')) :
	        wp_nav_menu(['theme_location' => 'mobile_navigation', 'menu_class' => 'nav']);
	      endif;
	      ?>
			</nav>
	    
	    
	    <?php
	      do_action('get_header');
	      get_template_part('templates/header');
	    ?>
	    <?php if( is_front_page() || is_page() || is_singular('collections') ) {
		    Pindler\banner();
	    } ?>
	    <div class="wrap container" role="document">
	      <div class="content row">
	        <main class="main">
	          <?php 
		          if( is_front_page() || is_page()  || is_singular('collections') || is_single() ) {
			          
			          if( is_singular('post') || is_page_template( 'template-showrooms.php' ) || is_page_template( 'template-resources.php' ) ) {
				         include Wrapper\template_path();  
			          }
			          Pindler\content_acf();
		          } else {
		          	include Wrapper\template_path(); 
							}
							
							if( is_singular('collections') ) {
								Pindler\collection_buttons();
							}
							
		        ?>
	        </main><!-- /.main -->
	        <?php if (Setup\display_sidebar()) : ?>
	          <aside class="sidebar">
	            <?php include Wrapper\sidebar_path(); ?>
	          </aside><!-- /.sidebar -->
	        <?php endif; ?>
	      </div><!-- /.content -->
	    </div><!-- /.wrap -->
	    <?php
		    
		    

	      do_action('get_footer');
	      get_template_part('templates/footer');
	      wp_footer();
	    ?>
    </div>
	
			
	
		<?= Pindler\modal(); ?>
			<?php 
				
				$args2 = array(
					'post_type' => 'showrooms',
					'orderby' => 'title',
					'order' => 'ASC'
				);
				
				query_posts($args2);
				//echo '<div class="row">';
				if (have_posts()) : while (have_posts()) : the_post(); 
			
					global $post;
					$post_slug = $post->post_name;
			
				?>
				
					<div class="modal fade bd-example-modal-lg" id="<?php echo $post_slug; ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $post_slug; ?>" aria-hidden="true">
					  <div class="modal-dialog modal-lg" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="loginLabel"><?php the_title(); ?></h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
						      <div class="modal-body clearfix">
										<?php the_field('location'); ?>
						      </div>
					    </div>
					  </div>
					</div>
			
			
				<?php endwhile; endif; ?>
				
			
			

			<!-- Modal -->
			<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="loginLabel">Login</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <form method="POST" action="http://trade.pindler.com/cgi-bin/FCcgi.exe?w3exec=custportal&w3serverpool=cust&callingpage=logon" name="Form1">
				      <div class="modal-body clearfix">
								
									<div class="login-user"><input class="form-control" type="text" name="w3user" size="9" placeholder="Account #" /></div>
									<div class="login-pass"><input class="form-control" type="password" name="w3userpass" size="25" placeholder="Password" /></div>
									<div class="login-submit float-right"><input class="btn btn-primary" type="submit" value="Login" /></div>
								
				      </div>
				      <div class="modal-footer clearfix">
								<a class="float-left" href="/login/">Forgot Password?</a>
								<a class="float-right" href="/sign-up/">Register for Online Account</a>
				      </div>
			      </form>
			    </div>
			  </div>
			</div>
			
			<script src="<?= get_template_directory_uri(); ?>/assets/scripts/owl.carousel.min.js"></script>
			<script src="<?= get_template_directory_uri(); ?>/assets/scripts/jquery.mmenu.all.js"></script>
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCYpy0c3e6lcb49OtV8aJMwhf2DPMYqqeM"></script>
  </body>
  
</html>
