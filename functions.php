<?php

/* Register Nav Menu */

add_action('init', 'smpb_custom_register_navmenu');

// if (! function_exists ("smpb_custom_register_navmenu")) :
function smpb_custom_register_navmenu()
{
    register_nav_menus(
        array(
            'nav-menu' => 'Main Navigation Menu'
        )
    );
}


/* Display page body */

function smpb_custom_display_page_content()
{
    if (have_posts()) : while (have_posts()) : the_post();
    the_content();
    endwhile; else :
    echo "<p>" . _e('Sorry, no posts matched your criteria.') . "</p>";
    endif;
}




/* <title> generator */

function smpb_custom_generate_title()
{
    if (is_home() || is_front_page()) {
        return get_bloginfo('name');
    } else {
        return wp_title("") . " | " . get_bloginfo('name');
    }
}




/* Create main nav menu */
function smpb_custom_main_nav_menu()
{
    wp_nav_menu(
        array(
            'nav-menu' => 'Main Navigation Menu',
            'menu_id' => 'menu',
        )
    );
}



/* Register Sidebars */

add_action('widgets_init', 'smpb_custom_register_sidebars');

// if (! function_exists ("smpb_custom_register_sidebars")) :
function smpb_custom_register_sidebars()
{

    /* Footer Widget Section */

    $args = array(
        'name'          => __('Footer Widget Area', 'theme_text_domain'),
        'id'            => 'footer-sidebar',
        'description'   => 'Widget area for the footer. Used on every page of the site.',
      'class'         => 'footer-sidebar-class',
        'before_widget' => '<div class="col-md-6"><div class="widget">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>' );

    register_sidebar($args);
    unset($args);

    $args = array(
        'name'          => __('Homepage Lower Widget Area', 'theme_text_domain'),
        'id'            => 'homepage-widgets-lower',
        'description'   => 'Widget area for the homepage. Displays near the bottom of the homepage.',
        'class'         => 'homepage-lower',
        'before_widget' => '<div class="col-md-6"><div class="widget">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<h2 class="section-title">',
        'after_title'   => '</h2>' );

    register_sidebar($args);
    unset($args);

    $args = array(
        'name'          => __('Homepage Upper Widget Area', 'theme_text_domain'),
        'id'            => 'homepage-widgets-upper',
        'description'   => 'Widget area for the homepage. Displays just below the slider on the homepage.',
        'class'         => 'footer-sidebar-class',
        'before_widget' => '<div class="col-md-6"><div class="widget">',
        'after_widget'  => '</div></div>',

        'before_widget' => '<div class="col-md-6 widget">',
        'after_widget'  => '</div>',

        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>' );

    register_sidebar($args);
}



/* Support Featured Images on pages */

add_theme_support('post-thumbnails', array( 'post', 'page' ));


/* Code for outputting page header image */

// if (! function_exists ("getPageHeaderImage_smpb")) :
function getPageHeaderImage_smpb()
{
    $defaultImg = "http://stmarypb.com/template/images/praying.jpg";
    if (has_post_thumbnail($post->ID)) {
        $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail'); ?>

	<div class="page-head" data-bg-image="<?php echo $image[0]; ?>" style="background-image: url(&quot;<?php echo $image[0]; ?>&quot;);">

		<?php
    } else {
        ?>
	<div class="page-head" data-bg-image="<?php echo $defaultImg; ?>" style="background-image: url(&quot;<?php echo $defaultImg; ?>&quot;);">
		<?php
    }
}


// if (! function_exists ("getSlider_smpb")) :
function getSlider_smpb()
{
    // randomly select x images on each pageload to display
    $imagesToUse = 5;

    unset($sliderImages);

    $slider_image_dir = "/var/www/stmarypb.com/public_html/wp-content/themes/smpb-custom/slider-images/";
    $sliderImages = glob($slider_image_dir.'*.jpg');
    $sliderImages = str_replace("/var/www/stmarypb.com/public_html/wp-content/themes/smpb-custom", get_template_directory_uri(), $sliderImages);


    //Randomize order
    shuffle($sliderImages); ?>
	<div class="hero">
				<div class="slides">
                <?php
                                    // Displays the first X images in the randomized array
                                    for ($i = 0; $i < $imagesToUse; $i++) {
                                        ?>
					<li data-bg-image="<?php echo $sliderImages[$i]; ?>">
						<div class="container">
							<div class="slide-content">

								<br>
								<!--
                                <a href="<?php echo get_permalink(get_page_by_path('mass-times')) ?>" class="button">Mass Times</a>
                                <br><br>
								<a href="<?php echo get_permalink(get_page_by_path('confession')) ?>" class="button">Confession</a>
                                -->
							</div>
						</div>
					</li>
				<?php
                                    } ?>
				</div>
			</div>
			<?php

}



/* For Homepage image row */
// if (! function_exists ("imageRows_smpb")) :
function imageRows_smpb()
{
    //	$rowImages[] = array("Site Name", "Link URL", "image URL");

    $rowImages[] = array("Roman Catholic Man", "http://www.romancatholicman.com/", "RomanCatholicMan2.jpg");
    $rowImages[] = array("Holy League", "http://holyleague.com/", "HolyLeague.jpg");
    $rowImages[] = array("Miracle of Life Rosary Garden", "http://www.rosarygarden.org/", "RosaryGarden2.jpg");
    $rowImages[] = array("Knights of Divine Mercy", "http://www.knightsofdivinemercy.com/", "KDM2.jpg");
    $rowImages[] = array("Ladies of Divine Mercy", "https://www.facebook.com/groups/LadiesofDivineMercy/", "LDMlogo.jpg");
    $rowImages[] = array("Knights of Columbus", "https://www.kofcknights.org/StateCouncilSite/?CN=US&ST=WI", "KofClogo.jpg"); ?>
<div class="row">

						<?php foreach ($rowImages as $row) {
        ?>
                           <div class="col-md-2 col-sm-7">
								<div class="news">
									<a href="<?php echo $row[1]; ?>">
                                    <image class="news-image" src="<?php echo get_template_directory_uri() . "/images/" . $row[2]; ?>"></image>
									<h3 class="news-title"><a href="<?php echo $row[1]; ?>"><?php echo $row[0]; ?></a><a href="#"></a></h3>
                                </div>
                             </div>

			<?php

    }
}



/* Page Specific Functions  */
// if (! function_exists ("smpb_staff_page")) :
function smpb_staff_page()
{

//	$staff[] = array("Name", "Image Path", );

?>
<center>

<table width="628" border="0">
  <tbody><tr>
    <td width="195"><strong><img src="<?php echo get_template_directory_uri(); ?>/images/frheilman_pic.jpg" width="195" height="243" alt="Fr. Rick Photo"></strong></td>
    <td width="423"><p><strong>The Very Reverend Richard Heilman ("Fr. Rick")<br>
    </strong>Pastor of St. Mary of Pine Bluff, St. Ignatius in Mt. Horeb, and Holy Redeemer in Perry.<br>
    </p>
      <p>rheilman@churchmilitant.com<br>
        In case of emergency: (608) 798-4644
        <br>
    </p>
      <p>&nbsp;</p></td>
  </tr>
</tbody></table>
<p>&nbsp;</p>
</center>

<center>

<table width="630" border="0">
  <tbody><tr>
    <td width="195" height="203"><img src="<?php echo get_template_directory_uri(); ?>/images/RIPHAHN, Mary Lou.jpg" width="193" height="241"></td>
    <td width="425"><p><strong>Mary Lou Riphahn<br>
    </strong>Parish Secretary<br>
      </p>
      <p>catholic@tds.net<br>
        608-798-2111      </p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p><br>
      </p></td>
  </tr>
</tbody></table>
</center>

<div align="center">
  <table width="628" border="0">
    <tbody><tr>
      <td width="195" height="237"><img src="<?php echo get_template_directory_uri(); ?>/images/PIENTKA, KEN; (Staff)99.jpg" alt="" width="194" height="241"></td>
      <td width="423"><p><strong>Ken Pientka<br>
        </strong>Parish Administrator</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p><br>
        </p>
<p>&nbsp;</p></td>
      </tr>
  </tbody></table>
</div>

<center>
  <table width="628" border="0">
    <tbody><tr>
      <td width="197" height="165"><img src="<?php echo get_template_directory_uri(); ?>/images/ESGUERRA, ARITOTLE; (Staff)54.jpg" width="196" height="244"></td>
      <td width="421"><p><strong>Aristotle Esguerra<br>
        </strong>Music Director</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p><br>
        </p>
        <p><br>
      </p></td>
    </tr>
  </tbody></table>
  <p>&nbsp;</p>
</center>
<center>
  <table width="628" border="0">
    <tr>
      <td width="195"><img src="<?php echo get_template_directory_uri(); ?>/images/DAVIES, STEVEN; (Staff)34.jpg" width="194" height="245"></td>
      <td width="423"><p><strong>Steve Davies<br>
        </strong>Director of Children's Religious Education, Grades 6-12</p>
        <p>&nbsp;</p>
        <p><br>
        </p>
        <p><br>
      </p>
        <p>&nbsp;</p></td>
    </tr>
  </table>
</center>
<p>&nbsp;</p>
<center>
  <table width="628" border="0">
    <tr>
      <td width="195"><img src="<?php echo get_template_directory_uri(); ?>/images/PTAK, BETH; (Staff)171.jpg" width="195" height="247"></td>
      <td width="423"><p><strong>Beth Ptak<br>
        </strong>Director of Children's Religious Education, Grades 1-5<br>
        </p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p><br>
        </p>
<p>&nbsp;</p></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</center>
<!-- <center>
  <table width="628" border="0">
    <tr>
      <td width="195"><img src="<?php echo get_template_directory_uri(); ?>/images/LINS, Marie.jpg" width="194" height="245"></td>
      <td width="423"><p><strong>Marie Lins<br>
        </strong>Director of Adult Faith Formation<br>
      </p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p><br>
        </p>
        <p>&nbsp;</p></td>
    </tr>
  </table>
</center> -->
<p>&nbsp;</p>
<center>
  <table width="628" border="0">
    <tr>
      <td width="195"><img src="<?php echo get_template_directory_uri(); ?>/images/SILVA, Raul & Veronica.jpg" width="195" height="250"></td>
      <td width="423"><p><strong>Raul Silva<br>
        </strong>Custodian</p>
        <p>&nbsp;</p>
        <p><br>
        </p>
        <p><br>
        </p>
        <p>&nbsp;</p></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="628" border="0">
    <tr>
      <td width="195"><img src="<?php echo get_template_directory_uri(); ?>/images/WILLIAMS, Mary.jpg" width="196" height="244"></td>
      <td width="423"><p><strong>Mary Williams<br>
        </strong>Parish Nurse</p>
        <p>&nbsp;</p>
        <p><br>
        </p>
        <p><br>
        </p>
        <p>&nbsp;</p></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</center>

<?php

}

?>
