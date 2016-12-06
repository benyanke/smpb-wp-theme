<?php

/**
 * Template Name: Home Page
 */

get_header();

?>

<!-- slider -->

		<?php getSlider_smpb(); ?>
     <br>

<!-- end slider -->

       <main class="main-content">
				<div class="fullwidth-block">
					<div class="container">
						<!-- Image Rows -->

						<?php imageRows_smpb(); ?>

						</div> <!-- .row -->

					<!-- End image rows -->

					</div> <!-- .container -->
				</div> <!-- section -->

<br>
				<div class="fullwidth-block">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<?php smpb_custom_display_page_content(); ?>
							</div>
						</div>

          <?php if ( is_active_sidebar( 'homepage-widgets-lower' )) { ?>
						<div class="container homepage-lower-widgets">
							<div class="row">
								<?php dynamic_sidebar( 'homepage-widgets-lower' ); ?>
							</div>
						</div>
          <?php }  ?>

						</div> <!-- .row -->
					</div> <!-- .container -->
				</div> <!-- section -->
			</main> <!-- .main-content -->

<?php get_footer(); ?>
