<?php

/**
 * Template Name: Staff Page
 */

get_header();

?>

<?php getPageHeaderImage_smpb(); ?>
				<div class="container">
					<h2 class="page-title"><?php echo $post->post_title; ?></h2>
				</div>
			</div>

			<main class="main-content">
				<div class="fullwidth-block">
						<?php smpb_custom_display_page_content(); ?>
						<br /><br />
						<?php smpb_staff_page(); ?>
                         </div>
							<div class="sidebar col-md-3 col-md-offset-1">
								<div class="widget">
									<h3 class="widget-title">&nbsp;</h3>
								</div>
							</div>
						</main>





<?php get_footer(); ?>
