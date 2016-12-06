<!DOCTYPE html>
<html lang="en"><head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

				<title><?php echo smpb_custom_generate_title(); ?></title>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<!-- Loading third party fonts -->
		<link href="<?php echo get_template_directory_uri(); ?>/fonts/novecento-font/novecento-font.css" rel="stylesheet" type="text/css">
		<link href="<?php echo get_template_directory_uri(); ?>/fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- Loading main css file -->
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">

		<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/ie-support/html5.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/ie-support/respond.js"></script>
		<![endif]-->

		<link rel="stylesheet" type="text/css" href="https://www.stmarypb.com/wp-content/plugins/sermon-manager-for-wordpress/css/sermon.css">
		<style type="text/css">

		.wpfc_sermon {
			padding-bottom: 30px
		}

		.sortSeries, .sortTopics, .sortBooks {
			display: none;
		}

		</style>

	</head>


	<body id="pgid-<?php echo get_the_ID(); ?> pgslug-<?php global $post; echo $post->post_name; ?>">

		<div class="site-content">
			<header class="site-header">
				<div class="container">

					<a href="<?php echo get_home_url(); ?>" class="branding">
						<img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="" class="logo">
						<h1 class="site-title"><?php echo get_bloginfo('name'); ?></h1>
					</a>

					<div class="main-navigation">
						<button class="menu-toggle"><i class="fa fa-bars"></i> Menu</button>

						<!-- Navigation Menu -->
						<?php	smpb_custom_main_nav_menu();	?>
					</div>
					<div class="mobile-navigation"></div>
				</div>
			</header>
