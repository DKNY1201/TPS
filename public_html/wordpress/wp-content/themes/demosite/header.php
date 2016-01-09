<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
	<head>

		<!-- Basic -->
		<meta charset="<?php bloginfo('charset'); ?>">
        <link href="//www.google-analytics.com" rel="dns-prefetch">
        <link rel="profile" href="http://gmgp.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">
		<meta name="keywords" content="HTML5 Template" />
		<meta name="description" content="Porto - Responsive HTML5 Template">
		<meta name="author" content="Crivos.com">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Favicons -->
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon-144x144.png">

		<!-- Head Libs -->
		<script src="<?php echo get_template_directory_uri(); ?>/vendor/modernizr.js"></script>

		<!--[if IE]>
			<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ie.css">
		<![endif]-->

		<!--[if lte IE 8]>
			<script src="<?php echo get_template_directory_uri(); ?>/vendor/respond.js"></script>
		<![endif]-->

		<!-- Facebook OpenGraph Tags - Go to http://developers.facebook.com/ for more information.
		<meta property="og:title" content="Porto Website Template."/>
		<meta property="og:type" content="website"/>
		<meta property="og:url" content="http://www.crivos.com/themes/porto"/>
		<meta property="og:image" content="http://www.crivos.com/themes/porto/"/>
		<meta property="og:site_name" content="Porto"/>
		<meta property="fb:app_id" content=""/>
		<meta property="og:description" content="Porto - Responsive HTML5 Template"/>
		-->
		<?php wp_head(); ?>
	</head>
	<body>

		<div class="body">
			<header>
				<div class="container">
					<?php demosite_logo(); ?>
					<div class="search">
						<?php get_search_form(); ?>
					</div>
                    <?php demosite_small_top_menu(); ?>
					<?php 
						if(function_exists('dynamic_sidebar') && is_active_sidebar('top-social-sidebar')):
							dynamic_sidebar('top-social-sidebar');
						endif;
					?>
                    <?php demosite_menu('primary-menu'); ?>
				</div>
			</header>

			<div role="main" class="main">