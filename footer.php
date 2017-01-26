		</div>

			<footer class="site-footer">
				<div class="container">
					<!-- <div class="row"> -->

					<?php if (is_active_sidebar('footer-sidebar')) {
    ?>
						<div class="row">

							<?php dynamic_sidebar('footer-sidebar'); ?>

						<!-- .row -->
						</div>
					<?php
} ?>

<!-- 					<p class="colophon">Copyright 2016 St. Mary of Pine Bluff. All right reserved</p> -->
					<?php if(! is_user_logged_in()) { ?>
 					<p class="colophon footerloginlink"><a href="<?php echo admin_url(); ?>">Login</a></p>
					<?php } ?>
				</div><!-- .container -->
			</footer> <!-- .site-footer -->


		<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.11.1.min.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/plugins.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/app.js"></script>

		<?php wp_footer(); ?>

	</body>

</html>
