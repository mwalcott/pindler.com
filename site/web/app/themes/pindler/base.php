<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>
    <!--[if IE]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->
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
	          if( is_front_page() || is_page() || is_singular('collections') ) {
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
		      <div class="modal-body">
						<form method="POST" action="http://trade.pindler.com/cgi-bin/FCcgi.exe?w3exec=custportal&w3serverpool=cust&callingpage=logon" name="Form1">
							<div class="login-user"><input type="text" name="w3user" size="9" placeholder="Account #" /></div>
							<div class="login-pass"><input type="password" name="w3userpass" size="25" placeholder="Password" /></div>
							<div class="login-submit"><input type="submit" value="Login" /></div>
						</form>
						<a class="brown-button" href="/sign-up/">Register for Online Account</a>
						<a class="brown-button" href="/login/">Forgot Password?</a>
		      </div>
		    </div>
		  </div>
		</div>

		<script src="<?= get_template_directory_uri(); ?>/assets/scripts/owl.carousel.min.js"></script>
  </body>
  
</html>
